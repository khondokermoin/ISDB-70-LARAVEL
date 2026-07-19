<?php

return [
    'store_id'       => env('SSLCZ_STORE_ID', 'testbox'),
    'store_password' => env('SSLCZ_STORE_PASSWORD', 'qwerty'),
    'sandbox'        => env('SSLCZ_SANDBOX', true),

    'api_url' => env('SSLCZ_SANDBOX', true)
        ? env('SSLCZ_SANDBOX_API', 'https://sandbox.sslcommerz.com')
        : env('SSLCZ_LIVE_API', 'https://securepay.sslcommerz.com'),

    // Endpoints
    'session_endpoint'    => '/gwprocess/v4/api.php',
    'validation_endpoint' => '/validator/api/validationserverAPI.php',
    'refund_endpoint'     => '/validator/api/merchantTransIDvalidationAPI.php',

    // Callback route names (must match routes/web.php)
    'success_url' => '/payment/success',
    'fail_url'    => '/payment/fail',
    'cancel_url'  => '/payment/cancel',
    'ipn_url'     => '/payment/ipn',
];
