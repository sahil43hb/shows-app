<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{
    public function index()
    {

        return view('admin.login');
    }
    public function Authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');


        if (Auth::attempt($credentials)) {
            $user = Auth::user(); // Retrieve the authenticated user
            if ($user->role == 'admin') {
                // User is an admin, redirect to admin panel
                return redirect('/admin-panel');
            } else {
                // User is not an admin, redirect with error message
                return redirect()->back()->withErrors("You don't have permission to access the admin panel.");
            }
        } else {
            return redirect()->back()->withErrors("Invalid credentials. Please try again.");
        }
    }
}
