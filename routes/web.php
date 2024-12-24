<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReaderController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/hello', function () {
    return view('hello');
});

Route::resource('readers', ReaderController::class);