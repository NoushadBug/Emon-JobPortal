<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\JobPost;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companyLists = Company::orderBy('company_name')->get();
        return view('admin.companies.company-lists', compact('companyLists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $company = Company::findOrFail($id);
        return view('admin.companies.company-show', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }


    public function postedJobs($id)
    {
        $company = Company::with('jobPost')->where('id', $id)->first();
        return view('admin.companies.posted-jobs', compact('company'));
    }

    public function showJob($id)
    {
        $jobPostShow = JobPost::findOrFail($id);
        return view('admin.companies.show-job-post', compact('jobPostShow'));
    }

    public function approvedJobPost($id)
    {
        // Find Mentor Application for approve
        $jobPost = JobPost::findOrFail($id);
        if ($jobPost->is_published == false)
        {
            $jobPost->is_published = true;
            $jobPost->save();
            notify()->success('Approved','Job Post Approved.', );
            return back();
        } else {
            notify()->info('Approved', 'Job Post Already Approved');
        }
        return redirect()->back();
    }

    /**
     * Approve the Testimonail .
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function rejectJobPost($id)
    {
        $jobPost = JobPost::findOrFail($id);
        if ($jobPost->is_published == true)
        {
            $jobPost->is_published = false;
            $jobPost->save();
            notify()->success('Reject', 'Job Post Reject Successful');
            return back();
        } else {
            notify()->info('Reject', 'Job Post Already Rejected');
        }
        return redirect()->back();
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company = Company::findOrFail($id);
        $company->delete();
        notify()->success('Delete', 'Company Deleted', );
        return back();
    }
}
