<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;



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
Route::get('/single_update', [App\Http\Controllers\HomeController::class, 'single_update'])->name('single_update');




Route::get('/change_password' , 'App\Http\Controllers\Auth\ChangepasswordController@change_passowrd') -> name('password.change');
Route::put('/change_password' , 'App\Http\Controllers\Auth\ChangepasswordController@password_update') -> name('passowrd.update');
