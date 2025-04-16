<?php

namespace App\Jobs;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

use App\Models\ExpressTransaction;
use App\Models\CounterPartyAccount;
use App\Models\ExchangeItem;
use App\Models\User;
use App\Models\ChatSubscription;
use Illuminate\Support\Facades\Auth;
use App\Mail\AdminTransactionNotification;
use App\Mail\PaymentInstruction;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;

class ProcessTransactionJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $tries = 5;
    public $bigData;
    public $orderId;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($bigData, $orderId)
    {
        $this->bigData = $bigData;
        $this->orderId = $orderId;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //

        $buyerId = '';
        $data = json_decode($this->bigData->getContent(), true);

        $user = User::where('id', auth()->user()->id)->first();
        $bank = CounterPartyAccount::where('id', $data['bank'])->first();
        
        $sellerTerms= ExchangeItem::where('id', $this->bigData->wallet_id)->first();

        $buyer = User::where('type', '1')->get();

        foreach($buyer as $item){
           if($item->name == 'Femi Odeyemi'){
                $buyerId = $item->id;
                break;
           }
        }

        $sellerDetail = [
            'seller_name'   => $user->name,
        ];

        $sellerBankDetail = [
            'bank_name'     => $bank->bank_name,
            'account'       => $bank->account_number,
            'name'          => $bank->account_name
        ];
        
        $transactionId = [
            'seller'    => auth()->user()->id,
            'buyer'     => $buyerId
        ];


        $initiate = new ExpressTransaction();
        $initiate->order_id = $this->orderId;

        $initiate->seller_id            = $transactionId['seller'];
        $initiate->buyer_id             = $transactionId['buyer'];
        $initiate->wallet_name          = $data['wallet_name'];
        $initiate->wallet_id            = $this->bigData->wallet_id;
        $initiate->wallet_currency      = 'USD';
        $initiate->wallet_amount        = $data['amount'];
        $initiate->conversion_name      = 'NGN';
        $initiate->conversion_amount    = $data['total'];
        $initiate->seller_name          = $sellerDetail['seller_name'];
        $initiate->seller_bank_name     = $sellerBankDetail['bank_name'];
        $initiate->seller_account_name  = $sellerBankDetail['name'];
        $initiate->transaction_status   = 'pending';

        $initiate->conversion_percentage    = $data['rate'];
        $initiate->seller_account_number    = $sellerBankDetail['account'];

        $initiate->express_binding_detail_duration      = '30';
        $initiate->express_binding_detail_start_time    = Carbon::now();
        $initiate->express_binding_detail_end_time      = Carbon::now()->addMinutes(30);
        $initiate->express_binding_detail_note          = $sellerTerms->inner_seller_note;
        $initiate->express_binding_confirmation_note    = $sellerTerms->confirmation_note;
        $processTransact    = $initiate->save();

        $mailBody = $sellerTerms->seller_note;


        if($processTransact){
            $getRedirect = ExpressTransaction::where('order_id', $this->orderId)->first();
            $chatSub = new ChatSubscription();
            $chatSub->user_id = auth()->user()->id;
            $chatSub->session_id = $this->orderId;
            $chatSub->save();

            $notifyAdmin = User::find($buyerId);
            $notifySubAdmin = User::find(306);
            Mail::to($notifyAdmin)->send(new AdminTransactionNotification($user->name, $this->orderId, $data['amount']));
            Mail::to($notifySubAdmin)->send(new AdminTransactionNotification($user->name, $this->orderId, $data['amount']));
            Mail::to($user)->send(new PaymentInstruction($user->name, $mailBody, $this->orderId, $data['amount'],  Carbon::now()));


            // Send sms Here
            $madeOn = "https://ratefy.co/author/express-transactions?id=".$this->orderId;
            $messageText = 'Order Initiated from '.$madeOn.' --'.$sellerDetail['seller_name'].' --amount: '.$data['amount']. ' --'.Carbon::now();
            Http::get('https://api.ebulksms.com:8080/sendsms', [
                'username' => 'dmfemivictor@gmail.com',
                'apikey' => '544425246adf2096c7ea4bf3ea7292b171d6f743',
                'sender' => 'Ratefy',
                'messagetext' => $messageText,
                'flash' => 0,
                'recipients' => '07064530382',
            ]);

            Http::get('https://api.ebulksms.com:8080/sendsms', [
                'username' => 'dmfemivictor@gmail.com',
                'apikey' => '544425246adf2096c7ea4bf3ea7292b171d6f743',
                'sender' => 'Ratefy',
                'messagetext' => $messageText,
                'flash' => 0,
                'recipients' => '08113800308',
            ]);

            // return response()->json([
            //     'message'   => $getRedirect->order_id
            // ], 200);
        }else{
            return response()->json([
                'message'  => $processTransact->getMessage()
            ], 400);
        }  
    }
}
