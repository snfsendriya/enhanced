<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\User\UserController;
use App\Http\Controllers\Frontend\OrderController;

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

Route::group(['prefix'=>'user','as'=>'user.','middleware'=>['user_auth']],function(){

    Route::get('/dashboard',[UserController::class,'dashboard']);

    Route::get('/all-order',[UserController::class,'all_order']);
    Route::get('/view-order/{id}',[UserController::class,'view_order']);

    Route::get('/invoice/{id}',[UserController::class,'invoice']);

    Route::post('/pending-payment',[OrderController::class,'pending_payment']);

    Route::post('/pending-payment-process',[OrderController::class,'pending_payment_process']);
    
    Route::get('/account',[UserController::class,'account']);
    Route::post('/profile-process',[UserController::class,'profile_process'])->name('profile_process');
    Route::post('/change-password',[UserController::class,'change_password'])->name('change_password');
    Route::get('/remove-profile-pic',[UserController::class,'remove_profile_pic']);

    Route::get('/logout',[UserController::class,'logout']);

});
