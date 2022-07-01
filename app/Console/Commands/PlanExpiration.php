<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Billing;
use App\Account;
use DateTime;
use Mail;

class PlanExpiration extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'planExpiration:check';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This Command ejecute validation of users plan';

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
        $users_billing = Billing::where('status','APPROVED')
            ->where('action', '!=', 'ADDITIONAL')
            ->latest()
            ->get();
        $users_billing = $users_billing->unique('user_id');//se obtienen los billing unicos
        foreach ($users_billing as $user) {
            $end_date = DateTime::createFromFormat('U', strtotime($user->billing['end_date']));
            $today = new DateTime("now");
            if ($today > $end_date) {
                //Vencimiento de plan
                $account = Account::findOrFail($user->user_id);
                Mail::to($account->email)
                    ->send(new \App\Mail\PlanPurchase($user, 'Your plan has expired'));
            }
        }
    }
}
