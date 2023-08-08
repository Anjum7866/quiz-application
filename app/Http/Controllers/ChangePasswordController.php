<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Rules\PasswordCheckRule;


class ChangePasswordController extends Controller
{
    public function edit()
    {
        return view('user.profile.change-password');
    }

    public function update(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new PasswordCheckRule],
            'password' => 'required|min:8|confirmed',
        ]);
        $user =  Auth::user();
       
        if (Hash::check($request->current_password, $user->password)) {
            $user->update([
                'password' => Hash::make($request->password),
            ]);

            return redirect()->route('change.password')->with('success', 'Password updated successfully!');
        } else {
            return redirect()->route('change.password')->with('error', 'Current password is incorrect.');
        }
    }
    public function editpassword()
    {
        return view('admin.profile.change-password');
    }

    public function updatepassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new PasswordCheckRule],
            'password' => 'required|min:8|confirmed',
        ]);
        $user =  Auth::user();
       
        if (Hash::check($request->current_password, $user->password)) {
            $user->update([
                'password' => Hash::make($request->password),
            ]);

            return redirect()->route('adminchange.password')->with('success', 'Password updated successfully!');
        } else {
            return redirect()->route('adminchange.password')->with('error', 'Current password is incorrect.');
        }
    }

}
