<?php

namespace App\Http\Controllers\Auth;

use App\Models\Role;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        if (Auth::check() && Auth::user()->role->id == 1)
        {
            $this->redirectTo = route('admin.dashboard');
        }elseif(Auth::check() && Auth::user()->role->id == 2 ){
            $this->redirectTo = route('company.dashboard');
        }else {
            $this->redirectTo = route('user.dashboard');
        }
        $this->middleware('guest')->except('logout');
    }

    // Socialite Redirect
    // public function redirectToProvider($provider)
    // {
    //     return Socialite::driver($provider)->redirect();
    // }
    // Handle Provider Callback
    // public function handleProviderCallback($provider)
    // {
    //     $user = Socialite::driver($provider)->user();
    //     // Find existing user.
    //     $existingUser = User::whereEmail($user->getEmail())->first();
    //     if ($existingUser)
    //     {
    //         Auth::login($existingUser);
    //     } else {
    //         // Create new user.
    //         $newUser = User::create([
    //             'role_id' => 2,
    //             'name' => $user->getName(),
    //             'email' => $user->getEmail(),
    //             'status' => false,
    //             'delatable' => true,
    //         ]);
    //         Auth::login($newUser);
    //     }
    //     notify()->success('You have successfully logged in with '.ucfirst($provider).'!','Success');
    //     return redirect($this->redirectPath());

    // }
}
