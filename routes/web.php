<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Task;


Route::get('/', function () {
    return view('index', ['tasks' => Task::latest()->get()]);
})->name('task.index');

Route::view('create', 'create')->name('create');

Route::get('/{id}', function($id) {
    return view('show', ['task' => Task::findOrFail($id)]);
})->name('task.show');

Route::get('/{id}/edit', function($id) {
    return view('edit', ['task' => Task::findOrFail($id)]);
})->name('task.edit');


Route::post('/tasks', function(Request $request){
    $data = $request->validate([
        'title'=>'required|max:255',
        'description'=>'required',
        'long_description'=>'required'
    ]);

    $task = new Task;
    $task->title = $data['title'];
    $task->description = $data['description'];
    $task->long_description = $data['long_description'];
    $task->save();

    return redirect()->route('task.show', $task->id)
    ->with('success', 'Task created succesfully!');

})->name('task.store');

Route::put('/tasks/{id}', function($id, Request $request){
    $data = $request->validate([
        'title'=>'required|max:255',
        'description'=>'required',
        'long_description'=>'required'
    ]);

    $task = Task::findOrFail($id);
    $task->title = $data['title'];
    $task->description = $data['description'];
    $task->long_description = $data['long_description'];
    $task->save();

    return redirect()->route('task.show', $task->id)
    ->with('success', 'Task updated succesfully!');

})->name('task.update');

