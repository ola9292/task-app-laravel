
    @extends('layouts.app')

    @section('title','Laravel 10 task app')
    <nav class="mb-4">
        <a href="{{ route('tasks.create') }}"
          class="font-medium text-gray-700 underline decoration-pink-500">Add Task!</a>
      </nav>
    @section('content')
    @if(count($tasks))
        @foreach($tasks as $task)
            <div>
                <a href="{{ route('tasks.show',['task'=> $task->id]) }}"
                    @class(['line-through' => $task->completed])>
                    {{ $task->title }}</a>
            </div>
        @endforeach
    @else
        <p>There are notasks!</p>
    @endif
    @if ($tasks->count())
        <nav class="mt-4">
        {{ $tasks->links() }}
        </nav>
    @endif

    @endsection
