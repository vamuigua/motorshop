<?php

namespace App\Console;

use App\Http\Controllers\Admin\DeleteTempImages;
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
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();

        /**
         * If using withoutOverlapping method this is the order
         * (1) call -> (2) name -> (3) withoutOverlapping -> (4) dailyAt -> (5) onOneServer
         */
        $schedule->call(new DeleteTempImages)
            ->name('delete_temp_images')
            ->withoutOverlapping()
            ->monthly();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
