
@foreach ($tasks as $task)
    <h3><a href="{{ route('task.show', ['id' => $task->id]) }}">{{ $task->title }}</a></h3>
@endforeach

