<?php

use App\Http\Middleware\IsCompleted;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SocialLoginController;
use App\Http\Controllers\common\AgoraController;
use App\Http\Controllers\common\StripePaymentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ChallengeController;
use App\Http\Controllers\Auth\VerificationController;

Route::get('/', function () {
    return view('welcome');
})->name('home');



#Auth routes login,register,google,facebook==================
Auth::routes();

Route::get('auth/{provider}/redirect', [SocialLoginController::class , 'redirect'])->name('auth.socialite.redirect');
Route::get('auth/{provider}/callback', [SocialLoginController::class , 'callback'])->name('auth.socialite.callback');


#agora integration routes===============================
Route::post('/get-token', [AgoraController::class, 'getToken']);
Route::post('/get-token-salon/{salon}', [AgoraController::class, 'getTokenSalon']);


#stripe integration===================================
Route::get('/stripe', [StripePaymentController::class, 'stripe']);
Route::post('/stripe-post', [StripePaymentController::class, 'stripePost'])->name('stripe.post');



#User Dashboard Routes=================================
Route::group(['prefix' => 'dashboard', 'middleware' => ['auth']], function () {
    // Routes accessible after authentication only
    Route::get('/complete-profile', [VerificationController::class, 'getIncompleteProfile'])->name('get.incomplete.profile');
    Route::post('/complete-profile', [VerificationController::class, 'completeUserProfile'])->name('complete.profile');

    // Middleware to ensure the profile is completed
    Route::middleware(['iscompleted'])->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('challenge', ChallengeController::class);



        #Challanges===================
        Route::get('challenges', [ChallengeController::class, 'showAll'])->name('challenges');
        Route::get('my-challenges/', [ChallengeController::class, 'showList'])->name('challanges.all.list');
        Route::get('my-challenge-detail/{id}', [ChallengeController::class, 'showDetail'])->name('challange.detail');
        Route::post('store', [ChallengeController::class, 'store'])->name('challenge.store');
        Route::post('challenges/{id}', [ChallengeController::class, 'update'])->name('challenge.update');

        
        #  Share url link===================
        Route::get('challange-detail/{id}', [ChallengeController::class, 'showShareDetail'])->name('challange.share');


        Route::get('leaderboard', [DashboardController::class, 'leaderboard'])->name('leaderboard');
        Route::get('profile', [DashboardController::class, 'profile'])->name('profile');
        Route::get('social-feed-details', [DashboardController::class, 'socialFeedDetails'])->name('social-feed-details');
        Route::get('social-feed', [DashboardController::class, 'socialFeed'])->name('social-feed');
        Route::get('stream', [DashboardController::class, 'stream'])->name('stream');
    });
});

