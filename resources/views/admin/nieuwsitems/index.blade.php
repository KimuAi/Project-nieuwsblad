<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Nieuwsitems Beheer</h2>
    </x-slot>

    <div class="py-6 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <a href="{{ route('admin.nieuwsitems.create') }}" class="mb-4 inline-block bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">➕ Nieuw Nieuwsitem</a>

        @if(session('success'))
            <div class="mb-4 p-4 bg-green-200 text-green-800 rounded">{{ session('success') }}</div>
        @endif

        <table class="min-w-full bg-white rounded shadow">
            <thead>
                <tr>
                    <th class="px-6 py-3 border-b">Titel</th>
                    <th class="px-6 py-3 border-b">Publicatiedatum</th>
                    <th class="px-6 py-3 border-b">Acties</th>
                </tr>
            </thead>
            <tbody>
                @forelse($nieuwsitems as $item)
                    <tr>
                        <td class="px-6 py-4 border-b">{{ $item->titel }}</td>
                        <td class="px-6 py-4 border-b">{{ $item->publicatiedatum->format('d-m-Y') }}</td>
                        <td class="px-6 py-4 border-b space-x-2">
                            <a href="{{ route('admin.nieuwsitems.edit', $item) }}" class="text-blue-600 hover:underline">Bewerk</a>
                            <form action="{{ route('admin.nieuwsitems.destroy', $item) }}" method="POST" class="inline" onsubmit="return confirm('Weet je zeker dat je dit nieuwsitem wilt verwijderen?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">Verwijder</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="3" class="text-center p-4">Geen nieuwsitems gevonden.</td></tr>
                @endforelse
            </tbody>
        </table>

        <div class="mt-4">
            {{ $nieuwsitems->links() }}
        </div>
    </div>
</x-app-layout>
