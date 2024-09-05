<?php

namespace App\Interface\Repository;

interface CustomerReturnDetailRepositoryInterface
{
    public function findMany();

    public function findOne(int $id);

    public function create(object $payload);

    public function update(object $payload, int $id);

    public function delete(int $id);
}
