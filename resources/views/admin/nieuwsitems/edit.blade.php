<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Nieuwsitem Bewerken</h2>
    </x-slot>

    <div class="py-6 max-w-3xl mx-auto sm:px-6 lg:px-8 bg-white rounded shadow p-6">
        <form action="{{ route('admin.nieuwsitems.update', $nieuwsitem) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="titel" class="block font-semibold mb-1">Titel</label>
                <input type="text" id="titel" name="titel" value="{{ old('titel', $nieuwsitem->titel) }}" class="w-full border rounded px-3 py-2" required>
                @error('titel') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label for="content" class="block font-semibold mb-1">Inhoud</label>
                <textarea id="content" name="content" rows="6" class="w-full border rounded px-3 py-2" required>{{ old('content', $nieuwsitem->content) }}</textarea>
                @error('content') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label for="afbeelding" class="block font-semibold mb-1">Afbeelding (optioneel)</label>
                @if($nieuwsitem->afbeelding)
                    <img src="{{ asset('storage/' . $nieuwsitem->afbeelding) }}" alt="Huidige afbeelding" class="mb-2 h-32">
                @endif
                <input type="file" id="afbeelding" name="afbeelding" accept="image/*" class="w-full">
                @error('afbeelding') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="mb-6">
                <label for="publicatiedatum" class="block font-semibold mb-1">Publicatiedatum</label>
                <input type="date" id="publicatiedatum" name="publicatiedatum" value="{{ old('publicatiedatum', $nieuwsitem->publicatiedatum->format('Y-m-d')) }}" class="w-full border rounded px-3 py-2" required>
                @error('publicatiedatum') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">Opslaan</button>
            <a href="{{ route('admin.nieuwsitems.index') }}" class="ml-4 text-gray-700 hover:underline">Annuleer</a>
        </form>
    </div>
</x-app-layout>
