<?php

use App\Http\Controllers\TaxPayerController;
use Illuminate\Support\Facades\Route;

Route::resource('taxpayers', TaxPayerController::class);

Route::resource('invoiceheads',\App\Http\Controllers\InvoiceHeadController::class);

Route::resource('invoicelines', \App\Http\Controllers\InvoiceLineController::class);
