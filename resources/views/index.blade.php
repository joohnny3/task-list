<div>
    Hello Im a blade template!
</div>

<div>
    {{-- @if (count($tasks)) --}}
    @forelse ($tasks as $task)
    {{-- {{ route('tasks.show', ['id' => $task->id]) }} --}}
        <div>
            <a href="{{ route('tasks.show', ['id' => $task->id]) }}">{{ $task->title }}</a>
        </div>
    @empty
        <div>There are no tasks!</div>
    @endforelse
    {{-- @endif --}}
</div>
