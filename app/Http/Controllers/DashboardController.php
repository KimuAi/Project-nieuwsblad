<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nieuwsitem;
use App\Models\FaqCategorie;
use App\Models\Contactbericht;

class DashboardController extends Controller
{
    public function index()
    {
        // Tel aantal nieuwsitems
        $nieuwsCount = Nieuwsitem::count();

        // Tel aantal FAQ categorieën
        $faqCount = FaqCategorie::count();

        // Tel aantal ongelezen contactberichten
        $ongelezenContactberichten = Contactbericht::where('gelezen', false)->count();

        return view('dashboard', compact('nieuwsCount', 'faqCount', 'ongelezenContactberichten'));
    }

    public function adminIndex()
    {
        // Zelfde data, kan uitgebreid worden met meer admin-specifieke info
        $nieuwsCount = Nieuwsitem::count();
        $faqCount = FaqCategorie::count();
        $ongelezenContactberichten = Contactbericht::where('gelezen', false)->count();

        return view('admin.dashboard', compact('nieuwsCount', 'faqCount', 'ongelezenContactberichten'));
    }
}
