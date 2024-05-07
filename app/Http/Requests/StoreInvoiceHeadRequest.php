<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreInvoiceHeadRequest extends FormRequest
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
            /*'invoiceCategory' => [
                Rule::in('NORMAL', 'SIMPLIFIED')
            ],*/
            'invoiceDetail->invoiceDeliveryDate' => ['required','date'],
            'invoiceDetail->paymentDate' => ['required', 'date'],
            'invoiceDetail->paymentMethod' => [
                'required',
                Rule::in( ['TRANSFER', 'CASH', 'CARD', 'VOUCHER'])
            ],
            //'currencyCode' => ['string'],
            //'exchangeRate' => ['numeric'],
            //'smallBusinessIndicator' => ['boolean'],
            'invoiceDetail->invoiceNetAmount' => ['required', 'numeric'],
            'invoiceDetail->invoiceVatAmount' => ['required', 'numeric'],
            'invoiceDetail->invoiceGrossAmount' => ['required', 'numeric'],
            'invoiceNumber' => ['required', 'string', 'max:50', 'unique:invoice_heads,invoiceNumber'],
            'invoiceIssueDate' => ['required', 'date'],
            'supplierTP' => ['required'],
            'customerTP' => ['required']
        ];
    }
}
