<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Contact;
use App\Models\JobPost;
use App\Models\Resume;
use App\Models\Subscriber;

class AdminDashboardController extends Controller
{
    public function starterPage()
    {
        return view('admin.demo');
    }
    public function dashboard()
    {
        $data['companies'] = Company::count();
        $data['jobPosts'] = JobPost::count();
        $data['resumes'] = Resume::count();
        $data['users'] = User::where('role_id', 3)->count();
        return view('admin.dashboard', $data);
    }
    public function user()
    {
        $data = [];
        $data['users']=User::latest()->get();
        return view('admin.user.index', $data);
    }
    public function createUser()
    {
        return view('admin.user.create-and-edit');
    }
    public function roleCreate()
    {
        return view('admin.roles.create-and-edit');
    }
    public function role()
    {
        return view('admin.roles.index');
    }
    public function dataTable()
    {
        return view('admin.datatable');
    }

    public function setting()
    {
        return view('admin.setting.add-edit');
    }

}
