<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Laravel\Socialite\Facades\Socialite;

class GithubController extends Controller
{
    public function redirectToGithub()
    {
        return Socialite::driver('github')->redirect();
    }

    public function handleGithubCallback()
    {
        try {

            $user = Socialite::driver('github')->stateless()->user();


            $findUser = User::where('email', $user->email)->first();


            if ($findUser) {

                Auth::login($findUser);

                return Redirect::route('ShowDashboard');

            } else {
                return redirect()->back()->with('invalid', 'These credentials do not match our records.');

            }

        } catch (Exception $e) {
                return Redirect::route('ShowLoginForm')->with('invalid', 'Unknown error occurred.');

        }
    }
}