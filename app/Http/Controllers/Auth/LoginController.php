<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
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

    //  $redirect_url = '';

    //  $user_roles = auth()->user()->roles()->pluck('name')->toArray();

    //  if($user_roles->name === 'SMME')
    //  {
    //     $redirect_url = 'smme/admin/dashboard2';
    //  }
    //  elseif($user_roles->name === 'Administrator (can create other users)')
    //  {
    //     $redirect_url = 'smme/admin/dashboard2';
    //  }
    // protected $redirectTo = $redirect_url;

    protected function redirectTo()
    {
        $user_roles = auth()->user()->roles()->pluck('name')->toArray();

        if (in_array('SMME', $user_roles)) {
            return 'smme/admin/dashboard2';
        } elseif (in_array('Administrator (can create other users)', $user_roles)) {
            return 'admin/admin/dashboard';
        } else {
            return '/home'; // Default redirect path
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
