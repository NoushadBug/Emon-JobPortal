<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class ProfileSettingController extends Controller
{
    // View Profile
    public function profile(){
        $data = [];
        $data['auth_user'] = Auth::user();
        return view('admin.profile.profile', $data);
    }
    // Update Profile
    public  function profileUpdate(Request $request)
    {
        // Get Logedin User
        $user = Auth::user();
        if ($request->hasfile('profile_photo'))
        {
            $profile_photo_path = public_path('users/profile-pic/' . $user->profile_photo);
            // Find and Delete Old Image
            if (File::exists($profile_photo_path)) {
                File::delete($profile_photo_path);
            }
            $file = $request->file('profile_photo');
            $extension = $file->getClientOriginalName();
            $filename =  $extension;
            $file->move('users/profile-pic/', $filename);
        } else {
            $filename = $user->profile_photo;
        }
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'profile_photo'=>$filename
        ]);
        notify()->success('User Successfully Updated.', 'Updated');
        return back();
    }

    // Change Password View
    public function changePassword()
    {
        return view('admin.profile.security');
    }
    // Change Password Update
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
                notify()->success('Password Successfully Changed.', 'Success');
                return redirect()->route('login');
            } else {
                notify()->warning('New password cannot be the same as old password.', 'Warning');
            }
        } else {
            notify()->error('Current password not match.', 'Error');
        }
        return redirect()->back();
    }




}
