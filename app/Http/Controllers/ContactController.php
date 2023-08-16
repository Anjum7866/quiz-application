<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
public function showForm()
{
    return view('contact.forms');
}

public function submitForm(Request $request)
{
    // Validate form data
    $validatedData = $request->validate([
        'name' => 'required',
        'email' => 'required|email',
        'message' => 'required',
    ]);

    // Save data or perform other actions

    return view('contact.success');
}

}
