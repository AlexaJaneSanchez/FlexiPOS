<?php

namespace App\Repository;

use App\Interface\Repository\CustomerRepositoryInterface;
use App\Models\Customers;

class CustomerRepository implements CustomerRepositoryInterface
{
    public function findMany()
    {
        return Customers::all();
    }

    public function findOne(int $id)
    {
        return Customers::findOrFail($id);
    }

    public function create(object $payload)
    {
        $customer = new Customers();
        $customer->firstname = $payload->firstname;
        $customer->lastname = $payload->lastname;
        $customer->email = $payload->email;
        $customer->phonenumber = $payload->phonenumber;
        $customer->isactive = $payload->isactive;
        $customer->save();

        return $customer->fresh();
    }

    public function update(object $payload, int $id)
    {
        $customer = Customers::findOrFail($id);
        $customer->firstname = $payload->firstname;
        $customer->lastname = $payload->lastname;
        $customer->email = $payload->email;
        $customer->phonenumber = $payload->phonenumber;
        $customer->isactive = $payload->isactive;
        $customer->save();

        return $customer->fresh();
    }

    public function delete(int $id)
    {
        $customer = Customers::findOrFail($id);

        $customer->delete();

        return true;
    }
}
