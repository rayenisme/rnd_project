<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TasksController;
use App\Http\Controllers\TaskLogsController;

Route::get('/', [HomeController::class, 'root']);
Route::get('/index', [HomeController::class, 'index']);
Route::get('/event', [HomeController::class, 'event']);
Route::post('/event', [TasksController::class, 'store'])->name('tasks.store');
Route::get('/event/{id}', [TasksController::class, 'show'])->name('event.show');
Route::post('/event/{id}', [TaskLogsController::class, 'store'])->name('event.store');
Route::put('/event/{id}/description', [TaskLogsController::class, 'updateDescription'])
    ->name('event.updateDescription');