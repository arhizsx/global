<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;

use \App\Http\Controllers\AjaxHandler;
use App\Http\Controllers\RouteController;


Route::middleware(['auth'])->group(function () {

    // HOME
    Route::get('/', [RouteController::class, 'index']);


    // TRISKELIONS
    Route::get('/triskelions/{page?}', [RouteController::class, 'triskelions']);


    // CHAPTERS
    Route::get('/chapters/{page?}', [RouteController::class, 'chapters']);


    // COUNCILS
    Route::get('/councils/{page?}', [RouteController::class, 'councils']);



    // RECORD UPDATES
    Route::get('/record-update/{page?}', [RouteController::class, 'record_update']);


    // RECORD UPDATES COUNCIL
    Route::get('/record-update/council/{page?}', [RouteController::class, 'record_update_council']);


    // RECORD UPDATES CHAPTER
    Route::get('/record-update/chapter/{page?}', [RouteController::class, 'record_update_chapter']);




    // AJAX
    Route::post('/ajax', [AjaxHandler::class, 'index']);


    // JETSTREAM
    Route::middleware([
        'auth:sanctum',
        config('jetstream.auth_session'),
        'verified',
    ])->group(function () {
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');
    });

});

