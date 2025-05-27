<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Gebruikersbeheer</h2>
    </x-slot>

    <div class="py-6 max-w-5xl mx-auto sm:px-6 lg:px-8">
        @if(session('success'))
            <div class="mb-4 p-4 bg-green-200 text-green-800 rounded">{{ session('success') }}</div>
        @endif

        <table class="min-w-full bg-white rounded shadow">
            <thead>
                <tr>
                    <th class="px-6 py-3 border-b">Naam</th>
                    <th class="px-6 py-3 border-b">E-mail</th>
                    <th class="px-6 py-3 border-b">Rol</th>
                    <th class="px-6 py-3 border-b">Acties</th>
                </tr>
            </thead>
            <tbody>
                @foreach($gebruikers as $gebruiker)
                    <tr>
                        <td class="px-6 py-4 border-b">{{ $gebruiker->name }}</td>
                        <td class="px-6 py-4 border-b">{{ $gebruiker->email }}</td>
                        <td class="px-6 py-4 border-b">{{ $gebruiker->is_admin ? 'Admin' : 'Gebruiker' }}</td>
                        <td class="px-6 py-4 border-b space-x-2">
                            <a href="{{ route('admin.gebruikers.edit', $gebruiker) }}" class="text-blue-600 hover:underline">✏️ Bewerk</a>
                            @if(auth()->id() !== $gebruiker->id)
                                <form action="{{ route('admin.gebruikers.destroy', $gebruiker) }}" method="POST" class="inline" onsubmit="return confirm('Weet je zeker dat je deze gebruiker wilt verwijderen?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline">🗑️ Verwijder</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-4">
            {{ $gebruikers->links() }}
        </div>
    </div>
</x-app-layout>
