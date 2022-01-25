<?php

return [

    'limit_requests_per_hour' => env('LIMIT_REQUEST_PER_HOUR', 10),

    'content_types' => [
        'application/json',
        'application/vnd.api+json',
        'application/xml',
        'text/csv'
    ],

    'per_page' => 12,
];
