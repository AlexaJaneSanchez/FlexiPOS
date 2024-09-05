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
            'productcategory' => 'required',
            'productname' => 'required',
            'brandname' => 'required',
            'supplierid' => 'required',
            'wholesaleunit' => ['required', 'decimal:1,8'],
            'retailunit' => ['required', 'decimal:1,8'],
            'retailqtyperwholesaleunit' => 'required',
            'reorderpoint' => 'required',
            'markup' => 'required',
            'isactive' => 'required',
            'quantityonhand' => ['required', 'integer'],
        ];
    }
}
