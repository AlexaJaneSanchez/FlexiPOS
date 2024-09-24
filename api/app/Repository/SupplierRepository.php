<?php

namespace App\Repository;

use App\Interface\Repository\SupplierRepositoryInterface;
use App\Models\Supplier;

class SupplierRepository implements SupplierRepositoryInterface
{
    public function findMany()
    {
        return Supplier::all();
    }

    public function findOne(int $id)
    {
        return Supplier::findOrFail($id);
    }

    public function create(object $payload)
    {
        $supplier = new Supplier();
        $supplier->supplierName = $payload->supplierName;
        $supplier->productName = $payload->productName;
        $supplier->address = $payload->address;
        $supplier->Telephone1 = $payload->Telephone1;
        $supplier->Telephone2 = $payload->Telephone2;
        $supplier->isactive = $payload->isactive;
        $supplier->save();

        return $supplier->fresh();
    }

    public function update(object $payload, int $id)
    {
        $supplier = Supplier::findOrFail($id);
        $supplier->supplierName = $payload->supplierName;
        $supplier->productName = $payload->productName;
        $supplier->address = $payload->address;
        $supplier->Telephone1 = $payload->Telephone1;
        $supplier->Telephone2 = $payload->Telephone2;
        $supplier->isactive = $payload->isactive;
        $supplier->save();

        return $supplier->fresh();
    }

    public function delete(int $id)
    {
        $supplier = Supplier::findOrFail($id);

        $supplier->delete();

        return true;
    }
}
