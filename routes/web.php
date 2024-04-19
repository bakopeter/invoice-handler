<?php

use App\Http\Controllers\TaxPayerController;
use Illuminate\Support\Facades\Route;
/*
Route::get('/taxpayers', [TaxPayerController::class, 'index'])->name('taxpayers.index');

Route::get('/taxpayers/create', [TaxPayerController::class, 'create'])->name('taxpayers.create');
Route::post('/taxpayers', [TaxPayerController::class, 'store'])->name('taxpayers.store');

Route::get('/taxpayers/{taxpayer}',[TaxPayerController::class, 'show'])->name('taxpayers.show');

Route::get('/taxpayers/{taxpayer}/edit', [TaxPayerController::class, 'edit'])->name('taxpayers.edit');
Route::patch('/taxpayers/{taxpayer}', [TaxPayerController::class, 'update'])->name('taxpayers.update');

Route::delete('taxpayers/{taxpayer}', [TaxPayerController::class, 'destroy'])->name('taxpayers.destroy');
*/
Route::resource('taxpayers', TaxPayerController::class);
