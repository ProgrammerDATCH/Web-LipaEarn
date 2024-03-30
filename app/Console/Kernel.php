<?php

namespace App\Console;

use Carbon\Carbon;
use App\Models\Video;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        $expiredVideos = Video::where('end_at', '>', Carbon::now())->get();

        // Delete the expired videos
        foreach ($expiredVideos as $video) {
            $video->delete();
        }
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
