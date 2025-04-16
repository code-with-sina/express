<?php

return [
    /*
     * The Facebook Pixel id, should be a code that looks something like "XXXXXXXXXXXXXXXX".
     */
    'facebook_pixel_id' => env('FACEBOOK_PIXEL_ID', '1977572736031091'),

    /*
     * The key under which data is saved to the session with flash.
     */
    'sessionKey' => env('FACEBOOK_PIXEL_SESSION_KEY', config('app.name').'_facebookPixel'),

    /*
     * To use the Conversions API, you need an access token. For Documentation please see: https://developers.facebook.com/docs/marketing-api/conversions-api/get-started
     */
    'token' => env('FACEBOOK_PIXEL_TOKEN', 'EAAPaU44veDEBOzfyTkwR5ZCHcS6CvlZB8y2UZBCFKfYc6vt0KpzJgIktODtBwOhI3H4xppHLZB0nGJihOgRW3RjemIe9v9OrL8PktS27erOZB8yVscyHEm7wUXhRZCK5n3qi2XCygM7Nz0GGy2e6O1h9Nl764AYNEojARMZBHfD7ulnzYVMB4M2eAuZC8aqrubax9gZDZD'), //Only if you plan using Conversions API for server events

    /*
     * Enable or disable script rendering. Useful for local development.
     */
    'enabled' => env('FACEBOOK_PIXEL_ENABLED', false),

    /*
     * This is used to test server events
     */
    'test_event_code' => env('FACEBOOK_TEST_EVENT_CODE'),
];
