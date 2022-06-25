<?php
use Illuminate\Support\Facades\Route;
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

Route::get('/register-candidate', [RegisterAspirantController::class, 'index'])->name('register-candidate');
Route::post('/register-candidate', [RegisterAspirantController::class, 'store']);

Route::get('/login', function () {
    return view('auth.login');
});
