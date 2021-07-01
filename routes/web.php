<?php

use App\Http\Controllers\AjaxController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\BinsController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\TrucksController;

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

    //Janitor Registration
    Route::get('/registration',[AuthenticationController::class,'showFormRegistration'])->name('registration');
    Route::post('/registration',[AuthenticationController::class,'registration'])->name('registration');

    //Trucks monitoring
    Route::get('/monitoring-truk',[TrucksController::class,'index'])->name('monitoring-truk');
    Route::get('/monitoring-truk/addTruk',[TrucksController::class,'create'])->name('addTruk');
    Route::post('/monitoring-truk/addTruk',[TrucksController::class,'store'])->name('addTruk');

    // Bins monitoring
    Route::get('/monitoring-sampah',[BinsController::class,'index'])->name('monitoring-sampah');
    Route::get('/monitoring-sampah/addTempatSampah',[BinsController::class,'create'])->name('addTempatSampah');
    Route::post('/monitoring-sampah/addTempatSampah',[BinsController::class,'store'])->name('addTempatSampah');


    Route::post('/logout',[AuthenticationController::class,'logout'])->name('logout');

    // Ajax
    Route::get('/ajax/tempat-sampah', [AjaxController::class, 'getAllBinsData'])->name('getAllBinsData');
    Route::get('/ajax/tempat-sampah-location', [AjaxController::class, 'getAllBinsLocation'])->name('getAllBinsLocation');
});
