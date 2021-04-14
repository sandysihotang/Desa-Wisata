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
        'client_id' => '2806551929620726',
        'client_secret' => '4cc7fb768584e8eb1ee734560b85e7a1',
        'redirect' => 'https://desawisatamarbuntoruan.com/login/facebook/callback',
    ],
    'google' => [
        'client_id' => '747101180961-o72msgpv0ketco4c04p90rrv5d1b916s.apps.googleusercontent.com',
        'client_secret' => 'E4o5KNRlIfiPmL8OtEryGE8u',
        'redirect' => 'https://desawisatamarbuntoruan.com/login/google/callback',
    ],

];
