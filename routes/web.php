<?php

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/profile/{id}', [App\Http\Controllers\HomeController::class, 'profile'])->name('profile');
Route::get('/edit/{id}', [App\Http\Controllers\HomeController::class, 'edit'])->name('edit');
Route::put('/update/{id}', [App\Http\Controllers\HomeController::class, 'update'])->name('update');
Route::put('/single_edit/{id}', [App\Http\Controllers\HomeController::class, 'single_edit'])->name('single_edit');
Route::get('/delete/{id}', [App\Http\Controllers\HomeController::class, 'delete'])->name('delete');
Route::get('/single_profile', [App\Http\Controllers\HomeController::class, 'single_profile'])->name('single_profile');
Route::get('/change_passowrd', [App\Http\Controllers\HomeController::class, 'change_passowrd'])->name('change_passowrd');
Route::get('/single_update', [App\Http\Controllers\HomeController::class, 'single_update'])->name('single_update');
Route::put('/reset_password/{id}', [App\Http\Controllers\HomeController::class, 'reset_password'])->name('reset_password');
