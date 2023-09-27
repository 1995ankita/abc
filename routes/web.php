<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;


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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//create a user
Route::get('/create', [HomeController::class, 'create'])->name('user.create');
Route::post('/store', [HomeController::class, 'store'])->name('user.store');
// show a user
Route::get('/useredit/{id}', [HomeController::class, 'edit'])->name('user.edit');
// edit a user
Route::get('/userupdate/{id}', [HomeController::class, 'update'])->name('user.update');
// deletes a user
 Route::get('/user/{id}', [HomeController::class, 'destroy'])->name('user.delete');


