<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\PortfolioController;

Route::group([
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function() { 
        Route::get('/', [MainController::class, 'index'])->name('index');
});

Route::group([
    'middleware' => 'auth',
    'prefix' => 'admin'
    ], function() {
    Route::get('/', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.index');
    Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('admin.logout');
    Route::resource('/projects', App\Http\Controllers\Admin\ProjectController::class);
});

$disabled = [
    'confirm' => false,
    'email' => false,
    'reset' => false,
    'register' => false,
];

Auth::routes($disabled);
