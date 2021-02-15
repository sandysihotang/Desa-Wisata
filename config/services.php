<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],
    'facebook' => [
        'client_id' => '410740733452846',
        'client_secret' => '60bb9b3a4ab608958adeeabfa130ae32',
        'redirect' => 'https://desawisatajanggadolok.com/login/facebook/callback',
    ],
    'google' => [
        'client_id' => '747101180961-o03u0ms8vj4k0s7e9gt296ve09g44r3j.apps.googleusercontent.com',
        'client_secret' => 'nYQoZgeaEjEgnyqOUHKP2dnd',
        'redirect' => 'https://desawisatajanggadolok.com/login/google/callback',
    ],

];
