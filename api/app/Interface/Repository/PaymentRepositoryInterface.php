<?php

namespace App\Interface\Repository;

interface PaymentRepositoryInterace
{
    public function findMany();

    public function findOne(int $id);

    public function create(object $payload);
}
