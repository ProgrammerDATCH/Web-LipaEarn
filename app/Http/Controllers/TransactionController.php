<?php

namespace App\Http\Controllers;

use App\Models\Referral;
use App\Models\Withdrawal;
use App\Models\UserEarning;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\Models\PaymentTransaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Country;

class TransactionController extends Controller
{
    public function ShowWithdrawalForm()
    {
        $user = Auth::user();
        $notifications = Notification::where('user_id', $user->id)->where('open', 0)->get();
        $notifications_counts = $notifications->count();

        $UserEarning = UserEarning::where('user_id', $user->id)->first();
        $referral = Referral::where('user_id', $user->id)->first();
        $withdrawal = Withdrawal::where('user_id', $user->id)->first();

        $country = $user->country;
        $country_data = Country::where('country', $country)->first();

        return view('withdrawal', [
            'user' => $user,
            'UserEarning' => $UserEarning,
            'referral' => $referral,
            'withdrawal' => $withdrawal,
            'notifications' => $notifications,
            'notifications_counts' => $notifications_counts,
            'country_data' => $country_data,
        ]);
    }
    public function WithdrawalRequest(Request $request)
    {
        $user = Auth::user();
        $UserEarning = UserEarning::where('user_id', $user->id)->first();

        $allowedToWithdraw = $UserEarning->referral_earnings;

        $country = $user->country;
        $country_data = Country::where('country', $country)->first();


        $inputs = $request->all();
        $amount = $inputs['amount'];
        $number = $inputs['number'];
        if (empty($amount)) {
            return redirect()->back()->withErrors(['The amount field is required']);
        }

        $withdrawal_fees = $amount * $country_data->withdrawal_fees;

        $total_amount = $amount + $withdrawal_fees;

        if($total_amount < $country_data->withdrawal_min) {
            return redirect()->back()->withErrors(['The amount you requested is under minimum amount of allowed amount to withdrawal: ' . $country_data->withdrawal_min . ' ' . $country_data->currency]);
        }
        if ($total_amount > $UserEarning->total_earnings) {
            return redirect()->back()->withErrors(['The amount you entered is greater than your balance.']);
        }
        if ($total_amount > $allowedToWithdraw) {
            return redirect()->back()->withErrors(['The amount you entered is greater than your balance allowed to be withdrawn. You are allowed to withdraw: ' . number_format($allowedToWithdraw) . ' ' . $country_data->currency]);
        }
        $withdrawal_save_data = Withdrawal::create([
            'user_id' => $user->id,
            'amount'=> $amount,
            'fees'=> $withdrawal_fees,
            'pay_through' => $number,
            'status' => 'Pending'
        ]);
        $UserEarning->total_earnings -= $total_amount;
        $save_query = $UserEarning->save();

        if ($withdrawal_save_data && $save_query)
        {
            Notification::create([
                'user_id' => $user->id,
                'title' => 'Your request to withdraw  '. $amount.' FRW submitted successfully.',
                'link' => route('ShowWithdrawalForm'),
                'category' => 'Announcements',
                'open' => 0
            ]);
            return redirect()->back()->with('success', 'Withdrawal has been successfully occurred');

        }
        else{
            return redirect()->back()->withErrors(['There was an error in transaction try again after a minute']);
        }
    }

}
