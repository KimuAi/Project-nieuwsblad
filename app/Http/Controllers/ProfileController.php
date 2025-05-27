<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Show the form for editing the user profile.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile info.
     */
    public function update(Request $request): RedirectResponse
    {
        $user = $request->user();

        // Valideer input
        $validated = $request->validate([
            'username' => 'required|string|max:255|unique:users,username,' . $user->id,
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'over_mij' => 'nullable|string|max:1000',
            'profielfoto' => 'nullable|image|max:2048', // Max 2MB
        ]);

        // Update velden
        $user->username = $validated['username'];
        $user->email = $validated['email'];
        $user->over_mij = $validated['over_mij'] ?? null;

        // Reset verificatie als email verandert
        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        // Profielfoto uploaden/vervangen
        if ($request->hasFile('profielfoto')) {
            if ($user->profielfoto) {
                Storage::disk('public')->delete($user->profielfoto);
            }
            $path = $request->file('profielfoto')->store('profile-photos', 'public');
            $user->profielfoto = $path;
        }

        $user->save();

        return Redirect::route('profile.edit')->with('status', 'Profiel succesvol bijgewerkt!');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        if ($user->profielfoto) {
            Storage::disk('public')->delete($user->profielfoto);
        }

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    /**
     * Show a user's profile by username.
     */
    public function show(string $username): View
    {
        $user = \App\Models\User::where('username', $username)->firstOrFail();

        // Optioneel: haal recente nieuwsitems op, bijvoorbeeld laatste 5
        $nieuwsitems = $user->nieuwsitems()->latest()->take(5)->get();

        return view('profile.show', compact('user', 'nieuwsitems'));
    }
}
