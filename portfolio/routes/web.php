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
    'prefix' => LaravelLocalization::setLocale() . '/admin',
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function() {
        Route::get('/', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.index');
        Route::get('/locale/{localeCode}', [App\Http\Controllers\AdminController::class, 'setEditingLocale'])->name('admin.locale');
        Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('admin.logout');

        Route::resource('projects', App\Http\Controllers\Admin\ProjectController::class, [
            'except' => [
                'show'
            ]
        ]);;
        Route::resource('tags', App\Http\Controllers\Admin\TagController::class, [
            'except' => [
                'show'
            ]
        ]);
        Route::resource('info', App\Http\Controllers\Admin\InfoController::class, [
            'only' => [
                'index', 'update'
            ]
        ]);
        Route::resource('technologies', App\Http\Controllers\Admin\TechnologyController::class, [
            'except' => [
                'show'
            ]
        ]);
});

$disabled = [
    'confirm' => false,
    'email' => false,
    'reset' => false,
    'register' => false,
];

Auth::routes($disabled);
