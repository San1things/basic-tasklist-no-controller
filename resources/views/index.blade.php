@extends('templates.template')

@section('titlecontent')
    <h1>TASKS</h1>
@endsection

@section('content')
    <a href="{{ route('task.create') }}">ADD</a>

    @foreach ($tasks as $task)
        <h3><a href="{{ route('task.show', ['task' => $task->id]) }}">{{ $task->title }}</a></h3>
    @endforeach

    @if ($tasks->count())
        <nav>
            {{ $tasks->links() }}
        </nav>
    @endif
@endsection
