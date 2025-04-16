<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Log;

use Illuminate\Support\Facades\Http;

class FacebookPixelsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    public function trackSignUpEvent($trackingData)
    {
        try {

            $fbp = request()->cookie('_fbp');
            $fbc = request()->cookie('_fbc');
            // Log::info('tracked data.', ['trackingData' => $trackingData,]);

            $ipAddress = $trackingData->ipAddress;
            $userAgent = $trackingData->userAgent;
            $eventName = 'Signup';
            $email = $trackingData->email;

            $hashedEmailData = hash('sha256', $email);
            $lastname = $trackingData->lastname;
            $firstname = $trackingData->firstname;
            $mobile_number = hash('sha256', $trackingData->mobile_number);
            $hashedDataFirstname = hash('sha256', $firstname);
            $hashedDataLastname = hash('sha256', $lastname);

            $event_id = uniqid();
            $accessToken =  env('FACEBOOK_PIXEL_TOKEN');
            // Track event in Meta Pixel
            $pixelId = env('FACEBOOK_PIXEL_ID');
            $pixelUrl = "https://www.facebook.com/tr?id=$pixelId&ev=$eventName&email=$hashedEmailData&cd[client_ip]=$ipAddress&noscript=1";
            // Http::get($pixelUrl);
            $response = Http::get($pixelUrl);

            $responseData =  $response->successful() ?    $response->json() : 'it not publish data';
            // Send event data to Conversion API
            $conversionApiUrl = "https://graph.facebook.com/v19.0/$pixelId/events?access_token=$accessToken";
            $conversionApiResponse = Http::post($conversionApiUrl, [
                'data' => [
                    [
                        'event_name' => $eventName,
                        'event_time' => time(),
                        "event_id" => $event_id,

                        'user_data' => [
                            'em' => $hashedEmailData,
                            'ln' => $hashedDataLastname,
                            'fn' => $hashedDataFirstname,
                            'ph' => $mobile_number,
                            'external_id' => $trackingData->userId,
                            'fbc' => $fbc,
                            'fbp' => $fbp,
                            'client_ip_address' => $ipAddress,
                            'client_user_agent' => $userAgent

                        ],
                    ],
                ],
            ]);


            if ($conversionApiResponse->successful()) {
                // Log::info('Page view tracked successfully.', $ipAddress, $url);
                // Log::info('signup tracked successfully.', ['email' => $email, 'ipAddress' => $ipAddress, 'client_user_agent' => $userAgent, 'trackingData' => $trackingData, '$responseData' => $responseData]);
                return response()->json(['success' => true]);
            } else {
                // Log::error('Error tracking signUp: ' . $conversionApiResponse->status(), [
                //     'error_message' => $conversionApiResponse->json('error.message'),
                //     'client_user_agent' => $userAgent, 'ipAddress' => $ipAddress, 'trackingData' => $trackingData
                // ]);
                return response()->json(['error' => 'An error occurred while tracking the signup.'], 500);
            }

            return response()->json(['success' => true]);
        } catch (\Exception $e) {

            // Log::error("Error occurred while tracking event: {$e}");


            return response()->json(['error' => 'An error occurred while processing your request.  ' . $e->getMessage()], 500);
        }
    }
    public function trackTransactionEvent($trackingData)
    {
        try {
            $fbp = request()->cookie('_fbp');
            $fbc = request()->cookie('_fbc');
            $ipAddress = $trackingData->ipAddress;
            $userAgent = $trackingData->userAgent;
            $eventName = 'tranactionInit';
            $email = $trackingData->email;

            $hashedEmailData = hash('sha256', $email);
            $lastname = $trackingData->lastname;
            $firstname = $trackingData->firstname;
            $mobile_number = hash('sha256', $trackingData->mobile_number);
            $hashedDataFirstname = hash('sha256', $firstname);
            $hashedDataLastname = hash('sha256', $lastname);

            $event_id = uniqid();
            $accessToken =  env('FACEBOOK_PIXEL_TOKEN');
            // Track event in Meta Pixel
            $pixelId = env('FACEBOOK_PIXEL_ID');
            $pixelUrl = "https://www.facebook.com/tr?id=$pixelId&ev=$eventName&email=$hashedEmailData&cd[client_ip]=$ipAddress&noscript=1";
            // Http::get($pixelUrl);
            $response = Http::get($pixelUrl);

            $responseData =  $response->successful() ?    $response->json() : 'it not publish data';
            // Send event data to Conversion API
            $conversionApiUrl = "https://graph.facebook.com/v19.0/$pixelId/events?access_token=$accessToken";
            $conversionApiResponse = Http::post($conversionApiUrl, [
                'data' => [
                    [
                        'event_name' => $eventName,
                        'event_time' => time(),
                        "event_id" => $event_id,

                        'user_data' => [
                            'em' => $hashedEmailData,
                            'ln' => $hashedDataLastname,
                            'fn' => $hashedDataFirstname,
                            'ph' => $mobile_number,
                            'external_id' => [$trackingData->userId, $trackingData->orderId],
                            'fbc' => $fbc,
                            'fbp' => $fbp,
                            'client_ip_address' => $ipAddress,
                            'client_user_agent' => $userAgent

                        ],
                    ],
                ],
            ]);


            if ($conversionApiResponse->successful()) {
                // Log::info('Page view tracked successfully.', $ipAddress, $url);
                Log::info('transaction tracked successfully.', ['email' => $email, 'ipAddress' => $ipAddress, 'client_user_agent' => $userAgent, 'trackingData' => $trackingData, '$responseData' => $responseData, 'fbc' => $fbc, 'fbp' => $fbp]);
                return response()->json(['success' => true]);
            } else {
                Log::error('Error tracking transaction: ' . $conversionApiResponse->status(), [
                    'error_message' => $conversionApiResponse->json('error.message'),
                    'client_user_agent' => $userAgent, 'ipAddress' => $ipAddress, 'trackingData' => $trackingData, 'fbp' => $fbp, 'fbc' => $fbc
                ]);
                return response()->json(['error' => 'An error occurred while tracking the transactions.'], 500);
            }

            return response()->json(['success' => true]);
        } catch (\Exception $e) {

            // Log::error("Error occurred while tracking event: {$e->getMessage()}");


            return response()->json(['error' => 'An error occurred while processing your request.  ' . $e->getMessage()], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
