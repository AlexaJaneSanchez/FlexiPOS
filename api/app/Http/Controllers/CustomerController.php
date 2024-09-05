<?php

namespace App\Http\Controllers;

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

    public function show() {}

    public function store() {}

    public function update() {}

    public function destroy() {}
}
