<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Gebruiker bewerken</h2>
    </x-slot>

    <div class="py-6 max-w-2xl mx-auto sm:px-6 lg:px-8 bg-white p-6 rounded shadow">
        <form action="{{ route('admin.gebruikers.update', $gebruiker) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block mb-1">Naam</label>
                <input type="text" name="name" value="{{ old('name', $gebruiker->name) }}" class="w-full border rounded px-3 py-2" required>
            </div>

            <div class="mb-4">
                <label class="block mb-1">E-mail</label>
                <input type="email" name="email" value="{{ old('email', $gebruiker->email) }}" class="w-full border rounded px-3 py-2" required>
            </div>

            <div class="mb-4">
                <label class="block mb-1">Rol</label>
                <select name="is_admin" class="w-full border rounded px-3 py-2">
                    <option value="0" {{ !$gebruiker->is_admin ? 'selected' : '' }}>Gebruiker</option>
                    <option value="1" {{ $gebruiker->is_admin ? 'selected' : '' }}>Admin</option>
                </select>
            </div>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Opslaan</button>
            <a href="{{ route('admin.gebruikers.index') }}" class="ml-4 text-gray-600 hover:underline">Annuleren</a>
        </form>
    </div>
</x-app-layout>
