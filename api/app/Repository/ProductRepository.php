<?php

namespace App\Repository;

use App\Interface\Repository\ProductRepositoryInterface;
use App\Models\Product;

class ProductRepository implements ProductRepositoryInterface
{
    public function findMany()
    {
        return Product::all();
    }
    public function findOne(int $id)
    {
        return Product::findOrFail($id);
    }

    public function create(object $payload)
    {
        $product = new Product();
        $product->productcategory = $payload->productcategory;
        $product->productname = $payload->productname;
        $product->brandname = $payload->brandname;
        $product->wholesaleunit = $payload->wholesaleunit;
        $product->retailunit = $payload->retailunit;
        $product->retailqtyperwholesaleunit = $payload->retailqtyperwholesaleunit;
        $product->reorderpoint = $payload->reorderpoint;
        $product->markup = $payload->markup;
        $product->isactive = $payload->isactive;
        $product->quantityonhand = $payload->quantityonhand;
        $product->save();

        return $product->fresh();
    }

    public function update(object $payload, int $id)
    {
        $product = Product::findOrFail($id);
        $product->productcategory = $payload->productcategory;
        $product->productname = $payload->productname;
        $product->brandname = $payload->brandname;
        $product->wholesaleunit = $payload->wholesaleunit;
        $product->retailunit = $payload->retailunit;
        $product->retailqtyperwholesaleunit = $payload->retailqtyperwholesaleunit;
        $product->reorderpoint = $payload->reorderpoint;
        $product->markup = $payload->markup;
        $product->isactive = $payload->isactive;
        $product->quantityonhand = $payload->quantityonhand;
        $product->save();

        return $product->fresh();
    }

    public function delete(int $id)
    {
        $product = Product::findOrFail($id);

        $product->delete();

        return true;
    }
}
