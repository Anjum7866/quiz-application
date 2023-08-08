<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Middleware\CheckRole;
use App\Models\AdminUser;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use Illuminate\Support\Facades\File;



class AdminUserController extends Controller
{
    public function __construct()
    {
        // $this->middleware('checkrole:admin')->only(['index', 'create', 'store', 'show', 'edit', 'update', 'destroy']);
        // $this->middleware('permission:role-index', ['only' => ['index']]);

    }

    
    public function index()
    {
        $adminUsers = AdminUser::all();
        return view('admin.users.index', compact('adminUsers'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:admin_users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:teacher,admin,superadmin',
        ]);

        $adminUser = new AdminUser();
        $adminUser->name = $request->input('name');
        $adminUser->email = $request->input('email');
        $adminUser->password = Hash::make($request->input('password'));
        $adminUser->role = $request->input('role');
        $adminUser->save();
        
        $existingUser = User::where('email', $request->input('email'))->first();
        if ($existingUser) {
           $existingUser->name = $request->input('name');
           $existingUser->adminuser_id = $adminUser->id;
            $existingUser->role = $request->input('role');
            $existingUser->password = Hash::make($request->input('password'));
            $existingUser->save();

            $profile = $existingUser->profile;
            if ($profile) {
                $profile->first_name = $request->input('name');
                $profile->role = $request->input('role');
                $profile->save();
            } else {
                $profile = new UserProfile();
                $profile->first_name = $request->input('name');
                $profile->role = $request->input('role');
                $profile->user_id = $existingUser->id;
                $profile->save();
            }
    
        } else {
            $newUser = new User();
            $newUser->name = $request->input('name');
            $newUser->email = $request->input('email');
            $newUser->adminuser_id = $adminUser->id;
            $newUser->password = Hash::make($request->input('password'));
            $newUser->role = $request->input('role');
            $newUser->save();

            $profile = new UserProfile();
            $profile->first_name = $request->input('name');
            $profile->email = $request->input('email');
            $profile->user_id = $newUser->id;
            $profile->role = $request->input('role');
            $profile->save();
    
        }

        return redirect()->route('admin.users.index')->with('success', 'Admin user created successfully.');
    }

    public function show($id)
    {
        $adminUser = AdminUser::findOrFail($id);
        return view('admin.users.show', compact('adminUser'));
    }

    public function edit($id)
    {
        $adminUser = AdminUser::findOrFail($id);
        return view('admin.users.edit', compact('adminUser'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:admin_users,email,' . $id,
            'role' => 'required|in:admin,superadmin',
        ]);

        $adminUser = AdminUser::findOrFail($id);
        $adminUser->name = $request->input('name');
        $adminUser->email = $request->input('email');
        if ($request->input('password')) {
            $adminUser->password = Hash::make($request->input('password'));
        }
        $adminUser->role = $request->input('role');
        $adminUser->save();
       
        $existingUser = User::where('adminuser_id', $adminUser->id)->first();
       
        $existingUser->name = $request->input('name');
        $existingUser->email = $request->input('email');
        if ($request->input('password')) {
            $existingUser->password = Hash::make($request->input('password'));
        }
        $existingUser->save();

        $profile = UserProfile::where('user_id', $existingUser->id)->first();
        if ($profile) {
            $profile->first_name = $request->input('name');
            $profile->email = $request->input('email');
            $profile->save();
        } else {
            $profile = new UserProfile();
            $profile->first_name = $request->input('name');
            $profile->user_id =  $existingUser->id;
            $profile->email = $request->input('email');
            $profile->save();
        }
        
        

        return redirect()->route('admin.users.index')->with('success', 'Admin user updated successfully.');
    }

    public function destroy($id)
    {
         
        $user = User::where('adminuser_id', $id)->first();

        $userProfile = UserProfile::where('user_id', $user->id)->first();

        if ($userProfile) {
            $userProfile->delete();
        }    
        $user->quizResults()->update(['user_id' => null]);

        $user->delete();

        $adminUser = AdminUser::findOrFail($id);
        $adminUser->delete();

        return redirect()->route('admin.users.index')->with('success', 'Admin user deleted successfully.');
    }

    public function showprofile(UserProfile $profile)
    { 
           return view('admin.profile.show', compact('profile'));
    }
    
    public function editprofile(UserProfile $profile)
    {
        return view('admin.profile.edit', compact('profile'));
    }
    
    public function updateprofile(Request $request, UserProfile $profile)
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

               return redirect()->route('adminprofile.edit', $profile->user_id)
            ->with('success', 'Profile updated successfully!');
    }

}
