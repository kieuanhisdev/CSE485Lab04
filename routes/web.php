<?php

use App\Http\Controllers\BorrowController;
use App\Models\Borrow;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ReaderController;

Route::get('/', function () {
    return redirect()->route('borrow.index');
});

Route::resource('borrow', BorrowController::class);

Route::post('/borrow/{id}/updateStatus', [BorrowController::class, 'updateStatus'])->name('borrow.updateStatus');

Route::get('/borrow/history/{borrow}', [BorrowController::class, 'history'])->name('borrow.history');

Route::resource('readers', ReaderController::class);

Route::resource('books', BookController::class);

Route::get('/books/{book}/confirm-delete', [BookController::class, 'confirmDelete'])->name('books.confirmDelete');
