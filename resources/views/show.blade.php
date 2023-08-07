@extends('layouts.app')

@section('title', $task->title)

@section('content')
    <p class="mb-4 text-slate-700">
        {{ $task->description }}
    </p>
    @if ($task->long_description)
        <p class="mb-4 text-slate-700">
            {{ $task->long_description }}
        </p>
    @endif

    <p class="mb-4 text-sm text-slate-500">
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
        <a href="{{ route('tasks.edit', ['task' => $task]) }}" class="btn">編輯</a>
        <form method="POST" action="{{ route('tasks.toggle-complate', ['task' => $task]) }}">
            @csrf
            @method('PUT')
            <button type="submit" class="btn">
                標記為{{ $task->completed ? '未完成' : '已完成' }}
            </button>
        </form>
        <form action="{{ route('tasks.destroy', ['task' => $task]) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn">刪除</button>
        </form>
    </div>
    <div class="mt-4">
        <a href="{{ route('tasks.index') }}" class="link">← 回上一頁</a>
    </div>
@endsection
