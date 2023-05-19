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
    
    Route::prefix('/{idModules}/movies')->group(function($id){
        Route::get('/', [MovieController::class, 'movies'])->name('movies');
        Route::get('/new', [MovieController::class, 'moviesForm'])->name('moviesForm');
        Route::post('/new', [MovieController::class, 'moviesCreate'])->name('moviesCreate');
        Route::get('/{id}', [MovieController::class, 'moviesEditForm'])->name('moviesEditForm');
        Route::put('/{id}', [MovieController::class, 'moviesEdit'])->name('moviesEdit');
        Route::get('/movieOpen/{id}', [MovieController::class, 'moviesOpen'])->name('moviesOpen');
        Route::get('/movieOpenAdmin/{id}', [MovieController::class, 'moviesOpenAdmin'])->name('moviesOpenAdmin');
        Route::delete('/{id}', [MovieController::class, 'moviesDelete'])->name('moviesDelete');
    });

    Route::prefix('/subscribers')->group(function(){
        Route::get('/{id}', [SubscribeController::class, 'subscribeByCourse'])->name('subscribeByCourse');
    });
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
