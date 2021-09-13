<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\ConfirmPasswordController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\BlogPostController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\roll\AdminController;
use App\Http\Controllers\roll\editorController;
use App\Http\Controllers\roll\userController;
use App\Http\Controllers\WelcomeController;
use App\Models\blogpost;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;

/**
 * Blog app landing Page
 * 
 * 
 */

Route::get('/',[WelcomeController::class,'index']);

/**
 * 
 * Authenticating the Users
 */

Route::get('/login', [AuthController::class, 'index']);
Route::post('post.login', [AuthController::class, 'postLogin'])->name('login'); 
Route::get('/registration', [AuthController::class, 'registration']);
Route::post('post.register', [AuthController::class, 'postRegistration'])->name('register'); 
Route::get('dashboard', [AuthController::class, 'dashboard']); 

//Password Reset
Route::match(['get', 'head',],'password/reset', [ForgotPasswordController::class,'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [ForgotPasswordController::class,'sendResetLinkEmail'])->name('password.email');
Route::match(['get', 'head'],'password/reset/{token}', [ResetPasswordController::class,'showResetForm'])->name('password.reset');
Route::post('password/reset', [ResetPasswordController::class,'reset'])->name('password.update');

Route::match(['get', 'head'],'password/confirm', [ConfirmPasswordController::class,'showConfirmForm'])->name('password.confirm');
Route::post('password/confirm', [ConfirmPasswordController::class,'confirm']);




Route::group(['middleware'=> ['auth']],function(){
    Route::middleware(['Blogware'])->group(function (){

        /**
         * Blog routes
         */

         
        Route::get('/blog',[BlogPostController::class,'blog'])->name('mainPage');
        Route::get('/blog/{blogpost}',[BlogPostController::class,'show'])->name('show');
        Route::get('/blog/create/post', [BlogPostController::class, 'create'])->name('blog/create/post'); 
        Route::post('/blog/create/post', [BlogPostController::class, 'store'])->name('store'); 
        Route::get('/editDashboard',[BlogPostController::class, 'editBlog'])->name('dashboard');
        Route::get('/edit/{slug}', [BlogPostController::class, 'edit']); 
        Route::put('/edit/{slug}', [BlogPostController::class, 'update'])->name('update'); 
        Route::get('/delete/{slug}', [BlogPostController::class, 'destroy']); 
    } );


    /**
    * Admin setting routes
    *      
    */
    Route::group(['middleware' => ['is_admin']],function(){
        Route::get('/myprofile', [AdminController::class,'myprofile'])->name('myprofile');
        Route::get('/manageUser', [AdminController::class,'manageuser'])->name('manageUser');
        Route::get('/createUser',[AdminController::class, 'createUser']);
        Route::post('/storeUser',[AdminController::class, 'storeUser'])->name('storeUser');
        Route::get('/editUser/{id}', [AdminController::class, 'editUser']);
        Route::put('/editUser/{id}', [AdminController::class, 'updateUser'])->name('updateUser'); 
        Route::get('/deleteUser/{id}',[AdminController::class, 'deleteUser']);
        Route::get('/viewUser/{id}', [AdminController::class, 'viewUser']);
    });
});



/**
 * 
 * Role Routes
 */ 
Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('auth');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');


