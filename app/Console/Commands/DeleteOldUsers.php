<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Carbon\Carbon;

class DeleteOldUsers extends Command
{
    protected $signature = 'users:delete-old';
    protected $description = 'Delete users inactive for over a year';

    public function handle()
    {
        User::where('last_login', '<', Carbon::now()->subYear())->delete();
        $this->info('Old users deleted successfully.');
    }
}

