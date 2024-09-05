<?php

namespace App\Interface\Service;

interface PaymentDetailServiceInterface
{
    public function findPaymentDetails();

    public function findPaymentDetailById(int $id);

    public function createPaymentDetails(object $payload);

    public function updatePaymentDetails(object $payload, int $id);

    public function removePaymentDetails(int $id);
}
