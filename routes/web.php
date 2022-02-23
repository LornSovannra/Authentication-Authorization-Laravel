<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

Route::middleware("auth")->group(function(){
    Route::get('/', function () {
        return view('welcome');
    });
});

Route::get("/login", [LoginController::class, "ShowLoginForm"]);
Route::post("/login", [LoginController::class, "Login"])->name("login");
Route::post("/logout", [LoginController::class, "Logout"])->name("logout");

Route::get("/register", [RegisterController::class, 'ShowRegisterForm']);
Route::post("/register", [RegisterController::class, 'Register'])->name("register");