<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function login(Request $request)
    {

        $request->validate([
            'username' => 'required|email',
            'password' => 'required|string|max:255'
        ]);

        if (Auth::guard('admin')->attempt(['email' => $request->username, 'password' => $request->password], $request->remember)) {
            return redirect()->route('admin.dashboard')->with('flash_success', 'Welcome Back');
        } else {
            return back()->with('flash_error', 'Invalid Username or Password');
        }
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin');
    }
}
