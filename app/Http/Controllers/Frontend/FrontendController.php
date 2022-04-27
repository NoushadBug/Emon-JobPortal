<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use App\Models\Company;
use App\Models\Contact;
use App\Models\JobPost;
use App\Models\ApplyJob;
use App\Models\Category;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use App\Notifications\ApplyJobNotificationToCompany;

class FrontendController extends Controller
{
    // Index/Home Page
    public function index()
    {
        $data['categories'] = Category::withCount('jobPost')->whereHas('jobPost', function ($query) {
            return $query->where('status', 1)->where('is_published', 1);
        })->where('status', 1)->orderBy('category_name')->take(36)->get();

        $data['jobPosts'] = JobPost::where('status',1)
        ->whereHas('category', function($query){
            return $query->where('status', 1);
        })
        ->where('is_published',1)
        ->latest()->take(40)->get();

        $data['companyGovts'] = JobPost::where([['company_type','GOVT'],['status',1],['is_published',1]])->whereHas('category', function($query){
            return $query->where('status', 1);
        })
        ->latest()->take(4)->get();

        $data['companyPvts'] = JobPost::where([['company_type','PVT'],['status',1],['is_published',1]])->whereHas('category', function($query){
            return $query->where('status', 1);
        })->latest()->take(4)->get();

        $data['companyCount'] = Company::count();

        $data['jobPostCount'] = JobPost::where('status', 1)->where('is_published',1)->count();
        
        return view('website.index', $data);
    }
    // Government Company
    public function governmentCompany()
    {
        $data['companyTypeName'] = 'Government';
        $data['companyType'] = JobPost::with('company')
        ->whereHas('category', function($query){
            return $query->where('status', 1);
        })
        ->where('company_type', 'GOVT')
        ->where('status',1)
        ->where('is_published',1)
        ->latest()->get();
        return view('website.company-type', $data);

    }
    // Private Company
    public function privateCompany()
    {
        $data['companyTypeName'] = 'Private';
        $data['companyType'] = JobPost::with('company')
        ->whereHas('category', function($query){
            return $query->where('status', 1);
        })
        ->where('company_type', 'PVT')
        ->where('status',1)
        ->where('is_published',1)
        ->latest()->get();
        return view('website.company-type', $data);
    }

    // Contact 
    public function contact()
    {
        return view('website.contact-page');
    }

    // Contact Send
    public function contactSend(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|max:55',
            'email' => 'required|email|max:55',
            'subject' => 'required|max:255',
            'message' => 'required|max:500',
        ]);
        Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);
        notify()->success('Success', 'Contact Submitted');
        return back();
    }
    // Subscriber Store
    public function subscriberStore(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|max:55|unique:subscribers,email',
        ]);
        Subscriber::create([
            'email' => $request->email
        ]);
        notify()->success('Success', 'Successfully Subscribed');
        return back();
    }
    // Job Sort By Category
    public function category($id)
    {
        $jobPosts = JobPost::where('category_id', $id)
        ->where('status', 1)
        ->where('is_published', 1)
        ->latest()->get();
        return view('website.category-details', compact('jobPosts'));
    }
    // Job Post Details
    public function jobPostDetails($id)
    {
        $jobPost = JobPost::with('company')->where('id',$id)->first();
        return view('website.jobpost-details', compact('jobPost'));
    }

    // Apply Job
    public function applyTheJob($id)
    {
        if(Auth::user()){
            $authId = Auth::user()->id;
            $companyGet = User::where('id', $authId)->first();
            if($companyGet->role_id != 2 ){
                $findJob = JobPost::findOrFail($id);
                $applyJob = new ApplyJob();
                $applyJob->company_id = $findJob->company_id;
                $applyJob->job_id = $findJob->id;
                $applyJob->user_id = Auth::user()->id;
                $applyJob->save();
                // Find company role id for notify
                $user = User::where('role_id',2)->get();
                // Notify to Company for thi apply job request
                Notification::send($user, new ApplyJobNotificationToCompany($applyJob));
                notify()->success("Success", "Successfully Apply");
                return back();
            }else{
                notify()->error("Error", "Company Can't Apply The Job !!!");
                return back();
            }
        }else{
            notify()->info('Info', 'Please Login Firs');
            return back();
        }
    }
}
