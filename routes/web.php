<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CustomLoginController;
use App\Http\Controllers\LableController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\UserController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;

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
    return view('dashboard.index');
})->middleware('auth');

//user route
Route::resource('user', UserController::class)->middleware('admin');

//category route

Route::resource('category', CategoryController::class)->middleware('auth');

//label route
Route::resource('label', LableController::class)->middleware('auth');

//ticket route
Route::resource('ticket', TicketController::class)->middleware('auth');

//comment route
Route::resource('comment', CommentController::class)->middleware('auth');

Auth::routes();

