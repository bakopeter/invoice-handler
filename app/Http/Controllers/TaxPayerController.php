<?php

namespace App\Http\Controllers;

use App\Models\InvoiceHead;
use App\Models\TaxNumber;
use App\Models\TaxPayer;
use App\Http\Requests\StoreTaxPayerRequest;
use App\Http\Requests\UpdateTaxPayerRequest;

class TaxPayerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('taxpayers', [
            'taxpayers' => TaxPayer::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('taxpayer_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaxPayerRequest $request)
    {
        $input = $request->validated();

        $taxnumber = new TaxNumber([
            'taxpayerId' => $input['taxNumber->taxpayerId'],
            'vatCode' => $input['taxNumber->vatCode'],
            'countyCode' => $input['taxNumber->countyCode']
        ]);
        if ($taxnumber->save())
        {
            $taxpayer = new TaxPayer([
                'communityVatNumber' => $input['communityVatNumber'],
                'incorporation' => $input['incorporation'],
                'individualExemption' => $input['individualExemption'],
                'taxPayerVatStatus' => $input['taxPayerVatStatus'],
                'bankAccountNumber' => $input['bankAccountNumber'],
                'taxPayerName' => $input['taxPayerName'],
                'postalCode' => $input['postalCode'],
                'city' => $input['city'],
                'streetName' => $input['streetName'],
                'publicPlaceCategory' => $input['publicPlaceCategory'],
                'number' => $input['number'],
                'additionalAddressDetail' => $input['additionalAddressDetail']
            ]);
            $taxpayer->taxNumber()->associate($taxnumber);

            if ($taxpayer->save()) {
                return view('taxpayer', [
                    'taxpayer' => $taxpayer,
                    'message' => "$taxpayer->taxPayerName nevű adózót sikeresen hozzáadtuk az adatbázishoz!",
                    'display' => 'block'
                ]);
            }
        }

        return view('taxpayer_create', [
            'taxpayer' => $taxpayer,
            'message' => "$taxpayer->taxPayerName nevű adózót nem sikerült az adatbázishoz adni!",
            'display' => 'block'
        ]);

        //$taxpayer = TaxPayer::create($input);
        //$taxpayer->fill(['' => '']);
        //$taxpayer = TaxPayer::find($taxpayer);
    }

    /**
     * Display the specified resource.
     */
    public function show(TaxPayer $taxpayer)
    {
        return view('taxpayer', [
           'taxpayer' => $taxpayer
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TaxPayer $taxpayer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTaxPayerRequest $request, TaxPayer $taxpayer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TaxPayer $taxpayer)
    {
        if ($taxpayer->invoiceHeadCustomer()->count() || $taxpayer->invoiceHeadSupplier()->count()) {
            $message = "$taxpayer->taxPayerName nevű felhasználó csak a hozzá tartozó számlák módosítása, illetve törlése után távolítható el!";
        } else if ($taxpayer->delete()) {
            $message = "$taxpayer->taxPayerName nevű felhasználó törlése sikeres volt!";
        } else {
            $message = "$taxpayer->taxPayerName nevű felhasználó törlése sikertelen!";
        }
        return view('taxpayer', [
           'taxpayer' => $taxpayer,
           'message' => $message,
           'display' => 'block'
        ]);
    }
}
