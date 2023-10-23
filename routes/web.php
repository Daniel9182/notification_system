<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\NotificationsController;

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

Route::get('/', function () { return view('landing');})->name('init');

Route::post('log',[UsersController::class, 'userLog'])->name('user.log');
Route::get('close', [UsersController::class, 'close'])->name('user.logout');
Route::get('dashboard', [UsersController::class, 'dashboard'])->name('user.dashboard');
Route::get('user/{id}', [UsersController::class, 'user'])->name('user.index');
Route::post('newUser', [UsersController::class, 'newUser'])->name('user.newuser');
Route::get('subscribe/{id}', [UsersController::class, 'subscribe'])->name('user.subscribe');

Route::post('newPost', [NotificationsController::class, 'newpost'])->name('user.newpost');
Route::get('post/{id}', [NotificationsController::class, 'post'])->name('user.post');
Route::get('viewpost/{id}', [NotificationsController::class, 'view'])->name('view.post');