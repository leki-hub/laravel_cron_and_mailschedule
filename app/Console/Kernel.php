<?php
namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Jobs\SendDailySummaryEmail;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule)
    {
        // Run queued jobs every minute to process any pending tasks
        $schedule->command('queue:work --tries=3')->everyMinute();

        // Run the SendDailySummaryEmail job every 10 minutes
        $schedule->job(new SendDailySummaryEmail())->everyTenMinutes();

        // Delete old users daily
        $schedule->command('users:delete-old')->daily();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}

