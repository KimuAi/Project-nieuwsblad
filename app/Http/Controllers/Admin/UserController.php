<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $gebruikers = User::orderBy('name')->paginate(10);
        return view('admin.gebruikers.index', compact('gebruikers'));
    }

    public function edit(User $gebruiker)
    {
        return view('admin.gebruikers.edit', compact('gebruiker'));
    }

    public function update(Request $request, User $gebruiker)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $gebruiker->id,
            'is_admin' => 'required|boolean',
        ]);

        $gebruiker->update($validated);

        return redirect()->route('admin.gebruikers.index')->with('success', 'Gebruiker bijgewerkt.');
    }

    public function destroy(User $gebruiker)
    {
        // voorkom dat je jezelf verwijdert
        if (auth()->id() === $gebruiker->id) {
            return back()->withErrors(['error' => 'Je kunt jezelf niet verwijderen.']);
        }

        $gebruiker->delete();

        return redirect()->route('admin.gebruikers.index')->with('success', 'Gebruiker verwijderd.');
    }
}
