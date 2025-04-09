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

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'resend' => [
        'key' => env('RESEND_KEY'),
    ],

    'slack' => [
        'notifications' => [
            'bot_user_oauth_token' => env('SLACK_BOT_USER_OAUTH_TOKEN'),
            'channel' => env('SLACK_BOT_USER_DEFAULT_CHANNEL'),
        ],
    ],
    
    // Add these to your existing services config
    'youtube' => [
        'api_key' => env('YOUTUBE_API_KEY'),
        'playlist_id' => env('YOUTUBE_PLAYLIST_PARENT_GAMES_ID', 'PLAZ_7tdhbxkE94Fk22PNGilqsdPSJ0m4K'),
        // 'music_playlist_id' => env('YOUTUBE_PLAYLIST_MUSIC_ID', 'PLU1E9f2XmDpYV-VhesvHLOjOJ1uaaMBpz'),
        'music_playlist_id' => env('YOUTUBE_PLAYLIST_MUSIC_ID', 'PLDuxenf8jCsRcvTwh0HHSUAWm_3y_m6q1'),
        'math_playlist_id' => env('YOUTUBE_PLAYLIST_MATH_ID', 'PLDuxenf8jCsTWON3HdC0E2dvPXPNy-lzP'),
        'science_playlist_id' => env('YOUTUBE_PLAYLIST_SCIENCE_ID', 'PLDuxenf8jCsRVC0Coqa8kY3L4Kl99aaZI'),
        'featured_playlist_id' => env('YOUTUBE_PLAYLIST_FEATURED_ID', 'PLDuxenf8jCsQEXNcAa9QHOQwCpkgq6War'),
    ], 

];
