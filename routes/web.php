<?php

use App\Http\Controllers\BorrowController;
use App\Models\Borrow;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('borrow.index');
});

Route::resource('borrow', BorrowController::class);

Route::post('/borrow/{id}/updateStatus', [BorrowController::class, 'updateStatus'])->name('borrow.updateStatus');


Route::get('/borrow/history/{borrow}', [BorrowController::class, 'history'])->name('borrow.history');
