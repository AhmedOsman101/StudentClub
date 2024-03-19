<?php

use App\Http\Controllers\UserController;
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

Route::get('/welcome', function () {
    return view('welcome');
});
Route::get('/test', function () {
    return view('test');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'shareCurrentUser'
])->group(function () {

    Route::view('/', 'Home');

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::view('/rank', 'Rank');

    Route::view('/pomodoro', 'pomodoroTimer');

    Route::view('/todo', 'todo');

    Route::view('/calendar', 'calendar');
});

Route::view('/sidebar', 'sidebar');
