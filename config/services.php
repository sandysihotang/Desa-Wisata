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
        'client_id' => '414496779587466',
        'client_secret' => '2789eb92edca867c1c2f0676b1cfcf98',
        'redirect' => 'https://desawisatatigarihit.com/login/facebook/callback',
    ],
    'google' => [
        'client_id' => '747101180961-roqimm3vjd4o1772726jt7k5cdt49g8k.apps.googleusercontent.com',
        'client_secret' => 'xrpHuf4TA57hznjxssIfyGwM',
        'redirect' => 'https://desawisatatigarihit.com/login/google/callback',
    ],

];
