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
        'client_id' => '181189731942277',
        'client_secret' => '63479da06065b0f6ef2b60e677ab12c2',
        'redirect' => 'https://www.names4muslims.com/access/facebook',
    ],
    'twitter' => [
        'client_id' => 'fsFl2oNvCs5L3tJZTkthMmdbi',
        'client_secret' => 'QmX6vsJ0yECIZ5Mb7W4blVPAbo4HPszmDm3syxy1oSRk8zYx7s',
        'redirect' => 'https://www.names4muslims.com/access/twitter',
    ],
    'google' => [
        'client_id' => '142875498123-1h45vgmj1dhads1evnov9kokqsjhsn0o.apps.googleusercontent.com',
        'client_secret' => '_p7QF3GoxVJbGPufBjJmWz3O',
        'redirect' => 'https://www.names4muslims.com/access/google',
    ],

];
