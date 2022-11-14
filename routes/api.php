<?php

use App\Http\Controllers\Login\LoginController;
use App\Http\Controllers\Login\LogOutController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Users\{
    IndexController,
    ShowController,
    StoreController
};
use App\Http\Controllers\Login\GetAllLoginLogOutHistoriesController;
use App\Http\Controllers\Books\IndexController as BookIndexController;
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

Route::get('/', function () {
   return response("PROYECTO FINAL API");
});

Route::get('/users', IndexController::class);
Route::get('/users/{id}', ShowController::class);
Route::post('/users', StoreController::class);

Route::get('/books', BookIndexController::class);

Route::post('/login', LoginController::class);
Route::get('/logout/{id}', LogOutController::class);

Route::get('/login-log-out-histories', GetAllLoginLogOutHistoriesController::class);
