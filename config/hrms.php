<?php

return [

    'event' => [
        'status' => ['inactive', 'active', 'listed'],
    ],
    'payment_status' => ['pending', 'failed', 'success', 'refunded'],
    'stripe_secret' => env('STRIPE_SECRET'),
    'week' => [
        'names' => ['sunday', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday']
    ]
];