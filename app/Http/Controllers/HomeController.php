<?php

namespace App\Http\Controllers;

use App\Models\Nieuwsitem;

class HomeController extends Controller
{
    public function index()
    {
        $nieuwsitems = Nieuwsitem::orderBy('publicatiedatum', 'desc')->paginate(6); // <-- paginatie van 6 items per pagina
        return view('home', compact('nieuwsitems'));
    }
}
