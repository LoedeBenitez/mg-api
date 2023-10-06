<?php

use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\navigate\navigation;
use App\Http\Controllers\user\UserController;
use App\Livewire\Home\Dashboard;
use App\Livewire\User\Login;

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


Route::middleware('guest')->group(function () {
    Route::get('/', [navigation::class, 'index']);
    Route::get('/login', Login::class)->name('login');
});

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/home', Dashboard::class)->name('home');
    Route::get('/private', [UserController::class, 'private']);
});
