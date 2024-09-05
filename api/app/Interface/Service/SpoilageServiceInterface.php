<?php

namespace App\Interface\Service;

interface SpoilageServiceInterface
{
    public function findSpoilages();

    public function findSpoilageById(int $id);

    public function createSpoilage(object $payload);

    public function updateSpoilage(object $payload, int $id);

    public function removeSpoilage(int $id);
}
