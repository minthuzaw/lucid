<?php

return [
    'default' => env('SMS_DRIVER', 'smspoh'),

    'drivers' => [
        'smspoh' => [
            'base_url' => env('SMSPOH_BASE_URL', 'https://smspoh.com/api/v2'),
            'token' => env('SMSPOH_TOKEN', 'f6FGHP-8Qi70Z9uEnUL2EOtYv8JGQGKt4_UaIqyxkt4Grm3J_Vo6k5Lwjj8kWGBU'),
        ],
    ],

    "sender" => env("SMS_SENDER", env("APP_NAME", "Onenex")),
];
