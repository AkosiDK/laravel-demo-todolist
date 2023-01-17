<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [App\Http\Controllers\TodoController::class, 'display'])->name('welcome');

// Todo Routes
Route::post('/newtodo', [App\Http\Controllers\TodoController::class, 'create']);
Route::post('/donetodo', [App\Http\Controllers\TodoController::class, 'done']);
Route::post('/deletetodo', [App\Http\Controllers\TodoController::class, 'delete']);
