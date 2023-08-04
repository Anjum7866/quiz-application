<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class LoginController extends Controller
{
   
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;
   
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function index()
    {
        $isLoggedIn = Auth::check(); // Check if the user is logged in
        if (Auth::check()) {
            return redirect()->intended('/default-redirect-url'); // Use the default URL if no intended URL is available
        }
    
        return response()->json(['isLoggedIn' => $isLoggedIn]);
    }
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function checkLogin()
{
    $isLoggedIn = Auth::check(); // Check if the user is logged in

    return response()->json(['isLoggedIn' => $isLoggedIn]);
}

    // public function checkLoginStatus()
    // {
    //     if (Auth::check()) {
    //         return response()->json(true); // User is logged in
    //     } else {
    //         return response()->json(false); // User is not logged in
    //     }
    // }
    public function showLoginForm()
    {
        return view('auth.login'); // Assuming your login view is at resources/views/auth/login.blade.php
    }
    public function storeIntendedUrl(Request $request)
    {
        $intendedUrl = $request->input('intendedUrl');
        session(['intendedUrl' => $intendedUrl]);
// dd($intendedUrl);
        return response()->json(['message' => 'Intended URL stored successfully']);
    }


    protected function authenticated(Request $request, $user)
    {
        // Check if there's an intended URL in the session
        $intendedUrl = session('intendedUrl');
// dd($intendedUrl);
        if ($intendedUrl) {
            // Clear the intended URL from the session
            session()->forget('intendedUrl');
            return redirect()->to($intendedUrl); // Redirect to intended URL
        }

        return redirect()->intended($this->redirectPath());
    }

    
}
