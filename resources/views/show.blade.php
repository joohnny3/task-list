@extends('layouts.app')

@section('title', $task->title)

@section('content')
@if ($task->long_description)
    <p class="mb-4 text-slate-700">
        {!! nl2br(e($task->long_description)) !!}
        {{-- e() 函數來避免XSS攻擊，確保文字被正確地轉義 --}}
    </p>
@endif
    <p class="mb-4 text-orange-400">
        {!! nl2br(e($task->description)) !!}
    </p>

    <p class="mb-4 text-sm text-slate-400">
        Created {{ $task->created_at->diffForhumans() }}
        ・Updated {{ $task->updated_at->diffForhumans() }}
    </p>

    <p class="mb-4">
        @if ($task->completed)
            <span class="font-medium text-green-500">已完成</span>
        @else
            <span class="font-medium text-red-500">未完成</span>
        @endif
    </p>

    <div class="flex gap-2">
        <form method="POST" action="{{ route('tasks.toggle-complate', ['task' => $task]) }}">
            @csrf
            @method('PUT')
            <button type="submit" class="btn">
                Mark as {{ $task->completed ? 'Not completed' : 'Completed' }}
            </button>
        </form>
        <a href="{{ route('tasks.edit', ['task' => $task]) }}" class="btn">Edit</a>
        <form action="{{ route('tasks.destroy', ['task' => $task]) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn">
                Delete</button>
        </form>
    </div>
    <div class="mt-4">
        <a href="{{ route('tasks.index') }}" class="link">← back</a>
    </div>
@endsection
