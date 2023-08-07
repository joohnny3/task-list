@extends('layouts.app')
@section('title', '待辦清單')

@section('styles')
@section('content')
    <div class="mb-2">
        <a href="{{ route('tasks.create') }}" class="link">新增清單</a>
    </div>
    @forelse ($tasks as $task)
        <div>
            <a href="{{ route('tasks.show', ['task' => $task->id]) }}" @class([
                'font-bold',
                'text-lg',
                'line-through' => $task->completed,
                'font-medium' => $task->completed,
                'text-gray-600' => $task->completed
            ])>{{ $task->title }}</a>
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
