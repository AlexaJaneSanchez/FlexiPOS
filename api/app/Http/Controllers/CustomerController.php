<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerStoreRequest;
use App\Http\Requests\CustomerUpdateRequest;
use App\Interface\Service\CustomerServiceInterface;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    private $customerService;

    public function __construct(CustomerServiceInterface $customerService)
    {
        $this->customerService = $customerService;
    }

    public function index()
    {
        return $this->customerService->findCustomers();
    }

    public function show(int $customerID)
    {
        return $this->customerService->findCustomerById($customerID);
    }

    public function store(CustomerStoreRequest $request)
    {
        return $this->customerService->createCustomer($request);
    }

    public function update(CustomerUpdateRequest $request, int $customerid)
    {
        return $this->customerService->updateCustomer($request, $customerid);
    }

    public function destroy(int $customerID)
    {
        return $this->customerService->removeCustomer($customerID);
    }
}
