<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function edit(Request $request)
    {
        return view('profile', [
            'user' => $request->user(),
        ]);
    }

    public function updatePhoto(Request $request)
    {
        $validated = $request->validate([
            'name' => 'nullable|string|max:255',
            'photo' => 'nullable|image|max:2048',
        ]);

        $user = $request->user();
        $updates = [];

        if (array_key_exists('name', $validated) && filled($validated['name'])) {
            $updates['name'] = $validated['name'];
        }

        if ($request->hasFile('photo')) {
            if ($user->profile_photo_path) {
                Storage::disk('public')->delete($user->profile_photo_path);
            }

            $path = $request->file('photo')->store('profile-photos', 'public');
            $updates['profile_photo_path'] = $path;
        }

        if (empty($updates)) {
            return back()->with('success', 'Tidak ada perubahan.');
        }

        $user->update($updates);

        return back()->with('success', 'Profil berhasil diperbarui.');
    }
}
