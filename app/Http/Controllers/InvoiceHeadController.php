<?php

namespace App\Http\Controllers;

use App\Models\InvoiceDetail;
use App\Models\InvoiceHead;
use App\Http\Requests\StoreInvoiceHeadRequest;
use App\Http\Requests\UpdateInvoiceHeadRequest;
use App\Models\InvoiceLine;

class InvoiceHeadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('invoiceheads', [
            'invoiceheads' => InvoiceHead::all()
        ]);
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
        return view('invoicehead', ['invoicehead' => $invoicehead]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(InvoiceHead $invoicehead)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateInvoiceHeadRequest $request, InvoiceHead $invoicehead)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(InvoiceHead $invoicehead)
    {
        if ($invoicehead->delete())
        {
            $message = "$invoicehead->invoiceNumber számú számla sikeresen sztornózva lett!";
        } else {
            $message = "$invoicehead->invoiceNumber számú számla sztornózása sikertelen!";
        }
        return view('invoicehead', [
            'invoicehead' => $invoicehead,
            'message' => $message,
            'display' => 'block'
        ]);
    }
}
