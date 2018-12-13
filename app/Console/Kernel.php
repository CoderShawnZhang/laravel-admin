<?php

namespace App\Console;

use App\Console\Commands\Chart;
use App\Console\Commands\CreateTask;
use App\Console\Commands\Gb;
use App\Console\Commands\push;
use App\Console\Commands\SendMailTask;
use App\Facades\TaskRepository;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        CreateTask::class,
        SendMailTask::class,
        push::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
//        $schedule->command('sendMail:mail')->everyFiveMinutes();
//        $schedule->command('clearTaskCache:task')->everyMinute();
        $schedule->command('push:message')->everyMinute();

//        $schedule->call(function (){
//
//        })->everyFiveMinutes();
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
