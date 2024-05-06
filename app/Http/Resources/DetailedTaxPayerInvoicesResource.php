<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DetailedTaxPayerInvoicesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'communityVatNumber' => $this->communityVatNumber,
            'individualExemption' => $this->individualExemption,
            'incorporation' => $this->incorporation,
            'taxPayerVatStatus' => $this->taxPayerVatStatus,
            'bankAccountNumber' => $this->bankAccountNumber,
            'taxPayerName' => $this->taxPayerName,
            'postalCode' => $this->postalCode,
            'city' => $this->city,
            'streetName' => $this->streetName,
            'publicPlaceCategory' => $this->publicPlaceCategory,
            'number' => $this->number,
            'additionalAddressDetail' => $this->additionalAddressDetail,
            'taxNumber' => new TaxNumberResource($this->taxNumber),
            'groupMemberTaxNumber' => new TaxNumberResource($this->groupMemberTaxNumber),
            'invoiceHeadSupplier' => new InvoiceHeadCollection($this->invoiceHeadSupplier),
            'invoiceHeadCustomer' => new InvoiceHeadCollection($this->invoiceHeadCustomer)
        ];
    }
}
