<?php

namespace App\Http\Controllers;

use App\Models\UserProfile; 
use App\Models\User; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;


class UserProfileController extends Controller
{
    public function show(UserProfile $profile)
    { 
           return view('user.profile.show', compact('profile'));
    }
    
    public function edit(UserProfile $profile)
    {
        return view('user.profile.edit', compact('profile'));
    }
    
    public function update(Request $request, UserProfile $profile)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string',
            'bio' => 'nullable|string|max:255',
            'email' => 'required|string',
            'phone' => 'nullable|string|max:255',
            'mobile' => 'nullable|string',
            'address' => 'nullable|string',
            'skype_url' => 'nullable|string',
            'facebook_url' => 'nullable|string',
            'instagram_url' => 'nullable|string',
            'twitter_url' => 'nullable|string',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif',
          ]);
      
        // $profile = Profile::findOrFail($id);
        $profile->first_name = $request->input('first_name');
        $profile->last_name = $request->input('last_name');
        $profile->bio = $request->input('bio');
        $profile->email = $request->input('email');
        $profile->phone = $request->input('phone');
        $profile->mobile = $request->input('mobile');
        $profile->address = $request->input('address');
        $profile->skype_url = $request->input('skype_url');
        $profile->facebook_url = $request->input('facebook_url');
        $profile->instagram_url = $request->input('instagram_url');
        $profile->twitter_url = $request->input('twitter_url');
        if($request->hasFile('avatar'))
        {
            $path = 'assets/uploads/profile/'.$profile->avatar;
            if(File::exists($path))
            {
                File::delete($path);
            }
            $file = $request->file('avatar');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/profile/',$filename);
            $profile->avatar =$filename;
        }
    
            // Save the updated profile to the database
             $profile->save();

            
             $user = User::where('id', $profile->user_id)->first();
             $user->name = $request->input('first_name');
             $user->email = $request->input('email');
             $user->save();     

               return redirect()->route('profile.edit', $profile->user_id)
            ->with('success', 'Profile updated successfully!');
    }
}
