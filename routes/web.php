<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', TaskController::class);

Route::resource('tasks', TaskController::class);

Route::post('sort_tasks', [ TaskController::class, 'sortTasks' ]);
