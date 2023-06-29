<?php

use Pdffiller\LaravelSlack\VerifySlackToken;

use Illuminate\Support\Facades\Config;
/*
 * Slack app interaction
 */
Route::group([
    'middleware' => [VerifySlackToken::class],
], function () {
    $config = Config::get('laravel-slack-plugin');
    if (!$config || !isset($config['endpoint-url'])) {
        return;
    }
    Route::post($config['endpoint-url'], 'Pdffiller\LaravelSlack\HandleRequestController@handle');
});
