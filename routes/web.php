<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AccountController;

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[HomeController::class,'index'])->name('home');


//account controller
Route::get('/register',[AccountController::class, 'register'])->name('register');
Route::post('/register',[AccountController::class, 'userRegister'])->name('userregister');

Route::get('/login',[AccountController::class, 'login'])->name('login');
Route::post('/login',[AccountController::class, 'userLogin'])->name('userlogin');

Route::get('/account',[AccountController::class, 'profile'])->name('account');
Route::post('/account',[AccountController::class, 'updateProfile'])->name('updateprofile');
Route::post('/account/pic',[AccountController::class, 'updateProfilePic'])->name('updatepic');

Route::get('/post-job',[AccountController::class, 'postJob']);
