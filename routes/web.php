<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PipelineController;

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

// DASHBOARD CONTROLLER ROUTES
Route::controller(DashboardController::class)->group(function() {
    
    Route::prefix('dashboard')->group(function() {
        Route::get('/', 'index')->name('dashboard.index');
    });
});

Route::get('/pipeline', [PipelineController::class, 'index'])->name('pipeline.index');

Route::get('/contacts', function() {
    return view('contacts.index');
})->name('contacts.index');

Route::get('/tasks', function() {
    return view('tasks.index');
})->name('tasks.index');

Route::get('/analytics', function() {
    return view('analytics.index');
})->name('analytics.index');

Route::get('/manage/users', function() {
    $users = [
        (object)[
            'id' => 1,
            'name' => 'Alice Johnson',
            'email' => 'alice@example.com',
            'role' => 'admin',
        ],
        (object)[
            'id' => 2,
            'name' => 'Michael Smith',
            'email' => 'michael.smith@example.com',
            'role' => 'manager',
        ],
        (object)[
            'id' => 3,
            'name' => 'Sara Lee',
            'email' => 'sara.lee@example.com',
            'role' => 'user',
        ],
        (object)[
            'id' => 4,
            'name' => 'Daniel Wright',
            'email' => 'daniel.wright@example.com',
            'role' => 'user',
        ],
        (object)[
            'id' => 5,
            'name' => 'Jessica Ramirez',
            'email' => 'jess.ramirez@example.com',
            'role' => 'manager',
        ],
        (object)[
            'id' => 6,
            'name' => 'Tom Evans',
            'email' => 'tom.evans@example.com',
            'role' => 'user',
        ],
    ];

    return view('manage.users.index', compact('users'));
})->name('manage.users.index');

Route::get('/settings', function() {
    return view('settings.index');
})->name('settings.index');

Route::get('/', [DashboardController::class, 'index'])->name('home');