<?php

use App\Http\Controllers\PizzaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post("create",[PizzaController::class,"create"]);
Route::get("pizza",[PizzaController::class,"allPizza"]);
Route::get("pizza/{id}",[PizzaController::class,"pizza"]);
Route::post("modify/{id}",[PizzaController::class,"modify"]);
Route::delete("delete/{id}",[PizzaController::class,"delete"]);
