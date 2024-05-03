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
            'invoiceCategory' => [
                Rule::in('NORMAL', 'SIMPLIFIED')
            ],
            'invoiceDeliveryDate' => ['required','date'],
            'paymentDate' => ['required', 'date'],
            'paymentMethod' => [
                'required',
                Rule::in( ['TRANSFER', 'CASH CARD', 'VOUCHER'])
            ],
            'currencyCode' => ['string'],
            'exchangeRate' => ['numeric'],
            //'smallBusinessIndicator' => ['boolean'],
            'invoiceNetAmount' => ['required', 'numeric'],
            'invoiceVatAmount' => ['required', 'numeric'],
            'invoiceGrossAmount' => ['required', 'numeric'],
            'invoiceNumber' => ['required', 'string', 'max:50', 'unique:invoice_heads,invoiceNumber'],
            'invoiceIssueDate' => ['required'],
            //'communityVatNumber' => ['string', 'min:0', 'max:20'],
            //'individualExemption' => ['boolean'],
            'incorporation' => [
                Rule::in(['', 'ORGANIZATION', 'SELF_EMPLOYED', 'TAXABLE_PERSON'])
            ],
            'taxPayerVatStatus' => [
                'required',
                Rule::in(['DOMESTIC', 'PRIVATE_PERSON', 'OTHER'])
            ],
            'bankAccountNumber' => ['required', 'string', 'max:255', 'unique:tax_payers,bankAccountNumber'],
            'taxPayerName' => ['required', 'string', 'max:512'],
            'postalCode' => ['required', 'string', 'max:10'],
            'city' => ['required', 'string', 'max:255'],
            'streetName' => ['required', 'string', 'max:255'],
            'publicPlaceCategory' => ['required', 'string', 'max:50'],
            'number' => ['string', 'max:50'],
            //'additionalAddressDetail' => ['string', 'max:255'],
            //'groupMemberTaxNumber->taxpayerId' => ['string', 'min:8', 'max:8'],
            //'groupMemberTaxNumber->vatCode' => ['string', 'max:1'],
            //'groupMemberTaxNumber->countyCode' => ['string', 'min:2', 'max:2'],
            'taxNumber->taxpayerId' => ['string', 'min:8', 'max:8', 'unique:tax_numbers,taxpayerId'],
            'taxNumber->vatCode' => ['string', 'max:1'],
            'taxNumber->countyCode' => ['string', 'min:2', 'max:2'],
            'supplierName' => ['required', 'string', 'max:512'],
            'customerName' => ['required', 'string', 'max:512']
        ];
    }
}
