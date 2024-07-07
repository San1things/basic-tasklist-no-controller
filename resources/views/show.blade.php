@extends('templates.template')

@section('titlecontent')
    <h1>Showing the data of "{{ $task->title }}"</h1>
@endsection

@section('content')
    <div class="card" style="width: 30rem">
        <h1 class="card-header">{{ $task->title }}</h1>
        <div class="card-body">
            <p class="card-text">Description: {{ $task->description }}</p>
            <p class="card-text">
            <p>Long Description: {{ $task->long_description }}</p>
            <p class="card-text">Status:
                @if ($task->completed)
                    Completed.
                @else
                    Pending.
                @endif
            </p>
            <a class="btn btn-primary" href="{{ route('task.edit', ['task' => $task->id]) }}">Edit</a>
        </div>
    </div>



    <div class="d-flex gap-2">
        <div>
            <form action="{{ route('task.toggle-complete', $task->id) }}" method="POST">
                @csrf
                @method('PUT')
                <button class="btn btn-primary" type="submit">
                    Mark as {{ $task->completed ? 'not completed' : 'completed' }}
                </button>
            </form>
        </div>
        <div>
            <form action="{{ route('task.destroy', $task->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit">Delete</button>
            </form>
        </div>
    </div>
@endsection
