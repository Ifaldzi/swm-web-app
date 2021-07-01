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



//Login admin
Route::get('/admin',[AuthenticationController::class,'showFormLogin'])->name('login');
Route::get('/login',[AuthenticationController::class,'showFormLogin'])->name('login');
Route::post('/login',[AuthenticationController::class,'login'])->name('login');

//Home page
Route::get('/index',[PagesController::class,'homePage'])->name('home');
Route::get('/',[PagesController::class,'homePage'])->name('home');

//Trucks monitoring
Route::get('/monitoring-truk',[TrucksController::class,'index'])->name('monitoring-truk');

// Bins monitoring
Route::get('/monitoring-sampah',[BinsController::class,'index'])->name('monitoring-sampah');

//Log
Route::get('/LogSampah',[PagesController::class,'LogSampah'])->name('LogSampah');

//Fastest track
Route::get('/RuteTercepat',[PagesController::class,'RuteTercepat'])->name('RuteTercepat');

// Ajax
Route::get('/ajax/tempat-sampah', [AjaxController::class, 'getAllBinsData'])->name('getAllBinsData');
Route::get('/ajax/tempat-sampah-location', [AjaxController::class, 'getAllBinsLocation'])->name('getAllBinsLocation');

Route::group(['middleware' => 'auth'], function () {

    //Janitor Registration
    Route::get('/registration',[AuthenticationController::class,'showFormRegistration'])->name('registration');
    Route::post('/registration',[AuthenticationController::class,'registration'])->name('registration');

    //Adding new truck
    Route::get('/monitoring-truk/addTruk',[TrucksController::class,'create'])->name('addTruk');
    Route::post('/monitoring-truk/addTruk',[TrucksController::class,'store'])->name('addTruk');

    //Adding new bin
    Route::get('/monitoring-sampah/addTempatSampah',[BinsController::class,'create'])->name('addTempatSampah');
    Route::post('/monitoring-sampah/addTempatSampah',[BinsController::class,'store'])->name('addTempatSampah');

    //Logout
    Route::post('/logout',[AuthenticationController::class,'logout'])->name('logout');

});
