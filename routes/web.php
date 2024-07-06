<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Requests\TaskRequest;
use App\Models\Task;


Route::get('/', function () {
    return view('index', [
        'tasks' => Task::latest()->paginate(10)
    ]);
})->name('task.index');

Route::view('create', 'create')->name('task.create');

Route::get('/{task}', function (Task $task) {
    return view('show', [
        'task' => $task
    ]);
})->name('task.show');

Route::get('/{task}/edit', function (Task $task) {
    return view('edit', [
        'task' => $task
    ]);
})->name('task.edit');


Route::post('/tasks', function (TaskRequest $request) {
    // $data = $request->validated();
    // $task = new Task;
    // $task->title = $data['title'];
    // $task->description = $data['description'];
    // $task->long_description = $data['long_description'];
    $task = Task::create($request->validated());

    return redirect()->route('task.show', $task->id)
        ->with('success', 'Task created succesfully!');
})->name('task.store');

Route::put('/tasks/{task}', function (Task $task, TaskRequest $request) {
    // $data = $request->validated();
    // $task->title = $data['title'];
    // $task->description = $data['description'];
    // $task->long_description = $data['long_description'];
    $task->update($request->validated());

    return redirect()->route('task.show', $task->id)
        ->with('success', 'Task updated succesfully!');
})->name('task.update');

Route::delete('/tasks/{task}', function (Task $task) {
    $task->delete();

    return redirect()->route('task.index')
        ->with('success', 'Task deleted succesfully');
})->name('task.destroy');
