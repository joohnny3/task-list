@extends('layouts.app')

@section('title', isset($task) ? 'Edit List' : 'Add List')

@section('content')
    <form action="{{ isset($task) ? route('tasks.update', ['task' => $task->id]) : route('tasks.store') }}" method="post">
        @csrf
        @isset($task)
            @method('PUT')
        @endisset
        <div class="mb-4 ">
            <label for="title"><i class="bi bi-chat-square-heart mr-2 text-xl"></i>title</label>
            <input type="text" name="title" id="title" class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1" placeholder="" @class(['border-red-500' => $errors->has('title')])
                value="{{ $task->title ?? old('title') }}">
            @error('title')
                <p class="error">
                    {{ $message }}
                </p>
            @enderror
        </div>
        <div class="mb-4">
            <div class="mb-4">
                <label for="long_description"><i class="bi bi-chat-square-dots mr-2 text-xl"></i>description</label>
                <textarea name="long_description" id="long_description" cols="30" rows="10" class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1" @class(['border-red-500' => $errors->has('long_description')])>
                    {{ $task->long_description ?? old('long_description') }}
                </textarea>
                @error('long_description')
                <p class="error">
                    {{ $message }}
                </p>
                @enderror
            </div>
            <div>
                <label for="description"><i class="bi bi-exclamation mr-2 text-xl"></i>Note</label>
                <textarea name="description" id="description" cols="30" rows="5" class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1" @class(['border-red-500' => $errors->has('description')])>
                    {{ $task->description ?? old('description') }}
                </textarea>
                @error('description')
                    <p class="error">
                        {{ $message }}
                    </p>
                @enderror
            </div>
        </div>
        <div class="flex items-center gap-3 justify-end">
            <a href="{{ route('tasks.index') }}" class="link">Cancel</a>
            <button type="submit" class="btn">
                @isset($task)
                Update
                @else
                Create
                @endisset
            </button>
        </div>
    </form>
@endsection
