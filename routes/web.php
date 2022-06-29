<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\panelController;
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
Route::group(['middleware'=>'auth.isAuth'], function(){
    Route::get('/register-candidate', [RegisterAspirantController::class, 'create'])->name('register-candidate');
    Route::post('/register-candidate', [RegisterAspirantController::class, 'store']);

    Route::get('/login', [LoginController::class, 'index']);
    Route::post('/login', [LoginController::class,'store']);
});


Route::group(['middleware'=>'auth.redIfNoAuth'],function(){
    Route::get('/log-out', [LoginController::class, 'logOut']);
    Route::resource('/panel', panelController::class);
});
