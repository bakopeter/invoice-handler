<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\DetailedInvoiceResource;
use App\Http\Resources\InvoiceHeadCollection;
use App\Models\InvoiceHead;
use App\Http\Requests\StoreInvoiceHeadRequest;
use App\Http\Requests\UpdateInvoiceHeadRequest;

class InvoiceHeadResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new InvoiceHeadCollection(InvoiceHead::all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreInvoiceHeadRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(InvoiceHead $invoicehead)
    {
        return new DetailedInvoiceResource($invoicehead);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(InvoiceHead $invoiceHead)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateInvoiceHeadRequest $request, InvoiceHead $invoiceHead)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(InvoiceHead $invoiceHead)
    {
        //
    }
}
