<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\Admin\AdminController;
use App\Http\Controllers\Backend\Admin\ProductController;
use App\Http\Controllers\Backend\Admin\NewsController;
use App\Http\Controllers\Backend\Admin\BlogController;
use App\Http\Controllers\Backend\Admin\BannerController;
use App\Http\Controllers\Backend\Admin\MediaController;

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

Route::get('/admin',[AdminController::class,'index']);
Route::post('/admin/auth',[AdminController::class,'auth'])->name('admin.auth');
Route::get('/change-pass',[AdminController::class,'change_pass']);

Route::group(['prefix'=>'admin','as'=>'admin.','middleware'=>['admin_auth']],function(){

        Route::get('/dashboard',[AdminController::class,'dashboard']);
        
        //Banner
        Route::get('/all-banner',[BannerController::class,'all_banner']);
        Route::get('/add-banner',[BannerController::class,'add_edit_banner']);
        Route::get('/edit-banner/{id}',[BannerController::class,'add_edit_banner']);
        Route::post('/add-edit-banner-process',[BannerController::class,'add_edit_banner_process'])->name('banner_add_edit');
        Route::get('/change-banner-status/{status}/{id}',[BannerController::class,'change_banner_status']);
        Route::get('/delete-banner/{id}',[BannerController::class,'delete_banner']);

        //Product
        Route::get('/all-product',[ProductController::class,'all_product']);
        Route::get('/add-product',[ProductController::class,'add_edit_product']);
        Route::get('/edit-product/{id}',[ProductController::class,'add_edit_product']);
        Route::post('/add-edit-product-process',[ProductController::class,'add_edit_product_process'])->name('product_add_edit');
        Route::post('/delete-product-image',[ProductController::class,'delete_product_image']);
        Route::post('/delete-product-attr',[ProductController::class,'delete_product_attr']);
        Route::get('/change-product-status/{status}/{id}',[ProductController::class,'change_product_status']);

        //Order
        Route::get('/all-order',[AdminController::class,'all_order']);
        Route::get('/view-order/{id}',[AdminController::class,'view_order']);
        Route::get('/change-payment-status/{id}/{payment_status}',[AdminController::class,'change_payment_status']);
        Route::get('/delete-order/{id}',[AdminController::class,'delete_order']);

        //News
        Route::get('/all-news',[NewsController::class,'all_news']);
        Route::get('/add-news',[NewsController::class,'add_edit_news']);
        Route::get('/edit-news/{id}',[NewsController::class,'add_edit_news']);
        Route::post('/add-edit-news-process',[NewsController::class,'add_edit_news_process'])->name('news_add_edit');
        Route::get('/change-news-status/{status}/{id}',[NewsController::class,'change_news_status']);

        //Donation
        Route::get('/all-donation',[AdminController::class,'all_donation']);
        Route::get('/view-donation/{id}',[AdminController::class,'view_donation']);
        Route::get('/delete-donation/{id}',[AdminController::class,'delete_donation']);

        //Blog
        Route::get('/all-blog',[BlogController::class,'all_blog']);
        Route::get('/add-blog',[BlogController::class,'add_edit_blog']);
        Route::get('/edit-blog/{id}',[BlogController::class,'add_edit_blog']);
        Route::post('/add-edit-blog-process',[BlogController::class,'add_edit_blog_process'])->name('blog_add_edit');
        Route::get('/change-blog-status/{status}/{id}',[BlogController::class,'change_blog_status']);
        Route::get('/delete-blog/{id}',[BlogController::class,'delete_blog']);
        Route::get('/delete-video/{id}',[BlogController::class,'delete_video']);
        
        //User
        Route::get('/all-user',[AdminController::class,'all_user']);
        Route::get('/change-user-status/{id}/{status}',[AdminController::class,'change_user_status']);
        Route::get('/delete-user/{id}',[AdminController::class,'delete_user']);
        
        //Contact Us
        Route::get('/contact',[AdminController::class,'contact']);
        Route::get('/view-contact/{id}',[AdminController::class,'view_contact']);
        Route::get('/delete-contact/{id}',[AdminController::class,'delete_contact']);
        
        //Account
        Route::get('/account',[AdminController::class,'account']);
        Route::post('/profile-process',[AdminController::class,'profile_process'])->name('profile_process');
        Route::post('/change-password',[AdminController::class,'change_password'])->name('change_password');
        Route::get('/remove-profile-pic',[AdminController::class,'remove_profile_pic']);
        
        //Media
        Route::get('/all-media',[MediaController::class,'all_media']);
        Route::get('/add-media',[MediaController::class,'add_edit_media']);
        Route::get('/edit-media/{id}',[MediaController::class,'add_edit_media']);
        Route::post('/add-edit-media-process',[MediaController::class,'add_edit_media_process'])->name('media_add_edit');
        Route::get('/delete-media/{id}',[MediaController::class,'delete_media']);

        Route::get('/logout',[AdminController::class,'logout']);

});
