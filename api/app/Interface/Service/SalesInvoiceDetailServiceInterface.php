<?php

namespace App\Interface\Service;

interface SalesInvoiceDetailServiceInterface
{
    public function findSalesInvoiceDetails();

    public function findSalesInvoiceDetailById(int $id);

    public function createSalesInvoiceDetails(object $payload);

    public function updateSalesInvoiceDetails(object $payload, int $id);

    public function removeSalesInvoiceDetails(int $id);
}
