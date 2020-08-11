<?php

namespace App\Http\Controllers;

use App\Faculty;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $faculty= Faculty::all();
        return view('admin', ['faculty'=> $faculty]);
    }

    public function FacultyUpdate(Faculty $id)
    {
        return view('Update.FacultyUpdate',compact('id'));
    }

    public function FacultyEdit(Request $request, Faculty $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:50',
            'email'=> 'required|email'
        ]);
        $id->update($validatedData);
        return redirect(route('admin.dashboard'));
    }

    public function FacultyDelete(Faculty $id)
    {
        $id->delete();
        return redirect(route('admin.dashboard'));
    }
}
