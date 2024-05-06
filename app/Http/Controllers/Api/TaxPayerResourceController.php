<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\DetailedTaxPayerInvoicesResource;
use App\Http\Resources\DetailedTaxPayerResource;
use App\Http\Resources\TaxPayerCollection;
use App\Models\TaxPayer;
use Illuminate\Http\Request;

class TaxPayerResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new TaxPayerCollection(TaxPayer::all());
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(TaxPayer $taxpayer)
    {
        return new DetailedTaxPayerInvoicesResource($taxpayer);
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
    public function update(Request $request, TaxPayer $taxpayer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TaxPayer $taxpayer)
    {
        //
    }
}
