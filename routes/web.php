<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\EasyPageController;
use App\Http\Controllers\UserFileController;
use App\Http\Controllers\AudiofileController;

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

Route::get('/online-zakaz', [EasyPageController::class, "online_zakaz"])->name('online-zakaz');
Route::get('/how-start-work', [EasyPageController::class, "hove_work"])->name('hove_work');
Route::get('/preimushestva', [EasyPageController::class, "advantages"])->name('advantages');
Route::get('/prognoz-pogodi', [EasyPageController::class, "pogoda"])->name('pogoda');
Route::get('/golosovie_privetstviya', [EasyPageController::class, "privet"])->name('privet');
Route::get('/policy', [EasyPageController::class, "policy"])->name('policy');


Route::get('/audioroliki', [AudiofileController::class, "index"])->name('roliki');
Route::get('/dictori', [EasyPageController::class, "diktors"])->name('diktors');
Route::get('/oplata', [EasyPageController::class, "pay"])->name('pay');

Route::get('/user-file', [UserFileController::class, "index"])->name('user-file');
