<?php
return [
    'admin_user' => env('ADMIN_USER'),
    'admin_pass' => env('ADMIN_PASS'),

    'wa' => [
        'driver'        => env('WA_DRIVER', 'fonnte'),
        'admin'         => env('WA_ADMIN_NUMBER'),
        'fonnte_token'  => env('FONNTE_TOKEN'),
    ],
];