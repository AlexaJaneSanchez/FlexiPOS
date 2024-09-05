<?php

namespace App\Interface\Service;

interface CustomerReturnDetailServiceInterface
{
    public function findCustomerReturnDetails();

    public function findCustomerReturnDetailsById(int $id);

    public function createCustomerReturnDetails(object $payload);

    public function updateCustomerReturnDetails(object $payload, int $id);

    public function removeCustomerReturnDetails(int $id);
}
