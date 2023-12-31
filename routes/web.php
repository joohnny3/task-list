<?php

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
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

Route::get('/', function () {
    return redirect()->route('tasks.index');
});

Route::get('/tasks', function () {

    $today = Carbon::now()->format('n/d D.');

    return view('index', [
        'tasks' => Task::latest()->paginate(13),
        'today' => $today
    ]);
})->name('tasks.index');

Route::view('/tasks/create', 'create')
    ->name('tasks.create');

Route::get('/tasks/{task}/edit', function (Task $task) {
    return view('edit', [
        'task' => $task
    ]);
})->name('tasks.edit');

Route::get('/tasks/{task}', function (Task $task) {
    return view('show', ['task' => $task]);
})->name('tasks.show');

Route::fallback(function () {
    return "stop";
});

Route::post('/tasks', function (TaskRequest $request) {

    $task = Task::create($request->validated());

    return redirect()->route('tasks.show', ['task' => $task->id])
        ->with('successs', '成功新增清單');
})->name('tasks.store');

Route::put('/tasks/{task}', function (Task $task, TaskRequest $request) {

    $task->update($request->validated());

    return redirect()->route('tasks.show', ['task' => $task->id])
        ->with('successs', '成功更新清單');
})->name('tasks.update');

Route::delete('/tasks/{task}', function (Task $task) {
    $task->delete();
    return redirect()->route('tasks.index')->with('success', '成功刪除清單');
})->name('tasks.destroy');

Route::put('tasks/{task}/toggle-complete', function (Task $task) {
    $task->toggleComplete();

    return redirect()->back()->with('success', '成功更新清單');
})->name('tasks.toggle-complate');
