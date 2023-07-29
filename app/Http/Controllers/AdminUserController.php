<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Middleware\CheckRole;
use App\Models\AdminUser;
use Illuminate\Support\Facades\Hash;



class AdminUserController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('checkrole:admin')->only(['index', 'create', 'store', 'show', 'edit', 'update', 'destroy']);
    // }

    
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
            'role' => 'required|in:admin,superadmin',
        ]);

        $adminUser = new AdminUser();
        $adminUser->name = $request->input('name');
        $adminUser->email = $request->input('email');
        $adminUser->password = Hash::make($request->input('password'));
        $adminUser->role = $request->input('role');
        $adminUser->save();

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
        $adminUser->role = $request->input('role');
        $adminUser->save();

        return redirect()->route('admin.users.index')->with('success', 'Admin user updated successfully.');
    }

    public function destroy($id)
    {
        $adminUser = AdminUser::findOrFail($id);
        $adminUser->delete();

        return redirect()->route('admin.users.index')->with('success', 'Admin user deleted successfully.');
    }

}
