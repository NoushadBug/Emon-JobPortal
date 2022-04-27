<?php

namespace App\Http\Controllers\Company;

use App\Models\User;
use App\Models\Thana;
use App\Models\Company;
use App\Models\JobPost;
use App\Models\ApplyJob;
use App\Models\Category;
use App\Models\District;
use App\Models\Industry;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class CompanyDashboardController extends Controller
{
    // Company Dashboard
    public function dashboard()
    {
        $companyId = Company::where('user_id', Auth::user()->id)->first();
        return view('company.company-dashboard', compact('companyId'));
    }
    // Profile Pic Update
    public function updateAvater(Request $request)
    {
        // Get Logedin company
        $company = Auth::user();
        if ($request->hasfile('profile_photo'))
        {
            $profile_photo_path = public_path('uploads/company/profile-pic/' . $company->profile_photo);
            // Find and Delete Old Image
            if (File::exists($profile_photo_path)) {
                File::delete($profile_photo_path);
            }
            $file = $request->file('profile_photo');
            $extension = $file->extension();
            $filename =  time() . '.' . $extension;
            $file->move('uploads/company/profile-pic/', $filename);
        } else {
            $filename = $company->profile_photo;
        }
        $company->update([
            'profile_photo'=>$filename
        ]);
        notify()->success('Updated','Successfully Updated');
        return back();
    }

    // Edit Company Profile
    public function editProfile()
    {
        $data['companyInfo'] = Company::where('user_id', Auth::user()->id)->first();
        $data['districts'] = District::orderBy('district_name')->get();
        $data['thanas'] = Thana::orderBy('thana_name')->get();
        $data['industries'] = Industry::orderBy('industry_name')->get();
        return view('company.company-profile-edit', $data);
    }
    // Update Company Profile
    public function profileUpdate(Request $request)
    {
        $companyAuth = Auth::user();
        $companyInfo = Company::where('user_id', $companyAuth->id)->first();
        $companyAuth->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);
        if ($companyInfo == null) {
            $this->validate($request, [
                'industry_id' => 'required',
                'company_name' => 'required|max:150',
                'entrepreneur' => 'required',
                'employee_size' => 'required',
                'district' => 'required',
                'thana' => 'required',
            ]);
            Company::updateOrCreate([
                'user_id' => $companyAuth->id,
                'company_name' => $request->company_name,
                'entrepreneur' => $request->entrepreneur,
                'company_address' => $request->company_address,
                'employee_size' => $request->employee_size,
                'thana' => $request->thana,
                'district' => $request->district,
                'trade_license' => $request->trade_license,
                'industry_id' => $request->industry_id,
                'website_url' => $request->website_url,
            ]);
        } else {
            $companyInfo->update([
                'user_id' => Auth::user()->id,
                'company_name' => $request->company_name,
                'entrepreneur' => $request->entrepreneur,
                'company_address' => $request->company_address,
                'employee_size' => $request->employee_size,
                'thana' => $request->thana,
                'district' => $request->district,
                'trade_license' => $request->trade_license,
                'industry_id' => $request->industry_id,
                'website_url' => $request->website_url,
            ]);
        }
        notify()->success('Updated','Successfully Updated');
        return back();
    }
    // Change Company Password
    public function changePassword()
    {
        return view('company.company-change-password');
    }
    // Update Company Password
    public function updatePassword(Request $request)
    {
        $this->validate($request, [
            'current_password' => 'required',
            'password' => 'required|confirmed',

        ]);
        $hashedPassword = Auth::user()->password;
        if (Hash::check($request->current_password, $hashedPassword)) {
            if (!Hash::check($request->password, $hashedPassword)) {
                Auth::user()->update([
                    'password' => Hash::make($request->password)
                ]);
                Auth::logout();
                notify()->success('Success','Password Successfully Changed');
                return redirect()->route('login');
            } else {
                notify()->warning('Warning', 'New password cannot be the same as old password');
            }
        } else {
            notify()->error('Error','Current password not match');
        }
        return redirect()->back();
    }

    // All Job Post
    public function allPostedJobs()
    {
        $authCompanyId = Auth::user()->id;
        $companyId = Company::where('user_id', $authCompanyId)->first();
        if ($companyId == null) {
            notify()->warning('Warning', 'Not yet posted');
            return back();
        } else {
            $allPostedJobs = JobPost::where('company_id', $companyId->id)->latest()->get();
            return view('company.all-posted-jobs', compact('companyId', 'allPostedJobs'));
        }
    }

    // Create Job Post
    public function createJobPost()
    {
        $data['categories'] = Category::orderBy('category_name')->get();
        $data['companyId'] = Company::where('user_id', Auth::user()->id)->first();
        return view('company.create-edit-job-post', $data);
    }

    // Store Job Post
    public function storeJobPost(Request $request)
    {
        $authUserID = Auth::user()->id;
        $companyId = Company::where('user_id', $authUserID)->exists();
        if($companyId == true){
            $this->validate($request, [
                'category_id' => 'required',
                'job_title' => 'required|max:255',
                'company_type' => 'required|max:55',
                'job_location' => 'required|max:255',
                'published_on' => 'required|max:55',
                'deadline' => 'required|max:55',
                'req_degree' => 'required|max:300',
                'age' => 'required|max:100',
                'experience' => 'required|max:100',
                'employment_status' => 'required|max:100',
                'vacancy' => 'required|max:55',
                'salary' => 'required|max:8',
                'report' => 'required|max:300',
                'description' => 'required',
                'job_thumbnail' => 'required|mimes:jpg,bmp,png,jpeg',
            ]); 
            // Get Job Thumbnail for store
            if($request->hasfile('job_thumbnail'))
            {
                $file = $request->file('job_thumbnail');
                $extension = $file->extension();
                $fileName = time() . '.' . $extension;
            }
            // Get Body Data
            $content = $request->description;
            // Disable libxml errors and allow user to fetch error information
            libxml_use_internal_errors(true);
            // Body content object create
            $dom = new \DomDocument();
            // Load HTML from a string
            $dom->loadHtml('<?xml encoding="utf-8" ?>' . $content); //Language Support for Bangla
            // Get image name from summer note editor
            $imageFile = $dom->getElementsByTagName('imageFile');
            // Fetch Images And Store
            foreach($imageFile as $item => $image){
                $data = $image->getAttribute('src');
                list($type, $data) = explode(';', $data);
                list(, $data)      = explode(',', $data);
                $imgeData = base64_decode($data);
                $image_name= "upload/" . time().$item.'.png';
                $path = public_path() . $image_name;
                file_put_contents($path, $imgeData);
                $image->removeAttribute('src');
                $image->setAttribute('src', $image_name);
            }
            $content = $dom->saveHTML();
    
            $authUser = Auth::user()->id;
            $companyId = Company::where('user_id', $authUser)->first();
            $jobPost = new JobPost();
            $jobPost->company_id = $companyId->id;
            $jobPost->category_id = $request->category_id;
            $jobPost->job_title = $request->job_title;
            $jobPost->slug = Str::slug($request->job_title) . '-' . time();
            $jobPost->company_type = $request->company_type;
            $jobPost->job_location = $request->job_location;
            $jobPost->published_on = $request->published_on;
            $jobPost->deadline = $request->deadline;
            $jobPost->req_degree = $request->req_degree;
            $jobPost->age = $request->age;
            $jobPost->experience = $request->experience;
            $jobPost->employment_status = $request->employment_status;
            $jobPost->vacancy = $request->vacancy;
            $jobPost->salary = $request->salary;
            $jobPost->report = $request->report;
            $jobPost->description = $request->description;
            $jobPost->job_thumbnail = $fileName;
            $jobPost->status = $request->filled('status');
            $jobPost->save();
            $file->move('uploads/job-thumbnail/', $fileName);
            notify()->success('Success','Successfully Created');
            return back();
        }else{
            notify()->error('Error','Please Complete Profile First');
            return back();
        }
        
    }

    // Edit Job Post
    public function editJobPost($id)
    {
        $data['companyId'] = Company::where('user_id', Auth::user()->id)->first();
        $data['jobPostEdit'] = JobPost::findOrFail($id);
        $data['categories'] = Category::orderBy('category_name')->get();
        return view('company.create-edit-job-post', $data);
    }

    // Update Job Post
    public function updateJobPost(Request $request, $id)
    {
        $jobPostUp = JobPost::findOrFail($id);
        $jobPostSlug = Str::slug($request->job_title);
        // Job Thumbnail
        if ($request->hasfile('job_thumbnail')) {
            // Existing gallery thumbnail path
            $job_thumbnail_path = public_path('uploads/galleries/' . $jobPostUp->job_thumbnail);
            // Delete old thumbnail, If the thumbnail has
            if (File::exists($job_thumbnail_path)) {
                File::delete($job_thumbnail_path);
            }
            // New Gallery Avater store
            $file = $request->file('job_thumbnail');
            $extension = $file->extension();
            $fileName = time() . '.' . $extension;
            $file->move('uploads/job-thumbnail/', $fileName);
        } else {
            // Old Job Post thumbnail store
            $fileName = $jobPostUp->job_thumbnail;
        }
        // Get Body Data
        $content = $request->description;
        // Disable libxml errors and allow user to fetch error information
        libxml_use_internal_errors(true);
        // Body content object create
        $dom = new \DomDocument();
        // Load HTML from a string
        $dom->loadHtml('<?xml encoding="utf-8" ?>' . $content); //Language Support for Bangla
        // Get image name from summer note editor
        $imageFile = $dom->getElementsByTagName('imageFile');
        // Fetch Images And Store
        foreach($imageFile as $item => $image){
            $data = $image->getAttribute('src');
            list($type, $data) = explode(';', $data);
            list(, $data)      = explode(',', $data);
            $imgeData = base64_decode($data);
            $image_name= "upload/" . time().$item.'.png';
            $path = public_path() . $image_name;
            file_put_contents($path, $imgeData);
            $image->removeAttribute('src');
            $image->setAttribute('src', $image_name);
        }
        $content = $dom->saveHTML();
        $jobPostUp->update([
            'job_title' => $request->job_title,
            'slug' => $jobPostSlug,
            'company_type' => $request->company_type,
            'job_location' => $request->job_location,
            'published_on' => $request->published_on,
            'category_id' => $request->category_id,
            'deadline' => $request->deadline,
            'req_degree' => $request->req_degree,
            'age' => $request->age,
            'experience' => $request->experience,
            'employment_status' => $request->employment_status,
            'vacancy' => $request->vacancy,
            'salary' => $request->salary,
            'report' => $request->report,
            'description' => $request->description,
            'job_thumbnail' => $fileName,
            'status' => $request->filled('status'),
        ]);
        notify()->success('Update','Successfully Updated');
        return back();
    }

    // Delete Posted Job
    public function deleteJobPost($id)
    {
        $jobPost = JobPost::findOrFail($id);
        $jobPost->delete();
        notify()->success('Delete','Successfully Deleted');
        return back();
    }


    // Job Candidate
    public function jobCandidate()
    {
        $authCompanyId = Auth::user()->id;
        $companyId = Company::where('user_id', $authCompanyId)->first();
        if ($companyId == null) {
            notify()->warning('Warning','No candidate has applied');
            return back();
        } else {
            $allAppliedCandidate = ApplyJob::where('company_id', $companyId->id)->get();
            foreach ($allAppliedCandidate as $key=> $candidate) {
                $users = User::where('id', $candidate->user_id)->get();
            }
            return view('company.job-candidate', compact('users'));
        }

    }
}