<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    NieuwsitemController,
    Admin\NieuwsitemController as AdminNieuwsitemController,
    FaqCategorieController,
    FaqVraagController,
    ContactController,
    ProfileController,
    HomeController,
    Admin\UserController
};

// ---------------------------
// Publieke routes
// ---------------------------

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::resource('nieuwsitems', NieuwsitemController::class)->only(['index', 'show']);

Route::get('/faq', function () {
    $categorieen = \App\Models\FaqCategorie::with('vragen')->get();
    return view('faq.index', compact('categorieen'));
})->name('faq.index');

Route::get('/contact', [ContactController::class, 'create'])->name('contact.create');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::get('/profile/{username}', [ProfileController::class, 'show'])->name('profile.show');


// ---------------------------
// Gebruiker routes (na login)
// ---------------------------

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard'); // Alleen voor gewone users
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
});


// ---------------------------
// Admin routes
// ---------------------------

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {

    // Admin dashboard
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    // Nieuwsbeheer
    Route::resource('nieuwsitems', AdminNieuwsitemController::class);

    // FAQ beheer
    Route::resource('faq_categorieen', FaqCategorieController::class);
    Route::resource('faq_vragen', FaqVraagController::class);

    // Contactberichten
    Route::get('contactberichten', [ContactController::class, 'index'])->name('contactberichten.index');

    // Gebruikersbeheer
    Route::resource('users', UserController::class)->only(['index', 'destroy']);
});


// ---------------------------
// Auth routes (Laravel Breeze / Fortify / Jetstream)
// ---------------------------

require __DIR__.'/auth.php';
