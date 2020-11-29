<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
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
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Override redirect after authentication
     *
     * @return string
     */
    protected function redirectPath()
    {
        if (auth()->user()->user_type == User::ROLE_ADMIN) {
            return RouteServiceProvider::ADMIN;
        } elseif (auth()->user()->user_type == User::ROLE_DIRECTOR) {
            return RouteServiceProvider::DIRECTOR;
        }
        return RouteServiceProvider::USER;
    }
}
