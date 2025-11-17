<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{


    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            // 'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user',  // default role
        ]);

        Auth::login($user); 
        return redirect()->route('/participants');
    }

    public function showLogin()
    {
        return view('web.auth.login'); 
    }

    // Handle login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Role-based redirection
            if (Auth::user()->role === 'admin') {
                return redirect()->route('admin.dashboard');  // admin page
            } else {
                return redirect()->route('participants.list');  // participant list
            }
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    // Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }

    // Show participants list (protected)
    public function participantsList()
    {
      

        $participants = User::where('is_admin', false)->get();  // only non-admin users
        // dd($participants);
        return view('web.participants', compact('participants'));
    }
}
