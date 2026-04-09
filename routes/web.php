<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TasksController;
use App\Http\Controllers\TaskLogsController;
use App\Http\Controllers\authController;
use App\Models\Departments;
use App\Models\Tasks;

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

    Route::get('/dashboard/chart-data', function() {
    $departments = Departments::all();
    $series = [];
    $labels = [];

    foreach($departments as $dept) {
        $count = Tasks::where('department_id', $dept->id)->count();
        $series[] = $count;
        $labels[] = $dept->name;
    }

    return response()->json([
        'series' => $series,
        'labels' => $labels
    ]);
});

// Departemen tertentu
Route::get('/dashboard/chart-data/{departmentId}', function($departmentId) {
    $tasks = Tasks::where('department_id', $departmentId)->get();

    $inProgress = $tasks->where('status', 'In Progress')->count();
    $clear = $tasks->where('status', 'Clear')->count();
    $urgent = $tasks->where('is_urgent', 1)->count();

    return response()->json([
        'series' => [$inProgress, $clear, $urgent],
        'labels' => ['In Progress', 'Clear', 'Urgent']
    ]);
});

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