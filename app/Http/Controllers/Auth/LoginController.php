<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Subject;

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
    $isLoggedIn = Auth::check(); 

    return response()->json(['isLoggedIn' => $isLoggedIn]);
}

public function authenticated(Request $request, $user)
{
    if (in_array($user->role, ['admin', 'superadmin', 'teacher'])) {
        return redirect()->route('admin.dashboard'); 
    } elseif ($user->role === 'user') {
        return redirect()->route('user.dashboard'); 
    }
}

    public function storeIntendedUrl(Request $request)
    {
        $intendedUrl = $request->input('intendedUrl');
        session(['intendedUrl' => $intendedUrl]);
        return response()->json(['message' => 'Intended URL stored successfully']);
    }

    public function showAdminLoginForm()
    {
        return view('admin.login');
    }
    
    public function showUserLoginForm()
    {
        return view('auth.login');
    }
    public function showUserRegisterForm()
    {
        return view('auth.register');
    }
    
      

    
    // protected function authenticated(Request $request, $user)
    // {
    //     $intendedUrl = session('intendedUrl');

    //     if ($intendedUrl) {
    //         // Clear the intended URL from the session
    //         session()->forget('intendedUrl');
    //         return redirect()->to($intendedUrl); // Redirect to intended URL
    //     }

    //     return redirect()->intended($this->redirectPath());
    // }

    
}
