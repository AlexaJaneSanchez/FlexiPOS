<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SupplierResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'supplierID' => $this->supplierID,
            'supplierName' => $this->supplierName,
            'productName' => $this->productName,
            'address' => $this->address,
            'Telephone1' => $this->Telephone1,
            'Telephone2' => $this->Telephone2,
            'isactive' => $this->isactive,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
