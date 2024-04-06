<?php

use App\Http\Controllers\CalendarController;
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

Route::prefix('studentClub')->group(function () {
    Route::get('/welcome', function () {
        return view('welcome');
    })->name('welcome');


    Route::middleware([
        'auth:sanctum',
        config('jetstream.auth_session'),
        'verified',
        'shareCurrentUser'
    ])->group(function () {

        Route::view('/', 'Home')->name('home');

        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');

        Route::view('/rank', 'Rank')->name('rank');

        Route::view('/pomodoro', 'pomodoroTimer')->name('pomodoro');

        Route::view('/todo', 'todo')->name('todo');

        Route::prefix('calendar')->group(function () {
            Route::get('/', [CalendarController::class, "index"])->name("calender.index");
            Route::post('/store', [CalendarController::class, "store"])->name("calendar.store");
            Route::patch('/patch/{id}', [CalendarController::class, "patch"])->name("calendar.patch");
            Route::delete('/delete/{id}', [CalendarController::class, "destroy"])->name("calendar.destroy");
        });
    });
});
