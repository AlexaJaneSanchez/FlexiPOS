<?php

namespace App\Interface\Service;

interface PaymentServiceInterface
{
    public function findPayments();

    public function findPaymentsById(int $id);

    public function createPayments(object $payload);

    public function updatePayments(object $payload, int $id);

    public function removePayments(int $id);
}
