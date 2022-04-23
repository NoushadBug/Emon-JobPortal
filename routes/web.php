<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Frontend\SearchController;
use App\Http\Controllers\Frontend\FrontendController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Login Routes
Auth::routes();
// Include Admin Route
@include('admin.php');
// Include Company Route
@include('company.php');
// Include User Route
@include('user.php');



// Frontend
Route::get('/', [FrontendController::class, 'index'])->name('index');
Route::get('/contact', [FrontendController::class, 'contact'])->name('contact');
Route::post('/contact/send', [FrontendController::class, 'contactSend'])->name('contact.send');
Route::get('/category/{id}', [FrontendController::class, 'category'])->name('category');
Route::get('/job-post/details/{id}',[FrontendController::class, 'jobPostDetails'])->name('jobpost.details');
Route::post('/subscribe', [FrontendController::class, 'subscriberStore'])->name('subscribe');
Route::get('/government/company', [FrontendController::class, 'governmentCompany'])->name('government.company');
Route::get('/private/company', [FrontendController::class, 'privateCompany'])->name('private.company');

// Search Company
Route::get('/search-by-company', [SearchController::class, 'searchByCompany'])->name('search.by.company');
// Search By Word
Route::get('/search-by-word',[SearchController::class,'searchByWord'])->name('search.by.word');
Route::get('/company-job-posts/{id}',[SearchController::class,'companyJobPosts'])->name('company.job.posts');
Route::get('job-search', [SearchController::class,'jobSearch'])->name('job.search');









