<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.admin-login');
    }
    public function login(Request $request)
    {
        // Validation
        $this->validate($request,
            [
                'email' => 'required|string|email',
                'password' => 'required|string|min:8'
            ]
        );

        //Attempt to login admin
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password],$request->remember))
        {
            //if successful then redirect to intended route or admin dashboard
            return redirect()->intended(route('admin.dashboard'));
        }
            //if unsuccessful then redirect to login page with email and remember field
            return redirect()->back()->withInput($request->only('email' ,'remember'));
    }
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        return redirect('/');
    }
}
