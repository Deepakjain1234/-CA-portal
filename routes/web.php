<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\Auth\RegistrationController;
use App\Http\Controllers\Auth\AuthenticationController;

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
    return view('welcome');
});
Route::view('user_panel/{path?}', "userpanel")->middleware('auth');
Route::view('/adminpanel', "adminHome");
Route::view('/admintable', "table1");
Route::view('/admintabledata', "table2");
Route::view('/showmore', "showmore");
Route::view('/adminform', "form");
Route::view('/login_portal', "login");
Route::post('/login',[AuthenticationController::class,'store']);
Route::post('/logout',[AuthenticationController::class,'destroy'])->name('logout');
Route::post('/register',[RegistrationController::class,'register']);
Route::post('/admin/register',[AdminRegistrationController::class,'store']);

Route::get('signin', [FrontendController::class, 'login_portal'])->name('login');
Route::get('signup', [FrontendController::class, 'signup_portal'])->name('register');



