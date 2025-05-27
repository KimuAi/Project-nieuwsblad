<?php

namespace App\Http\Controllers;

use App\Models\Nieuwsitem;
use Illuminate\Http\Request;

class NieuwsitemController extends Controller
{
    public function index()
    {
        $nieuwsitems = Nieuwsitem::with('user')
            ->orderBy('publicatiedatum', 'desc')
            ->paginate(10);

        return view('nieuwsitems.index', compact('nieuwsitems'));
    }

    public function show(Nieuwsitem $nieuwsitem)
    {
        // Laad de user relatie van dit nieuwsitem
        $nieuwsitem->load('user');

        // Haal de eigenaar van het nieuwsitem
        $user = $nieuwsitem->user;

        // Stuur alleen dit nieuwsitem en user door naar de view
        return view('nieuwsitems.show', compact('nieuwsitem', 'user'));
    }
}
