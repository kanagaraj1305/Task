@extends('master.header')
@include('master.navbar')
@include('master.mainbar')
@section('content')
    <div class="portlet portlet-table">

        <div class="portlet-header">

            <h3>
                <i class="fa fa-group"></i>
                Task Edit
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
            <form class="form-horizontal" role="form" method="POST" action="/update/{{$task->id}}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group">
                    <label class="col-md-4 control-label">Name</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="name" id="name" value="{{ $task->name }}">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">Task</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="task" id="task" value="{{ $task->task }}">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">Priority</label>
                    <div class="col-md-6">
                        <select name="priority" id="priority" class="form-control">
                            <option value="{{$task->priority}}">{{$task->priority}}</option>
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



@stop