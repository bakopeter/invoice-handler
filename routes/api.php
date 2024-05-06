<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Route;

Route::apiResource('invoiceheads', \App\Http\Controllers\Api\InvoiceHeadResourceController::class)
    ->only('index', 'show', 'store')
    ->missing(function (Request $request) {
        return Response::json([
            'data' => null,
            'success' => false,
            'message' => "A megadott azonosítóval nem található számla az adatbázisban!"
        ], 404);
    });

Route::apiResource('taxpayers', \App\Http\Controllers\Api\TaxPayerResourceController::class)
    ->only('index', 'show')
    ->missing(function (Request $request) {
        return Response::json([
            'data' => null,
            'success' => false,
            'message' => "A megadott azonosítóval nem található adózó az adatbázisban!"
        ], 404);
    });
