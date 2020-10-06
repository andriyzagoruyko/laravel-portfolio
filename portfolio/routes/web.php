<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AdminController;
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


Route::get('/', [MainController::class, 'index'])->name('index');
Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');


$disabled = [
    'confirm' => false,
    'email' => false,
    'reset' => false,
    'register' => false,
];

Auth::routes($disabled);
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
