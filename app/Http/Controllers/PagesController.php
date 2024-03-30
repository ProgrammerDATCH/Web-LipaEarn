<?php

namespace App\Http\Controllers;

use App\Models\Activation;
use App\Models\ActivationFees;
use App\Models\Country;
use App\Models\User;
use App\Models\Referral;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
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

    public function ShowHelpPage()
    {
        $commonData = $this->getCommonData();

        return view('pages.help', $commonData);
    }

    public function ShowUnpayedPage()
    {
        $commonData = $this->getCommonData();
        return view('pages.unpayed', array_merge($commonData) );
    }
    public function PayRequest(Request $request)
    {
        $user = Auth::user();
        $form = $request->validate([
            'fname' => 'required|string',
            'lname' => 'required|string',
            'number' => 'required|numeric',
            'screenshot' => 'required'
        ], [
            'fname.required' => 'First name field is required',
            'lname.required' => 'Last name field is required',
            'number.required' => 'Mobile number field is required',
            'number.numeric' => 'Mobile number must be numeric'
        ]);

        if ($request->hasFile('screenshot')) {
            $screenshot = 'storage/' . $request->file('screenshot')->store('screenshots', 'public');
            $form['screenshot'] = $screenshot;
        }
        Activation::create([
            'user_id' => $user->id,
            'first_name' => $form['fname'],
            'last_name' => $form['lname'],
            'pay_number' => $form['number'],
            'screenshot' => $form['screenshot'],
            'activated'=> 0
        ]);
        return redirect()->back()->with('success', 'Proof submitted successfully wait for response in few minutes.');
    }

    public function ShowReferralsTables()
    {
        $referral_id = Auth::id();
        $user = Auth::user();
        $commonData = $this->getCommonData();

        $referral = Referral::where('referral_id', $referral_id)->first();
        if ($referral) {
            $user_id = $referral->user_id;
            $users = User::where('referral_id', $referral_id)->paginate(5);
            return view('pages.referrals', array_merge(['users' => $users], $commonData));
        }

        return view('pages.referrals', array_merge(['users' => null], $commonData));
    }
}
