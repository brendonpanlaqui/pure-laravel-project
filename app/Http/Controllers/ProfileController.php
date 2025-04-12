<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

class ProfileController extends Controller {
    public function index() {
        return view('profile.index', ['user' => Auth::user()]);
    }

    public function edit() {
        return view('profile.edit', ['user' => Auth::user()]);
    }

    public function update(Request $request) {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'specialties' => 'nullable|string|max:255',
            'bio' => 'nullable|string',
            'contact_number' => 'nullable|string|max:20',
            'profile_photo' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        if ($request->hasFile('profile_photo')) {
            $file = $request->file('profile_photo'); // ✅ Define the file
        
            $filename = time() . '.' . $file->getClientOriginalExtension(); // ✅ Now $file is defined
        
            // ✅ Store file properly
            $file->storeAs('public/profile_photos', $filename);
        
            $user->profile_photo = 'profile_photos/' . $filename;
        }
        
        // ✅ Save user info
        $user->update($request->only(['name', 'specialties', 'bio', 'contact_number']));
        
        return redirect()->route('profile.index')->with('success', 'Profile updated successfully!');
    }
}
