<?php

use Illuminate\Support\Facades\Route;

$disabled = [
    'confirm' => false,
    'email' => false,
    'reset' => false,
    'register' => false,
];

Auth::routes($disabled);

Route::group([
    'middleware' => ['auth', 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ],
    'prefix' => LaravelLocalization::setLocale() . '/admin',
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
        Route::resource('technologies', App\Http\Controllers\Admin\TechnologyController::class, [
            'except' => [
                'show'
            ]
        ]);
        Route::resource('info', App\Http\Controllers\Admin\InfoController::class, [
            'only' => [
                'index', 'update'
            ]
        ]);
        Route::resource('config', App\Http\Controllers\Admin\ConfigController::class, [
            'only' => [
                'index', 'update'
            ]
        ]);
});

Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
], function() { 
    Route::get('/{tagSlug?}', [App\Http\Controllers\MainController::class, 'index'])->name('index');
    Route::get('/project/{projectSlug}', [App\Http\Controllers\MainController::class, 'singleProject'])->name('single-project');
    Route::post('/feedback', [App\Http\Controllers\FeedbackController::class, 'send'])->name('feedback');
});

Route::post('{locale}/projects/{tagId?}', [App\Http\Controllers\MainController::class, 'getProjects'])->name('api.projects');
