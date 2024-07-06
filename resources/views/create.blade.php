@extends('templates.template')

@section('content')
    <form action="{{ route('task.store') }}" method="post">
        @csrf
        <div>
            <label for="title">Title</label>
            <input id="title" name="title" type="text" value="{{ old('title') }}"
                @error('title')
            placeholder="{{ $message }}"
            @enderror>
            <div>
                <label for="description">Description</label>
                <input id="description" name="description" type="text" rows="5" value="{{ old('description') }}"
                    @error('description')
            placeholder="{{ $message }}"
            @enderror>
            </div>
            <div>
                <label for="long_description">Long Description</label>
                <input id="long_description" name="long_description" type="text" rows="10" value="{{ old('long_description') }}"
                    @error('long_description')
            placeholder="{{ $message }}"
            @enderror>
            </div>
            <button type="submit">Add Task</button>
        </div>
    </form>
@endsection
