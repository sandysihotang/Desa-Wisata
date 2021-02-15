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
        'client_id' => '417777199401483',
        'client_secret' => '2f6767bcc363437d36740f942a705247',
        'redirect' => 'https://desawisatatipang.com/login/facebook/callback',
    ],
    'google' => [
        'client_id' => '747101180961-vp56uthi60pcadmldu4jnmsgklqb1le4.apps.googleusercontent.com',
        'client_secret' => 'C7iuQsZSECGBuzguMnUXs1v0',
        'redirect' => 'https://desawisatatipang.com/login/google/callback',
    ],

];
