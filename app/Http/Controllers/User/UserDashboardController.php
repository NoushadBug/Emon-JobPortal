<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\Thana;
use App\Models\District;
use Illuminate\Http\Request;
use Laravel\Ui\Presets\React;
use App\Http\Controllers\Controller;
use App\Models\Resume;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class UserDashboardController extends Controller
{
    public function dashboard(){
        return view('user.user-dashboard');
    }
    public function updateAvater(Request $request)
    {
        // Get Logedin User
        $user = Auth::user();
        if ($request->hasfile('profile_photo'))
        {
            $profile_photo_path = public_path('uploads/users/profile-pic/' . $user->profile_photo);
            // Find and Delete Old Image
            if (File::exists($profile_photo_path)) {
                File::delete($profile_photo_path);
            }
            $file = $request->file('profile_photo');
            $extension = $file->extension();
            $filename =  time() . '.' . $extension;
            $file->move('uploads/users/profile-pic/', $filename);
        } else {
            $filename = $user->profile_photo;
        }
        $user->update([
            'profile_photo'=>$filename
        ]);
        notify()->success('User Successfully Updated.', 'Updated');
        return back();
    }

    public function editProfile()
    {
        $data['districts'] = District::orderBy('district_name')->get();
        $data['thanas'] = Thana::orderBy('thana_name')->get();
        return view('user.user-profile-edit', $data);
    }


    public function profileUpdate(Request $request)
    {
        $user = Auth::user();
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'gender' => $request->gender,
            'bio' => $request->bio,
        ]);
        notify()->success('User Successfully Updated.', 'Updated');
        return back();
    }



    public function changePassword()
    {
        return view('user.user-change-password');
    }
    // Change Password
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


    public function resume()
    {
        return view('user.user-resume');
    }

    public function storeResume(Request $request)
    {
        
        // Validation Check
        // $this->validate($request, [
        //     'resume' => 'required|mimes:pdf,doc',
        // ]);
        $authUserID = Auth::user()->id;
        $existResume = Resume::where('user_id', $authUserID)->exists();

        if($existResume == false){
            if($request->hasfile('resume'))
            {
                $file = $request->file('resume');
                $extension = $file->getClientOriginalExtension();
                $fileName = time() . '.' . $extension;
            }
            // Resume
            $resume = new Resume();
            $resume->user_id = $authUserID;
            $resume->resume = $fileName;
            $file->move('uploads/users/resume/', $fileName);
            $resume->save();
            notify()->success('Success','Successfully Sumbitted');
            return back();
        }else{
            notify()->info('Info','Resume Already Uploaded');
            return back();
        }


        
    }
}
