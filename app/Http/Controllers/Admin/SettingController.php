<?php

namespace App\Http\Controllers\Admin;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function generel()
    {
        return view('admin.setting.create-and-edit');
    }

    public function generelUpdate(Request $request)
    {
        // return $request;
        $this->validate($request, [
            'site_title' => 'required|string|min:2|max:255',
            'site_description' => 'nullable|string|min:2|max:255',
            'site_address' => 'nullable|string|min:2|max:255',
        ]);
        //Artisan Call
        Artisan::call("env:set APP_NAME='" . $request->get('site_title') . "'");
        Setting::updateOrCreate(['key' => 'site_title'], ['value' => $request->get('site_title')]);
        Setting::updateOrCreate(['key' => 'site_description'], ['value' => $request->get('site_description')]);
        Setting::updateOrCreate(['key' => 'site_address'], ['value' => $request->get('site_address')]);
        notify()->success('Setting Successfully Updated', 'Updated');
        return back();

    }


    // Appearance
    public function appearanceUpdate(Request $request)
    {
        $this->validate($request, [
            'site_logo' => 'required|image',
            'site_favicon' => 'nullable|image',
        ]);
        // Favicon
        if($request->hasfile('site_favicon')){
            // Delete Old Favicon
            $this->deleteOldlogo(setting('site_favicon'));
            Setting::updateOrCreate(
                ['key' => 'site_favicon'],
                ['value' => Storage::disk('public')->putFile('favicon', $request->file('site_favicon'))]
            );
        }
        // Logo
        if($request->hasfile('site_logo')){
            // Delete Old Logo
            $this->deleteOldlogo(setting('site_logo'));
            Setting::updateOrCreate(
                ['key' => 'site_logo'],
                ['value' => Storage::disk('public')->putFile('logo', $request->file('site_logo'))]
            );
        }

        notify()->success('Logo Successfully Created', 'Created');
        return back();
    }

    // Delete Old Logo
    private function deleteOldlogo($path)
    {
        Storage::disk('public')->delete($path);
    }


    // Mail 
    public function mailUpdate(Request $request)
    {
        $this->validate($request, [
            'mail_mailer' => 'required|string|min:2|max:255',
            'mail_host' => 'required|string|min:2|max:255',
            'mail_port' => 'required|string|min:2|max:255',
            'mail_username' => 'required|string|email|min:2|max:255',
            'mail_password' => 'required|string|min:2|max:255',
            'mail_encryption' => 'required|string|min:2|max:255',
            'mail_from_address' => 'nullable|string|min:2|max:255',
            'mail_from_name' => 'nullable|string|min:2|max:255',
        ]);
        //Add Setting And Artisan Call
        Artisan::call("env:set MAIL_MAILER=" . $request->get('mail_mailer'));
        Setting::updateOrCreate(['key' => 'mail_mailer'], ['value' => $request->get('mail_mailer')]);

        Artisan::call("env:set MAIL_HOST=" . $request->get('mail_host'));
        Setting::updateOrCreate(['key' => 'mail_host'], ['value' => $request->get('mail_host')]);

        Artisan::call("env:set MAIL_PORT=" . $request->get('mail_port'));
        Setting::updateOrCreate(['key' => 'mail_port'], ['value' => $request->get('mail_port')]);

        Artisan::call("env:set MAIL_USERNAME=" . $request->get('mail_username'));
        Setting::updateOrCreate(['key' => 'mail_username'], ['value' => $request->get('mail_username')]);

        Artisan::call("env:set MAIL_PASSWORD=" . $request->get('mail_password'));
        Setting::updateOrCreate(['key' => 'mail_password'], ['value' => $request->get('mail_password')]);

        Artisan::call("env:set MAIL_ENCRYPTION=" . $request->get('mail_encryption'));
        Setting::updateOrCreate(['key' => 'mail_encryption'], ['value' => $request->get('mail_encryption')]);

        Artisan::call("env:set MAIL_FROM_ADDRESS=" . $request->get('mail_from_address'));
        Setting::updateOrCreate(['key' => 'mail_from_address'], ['value' => $request->get('mail_from_address')]);

        Artisan::call("env:set MAIL_FROM_NAME=" . $request->get('mail_from_name'));
        Setting::updateOrCreate(['key' => 'mail_from_name'], ['value' => $request->get('mail_from_name')]);

        notify()->success('Setting Successfully Updated', 'Updated');
        return back();

    }
}
