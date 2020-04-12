<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, SparkPost and others. This file provides a sane default
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

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],


    'google' => [
        'client_id'     => '74098032933-8g54h7sqs05gkchrbbt6sl7at2up08vf.apps.googleusercontent.com',
        'client_secret' => 'U_dJRTmiucup4EbskhJHv-Ls',
        'redirect'      => 'http://localhost:8000/auth/google/callback',
    ],


    'github' => [
        'client_id' => 'a70a7b135c1f24208ab2',
        'client_secret' => '270ecb8acab5d26313222addf4dcbd812acbaece',
        'redirect' => 'http://127.0.0.1:8000/callback/github',
    ],

];
