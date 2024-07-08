@extends('templates.template')

@section('titlecontent')
<h1>Edit task.</h1>
@endsection


@section('content')
    <form action="{{ route('task.update', ['task' => $task->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <div class="form-floating mb-3">
                <input class="form-control" id="title" name="title" type="text" value="{{ $task->title }}">
                <label for="title">Title</label>
                <p class="error-msg">
                    @error('title')
                        {{ $message }}
                    @enderror
                </p>
            </div>
            <div class="form-floating mb-3">

                <input class="form-control" id="description" name="description" type="text"
                    value="{{ $task->description }}" rows="5">
                <label for="description">Description</label>
                <p class="error-msg">
                    @error('description')
                        {{ $message }}
                    @enderror
                </p>
            </div>
            <div class="form-floating">

                <input class="form-control" id="long_description" name="long_description" type="text"
                    value="{{ $task->long_description }}" rows="10">
                <label for="long_description">Long Description</label>
                <p class="error-msg">
                    @error('long_description')
                        {{ $message }}
                    @enderror
                </p>
            </div>
            <button class="btn btn-primary" type="submit">Update Task</button>
        </div>
        </div>
    </form>
@endsection
