<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserDashboardController;

//User Or Author Routes
Route::group(['as' => 'user.', 'prefix' => 'user', 'middleware' => ['auth', 'user']], function () {
    Route::get('dashboard', [UserDashboardController::class, 'dashboard'])->name('dashboard');
    Route::put('update-avater', [UserDashboardController::class, 'updateAvater'])->name('update.avater');
    Route::get('edit-profile', [UserDashboardController::class, 'editProfile'])->name('edit.profile');
    Route::get('create/job-post', [UserDashboardController::class, 'createJobPost'])->name('create.job.post');
    Route::get('all-posted/jobs', [UserDashboardController::class, 'allPostedJobs'])->name('all.posted.jobs');
    Route::delete('delete-posted/job/{id}', [UserDashboardController::class, 'deletePostedJob'])->name('delete.posted.job');
    Route::post('store/job-post', [UserDashboardController::class, 'storeJobPost'])->name('store.job.post');
    Route::get('edit/job-post/{id}', [UserDashboardController::class, 'editJobPost'])->name('edit.job.post');
    Route::put('update/job-post/{id}', [UserDashboardController::class, 'updateJobPost'])->name('update.job.post');
    Route::put('update-profile', [UserDashboardController::class, 'profileUpdate'])->name('update-profile');
    Route::get('change-passwrod', [UserDashboardController::class, 'changePassword'])->name('change.password');
    Route::put('update-password', [UserDashboardController::class, 'updatePassword'])->name('update.password');
    Route::get('resume', [UserDashboardController::class, 'resume'])->name('resume');
    Route::post('store-resume', [UserDashboardController::class, 'storeResume'])->name('store.resume');
});
