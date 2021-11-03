<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Auth;
use Hash;
use Session;

class AdminController extends Controller
{
    
    public function index()
    {
        return view('admin.index');
    }

    public function loginpage()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect('index');
        }

        return redirect('/')->with('error', 'Oppes! You have entered invalid credentials');
     }

    public function logout() 
    {
        Session::flush();
        Auth::logout();
        return Redirect('/');
    }                   

}
