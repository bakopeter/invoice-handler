<?php

namespace App\Http\Resources;

use App\Models\TaxPayer;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use function Laravel\Prompts\select;

class InvoiceHeadResource extends JsonResource
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
            'supplierTP' => new TaxPayerResource($this->supplierTP),
            'customerTP' => new TaxPayerResource($this->customerTP),
            'invoiceDetail' => new InvoiceDetailResource($this->invoiceDetail)
        ];
    }
}
