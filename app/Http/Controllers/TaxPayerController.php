<?php

namespace App\Http\Controllers;

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

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaxPayerRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(TaxPayer $taxPayer)
    {
        var_dump($taxPayer->id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TaxPayer $taxPayer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTaxPayerRequest $request, TaxPayer $taxPayer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TaxPayer $taxPayer)
    {
        //
    }
}
