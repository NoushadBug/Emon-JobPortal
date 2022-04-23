<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ThanaController;
use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DistrictController;
use App\Http\Controllers\Admin\IndustryController;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\Admin\PendingJobController;
use App\Http\Controllers\Admin\SubscriberController;
use App\Http\Controllers\Admin\ApprovedJobController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\ProfileSettingController;
use App\Http\Controllers\Admin\ResumeContrller;

//Admin Routes
Route::group(['as' => 'admin.', 'prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {
    Route::get('starter-page', [AdminDashboardController::class, 'starterPage'])->name('starter.page');
    Route::get('profile', [ProfileSettingController::class, 'profile'])->name('profile');
    Route::put('profile-update', [ProfileSettingController::class, 'profileUpdate'])->name('profile.update');
    Route::get('change-password', [ProfileSettingController::class, 'changePassword'])->name('change.password');
    Route::put('password-update', [ProfileSettingController::class, 'updatePassword'])->name('password.update');
    Route::get('dashboard',[AdminDashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('user',[AdminDashboardController::class, 'user'])->name('user');
    Route::get('create-user',[AdminDashboardController::class, 'createUser'])->name('create.user');
    Route::get('create-role',[AdminDashboardController::class, 'roleCreate'])->name('create.role');
    Route::get('role',[AdminDashboardController::class, 'role'])->name('role');
    Route::get('data-table',[AdminDashboardController::class, 'dataTable'])->name('data.table');
    Route::get('setting', [AdminDashboardController::class, 'setting'])->name('setting');
    // Contact
    Route::resource('contact', ContactController::class)->only('index', 'show', 'destroy');
    // Subscriber
    Route::resource('subscriber', SubscriberController::class)->only('index', 'destroy');
    Route::resource('district', DistrictController::class);
    Route::resource('thana', ThanaController::class);
    Route::resource('industry', IndustryController::class);
    Route::resource('category', CategoryController::class);
    Route::resource('company', CompanyController::class);
    Route::get('company/posted-jobs/{id}',[CompanyController::class, 'postedJobs'])->name('company.posted.jobs');
    Route::get('company/show-job/{id}',[CompanyController::class, 'showJob'])->name('company.show.job');
    Route::put('company/approved-job-post/{id}',[CompanyController::class, 'approvedJobPost'])->name('company.approved.job.post');
    Route::put('company/reject-job-post/{id}',[CompanyController::class, 'rejectJobPost'])->name('company.reject.job.post');
    Route::resource('pending-job', PendingJobController::class);
    Route::resource('approved-job', ApprovedJobController::class);
    Route::resource('resume', ResumeContrller::class);

});

// Setting Routes
Route::group(['as' => 'admin.setting.', 'prefix' => 'admin/setting'], function(){
    Route::get('generel', [SettingController::class, 'generel'])->name('generel');
    Route::put('generel-update', [SettingController::class, 'generelUpdate'])->name('generel.update');
    Route::put('appearance-update', [SettingController::class, 'appearanceUpdate'])->name('appearance.update');
    Route::put('mail-update', [SettingController::class, 'mailUpdate'])->name('mail.update');
});


// Admin Login
Route::get('admin/login', [AdminLoginController::class, 'adminLogin'])->name('admin.login');
Route::post('admin/login/check', [AdminLoginController::class, 'adminLoginCheck'])->name('admin.login.check');