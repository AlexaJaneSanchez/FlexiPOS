<?php

namespace App\Service;

use App\Interface\Service\StripeServiceInterface;
use Illuminate\Support\Facades\Http;

class StripeService implements StripeServiceInterface
{
    public function createPayment(object $payload)
    {
        //if the payload is basic then the value of plan is the basic price id.
        //If payload is pro, the value of plan is the pro price id.
        $plan = ($payload->plan === 'basic') ? config('stripe.basic_price') : config('stripe.pro_price');

        $response = Http::withBasicAuth(config('stripe.secret_key'), '')
            ->asForm()
            ->post('https://api.stripe.com/v1/checkout/sessions', [
                'success_url' => 'http://localhost:3000/success',
                'cancel_url' => 'http://localhost:3000/cancel',
                'line_items[0][price]' => $plan,
                'line_items[0][quantity]' => 1,
                'mode' => 'subscription'
            ]);

        return $response;
    }

    public function verifyPayment(object $payload)
    {
        //
    }
}
