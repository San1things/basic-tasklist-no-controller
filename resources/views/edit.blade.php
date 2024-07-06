@extends('templates.template')

@section('content')
    <form action="{{ route('task.update', ['id' => $task->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="title">Title</label>
            <input type="text" name="title" id="title" value="{{ $task->title }}"
            @error('title')
            placeholder="{{ $message }}"
            @enderror
        </div>
        <div>
            <label for="description">Description</label>
            <input type="text" name="description" id="description" rows="5" value="{{ $task->description }}"
            @error('description')
            placeholder="{{ $message }}"
            @enderror>
        </div>
        <div>
            <label for="long_description">Long Description</label>
            <input type="text" name="long_description" id="long_description" rows="10" value="{{ $task->long_description }}"
            @error('long_description')
            placeholder="{{ $message }}"
            @enderror>
        </div>
        <button type="submit">Update Task</button>
    </form>
@endsection
