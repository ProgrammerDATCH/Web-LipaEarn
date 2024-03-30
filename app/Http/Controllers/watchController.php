<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Video;
use App\Models\UserEarning;
use App\Models\VideoResult;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WatchController extends Controller
{
    public function ShowWatchYoutubePage()
    {
        $user = Auth::user();
        $notifications = Notification::where('user_id', $user->id)->where('open', 0)->get();
        $notifications_counts = $notifications->count();
        $yt_video = Video::where('category', 'Youtube')->first();
        $video = Video::where('category', 'Youtube')
        ->where('watch_day', Carbon::today()->format('l'))
        ->orderBy('created_at')
        ->first();
        $watch_day = $yt_video->watch_day ?? null;
        return view('watch.youtube', compact('video', 'notifications', 'notifications_counts','watch_day'));
    }

    public function ShowWatchTiktokPage()
    {
        $user = Auth::user();
        $notifications = Notification::where('user_id', $user->id)->where('open', 0)->get();
        $notifications_counts = $notifications->count();
        $tt_video = Video::where('category', 'Tiktok')->first();
        $video = Video::where('category', 'Tiktok')
        ->where('watch_day', Carbon::today()->format('l'))
        ->orderBy('created_at')
        ->first();
        $watch_day = $tt_video->watch_day ?? null;
        return view('watch.tiktok', compact('video', 'notifications', 'notifications_counts','watch_day'));
    }

    public function ClaimingRewardTiktok(Request $request)
    {
        $user = Auth::user()->id;
        $tiktok_video_id = $request->input('video_id');
        $db_video = Video::findOrFail($tiktok_video_id);
        if($db_video) {
            $tiktok_video_price = $db_video->price;
        }else{
            abort(404);
        }

        $video = VideoResult::where('video_id', $tiktok_video_id)->where('user_id', $user)->first();

        if (!$video) {
            VideoResult::create([
                'user_id' => $user,
                'video_id' => $tiktok_video_id,
            ]);

            $userEarnings = UserEarning::firstOrNew(['user_id' => $user]);
            $userEarnings->video_earnings += $tiktok_video_price;
            $userEarnings->total_earnings += $tiktok_video_price;
            $userEarnings->save();

            Notification::create([
                'user_id' => $user,
                'title' => 'You have earned '.$tiktok_video_price.' FR',
                'link' => route('ShowDashboard'),
                'category' => 'Transaction',
                'open' => 0
            ]);



            return response()->json('Congratulations! You have earned ' . $tiktok_video_price.' FR');
        } else {
            return response()->json('You have already watched this video');
        }
    }

    public function ClaimingRewardYoutube(Request $request)
    {
        $user = Auth::user()->id;
        $youtube_video_id = $request->input('video_id');
        $db_video = Video::findOrFail($youtube_video_id);
        if($db_video) {
            $youtube_video_price = $db_video->price;
        }else{
            abort(404);
        }

        $youtube_video = VideoResult::where('video_id', $youtube_video_id)->where('user_id', $user)->first();

        if (!$youtube_video) {
            VideoResult::create([
                'user_id' => $user,
                'video_id' => $youtube_video_id,
            ]);

            $userEarnings = UserEarning::firstOrNew(['user_id' => $user]);
            $userEarnings->video_earnings += $youtube_video_price;
            $userEarnings->total_earnings += $youtube_video_price;
            $userEarnings->save();

            Notification::create([
                'user_id' => $user,
                'title' => 'You have earned '.$youtube_video_price.'FR',
                'link' => route('ShowDashboard'),
                'category' => 'Transaction',
                'open' => 0
            ]);


            return response()->json('Congratulations! You have earned ' . $youtube_video_price.'FR');
        } else {
            return response()->json('You have already watched this video');
        }
    }
}
