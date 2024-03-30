<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Video;
use App\Models\Sessions;
use App\Models\TriviaQuizz;
use App\Models\UserEarning;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    public function index()
    {
        $userCount = User::count();
        $sessionCount = Sessions::count();
        $activeUserCount = User::where('status', 'active')->count();
        $pendingUserCount = User::where('status', 'pending')->count();
        return view('admin.admin', [
            'users' => User::orderBy('created_at')->filter(request(['search']))->paginate(10),
            'userCount' => $userCount,
            'activeUserCount' => $activeUserCount,
            'pendingUserCount' => $pendingUserCount,
            'sessionCount' => $sessionCount
        ]);
    }

    public function Login()
    {
        return view('admin.auth.login');
    }
    public function delete($id)
    {
        $user = User::find($id);

        if (!$user) {
            // Handle the case where the record doesn't exist
            return redirect()->back()->with('error', 'User Not Found.');
        }

        $image = $user->profile;

        if ($image && $image !== 'storage/images/avatars/user-1.jpg') {
            File::delete($image);
        }

        $user->delete();

        return Redirect::route('admin')->with('success', 'User Deleted Successfully.');
    }

    public function Edit($username)
    {
        $user = User::where('username', $username)->first();
        if (!$user) {
            abort(404);
        } else {
            $UserEarning = UserEarning::where('user_id', $user->id)->first();
            return view('admin.actions.edit-user', ['user' => $user, 'UserEarning' => $UserEarning]);
        }
    }
    public function Update(Request $request, $username)
    {
        $user = User::where('username', $username)->firstOrFail();
        $db_user = User::where('username', $username)->firstOrFail();

        $formFields = $request->validate([
            'username' => 'required|unique:users,username,' . $user->id,
            'email' => 'required|unique:users,email,' . $user->id,
            'number' => 'required|unique:users,number,' . $user->id,
            'earnings' => 'nullable|numeric',
            'role' => 'required|in:Standard,Admin',
            'status' => 'required|in:Active,Pending',
        ], [
            'username.unique' => 'The :input is already taken.',
            'username.required' => 'The username field is required.',
            'email.unique' => 'The email is already registered.',
            'email.required' => 'The email field is required.',
            'number.unique' => 'The number is already registered',
            'number.required' => 'The number field is required.',
            'earnings.numeric' => 'The earnings must be a numeric value.',
            'role.required' => 'The role field is required.',
            'role.in' => 'Invalid role value.',
            'status.required' => 'The status field is required.',
            'status.in' => 'Invalid status value.',
        ]);

        $user->username = $formFields['username'];
        $user->email = $formFields['email'];
        $user->number = $formFields['number'];
        $user->role = $formFields['role'];
        $user->status = $formFields['status'];


        if (!empty($formFields['earnings'])) {
            $user_earnings = $formFields['earnings'];
            $earnings = UserEarning::where('user_id', $user->id)->first();
            if ($earnings == null) {
                $new_earnings = ([
                    'user_id' => $user->id,
                    'total_earnings' => $user_earnings
                ]);
                UserEarning::create($new_earnings);
            } else {
                $User_Earning = UserEarning::where('user_id', $user->id)->first();
                $User_Earning->update(['total_earnings' => $user_earnings]); // Wrap $user_earnings in an array
            }
        }
        // if user is not already active
        if ($db_user->status == "Pending" && $formFields['status'] == 'Active') {
            $referralId = $db_user->referral_id;
            if ($referralId != null) {
                $userReferralEarnings = UserEarning::firstOrNew(['user_id' => $referralId]);
                $userReferralEarnings->referral_earnings += 2000;
                $userReferralEarnings->total_earnings += 2000;
                $userReferralEarnings->save();

                Notification::create([
                    'user_id' => $referralId,
                    'title' => 'Your referral ' . $formFields['username'] . ' has confirmed his account.',
                    'link' => route('ShowReferralsTables'),
                    'category' => 'Announcements',
                    'open' => 0
                ]);
            }
        }


        $user->update($formFields);
        // if (!empty($user->email)) {
        //     Mail::send('Email.new-user', ['data' => $user], function ($message) use ($user) {
        //         $message->from('mailtrap@LipaEarn.com', 'Sender Name') // Specify the sender email and name
        //                 ->to($user->email)
        //                 ->subject($user->username);
        //     });

        // }

        return redirect()->route('admin.edit', ['username' => $user->username])->with('success', 'User details updated successfully.');
    }

    public function UpdatePassword(Request $request, $username)
    {
        $user_pwd = User::where('username', $username)->firstOrFail();
        $formFields = $request->validate(
            [

                'password' => 'nullable|confirmed',
            ],
            [

                'password.confirmed' => 'The password do not match.',

            ]
        );


        $formFields['password'] = Hash::make($formFields['password']);

        $user_pwd->update($formFields);

        return redirect()->route('admin.edit', ['username' => $user_pwd->username])->with('success', 'User details updated successfully.');
    }
    public function ShowYoutubeUploadPage()
    {
        $videos = Video::where('category', 'Youtube')->get();
        return view('admin.actions.youtube-upload', ['videos' => $videos]);
    }
    public function UploadYoutube(Request $request)
    {
        $inputs = $request->validate([
            'title' => 'required',
            'url' => 'required|youtube_url|unique:videos',
            'price' => 'required|numeric',
            'category' => 'required',
            'watch_day' => 'required',
        ], [
            'url.youtube_url' => 'Please enter valid youtube url ex: https://www.youtube.com/watch?v=oarhksXX-ic'
        ]);
        Video::create($inputs);
        return Redirect::route('ShowYoutubeUploadPage')->with('success', 'Video Uploaded successfully');
    }
    public function ShowTiktokUploadPage()
    {
        $videos = Video::where('category', 'Tiktok')->get();
        return view('admin.actions.tiktok-upload', ['videos' => $videos]);
    }
    public function DeleteVideo($id)
    {
        $Video = Video::find($id);

        if (!$Video) {
            return redirect()->back()->with('error', 'Video Not Found.');
        }

        $Video->delete();

        return redirect()->back()->with('success', 'Video Deleted Successfully.');
    }
    public function ShowEditVideo($video)
    {
        $video = Video::findOrFail($video);
        if(!$video){
            return redirect()->back()->with('error', 'Video Not Found.');
        }
        return view('admin.actions.edit-video', ['video' => $video]);
    }
    public function EditVideo(Request $request , $video) {
        $video = Video::findOrFail($video);
        if(!$video){
            return redirect()->back()->with('error', 'Video Not Found.');
        }
        $inputs = $request->validate([
            'title' => 'required' ,
            'url' => 'required|url|unique:videos,url,' . $video->id,
            'price' => 'required|numeric',
            'category' => 'required',
            'watch_day' => 'required',
        ]);
        $video->update($inputs);
        return redirect()->back()->with('success', 'Video Edited Successfully.');
    }
    public function UploadTiktok(Request $request)
    {
        $inputs = $request->validate([
            'title' => 'required',
            'url' => 'required|url|unique:videos',
            'price' => 'required|numeric',
            'category' => 'required',
            'watch_day' => 'required',
        ]);
        Video::create($inputs);
        return Redirect::route('ShowTiktokUploadPage')->with('success', 'Video Uploaded successfully');
    }
    public function ShowTriviaUploadPage()
    {
        return view('admin.actions.trivia-upload');
    }
    public function uploadTrivia(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'question' => 'required|string|max:255',
            'correct_answer' => 'required|string|max:255',
            'option1' => 'required|string|max:255',
            'option2' => 'required|string|max:255',
            'option3' => 'required|string|max:255',
            'option4' => 'required|string|max:255',
            'watch_day' => 'required',
            'price' => 'required',

        ]);

        // Create a new Trivia instance and store the data
        $trivia = new TriviaQuizz();
        $trivia->question = $validatedData['question'];
        $trivia->correct_answer = $validatedData['correct_answer'];
        $trivia->option1 = $validatedData['option1'];
        $trivia->option2 = $validatedData['option2'];
        $trivia->option3 = $validatedData['option3'];
        $trivia->option4 = $validatedData['option4'];
        $trivia->watch_day = $validatedData['watch_day'];
        $trivia->price = $validatedData['price'];
        $trivia->save();

        // Optionally, you can redirect the user back with a success message
        return Redirect::route('ShowTriviaUploadPage')->with('success', 'Trivia Uploaded successfully');
    }


}
