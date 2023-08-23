@extends('layouts.app')
@section('title', $today)

@section('styles')
@section('content')
    <div class="mb-5 text-center text-5xl animate__animated animate__rubberBand">
        <a href="{{ route('tasks.create') }}" class="link">
            <i class="bi bi-plus-circle-fill text-teal-500"></i>
        </a>
    </div>
    @forelse ($tasks as $task)
        <div class="my-3">
            <a href="{{ route('tasks.show', ['task' => $task->id]) }}" @class([
                'font-bold',
                'text-xl',
                'line-through' => $task->completed,
                'font-medium' => $task->completed,
                'text-gray-600' => $task->completed,
            ])>{{ $task->title }}</a>
        </div>
    @empty
        <div>There are no tasks!</div>
    @endforelse

    @if ($tasks->count())
        <nav class="mt-5">
            {{ $tasks->links() }}
        </nav>
    @endif
    </div>
@endsection
