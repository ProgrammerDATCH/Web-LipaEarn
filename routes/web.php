<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\WatchController;
use App\Http\Controllers\GithubController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\AdminActivityController;
use App\Http\Controllers\EarningActivityController;


Route::get('/', [LoginController::class, 'ShowLoginForm']);
Route::middleware(['status'])->group(function () {


    Route::get('dashboard/analytics', [DashboardController::class, 'ShowDashboard'])->name('ShowDashboard');
    Route::post('dashboard/analytics/open/notification/{id}', [DashboardController::class, 'OpenedNotification'])->name('OpenedNotification');

    Route::get('/withdrawal', [TransactionController::class, 'ShowWithdrawalForm'])->name('ShowWithdrawalForm');
    Route::post('/withdrawal', [TransactionController::class, 'WithdrawalRequest'])->name('WithdrawalRequest');

    Route::get('/profile', [ProfileController::class, 'profile'])->name('profile');
    Route::put('/profile/update/{id}', [ProfileController::class, 'UpdateProfile'])->name('UpdateProfile');
    Route::put('/profile/update/password/{id}', [ProfileController::class, 'UpdatePassword'])->name('UpdatePassword');

    Route::get('/referrals', [PagesController::class, 'ShowReferralsTables'])->name('ShowReferralsTables');

    Route::get('/earnings/watch/yt', [WatchController::class, 'ShowWatchYoutubePage'])->name('ShowWatchYoutubePage');
    Route::post('/earnings/watch/yt', [WatchController::class, 'ClaimingRewardYoutube'])->name('ClaimingRewardYoutube');

    Route::get('/earnings/watch/tk', [WatchController::class, 'ShowWatchTiktokPage'])->name('ShowWatchTiktokPage');
    Route::post('/earnings/watch/tk', [WatchController::class, 'ClaimingRewardTiktok'])->name('ClaimingRewardTiktok');


    Route::get('/earnings/spin', [EarningActivityController::class, 'ShowSpinPage'])->name('ShowSpinPage');
    Route::post('/earnings/spin', [EarningActivityController::class, 'ClaimingSpinReward'])->name('ClaimingSpinReward');
    Route::get('/earnings/trivias', [EarningActivityController::class, 'ShowTriviasPages'])->name('ShowTriviasPages');
    Route::post('/earnings/trivias', [EarningActivityController::class, 'ClaimingRewardTrivia'])->name('ClaimingRewardTrivia');

    Route::post('/earnings/boosting/clicked', [EarningActivityController::class, 'BoosterAccountClicked'])->name('BoosterAccountClicked');
    Route::get('/earnings/boosting/create', [EarningActivityController::class, 'ShowCreateBoostingAccountPage'])->name('ShowCreateBoostingAccountPage');
    Route::post('/earnings/boosting/pay/', [EarningActivityController::class, 'PayUserClick'])->name('PayUserClick');
    Route::get('/earnings/boosting/booster', [EarningActivityController::class, 'ShowBoosterPage'])->name('ShowBoosterPage');
    Route::post('/earnings/boosting/create', [EarningActivityController::class, 'CreateBoostingAccount'])->name('CreateBoostingAccount');
    Route::get('/earnings/boosting/instagram', [EarningActivityController::class, 'ShowInstagramBoostingPage'])->name('ShowInstagramBoostingPage');
    Route::get('/earnings/boosting/tiktok', [EarningActivityController::class, 'ShowTiktokBoostingPage'])->name('ShowTiktokBoostingPage');
    Route::get('/earnings/boosting/youtube', [EarningActivityController::class, 'ShowYoutubeBoostingPage'])->name('ShowYoutubeBoostingPage');
});
Route::get('auth/register', [RegisterController::class, 'ShowRegisterForm'])->name('ShowRegisterForm');
Route::post('auth/register', [RegisterController::class, 'RegisterRequest'])->name('RegisterRequest');
Route::get('auth/register/referral', [RegisterController::class, 'ReferralRegisterForm'])->name('ReferralRequestForm');



Route::get('auth/login', [LoginController::class, 'ShowLoginForm'])->name('ShowLoginForm');
Route::post('auth/login', [LoginController::class, 'LoginRequest'])->name('LoginRequest');

Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('redirectToGoogle');
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback'])->name('GoogleCallback');

