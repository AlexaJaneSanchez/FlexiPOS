<?php

namespace App\Interface\Service;

interface SalesOrderServiceInterface
{
    public function findSalesOrders();

    public function findSalesOrderById(int $id);

    public function createSalesOrder(object $payload);

    public function updateSalesOrder(object $payload, int $id);

    public function removeSalesOrder(int $id);
}
