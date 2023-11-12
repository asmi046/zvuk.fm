<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\EasyPageController;
use App\Http\Controllers\UserFileController;
use App\Http\Controllers\AudiofileController;
use App\Http\Controllers\DiktorController;

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
Route::get('/dictori', [DiktorController::class, "index"])->name('diktors');
Route::get('/dictori/get', [DiktorController::class, "get_all"])->name('get_all_dictors');
Route::get('/oplata', [EasyPageController::class, "pay"])->name('pay');

Route::get('/oformlenie_efira', [EasyPageController::class, "efir"])->name('efir');
Route::get('/ozvuchka_videorolikov', [EasyPageController::class, "ozv_rolik"])->name('ozv_rolik');

Route::get('/user-file', [UserFileController::class, "index"])->name('user-file');
