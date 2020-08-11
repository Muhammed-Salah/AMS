<?php

namespace App\Http\Controllers;

use App\Faculty;
use App\User;
use Illuminate\Http\Request;

class FacultyController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:faculty');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $student= User::all();
        return view('faculty', ['student'=> $student]);
    }

    public function StudentUpdate(User $id)
    {
        return view('Update.StudentUpdate',compact('id'));
    }

    public function StudentEdit(Request $request, User $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:50',
            'email'=> 'required|email'
        ]);
        $id->update($validatedData);
        return redirect(route('faculty.dashboard'));
    }

    public function StudentDelete(User $id)
    {
        $id->delete();
        return redirect(route('faculty.dashboard'));
    }
}
