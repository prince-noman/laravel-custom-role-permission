<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\HasRoleMiddleware;
use App\Http\Controllers\PermissionController;

Route::get('/', function () {
    return view('auth.login');
});


Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard')->middleware(['auth']);

// Auth Routes
Route::get('/register', [AuthController::class, 'registertationPage']);
Route::post('/register', [AuthController::class, 'register'])->name('register');


Route::get('/login', [AuthController::class, 'loginPage']);
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
// Auth Routes



Route::middleware(['auth'])->prefix('dashboard')->group(function () {
    Route::resource('users', UserController::class)->middleware('role:admin,manager');
    Route::resource('roles', RoleController::class)->middleware('role:admin,manager');
    Route::resource('permissions', PermissionController::class)->middleware('role:admin,manager');
    Route::resource('posts', PostController::class);
});