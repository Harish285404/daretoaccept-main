<?php

use App\Http\Middleware\IsCompleted;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SocialLoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ChallengeController;
use App\Http\Controllers\Auth\VerificationController;

Route::get('/', function () {
    return view('welcome');
})->name('home');




Auth::routes();

Route::get('auth/{provider}/redirect', [SocialLoginController::class , 'redirect'])->name('auth.socialite.redirect');
Route::get('auth/{provider}/callback', [SocialLoginController::class , 'callback'])->name('auth.socialite.callback');

Route::group(['prefix' => 'dashboard', 'middleware' => ['auth']], function () {
    // Routes accessible after authentication only
    Route::get('/complete-profile', [VerificationController::class, 'getIncompleteProfile'])->name('get.incomplete.profile');
    Route::post('/complete-profile', [VerificationController::class, 'completeUserProfile'])->name('complete.profile');

    // Middleware to ensure the profile is completed
    Route::middleware(['iscompleted'])->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('challenge', ChallengeController::class);
        Route::get('challenges', [ChallengeController::class, 'showAll'])->name('challenges');
        Route::post('challenges/{id}', [ChallengeController::class, 'update'])->name('challenge.update');
        Route::get('leaderboard', [DashboardController::class, 'leaderboard'])->name('leaderboard');
        Route::get('profile', [DashboardController::class, 'profile'])->name('profile');
        Route::get('social-feed-details', [DashboardController::class, 'socialFeedDetails'])->name('social-feed-details');
        Route::get('social-feed', [DashboardController::class, 'socialFeed'])->name('social-feed');
        Route::get('stream', [DashboardController::class, 'stream'])->name('stream');
    });
});

