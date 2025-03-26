<?php

use Illuminate\Console\Scheduling\Schedule;
use App\Console\Kernel;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

// Registering an example artisan command
Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

// Manually bind the scheduler to make schedule:list work
$schedule = app(Schedule::class);
app(Kernel::class)->schedule($schedule);
