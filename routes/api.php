<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UsersController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::prefix("/users")->controller(UsersController::class)->name("users.")->group(function (){
    Route::get("/get/{id}","getUsers")->name("getAll");
    Route::delete("/delete/{id}","deleteUser")->name("delete");
    Route::get("/get/user/{id}","getUser")->name("oneUser");
});

Route::prefix("/auth")->controller(AuthController::class)->name("auth.")->group(function (){
    Route::post("/login","login")->name("login");
    Route::post("/create","createUser")->name("create");
});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
