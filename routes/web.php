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

Route::resource('category', CategoryController::class)->middleware('admin');

//label route
Route::resource('label', LableController::class)->middleware('admin');

//ticket route
// Route::resource('ticket', TicketController::class);

Route::get('ticket',[TicketController::class, 'index'])->name('ticket.index');
Route::post('ticket', [TicketController::class, 'store'])->name('ticket.store');
Route::get('ticket/create',[TicketController::class, 'create'])->name('ticket.create');
Route::get('ticket/{id}',[TicketController::class, 'show'])->name('ticket.show');
Route::get('ticket/{id}/edit',[TicketController::class, 'edit'])->name('ticket.edit');
Route::put('ticket/{id}',[TicketController::class, 'update'])->name('ticket.update');
Route::delete('ticket/{id}',[TicketController::class, 'destroy'])->name('ticket.destroy')->middleware('admin');

//comment route
Route::resource('comment', CommentController::class);

Auth::routes();

