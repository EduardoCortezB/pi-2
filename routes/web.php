<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\levelController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\panelController;
use App\Http\Controllers\careerController;
use App\Http\Controllers\periodController;
use App\Http\Controllers\class_timeController;
use App\Http\Controllers\filesAdminController;
use App\Http\Controllers\RegisterAspirantController;
use App\Http\Controllers\paymentController;

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
    // register user from student UI
    Route::get('/register-candidate', [RegisterAspirantController::class, 'createUser'])->name('register-candidate');
    Route::post('/register-candidate', [RegisterAspirantController::class, 'storeUser']);

    Route::get('/login', [LoginController::class, 'index']); // both
    Route::post('/login', [LoginController::class,'store']); // both
});


Route::group(['middleware'=>'auth.redIfNoAuth'],function(){
    Route::get('/log-out', [LoginController::class, 'logOut']); // both
    Route::resource('/panel', panelController::class); // both
    Route::resource('/user', UserController::class); // admin
    Route::resource('/level', levelController::class); // admin
    Route::resource('/class_time', class_timeController::class); //admin
    Route::resource('/career', careerController::class); // admin
    Route::resource('/period', periodController::class); // admin

    // list index of inscriptions from admin dashboard
    Route::get('/inscriptions', [RegisterAspirantController::class, 'index'])->name('inscriptions');

    // detalles de inscripcion
    Route::get('/inscriptions/details/{id}', [RegisterAspirantController::class, 'details']);

    // asignar grupo a la preinscripcion
    Route::put('/inscription/assign/{id_period}', [RegisterAspirantController::class, 'assign']);

    // validar pago
    Route::put('/inscription/payment_ok/{id_payment}', [paymentController::class, 'validatePdf'])->name('inscription.validate');

    // pdf payments
    Route::get('/pdf/payments/{path}', [filesAdminController::class, 'viewPdf']);
    Route::get('/pdf/payments/upload', [filesAdminController::class, 'store']);

    // eliminar preinscripcion
    // Route::get('/inscriptions/{id}', [RegisterAspirantController::class, 'destroy'])->name('inscriptions.validated');

    // add new inscription from admin panel
    Route::get('/add_inscription', [RegisterAspirantController::class, 'createInscriptionFromAdmin'])->name('add_inscription');
    Route::post('/add_inscription', [RegisterAspirantController::class, 'storeInscriptionFromAdmin'])->name('add_inscription');
});
