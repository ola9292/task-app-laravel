<?php
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\TaskRequest;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', function(){
    return redirect()->route('tasks.index');
});

Route::get('/tasks', function () {
    $tasks = Task::latest()->paginate(10);
    return view('index',[
        'tasks' => $tasks,
    ]);
})->name('tasks.index');

//routes rendering only views
Route::view('tasks/create', 'create')->name('tasks.create');

Route::get('/tasks/{task}', function (Task $task){

    return view('show',[
        'task' => $task,
    ]);
})->name('tasks.show');

Route::get('/tasks/{task}/edit', function (Task $task) {

    return view('edit', [
        'task' => $task
    ]);
})->name('tasks.edit');

Route::post('/tasks', function (TaskRequest $request) {
        //validate data
    $data = $request->validated();

    $task = new Task;
    $task->title = $data['title'];
    $task->description = $data['description'];
    $task->long_description = $data['long_description'];
    $task->save();

    return redirect()->route('tasks.show', ['task' => $task->id])
    ->with('message','task created successfully');
})->name('tasks.store');

Route::put('/tasks/{task}', function (Task $task, TaskRequest $request) {
    //validate data
    $data = $request->validated();

    $task->title = $data['title'];
    $task->description = $data['description'];
    $task->long_description = $data['long_description'];
    $task->save();

    return redirect()->route('tasks.show', ['task' => $task->id])
        ->with('success', 'Task updated successfully!');
})->name('tasks.update');

// Route::get('/greet/{name}', function ($name) {
//     return 'Hello '. $name . ' !';
// });

Route::delete('/tasks/{task}', function (Task $task) {
    $task->delete();

    return redirect()->route('tasks.index')
        ->with('success', 'Task deleted successfully!');
})->name('tasks.destroy');

Route::put('/tasks/{task}/toggle', function (Task $task) {
    $task->completed = !$task->completed;
    $task->save();

    return redirect()->back()->with('success', 'Task deleted successfully!');
})->name('tasks.toggle.complete');

Route::fallback(function(){
    return 'still got somewhere';
});
