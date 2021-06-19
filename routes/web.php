<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\PagesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('index');
// })->name('home');



Route::get('/',[AuthenticationController::class,'showFormLogin'])->name('login');
Route::get('/login',[AuthenticationController::class,'showFormLogin'])->name('login');
Route::post('/login',[AuthenticationController::class,'login'])->name('login');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/index',[PagesController::class,'homePage'])->name('home');
    Route::get('/RuteTercepat',[PagesController::class,'RuteTercepat'])->name('RuteTercepat');
    Route::get('/LogSampah',[PagesController::class,'LogSampah'])->name('LogSampah');
    Route::get('/logout',[AuthenticationController::class,'logout'])->name('logout');
    Route::get('/monitoring-sampah', function () {
        return view('monitoring/sampah');
    })->name('monitoring-sampah');

    Route::get('/monitoring-truk', function () {
        return view('monitoring/truk');
    })->name('monitoring-truk');
});
