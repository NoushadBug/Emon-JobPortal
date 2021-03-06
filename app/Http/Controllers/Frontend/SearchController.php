<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Company;
use App\Models\JobPost;
use Illuminate\Http\Request;
use Laravel\Ui\Presets\React;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    // Job Search
    public function jobSearch(Request $request)
    {
        // Get the search value from the request
        $search = $request->input('search');
        // Search in the title
        $jobSearch = JobPost::where('job_title', 'LIKE', "%{$search}%")
        ->orWhere('company_type', 'LIKE', "%{$search}%")
        ->orWhere('job_location', 'LIKE', "%{$search}%")
        ->where('status', true)
        ->where('is_published', true)
        ->get();
        return view('website.search-job-result', compact('jobSearch'));
    
    }

    // Search By Company
    public function searchByCompany()
    {
        $data['companies'] = Company::withCount('jobPost')
        ->whereHas('jobPost', function($query){
            return $query->where('status', 1)
            ->where('is_published',1);
        })->latest()->paginate(10);
        return view('website.search-by-company', $data);
    }


    public function companyJobPosts($id)
    {
        $data['companyName'] = Company::where('id', $id)->first();
        $data['jobPosts'] = JobPost::with('company')
        ->where('company_id', $id)
        ->where('status', true)
        ->where('is_published', true)
        ->latest()->get();
        return view('website.company-job-posts', $data);
    }


    public function searchByWord(Request $request)
    {
        // Get the search value from the request
        $search = $request->input('searc_word');
        // Search in the title
        $companies = Company::withCount('jobPost')
        ->where('company_name', 'LIKE', "{$search}%")
        ->paginate(10);
        // Return the search view with the resluts compacted
        return view('website.search-by-company', compact('companies'));
    
    }

    


    

}
