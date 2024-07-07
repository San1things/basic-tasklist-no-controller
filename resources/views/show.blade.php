@extends('templates.template')

@section('titlecontent')
    <h1>{{ $task->title }}</h1>
@endsection

@section('content')
    <p>{{ $task->description }}</p>
    <p>{{ $task->long_description }}</p>
    <p>{{ $task->created_at }}</p>
    <p>{{ $task->updated_at }}</p>

    <p>
        @if ($task->completed)
        Completed.
        @else
        Pending.
        @endif
    </p>
    <div>
        <a href="{{ route('task.edit', ['task' => $task->id]) }}">Edit</a>
    </div>
    <div>
        <form action="{{ route('task.toggle-complete', $task->id) }}" method="POST">
            @csrf
            @method('PUT')
            <button type="submit">
                Mark as {{ $task->completed ? 'not completed' : 'completed' }}
            </button>
        </form>
    </div>
    <div>
        <form action="{{ route('task.destroy', $task->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
        </form>
    </div>
@endsection
