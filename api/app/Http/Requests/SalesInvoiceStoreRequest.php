<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SalesInvoiceStoreRequest extends FormRequest
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
            'branchno' => 'required',
            'salesinvoicerefno' => 'required',
            'sales_orderid' => 'required',
            'invoicedate' => 'required',
            'customerno' => 'required',
            'userno' => 'required',
            'iscancelled' => 'required',
            'cancelledby' => 'required',
            'preparedby' => 'required',
            'approvedby' => 'required',
            'isapprovedby' => 'required',
            'remarks' => 'required',
        ];
    }
}
