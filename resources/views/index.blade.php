@extends('layouts.app')
@section('title', 'The list of tasks')

@section('styles')
    <style>

    </style>
@endsection

@section('content')
    <div>
        <a href="{{ route('tasks.create') }}" class="font-medium text-gray-700 underline decoration-pink-500">Add Task!</a>
    </div>
    @forelse ($tasks as $task)
        <div>
            <a href="{{ route('tasks.show', ['task' => $task->id]) }}" @class(['font-bold', 'line-through' => $task->completed])>{{ $task->title }}</a>
        </div>
    @empty
        <div>There are no tasks!</div>
    @endforelse

    @if ($tasks->count())
        <nav class="mt-4">
            {{ $tasks->links() }}
        </nav>
    @endif
    </div>
@endsection
