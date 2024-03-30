<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\SendMail;
use App\Models\Session;
use App\Models\Activation;
use App\Models\Withdrawal;
use Illuminate\Http\Request;
use App\Models\PaymentTransaction;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class AdminActivityController extends Controller
{
    public function Index()
    {
        $users = User::orderBy('created_at')->filter(request(['search']))->paginate(10);

        return view('admin.data.index', [
            'users' => $users,
        ]);
    }
    public function ViewActiveUsers()
    {

        return view('admin.data.index', [
            'users' => User::where('status', 'Active')
                ->orderBy('created_at')
                ->filter(request(['search']))
                ->paginate(10),
        ]);
    }

    public function ViewPendingUsers()
    {

        return view('admin.data.index', [
            'users' => User::where('status', 'Pending')
                ->orderBy('created_at')
                ->filter(request(['search']))
                ->paginate(10),
        ]);
    }

    public function ViewReferrals()
    {
        $users = User::has('referrals')->paginate(10);

        $hisReferrals = [];
        foreach ($users as $user) {
            $hisReferral = User::find($user->referral_id);

            if ($hisReferral) {
                $hisReferrals[$user->id] = $hisReferral;
            }
        }

        return view('admin.data.index', [
            'users' => $users,
            'hisReferrals' => $hisReferrals,
        ]);
    }



    public function RequestedWithdrawal()
    {
        $users = User::has('Withdrawal')->paginate(10);

        $request = [];
        if ($users) {
            foreach ($users as $user) {
                $request = Withdrawal::where('user_id', $user->id)->get();
            }
        }

        return view('admin.data.withdrawal-request', [
            'users' => $users,
            'request' => $request
        ]);

    }
    public function WithdrawalApprove(Request $request)
    {
        $user_id = $request->input('request_id');
        $user = Withdrawal::findOrFail($user_id);
        $user->status = "Approved";
        $executionQuery = $user->save();
        if($executionQuery)
        {
            return redirect()->back()->with('success','User Withdraw Request Approved');
        }else{
            return redirect()->back()->with('error','There was an error approving this withdrawal request');
        }

    }
    public function ViewNewUsers()
    {

        return view('admin.data.index', [
            'users' => User::orderBy('created_at', 'desc')
                ->filter(request(['search']))
                ->paginate(10),
        ]);
    }

    public function ViewOldUsers()
    {
        return view('admin.data.index', [
            'users' => User::orderBy('created_at', 'asc')
                ->filter(request(['search']))
                ->paginate(10),
        ]);
    }
    public function ShowPaymentActivation()
    {
        $Proofs = Activation::with('user')->paginate(10);
        $users = User::has('activation')->paginate(10);

        return view('admin.data.activation', [
            'users' => $users,
            'Proofs' => $Proofs,
        ]);
    }

    public function ApproveActivation(Request $request)
    {
        $activation = Activation::where('id', $request->input('activation_id'))->first();
        $user = User::where('id', $activation->user_id)->first();
        $user->status = "Active";
        $userActivated = $user->save();
        if($userActivated)
        {
            return redirect()->back()->with('success', "Activated Successfully!");
        }
        else
        {
            return redirect()->back()->with('error', "There was an error, in Activating User.");
        }
    }

    public function sendEmail()
    {
        // if ($request->hasFile('screenshot')) {
        //     $screenshot = $request->file('screenshot');
        //     $screenshotPath = 'screenshots/' . $screenshot->getClientOriginalName();

        //     // Store the screenshot
        //     Storage::disk('public')->put($screenshotPath, file_get_contents($screenshot));

        //     // $data = [
        //     //     'message' => 'Please find the screenshot attached.',
        //     // ];

        //     // Mail::to($user->email)->send(new SendScreenshotEmail($data, $screenshotPath));

        //     // Additional actions if needed
        // }
        Mail::to('lipaearn@gmail.com')->send(new SendMail());
    }


}
