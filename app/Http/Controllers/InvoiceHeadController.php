<?php

namespace App\Http\Controllers;

use App\Models\InvoiceDetail;
use App\Models\InvoiceHead;
use App\Http\Requests\StoreInvoiceHeadRequest;
use App\Http\Requests\UpdateInvoiceHeadRequest;
use App\Models\InvoiceLine;
use App\Models\TaxPayer;

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
        return view('invoice_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreInvoiceHeadRequest $request)
    {
        $input = $request->validated();

        $ivoicedetail = new InvoiceDetail([
            'invoiceDeliveryDate' => $input['invoiceDetail->invoiceDeliveryDate'],
            'paymentDate' => $input['invoiceDetail->paymentDate'],
            'paymentMethod' => $input['invoiceDetail->paymentMethod'],
            'invoiceNetAmount' => $input['invoiceDetail->invoiceNetAmount'],
            'invoiceVatAmount' => $input['invoiceDetail->invoiceVatAmount'],
            'invoiceGrossAmount' => $input['invoiceDetail->invoiceGrossAmount'],
            'invoiceCategory' => 'NORMAL'
        ]);
        if ($ivoicedetail->save())
        {
            $invoicehead = new InvoiceHead([
                'invoiceNumber' => $input['invoiceNumber'],
                'invoiceIssueDate' => $input['invoiceIssueDate'],
                'supplier_id' => $input['supplierTP'],
                'customer_id' => $input['customerTP']
            ]);
            $invoicehead->invoiceDetail()->associate($ivoicedetail);
            //$invoicehead->supplierTP()->associate($input['supplierTP']);
            //$invoicehead->customerTP()->associate($input['customerTP']);

            if ($invoicehead->save()) {return view('invoicehead', [
                   'invoicehead' => $invoicehead,
                   'message' => "$invoicehead->invoiceNumber számú számlát sikeresen hozzáadtuk az adatbázishoz!",
                   'display' => 'block'
                ]);
            }
        }
        return view('invoice_create', [
            'invoicehead' => new InvoiceHead(),
            'message' => "$input->invoiceNumber számú számlát nem sikerült az adatbázishoz adni!",
            'display' => 'block'
        ]);
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
        return view('invoicehead', [
            'invoicehead' => $invoicehead,
            'message' => "Számla módosítása",
            'display' => 'block'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateInvoiceHeadRequest $request, InvoiceHead $invoicehead)
    {
        $input = $request->validated();
        dd($request);
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
