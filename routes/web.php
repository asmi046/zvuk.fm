<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\EasyPageController;
use App\Http\Controllers\UserFileController;

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

Route::get('/', [IndexController::class, "index"])->name('home');
Route::get('/contacts', [EasyPageController::class, "cantacts"])->name('cantacts');
Route::get('/hronometraj', [EasyPageController::class, "chrono"])->name('chrono');
Route::get('/user-file', [UserFileController::class, "index"])->name('user-file');
