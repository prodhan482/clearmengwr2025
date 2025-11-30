<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Show login form.
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Handle login request.
     */
    public function login(Request $request)
    {
        // Validate input
        $request->validate([
            'login' => 'required|string',  // login can be email or phone
            'password' => 'required|string|min:4'
        ]);

        $loginField = $request->input('login');

        // Determine if login is email or phone
        $fieldType = filter_var($loginField, FILTER_VALIDATE_EMAIL) ? 'email' : 'phone';

        // Try to find user
        $user = User::where($fieldType, $loginField)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return redirect()->back()->withErrors([
                'login' => 'Invalid credentials!'
            ]);
        }

        // Login successful
        Auth::login($user);

        return $this->authenticated($request, $user);
    }

    /**
     * Redirect users after login based on role.
     */
    protected function authenticated(Request $request, $user)
    {
        if ($user->hasRole('SUPER_ADMIN') || $user->account_type == 'SUPER_ADMIN') {
            return redirect()->route('dashboard');
        } elseif ($user->hasRole('USER')) {
            return redirect()->route('user-dashboard');
        }

        // fallback
        Auth::logout();
        return redirect('/login')->withErrors(['login' => 'Unauthorized access!']);
    }

    /**
     * Logout user.
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
