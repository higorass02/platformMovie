<?php

use App\Http\Controllers\Modules\MovieController;
use App\Http\Controllers\Modules\ConfigController;
use App\Http\Controllers\Modules\SubscribeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::prefix('/modules')->group(function(){
    Route::get('', [ConfigController::class, 'course'])->name('course');
    Route::get('/new', [ConfigController::class, 'courseForm'])->name('courseForm');
    Route::post('/new', [ConfigController::class, 'courseCreate'])->name('courseCreate');
    Route::get('/{id}', [ConfigController::class, 'courseEdit'])->name('courseEdit');
    Route::put('/{id}', [ConfigController::class, 'courseUpdate'])->name('courseUpdate');
    Route::delete('/{id}', [ConfigController::class, 'courseDelete'])->name('courseDelete');
    
    Route::prefix('/movies')->group(function(){
        Route::get('', [MovieController::class, 'movies'])->name('movies');
    });

    Route::prefix('/subscrives')->group(function(){
        Route::get('', [SubscribeController::class, 'subscribeByCourse'])->name('subscribeByCourse');
    });
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
