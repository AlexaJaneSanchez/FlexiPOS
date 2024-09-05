<?php

namespace App\Interface\Service;

interface InventoryADjustmentDetailServiceInterface
{
    public function findInventoryAdjustmentDetails();

    public function findInventoryAdjustmentDetailById(int $id);

    public function createInventoryAdjustmentDetail(object $payload);

    public function updateInventoryAdjustmentDetail(object $payload, int $id);

    public function removeInventoryAdjustmentDetail(int $id);
}
