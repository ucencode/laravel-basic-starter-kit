<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        return view('admin.profile.index', compact('user'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required', 'string', 'email', 'max:255',
                'unique:users,email,' . auth()->id()
            ],
            'password' => ['nullable', 'string', 'min:8'],
        ]);

        $user = auth()->user();

        $request->merge([
            'password' => $request->password ? bcrypt($request->password) : $user->password
        ]);

        $user->update($request->all());
        return redirect()->back()->with('success', 'Profile updated successfully');
    }
}
