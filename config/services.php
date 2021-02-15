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
        'client_id' => '413195193192334',
        'client_secret' => '0147f5232a062954619d9d3b441c1baf',
        'redirect' => 'https://desawisatasigapiton.com/login/facebook/callback',
    ],
    'google' => [
        'client_id' => '747101180961-af08l3333bfs32hg9q3v83utleqj5qgo.apps.googleusercontent.com',
        'client_secret' => 'X1GfGrTFrvh5Fl5hu4oLH8J6',
        'redirect' => 'https://desawisatasigapiton.com/login/google/callback',
    ],

];
