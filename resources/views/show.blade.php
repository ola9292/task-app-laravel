
@extends('layouts.app')

@section('title', $task->title)
@if($task->completed)
    <p>Task Completed</p>
@else
    <p>Task incompleted</p>
@endif

@section('content')
<div class="mb-4">
    <a href="{{ route('tasks.index') }}" class="link">← Go back to the task list!</a>
  </div>

<h4>{{ $task->title}}</h4>
<p class="mb-4 text-slate-700">{{ $task->description }}</p>

@isset($task->long_description)
    <p class="mb-4 text-slate-700">{{ $task->long_description}}</p>
@endisset
<p class="mb-4 text-sm text-slate-500">Created {{ $task->created_at->diffForHumans() }} • Updated
    {{ $task->updated_at->diffForHumans() }}</p>
<div class="flex">
    <a href="{{ route('tasks.edit',['task' => $task->id])}}" class="btn">
        Edit</a>
    <form method="POST" action="{{ route('tasks.toggle.complete',['task' => $task->id] )}}">
        @csrf
        @method('PUT')
        <button type="submit" class="btn">
            {{ $task->completed ? 'Completed' : 'Mark as completed'}}
        </button>
    </form>
    <form action="{{ route('tasks.destroy', ['task' => $task->id]) }}" method="POST">
      @csrf
      @method('DELETE')
      <button type="submit" class="btn">
        Delete</button>
    </form>
  </div>
@endsection
