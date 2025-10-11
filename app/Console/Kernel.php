<?php

namespace App\Console;

use App\Models\User;
use App\Models\ExchangeRate;
use Illuminate\Support\Carbon;
use App\Mail\RateNotification;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Http;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Log;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();

        // $schedule->call(function () {
        //     $properties = Http::withHeaders(['X-CoinAPI-Key' => '9B554A1B-EBF1-4B3A-B7C0-B2346614E136'])->get('https://rest.coinapi.io/v1/exchangerate/USDT/NGN')->json();
        //     $postData = new ExchangeRate();
        //     $postData->rate_normal      =   (int)$properties['rate'];
        //     $postData->rate_decimal     =   $properties['rate'];
        //     $postData->assets_id_from   =   $properties['asset_id_base'];
        //     $postData->assets_id_to     =   $properties['asset_id_quote'];
        //     $postData->exchange_time    =    \Carbon\Carbon::parse($properties['time']);
        //     $postData->status           =   2;

        //     $postData->save();


        //     Http::post('https://p2p.ratefy.co/rates/create-rate', [
        //         'rate_decimal' =>  $properties['rate'],
        //         'rate_normal' => (int)$properties['rate'],
        //         'assets_id_from' => $properties['asset_id_base'],
        //         'assets_id_to' => $properties['asset_id_quote']
        //     ]);

        //     $admin  =  User::where('id', 134)->first();
        //     $staff  =  User::where('id', 306)->first();

        //     Mail::to($admin)->send(new RateNotification((int)$properties['rate'], Carbon::now()));
        //     Mail::to($staff)->send(new RateNotification((int)$properties['rate'], Carbon::now())); 
        // })->hourly();


        $schedule->call(function () {
            try{
                $response = Http::get('https://api.coingecko.com/api/v3/simple/price', [
                    'ids' => 'tether',
                    'vs_currencies' => 'ngn'
                ]);

                if ($response->failed()) {
                    Log::error('CoinGecko request failed', ['status' => $response->status()]);
                    return;
                }

                $data = $response->json();

                if (!isset($data['tether']['ngn'])) {
                    Log::warning('Unexpected CoinGecko response structure', ['data' => $data]);
                    return;
                }

                $rateValue = $data['tether']['ngn'];

                // ExchangeRate::create([
                //     'rate_normal'       => (int)$rateValue,
                //     'rate_decimal'      => $rateValue,
                //     'assets_id_from'    => 'tether',
                //     'assets_id_to'      => 'ngn',
                //     'exchange_time'     => \Carbon\Carbon::now(),
                //     'status'            => 2,
                // ]);

                $postData = new ExchangeRate();
                $postData->rate_normal      =   (int)$rateValue;
                $postData->rate_decimal     =   $rateValue;
                $postData->assets_id_from   =   "TETHER";
                $postData->assets_id_to     =   "NGN";
                $postData->exchange_time    =    \Carbon\Carbon::now();
                $postData->status           =   2;

                $postData->save();

                $admin  =  User::where('id', 134)->first();
            $staff  =  User::where('id', 306)->first();

            Mail::to($admin)->send(new RateNotification($rateValue, Carbon::now()));
            Mail::to($staff)->send(new RateNotification($rateValue, Carbon::now())); 

                Log::info('Rate updated successfully', ['tether_to_ngn' => $rateValue]);

            }catch(\Exception $e){
                Log::error('Error fetching CoinGecko rate', ['error' => $e->getMessage()]);
            }
        })->hourly();

        $schedule->command('sitemap:generate')->daily();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
