<?php
namespace App\Http\Controllers;

use App\Models\Contactbericht;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function create()
    {
        return view('contact.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'naam' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'bericht' => 'required|string',
        ]);

        Contactbericht::create($validated);

        // Email naar admin sturen
        Mail::raw("Naam: {$validated['naam']}\nEmail: {$validated['email']}\nBericht: {$validated['bericht']}", function ($message) {
            $message->to('admin@ehb.be')
                    ->subject('Nieuw contactbericht van website');
        });

        return redirect()->back()->with('success', 'Bericht verstuurd, bedankt!');
    }

    public function index()
    {
        $contactberichten = Contactbericht::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.contactberichten.index', compact('contactberichten'));
    }
}
