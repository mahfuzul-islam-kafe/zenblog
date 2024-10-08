<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'home')->name('blog.home');
    Route::get('/single-post', 'singlePost')->name('post.single');
    
});

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