Route::get('auth/github', [GithubController::class, 'redirectToGithub'])->name('redirectToGithub');
Route::get('auth/github/callback', [GithubController::class, 'handleGithubCallback'])->name('GithubCallback');



Route::middleware(['auth'])->group(function () {
    Route::get('unactive/', [PagesController::class, 'ShowUnpayedPage'])->name('ShowUnpayedPage');
    Route::post('unactive/', [PagesController::class, 'PayRequest'])->name('PayRequest');
    Route::get('/help', [PagesController::class, 'ShowHelpPage'])->name('ShowHelpPage');
});

Route::post('auth/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('auth/logout', function () {
    abort(404);
});

// Route::get('auth/forgot', [LoginController::class, 'ForgotPasswordForm'])->name('ForgotPasswordForm');
// Route::post('auth/forgot', [LoginController::class, 'ResetRequest']);

Route::get('auth/email/verify', [LoginController::class, 'EmailVerifyForm'])->name('EmailVerifyForm');
Route::post('auth/email/verify', [LoginController::class, 'EmailVerifyRequest'])->name('EmailVerifyRequest');
















Route::middleware(['admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'Index'])->name('admin');
    Route::get('/admin/login', [AdminController::class, 'Login'])->name('admin.login');
    Route::get('/admin/delete/{id}', [AdminController::class, 'Delete'])->name('admin.delete');
    Route::get('/admin/edit/{username}', [AdminController::class, 'Edit'])->name('admin.edit');
    Route::put('/admin/edit/{username}', [AdminController::class, 'Update'])->name('admin.update');
    Route::put('/admin/edit/password/{username}', [AdminController::class, 'UpdatePassword'])->name('admin.updatePassword');

    Route::get('/admin/upload/tiktok', [AdminController::class, 'ShowTiktokUploadPage'])->name('ShowTiktokUploadPage');
    Route::post('/admin/upload/tiktok', [adminController::class, 'UploadTiktok'])->name('UploadTiktok');
    Route::delete('/admin/delete/video/{id}', [adminController::class, 'deleteVideo'])->name('deleteVideo');
    Route::get('/admin/edit/video/{id}', [adminController::class, 'ShowEditVideo'])->name('ShowEditVideo');
    Route::put('/admin/edit/video/{id}', [adminController::class, 'EditVideo'])->name('EditVideo');
    


    Route::get('/admin/upload/youtube', [AdminController::class, 'ShowYoutubeUploadPage'])->name('ShowYoutubeUploadPage');
    Route::post('/admin/upload/youtube', [AdminController::class, 'UploadYoutube'])->name('UploadYoutube');

    Route::get('/admin/upload-trivia', [AdminController::class, 'ShowTriviaUploadPage'])->name('ShowTriviaUploadPage');
    Route::post('/admin/upload-trivia', [AdminController::class, 'UploadTrivia'])->name('UploadTrivia');


    Route::get('/admin/view/users/activity/all', [AdminActivityController::class, 'Index'])->name('webData');
    Route::get('/admin/view/users/activity/withdrawal/request', [AdminActivityController::class, 'RequestedWithdrawal'])->name('RequestedWithdrawal');
    Route::get('/admin/view/users/activity/withdrawal/approve', [AdminActivityController::class, 'WithdrawalApprove'])->name('WithdrawalApprove');
    Route::get('/admin/view/users/activity/active', [AdminActivityController::class, 'ViewActiveUsers'])->name('viewActiveUsers');
    Route::get('/admin/view/users/activity/pending', [AdminActivityController::class, 'ViewPendingUsers'])->name('viewPendingUsers');
    Route::get('/admin/view/users/activity/referrals', [AdminActivityController::class, 'ViewReferrals'])->name('viewReferrals');
    Route::get('/admin/view/users/activity/new', [AdminActivityController::class, 'ViewNewUsers'])->name('viewNewUsers');
    Route::get('/admin/view/users/activity/old', [AdminActivityController::class, 'ViewOldUsers'])->name('viewOldUsers');



    Route::get('/admin/view/users/payment/activation', [AdminActivityController::class, 'ShowPaymentActivation'])->name('ShowPaymentActivation');
});
Route::get('/send/email',[AdminActivityController::class,'sendEmail'])->name('sendEmail');