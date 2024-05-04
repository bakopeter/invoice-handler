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

        $taxpayer = new TaxPayer();
        $taxpayer->communityVatNumber = $input['communityVatNumber'];
        $taxpayer->incorporation = $input['incorporation'];
        $taxpayer->individualExemption = $input['individualExemption'];
        $taxpayer->taxPayerVatStatus = $input['taxPayerVatStatus'];
        $taxpayer->bankAccountNumber = $input['bankAccountNumber'];
        $taxpayer->taxPayerName = $input['taxPayerName'];
        $taxpayer->postalCode = $input['postalCode'];
        $taxpayer->city = $input['city'];
        $taxpayer->streetName = $input['streetName'];
        $taxpayer->publicPlaceCategory = $input['publicPlaceCategory'];
        $taxpayer->number = $input['number'];
        $taxpayer->additionalAddressDetail = $input['additionalAddressDetail'];
        $taxpayer->save();

        //$taxpayer = TaxPayer::create($input);
        //$taxpayer->fill(['' => '']);

        //$taxnumber = new TaxNumber();

        //$taxpayer = TaxPayer::find($taxpayer);
        $taxpayer->taxNumber()->create([
            'taxpayerId' => $input['taxNumber->taxpayerId'],
            'vatCode' => $input['taxNumber->vatCode'],
            'countyCode' => $input['taxNumber->countyCode']
        ]);
        //$taxnumber->save();
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
