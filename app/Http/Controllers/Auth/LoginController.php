<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Spatie\Permission\Models\Role;

class LoginController extends Controller
{
    /*
     * |--------------------------------------------------------------------------
     * | Login Controller
     * |--------------------------------------------------------------------------
     * |
     * | This controller handles authenticating users for the application and
     * | redirecting them to your home screen. The controller uses a trait
     * | to conveniently provide its functionality to your applications.
     * |
     */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo;

    public function redirectTo()
    {
        if (!Auth::check()) {
            $this->redirectTo = '/login';
            return $this->redirectTo;
        }

        $user = Auth::user();

        if ($user->hasRole('SUPER_ADMIN')) {
            $this->redirectTo = '/dashboard';
            return $this->redirectTo;
        } else
            $this->redirectTo = '/participant-dashboard';
        return $this->redirectTo;

        // return $next($request);
    }

    public function __construct()
    {
        // $this->middleware('guest')->except('logout');
    }


    public function showLoginForm()
    {
        return view('auth.login');
    }

public function login(Request $request)
{
    // Validate input
    $request->validate([
        'login' => 'required|string',  // login can be email or phone
        'password' => 'required|string|min:4'
    ]);

    $loginField = $request->input('login');

    // Determine if login is phone or email
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

    return $this->sendLoginResponse($request);
}



    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
