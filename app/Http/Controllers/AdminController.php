<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function index()
    {
        $admins = Admin::all();
        return response()->json(['admins' => $admins]);
    }

    public function show($id)
    {
        
        $admin = Admin::findOrFail($id);
        return response()->json(['admin' => $admin]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|email|unique:admins',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $admin = Admin::create($request->all());
        return response()->json(['message' => 'Admin created successfully', 'admin' => $admin], 201);
    }
    public function update(Request $request, $id)
    {
        $admin = Admin::find($id);
        if (!$admin) {
            return response()->json(['message' => 'Admin not found'], 404);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|email|unique:admins,email,' . $id,
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $admin->update($request->all());
        return response()->json(['message' => 'Admin updated successfully', 'admin' => $admin]);
    }
   


    public function destroy($id)
    {
        $admin = Admin::findOrFail($id);
      
        $admin->delete();
        return response()->json(['message' => 'Admin deleted successfully']);
    }
}
