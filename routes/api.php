<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\usersController;
use App\Http\Controllers\groupQuestionsController;
use App\Http\Controllers\questionsController;
use App\Http\Controllers\answersController;

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

Route::get("/group", [groupQuestionsController::class, "index"])->name("group.index");
Route::post("/group", [groupQuestionsController::class, "store"])->name("group.store");
Route::delete("/group/{id}", [groupQuestionsController::class, "deleteGroup"])->name("group.deleteGroup");

Route::get("/question/{groupId}", [questionsController::class, "index"])->name("question.index");
Route::post("/question", [questionsController::class, "store"])->name("question.store");
Route::put("/question/{id}", [questionsController::class, "updateQuestion"])->name("question.updateQuestion");
Route::delete("/question/{id}", [questionsController::class, "deleteQuestion"])->name("question.deleteQuestion");

Route::get("/answer", [answersController::class, "index"])->name("answer.index");
Route::post("/answer", [answersController::class, "store"])->name("answer.store");
Route::delete("/answer/{id}", [answersController::class, "deleteAnswer"])->name("answer.deleteAnswer");
