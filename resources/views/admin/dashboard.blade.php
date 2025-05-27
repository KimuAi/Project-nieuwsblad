<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Beheer Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-6 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
            <h3 class="text-lg font-bold mb-4">Welkom, Beheerder!</h3>
            <ul class="list-disc ml-6 space-y-2">
                <li><a class="text-blue-600 hover:underline" href="{{ route('admin.nieuwsitems.index') }}">Nieuwsitems beheren</a></li>
                <li><a class="text-blue-600 hover:underline" href="{{ route('admin.faq_categorieen.index') }}">FAQ categorieën beheren</a></li>
                <li><a class="text-blue-600 hover:underline" href="{{ route('admin.faq_vragen.index') }}">FAQ vragen beheren</a></li>
                <li><a class="text-blue-600 hover:underline" href="{{ route('admin.contactberichten.index') }}">Contactberichten</a></li>
                <li><a class="text-blue-600 hover:underline" href="{{ route('admin.users.index') }}">Gebruikers beheren</a></li>
            </ul>
        </div>
    </div>
</x-app-layout>
