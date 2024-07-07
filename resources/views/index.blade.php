@extends('templates.template')

@section('titlecontent')
    <h1>TASKS</h1>
@endsection

@section('content')
    <a href="{{ route('task.create') }}" class="btn btn-primary px-5">ADD</a>

    <div class="list-group">
        @foreach ($tasks as $task)
        <a href="{{ route('task.show', ['task' => $task->id]) }}" class="list-group-item list-group-item-action">{{ $task->title }}</a>
        @endforeach
    </div>


    @if ($tasks->count())
        <nav>
            {{ $tasks->links() }}
        </nav>
    @endif
@endsection
