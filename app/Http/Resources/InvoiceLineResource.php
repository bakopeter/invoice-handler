<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class InvoiceLineResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'lineNumber' => $this->lineNumber,
            'lineDescription' => $this->lineDescription,
            'lineNatureIndicator' => $this->lineNatureIndicator,
            'quantity' => $this->quantity,
            'unitOfMeasure' => $this->unitOfMeasure,
            'unitPrice' => $this->unitPrice,
            'lineNetAmount' => $this->lineNetAmount,
            'vatPercentage' => $this->vatPercentage,
            'lineVatAmount' => $this->lineVatAmount,
            'lineGrossAmount' => $this->lineGrossAmount
        ];
    }
}
