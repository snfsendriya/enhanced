<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\FrontController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\OrderController;
use App\Http\Controllers\Backend\Admin\AdminController;

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

Route::get('/',[FrontController::class,'index']);

Route::get('/product',[FrontController::class,'product']);
Route::get('/product/{slug}',[FrontController::class,'product']);

Route::get('/cart',[FrontController::class,'cart']);

Route::get('/checkout',[FrontController::class,'checkout']);

Route::get('/register',[FrontController::class,'register']);
Route::post('/register-post',[FrontController::class,'register_post'])->name('user.register');
Route::get('/login',[FrontController::class,'login']);
Route::post('/login-process',[FrontController::class,'login_process'])->name('user.login');

Route::post('/add-to-cart',[CartController::class,'add_to_cart']);
Route::post('/increment-cart',[CartController::class,'increment_cart']);
Route::post('/decrement-cart',[CartController::class,'decrement_cart']);
Route::post('/delete-cart',[CartController::class,'delete_cart']);

Route::post('/place-order',[OrderController::class,'place_order'])->name('order.place_order');
Route::get('/order-successful',[OrderController::class,'order_successful']);
Route::get('/order-failure',[OrderController::class,'order_failure']);
Route::post('/payment-process',[OrderController::class,'payment_process']);

Route::get('/donate',[FrontController::class,'donate']);
Route::post('/donate-process',[FrontController::class,'donate_process'])->name('donate.donate_process');
Route::post('/donate-gateway-process',[FrontController::class,'donate_gateway_process']);
Route::get('/donate-successful',[FrontController::class,'donate_successful']);
Route::get('/donate-failure',[FrontController::class,'donate_failure']);

Route::get('/news',[FrontController::class,'news']);
Route::get('/news/{slug}',[FrontController::class,'news']);

Route::get('/blogs',[FrontController::class,'blogs']);
Route::get('/blogs/{slug}',[FrontController::class,'blogs']);

Route::get('/contact-us',[FrontController::class,'contact_us']);

Route::get('/about-us',[FrontController::class,'about_us']);
Route::get('/our-story',[FrontController::class,'our_story']);
Route::get('/our-project',[FrontController::class,'our_project']);
Route::get('/vision-mission',[FrontController::class,'vision_mission']);
Route::get('/privacy-policy',[FrontController::class,'privacy_policy']);
Route::get('/terms-and-conditions',[FrontController::class,'terms_and_conditions']);
Route::get('/refund-policy',[FrontController::class,'refund_policy']);

Route::post('/product-comment',[FrontController::class,'product_comment']);
Route::post('/blog-comment',[FrontController::class,'blog_comment']);

Route::post('/contact-process',[FrontController::class,'contact_process'])->name('contact_process');

Route::get('/forgot-password',[FrontController::class,'forgot_password']);
Route::post('/forgot-password-process',[FrontController::class,'forgot_password_process'])->name('front.forgot_password');

Route::get('/reset-password/{token}',[FrontController::class,'reset_password']);
Route::post('/reset-password-process',[FrontController::class,'reset_password_process'])->name('front.reset_password');

Route::get('/front/invoice/{id}',[OrderController::class,'invoice']);

Route::get('/send-mail',[FrontController::class,'send_mail']);

Route::get('/route-cache',function(){
    Artisan::call('route:clear');
});

// Route::get('/markdown',function(){
//     Artisan::call('make:mail TestMail --markdown=emails.sample-mail');
// });

Route::get('/vendor-markdown',function(){
    Artisan::call('vendor:publish --tag=laravel-mail');
});

Route::get('/view-cache',function(){
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('route:clear');
});

Route::get('/storage',function(){
    Artisan::call('storage:link');
});

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
