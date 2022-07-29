<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Log;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        Commands\AutomaticPayment::class,
        Commands\PlanExpiration::class,
        Commands\AdditionalExpiration::class,
            //'App\Console\Commands\GenerateQR' Before
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        //before
        // $schedule->command('inspire')
        //          ->everyMinute();
        //$schedule->command('Petition:PlaceToPay')->hourly();

        /**Comentarios tareas autoomaticas restricciones por plan
            $schedule->command('automaticPayment:request')
            ->dailyAt('5:00');
            $schedule->command('planExpiration:check')
            ->dailyAt('5:00');
            $schedule->command('additionalExpiration:check')
            ->dailyAt('5:00');
        */
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
