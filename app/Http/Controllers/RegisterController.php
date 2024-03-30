<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\User;
use App\Models\Referral;
use App\Models\UserEarning;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class RegisterController extends Controller
{
    public function ShowRegisterForm(Request $request)
    {
        return view('auth.register');
    }

    public function RegisterRequest(Request $request)
    {
        $formFields = $request->validate([
            'username' => 'required|string|regex:/^[A-Za-z0-9]+(?:[_-][A-Za-z0-9]+)*$/|max:255|unique:users',
            'email' => 'required|string|unique:users',
            'number' => 'required|unique:users',
            'password' => 'required|confirmed',
            'terms' => 'required',
            'country' => 'required|string|',
            'referral' => 'nullable|exists:users,username',
        ], [
            'username.required' => 'The username field is required.',
            'username.unique' => 'The username is already taken.',
            'email.required' => 'The email field is required.',
            'email.unique' => 'The email is already registered.',
            'number.required' => 'The number field is required.',
            'number.unique' => 'The number is already registered.',
            'password.required' => 'The password field is required.',
            'password.confirmed' => 'The passwords do not match.',
            'terms.required' => 'You must agree to the terms and conditions.',
            'referral.exists' => 'The referral you provided is invalid.',
        ]);

        $referralId = null;
        $referralsCount = 0;

        if (isset($formFields['referral']) && $formFields['referral']) {
            $referralUser = User::where('username', $formFields['referral'])->first();
            if ($referralUser) {
                $referralId = $referralUser->id;
                $referralsCount = $referralUser->referrals;
                $referralUser->update(['referrals' => $referralsCount]);
            } else {
                return redirect()->route('register')->with('error', 'The referral you requested is not available');
            }
        }

        $formFields['password'] = Hash::make($formFields['password']);
        $formFields['profile'] = "storage/images/avatars/user-1.jpg";
        $formFields['role'] = "Standard";
        $formFields['referral_id'] = $referralId;

        $user = User::create($formFields);

        if ($referralId) {
            Referral::create([
                'user_id' => $user->id,
                'referral_id' => $referralId,
                'level' => 1,
            ]);
            Notification::create([
                'user_id' => $referralUser->id,
                'title' => 'Your have new referral '. $formFields['username'].'',
                'link' => route('ShowReferralsTables'),
                'category' => 'Announcements',
                'open' => 0
            ]);
        }

        Notification::create([
            'user_id' => $user->id,
            'title' => 'Welcome To LipaEarn',
            'link' => route('ShowDashboard'),
            'category' => 'Greeting',
            'open' => 0
        ]);
        Activity::create([
            'user_id'=> $user->id,
            'activity'=> 'You Registered On LipaEarn',
            'category'=> 'auth'
        ]);
        UserEarning::create([
            'user_id' => $user->id,
            'bonus_earnings' => 500,
        ]);
        $userEarnings = UserEarning::firstOrNew(['user_id' => $user->id]);
        $userEarnings->total_earnings += 500;
        $userEarnings->save();


        return redirect()->back()->with('success', 'Welcome ' . $user->username . ' to LipaEarn');
    }

    public function ReferralRegisterForm(Request $request)
    {
        $referral = $request->input('user');
        $user = User::where('username', $referral)->first();

        if ($user) {
            return view('auth.register', compact('user', 'referral'));
        }

        return Redirect::route('register')->with('error', 'Referral you requested is not available');
    }
}
