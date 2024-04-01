<?php

use Illuminate\Support\Facades\Route;


use \App\Http\Controllers\AjaxHandler;




Route::get('/', function () {
    return view('index');
});

Route::get('/tgs-chapter-registration', function () {
    return view('tgs-chapter-registration');
});

Route::get('/lady-triskelion-registration', function () {
    return view('lady-triskelion-registration');
});

Route::get('/chapter-history', function () {
    return view('chapter-history');
});

Route::get('/chapter-registration', function () {
    return view('chapter-registration');
});

Route::get('/new-chapter-application', function () {
    return view('new-chapter-application');
});

Route::get('/record-update', function () {
    return view('record-update');
});

Route::get('/neophyte-application', function () {
    return view('neophyte-application');
});

Route::get('/triskelion-registration', function () {
    return view('triskelion-registration');
});


Route::post('/ajax', [AjaxHandler::class, 'index']);
