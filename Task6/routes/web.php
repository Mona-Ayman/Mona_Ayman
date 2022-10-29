<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DashboardController;


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

Route::get('/', function () {
    return view('welcome');
});

Route::get('dashboard',[DashboardController::class,'index'])->middleware(['auth','verified']);
Route::get('dashboard/products',[ProductController::class,'index'])->middleware(['auth','verified']);
Route::get('dashboard/products/create',[ProductController::class,'create'])->middleware(['auth','verified']);
Route::get('dashboard/products/edit/{id}',[ProductController::class,'edit'])->middleware(['auth','verified']);
Route::post('dashboard/products/store',[ProductController::class,'store'])->middleware(['auth','verified']);
Route::put('dashboard/products/update/{id}',[ProductController::class,'update'])->middleware(['auth','verified']);
Route::delete('dashboard/products/delete/{id}',[ProductController::class,'delete'])->middleware(['auth','verified']);


Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
