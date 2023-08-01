<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\ForgotPasswordController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::group(['middleware' => 'guest'], function () {
    Route::get('/', [PagesController::class,'login'])->name('/');
    Route::post('/login', [UserController::class,'login'])->name('/login');
    Route::get('/forgot-password', [PagesController::class,'forgot_password'])->name('/forgot-password');
    Route::post('/forgot-password', [ForgotPasswordController::class,'forgot_password'])->name('/forgot-password');

    Route::get('/reset_password', [ResetPasswordController::class,'reset_password'])->name('/reset_password');


    Route::get('/message_admin', [PagesController::class,'messageAdmin'])->name('/message_admin');

    Route::post('/message_admin', [MessageController::class,'messages'])->name('/message_admin');

});



Route::group(['middleware' => 'auth'], function () {

    // UserController

Route::post('/register', [UserController::class,'register'])->name('register');
Route::post('/logout', [UserController::class,'logout'])->name('logout');
Route::post('/upload_file', [UserController::class,'upload_file'])->name('upload_file');

Route::put('/edit_profile', [UserController::class,'editProfile'])->name('/edit_profile');

Route::delete('/delete_member/{user}', [UserController::class,'deleteMember'])->name('/delete_member');

// UserController Ends



// PostController

Route::post('/upload_file', [PostController::class,'uploadFile'])->name('/upload_file');

Route::put('/edit_file/{post}', [PostController::class,'updateFile'])->name('/edit_file/{post}');

Route::get('/edit_profile', [PagesController::class,'edit_profile'])->name('/edit_profile');

Route::get('/edit_file/{post}', [PostController::class,'edit_file'])->name('/edit_file/{post}');

Route::delete('/delete_file/{post}', [PostController::class,'deleteFile'])->name('/delete_file');

// PostController Ends


// MessageController
Route::get('/message', [MessageController::class,'message'])->name('/message');

Route::delete('/delete_message/{message}', [MessageController::class,'deleteMessages'])->name('/delete_message');
// MessgageController End


// SearchController
// Route::Post('/search', [SearchController::class,'search'])->name('/search');

Route::get('/search', [SearchController::class,'searchFile'])->name('/search');
// SearchController End


// PagesController

Route::get('/register', [PagesController::class,'register'])->name('register');
Route::get('/logout', [PagesController::class,'logout'])->name('logout');
Route::get('/dashboard', [PagesController::class,'dashboard'])->name('dashboard');

Route::get('/upload_file', [PagesController::class,'upload_file'])->name('/upload_file');
Route::get('/manage_file', [PagesController::class,'manageFile'])->name('/manage_file');


Route::get('/bss_home_image', [PagesController::class,'bss_home_image'])->name('/bss_home_image');
Route::get('/bss_logo', [PagesController::class,'bss_logo'])->name('/bss_logo');

Route::get('/all_members', [PagesController::class,'all_members'])->name('/all_members');

Route::get('/manage_members', [PagesController::class,'manage_all_members'])->name('/manage_members');


// PagesController Ends



// ChatController
Route::Post('/conversation/chat', [ChatController::class,'startChat'])->name('conversation.chat');

Route::get('/conversation/chat', [ChatController::class,'chat'])->name('conversation.chat');
// ChatController End

});
