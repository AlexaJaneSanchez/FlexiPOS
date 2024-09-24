<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'productID' => $this->productID, // Adjusted to match your database column name
            'productcategory' => $this->productcategory,
            'productname' => $this->productname,
            'brandname' => $this->brandname,
            'wholesaleunit' => $this->wholesaleunit,
            'retailunit' => $this->retailunit,
            'retailqtyperwholesaleunit' => $this->retailqtyperwholesaleunit,
            'reorderpoint' => $this->reorderpoint,
            'markup' => $this->markup,
            'isactive' => $this->isactive,
            'quantityonhand' => $this->quantityonhand,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
