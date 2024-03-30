<?php

namespace App\Jobs;

use Carbon\Carbon;
use App\Models\Video;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class deletevideo implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */

    public function __construct()
    {
        $expiredVideos = Video::where('end_at', '<', Carbon::now())->get();

        // Delete the expired videos
        foreach ($expiredVideos as $video) {
            $video->delete();
        }
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        //
    }
}