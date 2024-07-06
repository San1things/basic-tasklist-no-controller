@extends('templates.template')

@section('titlecontent')
<h1>{{$task->title}}</h1>
@endsection

@section('content')
<p>{{$task->description}}</p>
<p>{{$task->created_at}}</p>
<p>{{$task->updated_at}}</p>

<div>
    <a href="{{ route('task.edit', ['task' => $task->id]) }}">Edit</a>
</div>
<div>
    <form action="{{ route('task.destroy', $task->id) }}" method="post">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>
</div>
@endsection
