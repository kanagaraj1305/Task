@extends('master.header')
@include('master.navbar')
@include('master.mainbar')
@section('content')
    <div class="portlet portlet-table">

        <div class="portlet-header">

            <h3>
                <i class="fa fa-group"></i>
                Task
            </h3>

        </div> <!-- /.portlet-header -->
        @if(Session::has('success-msg'))
            <p class="alert alert-success">{{ Session::get('success-msg') }}</p>
        @endif
        <ul>
            @if($errors->any())
                @foreach($errors->all() as $error)
                    <li class="text-danger"> {{ $error }} </li>
                @endforeach

            @endif
        </ul>
        <div class="portlet-content">
            <form class="form-horizontal" role="form" method="POST" action="{{ action('TaskController@store') }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group">
                    <label class="col-md-4 control-label">Name</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">Task</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="task" id="task" value="{{ old('task') }}">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">Priority</label>
                    <div class="col-md-6">
                        <select name="priority" id="priority" class="form-control">
                            <option value="high">High</option>
                            <option value="medium">Medium</option>
                            <option value="low">low</option>
                        </select>
                    </div>
                </div>



                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                            Submit
                        </button>
                    </div>
                </div>
            </form>
        </div>


    </div>

    <div class="portlet portlet-table">

        <div class="portlet-header">

            <h3>
                <i class="fa fa-group"></i>
                Task List
            </h3>

        </div> <!-- /.portlet-header -->

        <div class="portlet-content">
            <table class="table table-responsive">
                <tr>
                    <th>Name</th>
                    <th>Task</th>
                    <th>Priority</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                @foreach($tasks as $task)
                    <tr id="task-{{$task->id}}">
                        <td>{{$task->name}}</td>
                        <td>{{$task->task}}</td>
                        <td>{{$task->priority}}</td>
                        <td><a href="edit/{{$task->id}}" class="btn btn-default"> Edit</a></td>
                        <td><a href="delete/{{$task->id}}" class="btn btn-danger"> Delete</a></td>
                    </tr>
                @endforeach
            </table>
        </div>


    </div>


@stop