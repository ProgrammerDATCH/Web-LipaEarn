<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\TriviaQuizz;
use App\Models\User;
use App\Models\UserEarning;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\Models\BoostingClicks;
use Illuminate\Support\Carbon;
use App\Models\BoostingAccount;
use App\Models\TriviaQuizzesResult;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class EarningActivityController extends Controller
{
    private function getCommonData()
    {
        $user = Auth::user();
        $notifications = Notification::where('user_id', $user->id)->where('open', 0)->get();
        $notifications_counts = $notifications->count();

        $country = $user->country;
        $country_data = Country::where('country', $country)->first();

        return [
            'notifications' => $notifications,
            'notifications_counts' => $notifications_counts,
            'country_data' => $country_data
        ];
    }


    public function ShowTriviasPages()
    {
        $trivias = TriviaQuizz::where('watch_day', Carbon::today()->format('l'))->first();
        $trivia = TriviaQuizz::first();
        $commonData = $this->getCommonData();

        return view('pages.trivia', array_merge(['trivia' => $trivias, 'watch_day' => $trivia->watch_day ?? null], $commonData));
    }
    public function ShowCreateBoostingAccountPage()
    {
        $commonData = $this->getCommonData();

        return view('pages.create', $commonData);
    }

    public function ShowInstagramBoostingPage()
    {
        $commonData = $this->getCommonData();
        $color = "bg-indigo";

        $users = BoostingAccount::where('category', 'instagram')->get();

        return view('pages.boosting', ['users' => $users , 'color' => $color], $commonData);
    }
    public function ShowTiktokBoostingPage()
    {
        $commonData = $this->getCommonData();
        $color = "bg-dark";

        $users = BoostingAccount::where('category', 'tiktok')->get();


        return view('pages.boosting', ['users' => $users, 'color' => $color], $commonData);
    }

    public function ShowYoutubeBoostingPage()
    {
        $commonData = $this->getCommonData();
        $color = "bg-danger";

        $users = BoostingAccount::where('category', 'youtube')->get();


        return view('pages.boosting', ['users' => $users , 'color' => $color], $commonData);
    }
    public function ShowBoosterPage()
    {
        $commonData = $this->getCommonData();

        $user = Auth::user();
        $users = BoostingClicks::has('clicker')->where('booster_id', $user->id)->paginate();


        return view('pages.booster', ['users' => $users], $commonData);
    }


    public function ShowSpinPage()
    {
        $commonData = $this->getCommonData();

        return view('pages.spin', $commonData);
    }
    public function ClaimingSpinReward(Request $request)
    {
        $user = Auth::user();
        $spin_value = $request->input('spin_value');
        $UserEarnings = UserEarning::where('user_id', $user->id)->first();
        if($UserEarnings->spin_earnings === 0)
        {
            $UserEarnings->spin_earnings += $spin_value;
            $UserEarnings->total_earnings += $spin_value;
            $UserEarnings->save();

            Notification::create([
                'user_id' => $user->id,
                'title' => 'You have successfully received '.$spin_value.' FRW From Spin',
                'link' => route('ShowBoosterPage'),
                'category' => 'Announcements',
                'open' => 0
            ]);
            return response()->json('You have successfully received '.$spin_value.' FRW From Spin');
        }else{
            return response()->json('You can"t spin twice Once you have already spinned');
        }

    }
    // REQUESTS AND OTHER FUNCTIONS
    // ____________________________
    // ____________________________

    public function CreateBoostingAccount(Request $request)
    {
        $user = Auth::user();
        $validatedData = $request->validate([
            'category' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'thumbnail' => 'required|mimes:jpeg,jpg,png,gif|max:2048',
            'link' => 'required|url',
        ], [
            'thumbnail.required' => 'The profile picture is required'
        ]);
        if ($request->hasFile('thumbnail')) {
            $screenshot = 'storage/' . $request->file('thumbnail')->store('screenshots', 'public');
        }

        BoostingAccount::create([
            'user_id' => $user->id,
            'category' => $validatedData['category'],
            'booster_username' => $validatedData['username'],
            'clicks' => 0,
            'title' => $validatedData['title'],
            'thumbnail' => $screenshot,
            'link' => $validatedData['link'],
        ]);

        return redirect()->back()->with('success', 'Your Boosting Account has been successfully registered');

    }
    public function BoosterAccountClicked(Request $request)
    {
        $user = Auth::user();
        $boosterId = $request->input('user_id');
        $account_id = $request->input('account_id');
        $name = $request->input('name');

        $existingClick = BoostingClicks::where('user_id', $user->id)
            ->where('booster_id', $boosterId)->where('account_id', $account_id)
            ->first();

        if ($existingClick) {
            return redirect()->back()->withErrors(['You have already clicked for this booster.']);
        }

        if ($boosterId == "$user->id") {
            return redirect()->back()->withErrors(['You cannot click on yourself']);
        }
        $request->validate([
            'screenshot' => 'required|mimes:jpeg,jpg,png,gif|max:2048',
            'name' => 'required|string|max:255',
        ]);

        if ($request->hasFile('screenshot')) {
            $screenshot = 'storage/' . $request->file('screenshot')->store('screenshots', 'public');
        }
        BoostingClicks::create([
            'user_id' => $user->id,
            'booster_id' => $boosterId,
            'account_id' => $account_id,
            'screenshot' => $screenshot,
            'name' => $name
        ]);
        Notification::create([
            'user_id' => $boosterId,
            'title' => 'New user subscribed or followed your account checkout',
            'link' => route('ShowBoosterPage'),
            'category' => 'Announcements',
            'open' => 0
        ]);

        return redirect()->back()->with('success', 'User will check if you subscribed then you get paid');
    }
    public function PayUserClick(Request $request)
    {
        $payed_user = Auth::user();
        $account_id = $request->input('account_id');
        $receiver_id = $request->input('receiver_id');

        $receiver_user = User::findOrFail($receiver_id);

        $receiverEarnings = UserEarning::where('user_id', $receiver_user->id)->first();
        $receiverEarnings->boosting_earnings += 50;
        $receiverEarnings->total_earnings += 50;
        $receiverEarnings->save();

        $payerEarnings = UserEarning::where('user_id', $payed_user->id)->first();
        $payerEarnings->total_earnings -= 50;
        $payerEarnings->save();

        $payer_confirm_paid = BoostingClicks::where('user_id', $receiver_user->id)
            ->where('booster_id', $payed_user->id)->where('account_id', $account_id)
            ->first();

        $payer_confirm_paid->paid = 1;
        $payer_confirm_paid->save();

        Notification::create([
            'user_id' => $payed_user->id,
            'title' => 'You have successfully paid 50 FR To ' . $receiver_user->username,
            'link' => route('ShowDashboard'),
            'category' => 'Transaction',
            'open' => 0
        ]);
        Notification::create([
            'user_id' => $receiver_user->id,
            'title' => 'You have successfully received 50 FR From ' . $payed_user->username,
            'link' => route('ShowDashboard'),
            'category' => 'Transaction',
            'open' => 0
        ]);

        return redirect()->back()->with('success', 'You have successfully paid 50 FR To ' . $receiver_user->username);
    }

    public function ClaimingRewardTrivia(Request $request)
    {
        $user = Auth::user()->id;
        $trivia_id = $request->input('trivia_id');

        $trivia = TriviaQuizz::findOrFail($trivia_id);
        if ($trivia) {
            $trivia_result = TriviaQuizzesResult::where('quiz_id', $trivia_id)->where('user_id', $user)->first();
            $trivia_price = $trivia->price;

            if (!$trivia_result) {


                TriviaQuizzesResult::create([
                    'user_id' => $user,
                    'quiz_id' => $trivia_id,
                ]);

                $userEarnings = UserEarning::firstOrNew(['user_id' => $user]);
                $userEarnings->quiz_earnings += $trivia_price;
                $userEarnings->total_earnings += $trivia_price;
                $userEarnings->save();

                Notification::create([
                    'user_id' => $user,
                    'title' => 'You have earned ' . $trivia_price . ' FR',
                    'link' => route('ShowDashboard'),
                    'category' => 'Transaction',
                    'open' => 0
                ]);


                return response()->json('Congratulations! You have earned $' . $trivia_price);
            } else {
                return response()->json('You have already watched this video');
            }
        } else {
            abort(404);
        }
    }

}
