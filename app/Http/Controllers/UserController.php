<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use App\Models\User;
use App\Models\Guru;


class UserController extends Controller
{
    public function profile()
    {
        return view('user.profile');
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();
        
        $validated = $request->validate([
            'username' => [
                'required',
                'string',
                'max:50',
                Rule::unique('users', 'username')->ignore($user->id_user, 'id_user'),
            ],
            'password_baru' => 'nullable|string|min:6',
            'password_konfirmasi' => 'required|string',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Verify current password
        if (!Hash::check($validated['password_konfirmasi'], $user->password)) {
            return back()->with('error', 'Password konfirmasi tidak cocok')->withInput();
        }

        // Update username
        $userData = [
            'username' => $validated['username'],
        ];

        // Update password if provided
        if (!empty($validated['password_baru'])) {
            $userData['password'] = Hash::make($validated['password_baru']);
        }

        // Handle profile picture upload
        if ($request->hasFile('profile_picture')) {
            // Delete old profile picture if exists
            if ($user->profile_picture && $user->profile_picture != 'default.jpg') {
                Storage::disk('public')->delete('profile_pictures/' . $user->profile_picture);
            }

            // Store new picture
            $fileName = time() . '_' . $request->file('profile_picture')->getClientOriginalName();
            $request->file('profile_picture')->storeAs('profile_pictures', $fileName, 'public');
            $userData['profile_picture'] = $fileName;
        }

        // Update user
        $user = User::find(Auth::id());
        if ($user) {
            $user->update($userData);
        }
        

        return redirect()->route('user.profile')->with('success', 'Profil berhasil diperbarui');
    }

    public function profileGuru()
{
    $user = Auth::user(); // Ambil data user yang sedang login
    $guru = Guru::where('id_user', $user->id_user)->first(); // Cari data guru

    if (!$guru) {
        return redirect()->back()->with('error', 'Data guru tidak ditemukan!');
    }

    return view('guru.profile', compact('guru', 'user'));
}

}