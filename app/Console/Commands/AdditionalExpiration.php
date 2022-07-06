<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Addon;
use App\Account;
use DateTime;
use Mail;

class AdditionalExpiration extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'additionalExpiration:check';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This Command ejecute validation of users additionals';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $additionals = Addon::where('is_active', true)
            ->latest()
            ->get();
        if (isset($additionals)) {
            foreach ($additionals as $additional) {
                $end_date = DateTime::createFromFormat('U', strtotime($additional->end_date));
                $today = new DateTime("now");
                if ($today < $end_date) {
                    //update addon
                    $additional['is_active'] = false;
                    $additional->save();
                    //generate notification
                    app('App\Http\Controllers\NotificationController')
                        ->addNotification('Your additional users buy in '. $additional->start_date . ' is now expired', $additional->user_id);
                    //Vencimiento de plan
                    $account = Account::findOrFail($additional->user_id);
                    Mail::to($account->email)
                        ->send(new \App\Mail\AdditionalExpired($additional, 'Your Additional has expired'));
                }
            }
        }
        
    }
}
