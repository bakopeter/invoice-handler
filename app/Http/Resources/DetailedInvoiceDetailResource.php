<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DetailedInvoiceDetailResource extends JsonResource
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
            'invoiceCategory' => $this->invoiceCategory,
            'invoiceDeliveryDate' => $this->invoiceDeliveryDate,
            'paymentDate' => $this->paymentDate,
            'paymentMethod' => $this->paymentMethod,
            'invoiceNetAmount' => $this->invoiceNetAmount,
            'invoiceVatAmount' => $this->invoiceVatAmount,
            'invoiceGrossAmount' => $this->invoiceGrossAmount
        ];
    }
}
