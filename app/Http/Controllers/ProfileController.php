<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function profile()
    {
        $user = Auth::user();
        $notifications = Notification::where('user_id', $user->id)->where('open', 0)->get();
        $notifications_counts = $notifications->count();
        
        return view('pages.profile', compact('notifications', 'notifications_counts'));
    }

    public function UpdateProfile(Request $request, $id)
    {
        $user = User::findOrFail($id);
        
        $formFields = $request->validate([
            'username' => 'required|unique:users,username,' . $user->id,
            'email' => 'required|unique:users,email,' . $user->id,
            'number' => 'required|unique:users,number,' . $user->id,
            'password' => 'nullable|confirmed',
            'country' => 'required',
        ], [
            'username.unique' => 'The :input is already taken.',
            'username.required' => 'The username field is required.',
            'email.unique' => 'The email is already registered.',
            'email.required' => 'The email field is required.',
            'number.unique' => 'The number is already registered',
            'number.required' => 'The number field is required.',
        ]);

        if ($request->hasFile('profile_picture')) {
            $profile_picture = 'storage/' . $request->file('profile_picture')->store('users', 'public');
            $formFields['profile'] = $profile_picture;
        }

        $user->update($formFields);

        return redirect()->route('profile')->with('message', 'Profile updated successfully.');
    }

    public function UpdatePassword(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $passwords = $request->validate([
            'password' => 'required|confirmed',
        ], [
            'password.confirmed' => 'The password do not match.',
        ]);

        $passwords['password'] = Hash::make($passwords['password']);
        $user->update($passwords);

        return redirect()->route('profile')->with('message', 'Password changed successfully.');
    }
}
