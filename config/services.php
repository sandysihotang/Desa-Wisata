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
        'client_id' => '765230887358276',
        'client_secret' => 'c329ad043a4525e6c613c205a577e224',
        'redirect' => 'https://desawisata.xyz/login/facebook/callback',
    ],
    'google' => [
        'client_id' => '747101180961-f9ev201qggntlel5i8i6827939jrjdbh.apps.googleusercontent.com',
        'client_secret' => 'w4yIHTn1yB64k76_UAlcmnKn',
        'redirect' => 'https://desawisata.xyz/login/google/callback',
    ],

];
