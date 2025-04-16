<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use App\Mail\CampeignMail;
use App\Models\PotentialCustomer;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProcessCampaignMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $tries = 3;
    public $campeignemails;
    public $firstname;
    public $refferedLink;
  
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($campeignemails, $firstname, $referral_url)
    {
        $this->campeignemails = $campeignemails;
        $this->firstname = $firstname;
        $this->refferedLink = $referral_url;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        foreach($this->campeignemails as $email)
        {
            $available = PotentialCustomer::where('firstname', $this->firstname)->where('email', $email)->first();

            if($available)
            {
                continue;
            }else{
                PotentialCustomer::create([
                    'affiliate_id' => $this->firstname,
                    'email' => $email, 
                    'status'    => 'unregistered',
                    'reminded'  => 'no'
                ]);
                
                Mail::to($email)->later(now()->addminutes(1), new CampeignMail($this->firstname, $this->refferedLink, $email));
                sleep(5);
            }  
        }
        
    }
}



    