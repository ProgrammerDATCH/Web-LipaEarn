<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Sessions;
use Jenssegers\Agent\Agent;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\PersonalAccessToken;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    public function ShowLoginForm()
    {
        return view('auth.login');
    }

    public function LoginRequest(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ], [
            'username.required' => 'The Username Field Is Required',
            'password.required' => 'The Password Field Is Required',
        ]);

        $user = User::where('username', $credentials['username'])->first();

        if (!$user) {
            return redirect()->back()->with('invalid', 'User with this username not found');
        }

        if (Auth::attempt($credentials)) {
            $ip = request()->ip();
            $userAgent = request()->userAgent();
            $platiform = request()->header('sec-ch-ua-platform');
            Sessions::create([
                'user_id' => $user->id,
                'ip_address' => $ip,
                'user_agent' => $userAgent,
                'os' => $platiform

            ]);
            return Redirect::route('ShowDashboard');
        }

        return redirect()->back()->with('invalid', 'The password you entered is incorrect');
    }

    public function ForgotPasswordForm()
    {
        return view('auth.password-reset');
    }

    public function ResetRequest(Request $request)
    {
        $user = Auth::user();
        $password_reset = $request->validate([
            'password' => 'required'
        ]);

        $password = $password_reset['password'];

        if (Hash::check($password, $user->password)) {
            return redirect()->back()->with('invalid', 'The new password cannot be the same as the current password.');
        }

        $user->password = bcrypt($password);
        $user->save();

        return redirect()->back()->with('success', 'Password has been successfully reset.');
    }

    public function EmailVerifyForm()
    {
        return view('auth.email-reset');
    }

    public function EmailVerifyRequest(Request $request)
    {
        $email_request = $request->validate([
            'email' => 'required',
        ]);

        $email = User::where('email', $email_request['email'])->first();

        if (!$email) {
            return redirect()->back()->with('invalid', 'The email you requested not found.');
        }

       PersonalAccessToken::create([
        'tokenable_type' => 'password_reset',
        'tokenable_id' => substr(str_shuffle('1234567890'),0,8),
        'name' => 'reset_token',
        'token' => substr(str_shuffle('1234567890ABCDEFGHJKLMNOPQERSTUVWXYZabcdefghijklmnopqrstuvwxyz'),0,50),
        'last_used_at' => Carbon::now(),
        'abilities' => 'reset',
        
       ]);
       return redirect()->back()->with('success', 'This feature is not available right now.');
    }

    public function logout()
    {
        Auth::logout();
        Session::flush();
        Session::invalidate();
        Session::regenerateToken();
        return Redirect::route('ShowLoginForm');
    }
}