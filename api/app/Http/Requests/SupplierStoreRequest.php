<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SupplierStoreRequest extends FormRequest
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
            'supplierName' => 'required|string|max:255',
            'productName' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'Telephone1' => 'required|string|max:255',
            'Telephone2' => 'nullable|string|max:255', // Optional field
            'isactive' => 'required|boolean', // Assuming isactive is a boolean field
        ];
    }
}
