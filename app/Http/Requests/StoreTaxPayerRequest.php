<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreTaxPayerRequest extends FormRequest
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
            'communityVatNumber' => ['nullable', 'string', 'max:20'],
            'individualExemption' => ['boolean'],
            'incorporation' => [
                Rule::in(['', 'ORGANIZATION', 'SELF_EMPLOYED', 'TAXABLE_PERSON'])
            ],
            'taxPayerVatStatus' => [
                'required',
                Rule::in(['DOMESTIC', 'PRIVATE_PERSON', 'OTHER'])
            ],
            'bankAccountNumber' => ['required', 'string', 'min:16', 'max:255'],
            'taxPayerName' => ['required', 'string', 'max:512'],
            'postalCode' => ['required', 'string', 'min:4', 'max:10'],
            'city' => ['required', 'string', 'max:255'],
            'streetName' => ['required', 'string', 'max:255'],
            'publicPlaceCategory' => ['nullable', 'required', 'string', 'max:50'],
            'number' => ['nullable', 'string', 'max:50'],
            'additionalAddressDetail' => ['nullable', 'string', 'max:255'],
            'groupMemberTaxNumber->taxpayerId' => ['nullable', 'string', 'min:8', 'max:8'],
            'groupMemberTaxNumber->vatCode' => ['nullable', 'string', 'max:1'],
            'groupMemberTaxNumber->countyCode' => ['nullable', 'string', 'min:2', 'max:2'],
            'taxNumber->taxpayerId' => ['nullable', 'string', 'min:8', 'max:8', 'unique:tax_numbers,taxpayerId'],
            'taxNumber->vatCode' => ['nullable', 'string', 'max:1'],
            'taxNumber->countyCode' => ['nullable', 'string', 'min:2', 'max:2'],
        ];
    }
}
