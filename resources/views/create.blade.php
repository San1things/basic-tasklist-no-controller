@extends('templates.template')

@section('titlecontent')
<h1>Create a task.</h1>
@endsection

@section('content')
    <form action="{{ route('task.store') }}" method="post">
        @csrf
        <div>
            <div class="form-floating">
                <input class="form-control" id="title" name="title" type="text" value="{{ old('title') }}">
                <label for="title">Title</label>
                <p class="error-msg">
                    @error('title')
                        {{ $message }}
                    @enderror
                </p>
            </div>
            <div class="form-floating">
                <input class="form-control" id="description" name="description" for="description" type="text" value="{{ old('description') }}"
                    rows="5">
                <label for="description">Description</label>
                <p class="error-msg">
                    @error('description')
                        {{ $message }}
                    @enderror
                </p>
            </div>
            <div class="form-floating">
                <input class="form-control" id="long_description" name="long_description" for="long_description" type="text" value="{{ old('description') }}"
                    rows="5">
                <label for="long_description">Description</label>
                <p class="error-msg">
                    @error('long_description')
                        {{ $message }}
                    @enderror
                </p>
            </div>
            <button class="btn btn-primary" type="submit">Add Task</button>
        </div>
    </form>
@endsection
