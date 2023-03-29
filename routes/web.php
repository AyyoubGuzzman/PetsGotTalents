<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JugeController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\AnimalController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [IndexController::class,'index']);

Route::resource('owner', OwnerController::class);
Route::resource('animal', AnimalController::class);
Route::resource('juge', JugeController::class);
Route::resource('test', TestController::class);

