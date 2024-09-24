<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SalesInvoiceDetaiLStoreRequest extends FormRequest
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
            'sales_invoiceid' => 'required',
            'productid' => 'required',
            'quantitysold' => 'required',
            'unitprice' => 'required',
            'discounts' => 'required',
            'taxamount' => 'required',
            'totalamount' => 'required',
        ];
    }
}
