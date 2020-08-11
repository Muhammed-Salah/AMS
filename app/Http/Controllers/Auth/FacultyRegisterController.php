<?php

namespace App\Http\Controllers\Auth;

use App\Faculty;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class FacultyRegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function showRegisterForm()
    {
        return view('auth.faculty-register');
    }
    public function register(Request $request)
    {
        //Validate form data
        $this->validate($request,
            [
                'name' => ['required','string','max:255'],
                'email' => ['required','string','email','max:255','unique:faculties'],
                'password' => ['required','string','min:8']
            ]
        );

        //Create Faculty user
        try {
            $faculty = Faculty::create([
                'name' => $request->name,
                'email' => $request-> email,
                'password' =>Hash::make($request->password),
            ]);


            return redirect()->route('admin.dashboard');
        } catch (\Exception $e)
            {
                return redirect()->withInput($request->only('name','email'));
            }
    }
}
