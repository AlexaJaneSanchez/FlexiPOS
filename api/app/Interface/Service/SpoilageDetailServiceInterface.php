<?php

namespace App\Interface\Service;

interface SpoilageDetailServiceInterface
{
    public function findSpoilageDetails();

    public function findSpoilageDetailById(int $id);

    public function createSpoilageDetails(object $payload);

    public function updateSpoilageDetails(object $payload, int $id);

    public function removeSpoilageDetails(int $id);
}
