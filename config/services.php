<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

// For facebook login
    'facebook' => [
    'client_id' => '1780655762225656', 
    'client_secret' => 'c34b632cbc3bf9548984f3b923897a42', 
    'redirect' => 'http://sol.nepallawyer.com/login/facebook/callback',
    ],

// For google login
    'google' => [
    // 'client_id' => '626263880105-ea48fs1rp9nqv17c9043vqs26603ecpl.apps.googleusercontent.com',
    'client_id' => '626263880105-r7jan1jg3rrm2731d2lud40b81vgrnj6.apps.googleusercontent.com',
    // 'client_secret' => '6eBRQtSc1PvliYFQNPBsEnjp',
    'client_secret' => 'PToWljC8j11AXv0hiamM6Xb-', 
    'redirect' => 'http://sol.nepallawyer.com/login/google/callback',
    ],

];
