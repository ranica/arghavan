<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Get username field
     */
    public function username()
    {
        return 'code';
    }


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')
             ->except('logout');
    }

    /**
     * Send the response after the user was authenticated.
     */
    protected function sendLoginResponse(Request $request)
    {
        $data = [
            'status' => 1
        ];

        $request->session()->regenerate();

        $this->clearLoginAttempts($request);

        return $this->authenticated($request, $this->guard()->user()) ?: $data;
    }

    /**
     * Send the response after the user was authenticated.
     */
    protected function sendFailedLoginResponse(Request $request)
    {
        $data = [
            'status' => 0
        ];

        return $data;
    }
}
