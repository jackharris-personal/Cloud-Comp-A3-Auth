<?php
/**
 * Copyright Jack Harris
 * Peninsula Interactive - forum
 * Last Updated - 9/09/2023
 */

use App\Controllers\AuthController;
use App\Controllers\UserController;
use App\Framework\Facades\Route;

//Authentication endpoints
Route::get("/auth/logout/{token}","logout", AuthController::class);
Route::post("/auth/login","login",AuthController::class);
Route::get("/auth/check/{token}","checkSession",AuthController::class);
Route::post("/auth/register","register",AuthController::class);

//User endpoints
Route::get("/me","me", UserController::class);
Route::get("/user/{id}","userLookup",UserController::class);