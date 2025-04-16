<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use App\Models\PotentialCustomer;
use App\Mail\LastReminderCampeignMail;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProcessLastReminderCampaignMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $firstname;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($firstname)
    {
        $this->firstname = $firstname;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        foreach(PotentialCustomer::where('firstname', $this->firstname)->where('reminded', 'first_reminder')->where('status', 'unregistered')->get('email') as $receipient)
        {
           
            PotentialCustomer::where('firstname', $this->firstname)->where('email', $receipient->email)->update(['reminded' => 'last_reminder']);
            Mail::to($receipient->email)->later(now()->addminutes(1), new LastReminderCampeignMail($user->firstname, $user->referral_url));
            sleep(5);
        }
    }
}
