<?php
namespace App\Console;


use App\Jobs\SendDailySummaryEmail;
use Illuminate\Support\Facades\Log;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    public function schedule(Schedule $schedule)
    {
        Log::info("Schedule is running at: " . now());
        // Run queued jobs every minute to process any pending tasks
        $schedule->command('queue:work --tries=3')->everyMinute()->withoutOverlapping();

        // Run the SendDailySummaryEmail job every 10 minutes
        $schedule->job(new SendDailySummaryEmail())->everyMinute();
        
        // $schedule->call(function () {
        //     dispatch(new SendDailySummaryEmail());
        // })->everyMinute();

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

