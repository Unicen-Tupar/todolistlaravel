@extends('layouts.app')
@section('content')
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">To Do List <div class="pull-right"><a id="addTask" href="{{route('task.create')}}"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a></div></h3>
  </div>
  <div class="panel-body">
    <ul class="list-group">
      @foreach ($tasks as $task)
        <li class="list-group-item">
          <a href="{{ route('task.show', $task) }}">{{ $task->name }}</a>
          <a id="edit_{{$task->id}}" href="{{ route('task.edit', $task) }}"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
          <a id="remove_{{$task->id}}" href="javascript:$('#delete_{{$task->id}}').submit();"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
          <form id='delete_{{$task->id}}'action="{{route('task.destroy', $task)}}" method="post">
            {{ method_field('DELETE') }}
            {{ csrf_field() }}
          </form>
        </li>
      @endforeach
    </ul>
    {{$tasks->links()}}
  </div>
</div>
@endsection
