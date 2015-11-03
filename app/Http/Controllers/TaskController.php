<?php

namespace App\Http\Controllers;

use App\task;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks=task::all();
        return view('task')->with('tasks',$tasks);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('task');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator=Validator::make(Input::all(),array(
            'name'=>'required',
            'task'=>'required',
            'priority'=>'required'
        ));
        if($validator->fails()){
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $task= new task();
        $task->name=Input::get('name');
        $task->task=Input::get('task');
        $task->priority=Input::get('priority');
        $task->save();
        //Session::flash('Success-msg','Task Added Successfully!!!');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task=task::find($id);
        return view('edit_task')->with('task',$task);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator=Validator::make(Input::all(),array(
            'name'=>'required',
            'task'=>'required',
            'priority'=>'required'
        ));
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $task=task::find($id);
        $task->name=Input::get('name');
        $task->task=Input::get('task');
        $task->priority=Input::get('priority');
        $task->save();
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task=task::find($id);
        $task->delete();
       // Session::falsh('success-msg','Successfully Deleted!!!');
        return redirect()->back();
    }
}
