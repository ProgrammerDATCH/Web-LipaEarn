<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Referral;
use App\Models\Withdrawal;
use App\Models\UserEarning;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Country;

class DashboardController extends Controller
{


    public function ShowDashboard()
    {
        $user = Auth::user();
        $UserEarning = UserEarning::where('user_id', $user->id)->first();
        $referral = Referral::where('user_id', $user->id)->first();
        $withdrawal = Withdrawal::where('user_id', $user->id)->first();
        $notifications = Notification::where('user_id', $user->id)->where('open', 0)->get();
        $notifications_counts = $notifications->count();

        $country = $user->country;
        $country_data = Country::where('country', $country)->first();

        return view('dashboard', compact('user', 'UserEarning', 'referral', 'withdrawal', 'notifications', 'notifications_counts', 'country_data'));
    }
    public function OpenedNotification($id)
    {
        $notification = Notification::where('user_id', $id)->first();

        if (!$notification) {
            abort(404);
        }

        $is_done = Notification::where('user_id', $id)->update(['open' => 1]);
        if ($is_done) {
            return redirect()->back();
        }
    }



}