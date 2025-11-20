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
            $this->redirectTo = '/user-dashboard';
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
        $this->validateLogin($request);

        if (
            method_exists($this, 'hasTooManyLoginAttempts') &&
            $this->hasTooManyLoginAttempts($request)
        ) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if (is_numeric($request->input('phone'))) {
            $user = User::wherePhone($request->input('phone'))->first();
            if ($user && Hash::check($request->input('password'), $user->password)) {
                // Password is correct
            } else {
                // Password is incorrect or user not found
            }
        } else {
            $user = User::whereEmail($request->input('email'))->first();
            if ($user && Hash::check($request->input('password'), $user->password)) {
                // Password is correct
            } else {
                return redirect()->back()->with('wrong');
            }
        }

        if ($user !== null) {
            Auth::login($user);
            return $this->sendLoginResponse($request);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);
        return $this->sendFailedLoginResponse($request);
    }


    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
