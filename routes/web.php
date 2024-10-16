<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransactionController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/transactions', [TransactionController::class, 'showAllTransactions'])->name('showAllTransactions');

//CREATE
Route::post('/transactions/store', [TransactionController::class, 'storeTransaction'])->name('storeTransaction');
Route::get('/transactions/create', [TransactionController::class, 'createTransaction'])->name('createTransaction');

//READ
Route::get('/transactions/{id}', [TransactionController::class, 'viewTransaction'])->name('viewTransaction');

//UPDATE
Route::get('/transactions/{id}/edit', [TransactionController::class, 'editTransaction'])->name('editTransaction');
Route::put('/transactions/{id}/update', [TransactionController::class, 'updateTransaction'])->name('updateTransaction');

//DELETE
Route::delete('/transactions/{id}/delete', [TransactionController::class, 'deleteTransaction'])->name('deleteTransaction');