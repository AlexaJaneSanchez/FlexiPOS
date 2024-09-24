<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends FormRequest
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
            'productcategory' => 'required|string|max:255',
            'productname' => 'required|string|max:255',
            'brandname' => 'required|string|max:255',
            'wholesaleunit' => 'required|numeric|between:0,99999999999.99',  // Adjusted for decimal(15,2)
            'retailunit' => 'required|numeric|between:0,99999999999.99',     // Adjusted for decimal(15,2)
            'retailqtyperwholesaleunit' => 'required|integer',
            'reorderpoint' => 'required|integer',
            'markup' => 'required|numeric|between:0,99999.99',               // Adjusted for decimal(5,2)
            'isactive' => 'required|boolean',
            'quantityonhand' => 'required|integer',
        ];
    }
}
