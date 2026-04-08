<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TasksController;
use App\Http\Controllers\TaskLogsController;
use App\Http\Controllers\authController;

Route::middleware('guest')->group(function () {
    Route::get('/', [HomeController::class, 'root'])->name('login');
    Route::post('/login', [authController::class, 'login']);
});

Route::middleware('auth')->group(function () {

    Route::get('/index', [HomeController::class, 'index']);
    Route::get('/event', [HomeController::class, 'event']);

    Route::get('/register', [authController::class, 'register']);

    Route::post('/event', [TasksController::class, 'store'])->name('tasks.store');
    Route::get('/event/{id}', [TasksController::class, 'show'])->name('event.show');
    Route::post('/event/{id}', [TaskLogsController::class, 'store'])->name('event.store');
    Route::put('/event/{id}/description', [TaskLogsController::class, 'updateDescription'])
        ->name('event.updateDescription');

    Route::get('/profile', [authController::class, 'profile'])->name('profile');
    Route::post('/profile/update', [authController::class, 'update']);
    Route::post('/password/update', [authController::class, 'passwordUpdate']);

    Route::get('/logout', [authController::class, 'logout']);
});

// Route::get('/index', [HomeController::class, 'index']);
// Route::get('/event', [HomeController::class, 'event']);
// Route::get('/register', [authController::class, 'register']);
// Route::post('/event', [TasksController::class, 'store'])->name('tasks.store');
// Route::get('/event/{id}', [TasksController::class, 'show'])->name('event.show');
// Route::post('/event/{id}', [TaskLogsController::class, 'store'])->name('event.store');
// Route::put('/event/{id}/description', [TaskLogsController::class, 'updateDescription'])
//     ->name('event.updateDescription');

// Route::get('/logout', [authController::class, 'logout']);