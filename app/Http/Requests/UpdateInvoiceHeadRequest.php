<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateInvoiceHeadRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'lineDescription' => ['required', 'string', 'max:512'],
            'lineNatureIndicator' => [
                'required',
                Rule::in('PRODUCT', 'SERVICE', 'OTHER')
            ],
            'quantity' => ['required', 'numeric'],
            'unitOfMeasure' => ['PIECE', 'HOUR', 'PACKAGE', 'OTHER'],
            'unitPrice' => ['required', 'numeric'],
            'lineNetAmount' => ['required', 'numeric'],
            'vatPercentage' => ['required', 'numeric'],
            'lineVatAmount' => ['required', 'numeric'],
            'lineGrossAmount' => ['required', 'numeric'],
        ];
    }
}
