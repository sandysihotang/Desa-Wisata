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
        'client_id' => '454615045510198',
        'client_secret' => 'd727e0b09665beb50c79699f10cbdad4',
        'redirect' => 'https://desawisatalumbanbulbul.com/login/facebook/callback',
    ],
    'google' => [
        'client_id' => '747101180961-10shminjd489c4ba457scf7db4gshotb.apps.googleusercontent.com',
        'client_secret' => 'EBeKPxpfmsef31QHFXKQn7sy',
        'redirect' => 'https://desawisatalumbanbulbul.com/login/google/callback',
    ],

];
