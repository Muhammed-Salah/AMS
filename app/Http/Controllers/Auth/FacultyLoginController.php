<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FacultyLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:faculty')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.faculty-login');
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

        //Attempt to login faculty
        if (Auth::guard('faculty')->attempt(['email' => $request->email, 'password' => $request->password],$request->remember))
        {
            //if successful then redirect to intended route or faculty dashboard
            return redirect()->intended(route('faculty.dashboard'));
        }
            //if unsuccessful then redirect to login page with email and remember field
            return redirect()->back()->withInput($request->only('email' ,'remember'));
    }
    public function logout(Request $request)
    {
        Auth::guard('faculty')->logout();

        $request->session()->flush();

        $request->session()->regenerate();

        return redirect('/');
    }
}
