<?php

return [
    'auth' => [
        'serName' => env('SBER_USER', 'littleunicorn-api'),
        'password' => env('SBER_PASS', 'TECH01sber'),
    ],
    'page' =>[
        'returnUrl' => env('SBER_RETURN_URL', 'http://unicorn/order/pay/success'),
        'failUrl' => env('SBER_FAIL_URL', 'http://unicorn/order/pay/error'),
    ],
];