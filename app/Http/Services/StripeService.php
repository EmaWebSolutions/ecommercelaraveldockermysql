<?php

namespace App\Http\Services;

use App\Traits\ConsumesExternalServices;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Log;


class StripeService
{
    use ConsumesExternalServices;


    protected $key;
    protected $secret;

    public function __construct()
    {
       
        $this->key = config('services.stripe.key');
        $this->secret = config('services.stripe.secret');
    }

    public function resolveAuthorization(&$queryParams, &$formParams, &$headers)
    {
        $headers['Authorization'] = $this->resolveAccessToken();
    }

    public function decodeResponse($response)
    {
        return json_decode($response);
    }

    public function resolveAccessToken()
    {
        return "Bearer {$this->secret}";
    }

    public function handlePayment($value, $currency, $payment_method)
    {
        try {
            $intent = $this->createIntent($value, $currency, $payment_method);

            session()->put('paymentIntentId', $intent->id);

            return redirect()->route('approval');
        } catch (Exception $e) {

    // Handle any exceptions thrown during the payment process
    // You can log the error or take appropriate action
    Log::error('Payment processing error: ' . $e->getMessage());
    return redirect()->back()->with('error', 'Payment could not be processed. Please try again later.');
}

        }
    

    public function handleApproval()
    {
        $data = ['success' => false, 'amount' => '', 'message' => 'We cannot capture the payment. Please try again!'];
        if (session()->has('paymentIntentId')) {
            $paymentIntentId = session()->get('paymentIntentId');

            try {
                $confirmation = $this->confirmPayment($paymentIntentId);

                if ($confirmation->status === 'requires_action') {
                    $clientSecret = $confirmation->client_secret;

                    return view('stripe.3d-secure')->with([
                        'clientSecret' => $clientSecret,
                    ]);
                }

                if ($confirmation->status === 'succeeded') {
                    $name = $confirmation->charges->data[0]->billing_details->name;
                    $currency = strtoupper($confirmation->currency);
                    $amount = $confirmation->amount / $this->resolveFactor($currency);

                    $data['success'] = true;
                    $data['amount'] = $amount;
                    $data['message'] = 'Payment Successful!';
                }
            } catch (Exception $e) {
                // Handle any exceptions thrown during the approval process
                // You can log the error or take appropriate action
    $data['message'] = 'Payment approval failed. Please try again later. Error: ' . $e->getMessage();        
        }
        }

        return $data;
    }

    public function createIntent($value, $currency, $paymentMethod)
    {
        try {
            return $this->makeRequest(
                'POST',
                'https://api.stripe.com/v1/payment_intents',
                [],
                [
                    'amount' => round($value * $this->resolveFactor($currency)),
                    'currency' => strtolower($currency),
                    'payment_method' => $paymentMethod,
                    'confirmation_method' => 'manual',
                ]
            );
        } catch (GuzzleException $e) {
            // Handle Guzzle HTTP request exceptions here
            // You can log the error or throw a custom exception if needed
            throw new Exception('HTTP Request Failed: ' . $e->getMessage());
        }
    }

    public function confirmPayment($paymentIntentId)
    {
        try {
            return $this->makeRequest(
                'POST',
                "https://api.stripe.com/v1/payment_intents/{$paymentIntentId}/confirm"
            );
        } catch (GuzzleException $e) {
            // Handle Guzzle HTTP request exceptions here
            // You can log the error or throw a custom exception if needed
            throw new Exception('HTTP Request Failed: ' . $e->getMessage());
        }
    }

    public function resolveFactor($currency)
    {
        $zeroDecimalCurrencies = ['JPY'];

        if (in_array(strtoupper($currency), $zeroDecimalCurrencies)) {
            return 1;
        }
        return 100;
    }
}
