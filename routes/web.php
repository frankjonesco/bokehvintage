<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LensController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\CameraController;
use App\Http\Controllers\ProfileController;

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

/*
|--------------------------------------------------------------------------
| Routes for SiteController
|--------------------------------------------------------------------------
*/

Route::controller(SiteController::class)->group(function(){
    Route::get('/', 'home');
});



/*
|--------------------------------------------------------------------------
| Routes for PhotoController
|--------------------------------------------------------------------------
*/

Route::controller(PhotoController::class)->middleware('auth')->group(function(){
    Route::post('/photos/store', 'store');
});

Route::controller(PhotoController::class)->group(function(){
    Route::get('/photos', 'index');
});



/*
|--------------------------------------------------------------------------
| Routes for LensController
|--------------------------------------------------------------------------
*/

Route::controller(LensController::class)->middleware('auth')->group(function(){
    Route::get('/lenses/create', 'create');
});

Route::controller(LensController::class)->group(function(){
    Route::get('/lenses', 'index');
});



/*
|--------------------------------------------------------------------------
| Routes for CameraController
|--------------------------------------------------------------------------
*/

Route::controller(CameraController::class)->middleware('auth')->group(function(){
    
});

Route::controller(CameraController::class)->group(function(){
    Route::get('/cameras', 'index');
});



/*
|--------------------------------------------------------------------------
| Routes for UserController
|--------------------------------------------------------------------------
*/

Route::controller(UserController::class)->middleware('auth')->group(function(){
    Route::post('/logout', 'logout');
});

Route::controller(UserController::class)->middleware('guest')->group(function(){
    Route::get('/login', 'login')->name('login');
    Route::get('/signup', 'signup');
    Route::post('/users/create', 'create');
    Route::post('/authenticate', 'authenticate');
});



/*
|--------------------------------------------------------------------------
| Routes for ProfileController
|--------------------------------------------------------------------------
*/

Route::controller(ProfileController::class)->middleware('auth')->group(function(){
    Route::get('/profile', 'index');
});













