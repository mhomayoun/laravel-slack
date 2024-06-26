<?php

return [
    /*
     * Bot OAuth Access from Slack App
     */
    'bot-token' => env('SLACK_BOT_TOKEN', null),

    /*
     * Bot User OAuth Access from Slack App
     */
    'bot-user-token' => env('SLACK_BOT_USER_TOKEN', null),

    /*
     * Verification token from Slack App
     */
    'verification_token' => env('SLACK_VERIFICATION_TOKEN', null),

    /*
     * Route middleware for Slack handlers
     */
    'middleware' => [
        \Pdffiller\LaravelSlack\VerifySlackToken::class,
    ],
    
    /*
     * Handlers are processed by controller
     */
    'handlers' => [
    ],

    /*
     * Endpoint URL
     */
    'endpoint-url' => 'slack/handle'
];
