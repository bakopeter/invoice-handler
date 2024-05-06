<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DetailedInvoiceResource extends JsonResource
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
            'invoiceNumber' => $this->invoiceNumber,
            'invoiceIssueDate' => $this->invoiceIssueDate,
            'supplierTP' => new DetailedTaxPayerResource($this->supplierTP),
            'customerTP' => new DetailedTaxPayerResource($this->customerTP),
            'invoiceDetail' => new DetailedInvoiceDetailResource($this->invoiceDetail),
            'invoiceLines' => new InvoiceLineCollection($this->invoiceLines)
        ];
    }
}
