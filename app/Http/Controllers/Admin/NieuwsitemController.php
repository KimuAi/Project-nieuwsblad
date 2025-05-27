<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Nieuwsitem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NieuwsitemController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }

    public function index()
    {
        $nieuwsitems = Nieuwsitem::latest('publicatiedatum')->paginate(10);
        return view('admin.nieuwsitems.index', compact('nieuwsitems'));
    }

    public function create()
    {
        return view('admin.nieuwsitems.create');
    }

    public function store(Request $request)
    {
        $validated = $this->validateNieuwsitem($request);

        if ($request->hasFile('afbeelding')) {
            $validated['afbeelding'] = $this->uploadAfbeelding($request);
        }

        $validated['user_id'] = $request->user()->id;

        Nieuwsitem::create($validated);

        return redirect()->route('admin.nieuwsitems.index')
                         ->with('success', 'Nieuwsitem succesvol aangemaakt.');
    }

    public function edit(Nieuwsitem $nieuwsitem)
    {
        return view('admin.nieuwsitems.edit', compact('nieuwsitem'));
    }

    public function update(Request $request, Nieuwsitem $nieuwsitem)
    {
        $validated = $this->validateNieuwsitem($request);

        if ($request->hasFile('afbeelding')) {
            $this->vervangAfbeelding($nieuwsitem);
            $validated['afbeelding'] = $this->uploadAfbeelding($request);
        }

        $nieuwsitem->update($validated);

        return redirect()->route('admin.nieuwsitems.index')
                         ->with('success', 'Nieuwsitem succesvol bijgewerkt.');
    }

    public function destroy(Nieuwsitem $nieuwsitem)
    {
        $this->verwijderAfbeelding($nieuwsitem);

        $nieuwsitem->delete();

        return redirect()->route('admin.nieuwsitems.index')
                         ->with('success', 'Nieuwsitem succesvol verwijderd.');
    }

    /**
     * Validatie in één herbruikbare methode.
     */
    protected function validateNieuwsitem(Request $request): array
    {
        return $request->validate([
            'titel' => 'required|string|max:255',
            'content' => 'required|string',
            'afbeelding' => 'nullable|image|max:2048',
            'publicatiedatum' => 'required|date',
        ]);
    }

    /**
     * Upload afbeelding en retourneer pad.
     */
    protected function uploadAfbeelding(Request $request): string
    {
        return $request->file('afbeelding')->store('nieuwsitems');
    }

    /**
     * Verwijder oude afbeelding indien aanwezig.
     */
    protected function vervangAfbeelding(Nieuwsitem $nieuwsitem): void
    {
        if ($nieuwsitem->afbeelding) {
            Storage::delete($nieuwsitem->afbeelding);
        }
    }

    /**
     * Verwijder afbeelding indien aanwezig.
     */
    protected function verwijderAfbeelding(Nieuwsitem $nieuwsitem): void
    {
        if ($nieuwsitem->afbeelding) {
            Storage::delete($nieuwsitem->afbeelding);
        }
    }
}
