<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\levelController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\panelController;
use App\Http\Controllers\careerController;
use App\Http\Controllers\periodController;
use App\Http\Controllers\metricsController;
use App\Http\Controllers\paymentController;
use App\Http\Controllers\languageController;
use App\Http\Controllers\class_timeController;
use App\Http\Controllers\filesAdminController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\RegisterAspirantController;
use App\Http\Controllers\student\preinscriptionStudentController;

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
})->name('index');

Route::get('/aboutus', function () {
    return view('landingPage.aboutus');
});

Route::post('/sendMail1',[MailController::class, 'sendMailSystem'])->name('mailFromApp');
Route::group(['middleware'=>'auth.isAuth'], function(){
    // register user from register UI
    Route::get('/register-candidate', [RegisterAspirantController::class, 'createUser'])->name('register-candidate');
    Route::post('/register-candidate', [RegisterAspirantController::class, 'storeUser']);

    Route::get('/login', [LoginController::class, 'index']); // both
    Route::post('/login', [LoginController::class,'store']); // both
});

Route::group(['middleware'=>'auth.redIfNoAuth'],function(){
    Route::get('/log-out', [LoginController::class, 'logOut']); // both

    Route::resource('/panel', panelController::class); // both

    // preinscriptions from student
    Route::resource('preinscription', preinscriptionStudentController::class);

    // upload pdf payment
    Route::post('/pdf/payments/upload/{id}', [filesAdminController::class, 'store'])->name('upload.pdf');
    Route::get('/pdf/payment/{path}', [filesAdminController::class, 'getPdfPath']);


    // eliminar preinscripcion
    // Route::get('/inscriptions/{id}', [RegisterAspirantController::class, 'destroy'])->name('inscriptions.validated');

});
Route::middleware(['auth.redIfNoAuth','validAdmin'])->group(function(){
    Route::resource('/user', UserController::class); // admin
    Route::resource('/level', levelController::class); // admin
    Route::resource('/language', languageController::class); // admin
    Route::resource('/class_time', class_timeController::class); //admin
    Route::resource('/career', careerController::class); // admin
    Route::resource('/period', periodController::class); // admin
    // list index of inscriptions from admin dashboard
    Route::get('/inscriptions', [RegisterAspirantController::class, 'index'])->name('inscriptions');
    // details of preinscription
    Route::get('/inscriptions/details/{id}', [RegisterAspirantController::class, 'details']);
    // assing a group to the preinscription
    Route::put('/inscription/assign/{id_period}', [RegisterAspirantController::class, 'assign']);
    // validate payment
    Route::put('/inscription/payment_ok/{id_payment}', [paymentController::class, 'validatePdf'])->name('inscription.validate');
    // get pdf
    Route::get('/pdf/payments/{path}', [filesAdminController::class, 'viewPdf']);
    // add new inscription from admin panel
    Route::get('/add_inscription', [RegisterAspirantController::class, 'createInscriptionFromAdmin'])->name('add_inscription');
    Route::post('/add_inscription', [RegisterAspirantController::class, 'storeInscriptionFromAdmin'])->name('add_inscription');
    //metrics
    Route::post('/metrics/report_request_1', [metricsController::class, 'getReportAdmin1'])->name('metrics.requestReport'); // request for get report
    Route::get('/metrics/download_report_1', [metricsController::class, 'downloadReport'])->name('metrics.download_re_1'); // request for get report
});
