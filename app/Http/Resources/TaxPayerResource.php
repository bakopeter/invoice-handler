<?php

namespace App\Http\Resources;

use App\Models\TaxNumber;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TaxPayerResource extends JsonResource
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
            'bankAccountNumber' => $this->bankAccountNumber,
            'taxPayerName' => $this->taxPayerName,
            'postalCode' => $this->postalCode,
            'city' => $this->city,
            'streetName' => $this->streetName,
            'publicPlaceCategory' => $this->publicPlaceCategory,
            'number' => $this->number,
            'additionalAddressDetail' => $this->additionalAddressDetail
        ];
    }
}
