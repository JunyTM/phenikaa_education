<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\usersController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get("/user", [usersController::class, "index"])->name("user.index");
Route::post("/register", [usersController::class, "store"])->name("user.store");
Route::post("/login", [usersController::class, "login"])->name("user.login");
Route::put("/update/{id}", [usersController::class, "updateUser"])->name("user.updateUser");
Route::delete("/delete/{id}", [usersController::class, "deleteUser"])->name("user.deleteUser");


