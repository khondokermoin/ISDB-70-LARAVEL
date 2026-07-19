<?php

namespace App\Services;

use App\Models\Order;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class SslCommerzService
{
    protected string $storeId;
    protected string $storePassword;
    protected string $apiUrl;

    public function __construct()
    {
        $this->storeId       = config('sslcommerz.store_id');
        $this->storePassword = config('sslcommerz.store_password');
        $this->apiUrl        = config('sslcommerz.api_url');
    }

    /**
     * Initiate a payment session with SSLCommerz sandbox and return the
     * gateway redirect URL (GatewayPageURL).
     */
    public function initiatePayment(Order $order): array
    {
        $postData = [
            'store_id'    => $this->storeId,
            'store_passwd'=> $this->storePassword,
            'total_amount'=> number_format((float) $order->total_amount, 2, '.', ''),
            'currency'    => 'BDT',
            'tran_id'     => $order->tran_id,

            'success_url' => route('payment.success'),
            'fail_url'    => route('payment.fail'),
            'cancel_url'  => route('payment.cancel'),
            'ipn_url'     => route('payment.ipn'),

            // Customer information
            'cus_name'    => $order->customer_name,
            'cus_email'   => $order->customer_email,
            'cus_add1'    => $order->shipping_address,
            'cus_city'    => $order->city ?? 'Dhaka',
            'cus_postcode'=> $order->postcode ?? '1000',
            'cus_country' => $order->country ?? 'Bangladesh',
            'cus_phone'   => $order->customer_phone,

            // Shipment information (required by SSLCommerz API even if same as customer)
            'shipping_method' => 'Courier',
            'ship_name'    => $order->customer_name,
            'ship_add1'    => $order->shipping_address,
            'ship_city'    => $order->city ?? 'Dhaka',
            'ship_postcode'=> $order->postcode ?? '1000',
            'ship_country' => $order->country ?? 'Bangladesh',

            // Product information
            'product_name'     => 'Order #' . $order->order_number,
            'product_category' => 'General',
            'product_profile'  => 'general',

            'value_a' => $order->order_number, // custom reference passed back on callbacks
        ];

        $response = Http::asForm()->post(
            $this->apiUrl . config('sslcommerz.session_endpoint'),
            $postData
        );

        $result = $response->json();

        if (($result['status'] ?? null) === 'SUCCESS') {
            return [
                'success' => true,
                'gateway_url' => $result['GatewayPageURL'],
                'session_key' => $result['sessionkey'] ?? null,
                'raw' => $result,
            ];
        }

        Log::error('SSLCommerz session init failed', $result ?? []);

        return [
            'success' => false,
            'message' => $result['failedreason'] ?? 'Unable to initiate SSLCommerz session.',
            'raw' => $result,
        ];
    }

    /**
     * Validate a transaction server-side against SSLCommerz's Validation API.
     * This MUST be called before trusting a success/IPN callback, since the
     * success_url redirect alone can be spoofed by a malicious client.
     */
    public function validateTransaction(string $valId): array
    {
        $response = Http::get($this->apiUrl . config('sslcommerz.validation_endpoint'), [
            'val_id'        => $valId,
            'store_id'      => $this->storeId,
            'store_passwd'  => $this->storePassword,
            'format'        => 'json',
        ]);

        $result = $response->json();

        $valid = isset($result['status'])
            && in_array($result['status'], ['VALID', 'VALIDATED']);

        return [
            'valid' => $valid,
            'data' => $result,
        ];
    }
}
