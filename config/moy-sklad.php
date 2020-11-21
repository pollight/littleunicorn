<?php

return [
    'auth' => [
        'login' => env('MOY_SKLAD_LOGIN', 'login'),
        'password' => env('MOY_SKLAD_PASSWORD', 'password'),
    ],
    'image' => [
      'download_path' => 'products/',
       'name_disk' => 'public',
    ],
    'product' => [
        'paginate' => 32
    ],
];