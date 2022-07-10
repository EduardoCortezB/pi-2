<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\levelController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\panelController;
use App\Http\Controllers\careerController;
use App\Http\Controllers\class_timeController;
use App\Http\Controllers\periodController;
use App\Http\Controllers\RegisterAspirantController;

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

Route::get('/', function () {
    return view('landingPage.index');
});
Route::get('/aboutus', function () {
    return view('landingPage.aboutus');
});
Route::group(['middleware'=>'auth.isAuth'], function(){
    Route::get('/register-candidate', [RegisterAspirantController::class, 'create'])->name('register-candidate');
    Route::post('/register-candidate', [RegisterAspirantController::class, 'store']);

    Route::get('/login', [LoginController::class, 'index']);
    Route::post('/login', [LoginController::class,'store']);
});


Route::group(['middleware'=>'auth.redIfNoAuth'],function(){
    Route::get('/log-out', [LoginController::class, 'logOut']);
    Route::resource('/panel', panelController::class);
    Route::resource('/user', UserController::class);
    Route::resource('/level', levelController::class);
    Route::resource('/class_time', class_timeController::class);
    Route::resource('/career', careerController::class);
    Route::resource('/period', periodController::class);
});
