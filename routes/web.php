<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReminderController;
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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //categories
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('/categories/add', [CategoryController::class, 'add'])->name('categories.add');
    Route::get('/categories/edit/{id}', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::post('/categories/update/{id}', [CategoryController::class, 'update'])->name('categories.update');
    Route::post('/categories/delete/{id}', [CategoryController::class, 'delete'])->name('categories.delete');

    //ToDo
    Route::get('/todo', [TodoController::class, 'index'])->name('todo.index');
    Route::get('/todo/create', [TodoController::class, 'create'])->name('todo.create');
    Route::post('/todo/add', [TodoController::class, 'add'])->name('todo.add');
    Route::get('/todo/edit/{id}', [TodoController::class, 'edit'])->name('todo.edit');
    Route::post('/todo/update/{id}', [TodoController::class, 'update'])->name('todo.update');
    Route::post('/todo/delete/{id}', [TodoController::class, 'delete'])->name('todo.delete');
    Route::post('/todo/done/{id}', [TodoController::class, 'done'])->name('todo.done');

    //Reminder
    Route::get('/reminder/create/{id}', [ReminderController::class, 'create'])->name('reminder.create');
    Route::post('/reminder/add/{id}', [ReminderController::class, 'add'])->name('reminder.add');
});

require __DIR__.'/auth.php';
