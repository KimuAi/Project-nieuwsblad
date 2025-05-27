<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex space-x-6">

            <!-- Sidebar navigatie -->
            <aside class="w-64 bg-white rounded-lg shadow p-6">
                <h3 class="text-lg font-semibold mb-4 text-gray-900">Navigatie</h3>
                <ul class="space-y-3 text-gray-800">
                    <li><a href="{{ route('admin.dashboard') }}" class="font-bold text-indigo-600">📊 Dashboard</a></li>
                    <li><a href="{{ route('admin.nieuwsitems.index') }}" class="hover:text-indigo-600">📰 Beheer Nieuwsitems</a></li>
                    <li><a href="{{ route('admin.nieuwsitems.create') }}" class="hover:text-indigo-600">➕ Nieuw Nieuwsitem</a></li>
                </ul>
            </aside>

            <!-- Hoofdinhoud -->
            <main class="flex-1 bg-white rounded-lg shadow p-6">
                <h3 class="text-2xl font-semibold text-gray-900 mb-6">Welkom, {{ auth()->user()->name }}</h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="bg-indigo-100 p-4 rounded-lg shadow">
                        <h4 class="text-lg font-semibold">📰 Nieuwsitems Overzicht</h4>
                        <p class="text-sm text-gray-700">Bekijk, bewerk of verwijder bestaande nieuwsberichten.</p>
                        <a href="{{ route('admin.nieuwsitems.index') }}" class="text-indigo-600 mt-2 inline-block">Ga naar overzicht</a>
                    </div>

                    <div class="bg-green-100 p-4 rounded-lg shadow">
                        <h4 class="text-lg font-semibold">➕ Nieuwsitem Aanmaken</h4>
                        <p class="text-sm text-gray-700">Voeg een nieuw nieuwsitem toe met titel, inhoud en afbeelding.</p>
                        <a href="{{ route('admin.nieuwsitems.create') }}" class="text-green-700 mt-2 inline-block">Voeg toe</a>
                    </div>

                    <div class="bg-yellow-100 p-4 rounded-lg shadow">
                        <h4 class="text-lg font-semibold">📅 Publicatiebeheer</h4>
                        <p class="text-sm text-gray-700">Bekijk nieuwsitems op basis van publicatiedatum en status.</p>
                        <a href="{{ route('admin.nieuwsitems.index') }}" class="text-yellow-700 mt-2 inline-block">Beheren</a>
                    </div>
                </div>

                <div class="mt-8 bg-gray-50 border border-gray-300 rounded p-4">
                    <p class="text-sm text-gray-700">
                        Je bent ingelogd als <strong>admin</strong>. Hier beheer je alleen de <strong>Nieuwsitems</strong> van je website.
                    </p>
                </div>
            </main>
        </div>
    </div>
</x-app-layout>
