<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

Route::get('/',[App\Http\Controllers\UsersController::class,"Register"])->name("register")->middleware("loginUser");

Route::post('/',[App\Http\Controllers\UsersController::class,"RegisterUser"])->name("RegisterUser");

Route::get('/login',[App\Http\Controllers\UsersController::class,"login"])->name("login")->middleware("loginUser");

Route::get('/dashboard',[App\Http\Controllers\UsersController::class,"dashboard"])->name("dashboard")->middleware("notLoggedIn");

Route::post('/login',[App\Http\Controllers\UsersController::class,"LoginUser"])->name("LoginUser");

Route::get('/logout',[App\Http\Controllers\UsersController::class,"logout"])->name("logout");

