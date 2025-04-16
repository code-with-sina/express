<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Log;

use Illuminate\Support\Facades\Http;

class PageViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */

    public function boot()
    {
        $this->app['router']->matched(function () {
            $this->trackPageView();
        });


        // $this->app['router']->matched(function ($route, $request) {
        //     // Check if the current route belongs to the admin namespace
        //     if (strpos($route->getName(), 'admin.') === 0) {
        //         return; // Skip tracking for admin routes
        //     }

        //     $this->trackPageView();
        // });
    }

    private function trackPageVisew()
    {
        $accessToken = 'YOUR_ACCESS_TOKEN';
        $pixelId = 'YOUR_PIXEL_ID';
        $conversionApiToken = 'YOUR_CONVERSION_API_ACCESS_TOKEN';

        $userData = [];
        $hashedData = hash('sha256', $email);
        $name = $input['name'];
        $hashedDataName = hash('sha256', $name);

        $event_id = uniqid();
        if (auth()->user()) {
            $user = auth()->user();
            $userData = [

                'email' => hash('sha256', $user->email),
                'lastname' => hash(
                    'sha256',
                    $user->lastname
                ),
                'firstname' => hash(
                    'sha256',
                    $user->firstname
                ),
                'phonenumber' => hash('sha256', $user->phonenumber)
            ];
        }

        // Get user's IP address
        $userIp = request()->ip();

        // Track page view with Facebook Pixel
        $pixelData = [
            'data' => [
                [
                    'event_name' => 'PageView', // Event name for page view
                    'event_time' => time(),
                    "event_id" => $event_id,
                    'event_source_url' => request()->url(), // URL of the current page
                    'user_agent' => request()->header('User-Agent'), // User agent
                    'client_ip_address' => $userIp, // User's IP address
                ],
            ],

        ];

        // Merge user data into page view event data
        $pixelData['data'][0] = array_merge($pixelData['data'][0], $userData);

        // Track conversion event with Conversion API
        $conversionData = [
            'data' => [
                [
                    'event_name' => 'Purchase', // Example conversion event name
                    'event_time' => time(),
                    "event_id" => $event_id,
                    'event_source_url' => request()->url(), // URL of the current page
                    'client_ip_address' => $userIp, // User's IP address
                    // Include additional conversion event data here
                ],
            ],

        ];

        // Merge user data into conversion event data
        $conversionData['data'][0] = array_merge($conversionData['data'][0], $userData);

        // Send requests to track both page view and conversion event
        $responsePixel = Http::withToken($accessToken)
            ->post("https://graph.facebook.com/v19.0/{$pixelId}/events", $pixelData);

        $responseConversion = Http::withToken($conversionApiToken)
            ->post("https://graph.facebook.com/v19.0/{$pixelId}/events", $conversionData);

        // Handle responses or errors if needed
    }

    private function trackPageViesw()
    {
        try {
            $event_id = uniqid();
            $accessToken =  env('FACEBOOK_PIXEL_TOKEN');
            // Track event in Meta Pixel
            $pixelId = env('FACEBOOK_PIXEL_ID');

            $userData = [];
            if (auth()->user()) {
                $user = auth()->user();
                $userData = [

                    'em' => hash('sha256', $user->email),
                    'ln' => hash(
                        'sha256',
                        $user->lastname
                    ),
                    'fn' => hash(
                        'sha256',
                        $user->firstname
                    ),
                    'ph' => hash('sha256', $user->phonenumber)
                ];
            }

            // Get user's IP address
            $userIp = request()->ip();
            $userAgent = request()->header('User-Agent');
            // Track page view with Facebook Pixel
            $pixelData = [
                'data' => [
                    [
                        'event_name' => 'PageView', // Event name for page view
                        'event_time' => time(), "event_id" => $event_id,
                        'event_source_url' => request()->url(), // URL of the current page
                        'user_agent' => request()->header('User-Agent'), // User agent
                        'client_ip_address' => $userIp, // User's IP address
                    ],
                ],

            ];

            // Merge user data into page view event data
            $pixelData['data'][0] = array_merge($pixelData['data'][0], $userData);

            // Track conversion event with Conversion API
            $conversionData = [
                'data' => [
                    [
                        'event_name' => 'Purchase', // Example conversion event name
                        'event_time' => time(), "event_id" => $event_id,
                        'event_source_url' => request()->url(), // URL of the current page
                        'client_ip_address' => $userIp, // User's IP address
                        // 'client_user_agent' => request()->header('User-Agent'),
                        'user_agent' => request()->header('User-Agent')
                        // Include additional conversion event data here
                    ],
                ],

            ];

            // Merge user data into conversion event data
            $conversionData['data'][0] = array_merge($conversionData['data'][0], $userData);

            // Send requests to track both page view and conversion event
            $responsePixel = Http::withToken($accessToken)
                ->post("https://graph.facebook.com/v12.0/{$pixelId}/events", $pixelData);

            $responseConversion = Http::withToken($accessToken)
                ->post("https://graph.facebook.com/v12.0/{$pixelId}/events", $conversionData);

            // Handle responses
            if ($responsePixel->successful()) {
                // Page view tracking successful
                Log::info('page view tracked successfully.', ['email' => $email, 'ipAddress' => $userIp, 'client_user_agent' => $userAgent]);
                $pixelMessage = 'Page view tracked successfully.';
            } else {
                // Page view tracking failed
                Log::error('Error tracking page view pixel: ' . $responsePixel->status(), [
                    'error_message' => $responsePixel->json('error.message'),
                    'client_user_agent' => $userAgent, 'ipAddress' => $userIp
                ]);
                $pixelMessage = 'Error tracking page view: ' . $responsePixel->status();
            }

            if ($responseConversion->successful()) {
                // Conversion event tracking successful
                Log::info('page view tracked successfully.',);
                $conversionMessage = 'Conversion event tracked successfully.';
            } else {
                // Conversion event tracking failed
                Log::error('Error tracking page view: ' . $responseConversion->status(), [
                    'error_message' => $responseConversion->json('error.message'),
                    'client_user_agent' => $userAgent, 'ipAddress' => $userIp
                ]);
                $conversionMessage = 'Error tracking conversion event: ' . $responseConversion->status();
            }

            // Return success and error messages
            return [
                'pixel_message' => $pixelMessage,
                'conversion_message' => $conversionMessage,
            ];
        } catch (\Exception $e) {

            Log::error("Error occurred while tracking event: {$e->getMessage()}");


            return response()->json(['error' => 'An error occurred while processing your request.  ' . $e->getMessage()], 500);
        }
    }


    public function trackPageView()
    {
        try {

            $user = null;
            $event_id = uniqid();
            if (auth()->user()) {
                $user = auth()->user();
            }
            $fbp = request()->cookie('_fbp');
            $fbc = request()->cookie('_fbc');

            $url = request()->url();
            $client_user_agent = request()->header('User-Agent');

            // Get client IP address
            $ipAddress = request()->ip();

            // Track page view in Meta Pixel
            $pixelId = env('FACEBOOK_PIXEL_ID');
            $pixelUrl = "https://www.facebook.com/tr?id=$pixelId&ev=PageView&noscript=1&dl=$url&cd[client_ip]=$ipAddress&&event_id=$event_id";
            Http::get($pixelUrl);

            // Send event data to Conversion API
            $accessToken =  env('FACEBOOK_PIXEL_TOKEN');
            $conversionApiUrl = "https://graph.facebook.com/v19.0/$pixelId/events?access_token=$accessToken";
            if ($user !== null) {
                # code...
                $conversionApiResponse = Http::post($conversionApiUrl, [
                    'data' => [
                        [
                            'event_name' => 'PageView',
                            'event_time' => time(),
                            'event_source_url' => $url, "event_id" => $event_id,
                            'user_data' => [
                                'client_ip_address' => $ipAddress, 'client_user_agent' => $client_user_agent,
                                'em' => $user !== null  ?? hash('sha256', $user->email),
                                'ln' => $user !== null  ?? hash(
                                    'sha256',
                                    $user->lastname
                                ),
                                'fn'  => $user !== null  ?? hash(
                                    'sha256',
                                    $user->firstname
                                ),
                                'ph'  => $user !== null  ?? hash('sha256', $user->phonenumber),
                                'fbp' => $fbp,
                                'fbc' => $fbc
                            ],

                        ],
                    ],
                ]);

                // Log success or failure
                if ($conversionApiResponse->successful()) {
                    // Log::info('Page view tracked successfully.', $ipAddress, $url);
                    Log::info('Page view tracked successfully.', ['url' => $url, 'user' => $user, 'fbp' => $fbp, 'fbc' => $fbc]);
                    return response()->json(['success' => true]);
                } else {
                    Log::error('Error tracking page view: ' . $conversionApiResponse->status(), ['error_message' => $conversionApiResponse->json('error.message'), 'user' => $user, 'fbp' => $fbp, 'fbc' => $fbc]);
                    return response()->json(['error' => 'An error occurred while tracking the page view.'], 500);
                }
            } else {
                $conversionApiResponse = Http::post($conversionApiUrl, [
                    'data' => [
                        [
                            'event_name' => 'PageView',
                            'event_time' => time(),
                            "event_id" => $event_id,
                            'event_source_url' => $url,
                            'user_data' => [
                                'client_ip_address' => $ipAddress, 'client_user_agent' => $client_user_agent,
                                'fbp' => $fbp,
                                'fbc' => $fbc

                            ],

                        ],
                    ],
                ]);

                // Log success or failure
                if ($conversionApiResponse->successful()) {
                    // Log::info('Page view tracked successfully.', $ipAddress, $url);
                    Log::info('Page view tracked successfully.', ['url' => $url, 'user' => $user, 'fbp' => $fbp, 'fbc' => $fbc]);
                    return response()->json(['success' => true]);
                } else {
                    Log::error('Error tracking page view: ' . $conversionApiResponse->status(), ['error_message' => $conversionApiResponse->json('error.message'), 'fbp' => $fbp, 'fbc' => $fbc, 'user' => $user]);
                    return response()->json(['error' => 'An error occurred while tracking the page view.'], 500);
                }
            }


            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            Log::error("Error occurred while tracking event: {$e->getMessage()}");
            return response()->json(['error' => 'An error occurred while tracking the page view.' . $e->getMessage()], 500);
        }
    }
}
