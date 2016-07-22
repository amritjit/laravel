<!-- resources/views/tasks.blade.php -->

@extends('layouts.app')

@section('content')

    <!-- Bootstrap Boilerplate... -->

    <div class="panel-body">
        <!-- Display Validation Errors -->
        @include('common.errors')
        <ul>
            @forelse($tasks as $task)
                    <li>{{{ $task->task_name }}}</li>
            
            @empty
            <li>No record found</li>
            @endforelse
        </ul>

        <!-- New Task Form -->
@if(auth()->check())
{!! Form::open(['route' => 'amrit.task.store', 'class' => 'form-horizontal']) !!}
            <!-- Task Name -->
            <div class="form-group{{ $errors->has('task_name') ? ' has-error' : '' }}">
                <label for="task" class="col-sm-3 control-label">Task</label>
{!! Form::select('name_of_dd',$select,'3') !!}
                <div class="col-sm-6">
                    <input type="text" name="task_name" id="task-name" class="form-control">
                    @if ($errors->has('task_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('task_name') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>

            <!-- Add Task Button -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> Add Task
                    </button>
                </div>
            </div>
        {!! Form::close() !!}
@endif
    </div>

    <!-- TODO: Current Tasks -->
@endsection