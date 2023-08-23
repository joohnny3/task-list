@extends('layouts.app')

@section('title', isset($task) ? '編輯清單' : '新增清單')

@section('content')
    <form action="{{ isset($task) ? route('tasks.update', ['task' => $task->id]) : route('tasks.store') }}" method="post">
        @csrf
        @isset($task)
            @method('PUT')
        @endisset
        <div class="mb-4">
            <label for="title">主題</label>
            <input type="text" name="title" id="title" @class(['border-red-500' => $errors->has('title')])
                value="{{ $task->title ?? old('title') }}">
            @error('title')
                <p class="error">
                    {{ $message }}
                </p>
            @enderror
        </div>
        <div class="mb-4">
            <div class="mb-4">
                <label for="long_description"><i class="bi bi-chat-left-text"></i></label>
                <textarea name="long_description" id="long_description" cols="30" rows="10" @class(['border-red-500' => $errors->has('long_description')])>
                    {{ $task->long_description ?? old('long_description') }}
                </textarea>
                @error('long_description')
                <p class="error">
                    {{ $message }}
                </p>
                @enderror
            </div>
            <div>
                <label for="description"><i class="bi bi-exclamation-diamond"></i></label>
                <textarea name="description" id="description" cols="30" rows="5" @class(['border-red-500' => $errors->has('description')])>
                    {{ $task->description ?? old('description') }}
                </textarea>
                @error('description')
                    <p class="error">
                        {{ $message }}
                    </p>
                @enderror
            </div>
        </div>
        <div class="flex items-center gap-3">
            <button type="submit" class="btn">
                @isset($task)
                    更新
                @else
                <i class="bi bi-file-earmark-plus"></i>
                @endisset
            </button>
            <a href="{{ route('tasks.index') }}" class="link">取消</a>
        </div>
    </form>
@endsection
