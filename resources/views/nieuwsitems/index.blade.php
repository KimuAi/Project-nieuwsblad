@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto py-10 px-4">
    <h1 class="text-3xl font-bold mb-8">Laatste Nieuws</h1>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @forelse ($nieuwsitems as $item)
            <div class="border rounded-lg overflow-hidden shadow hover:shadow-lg transition bg-white">
                <a href="{{ route('nieuwsitems.show', $item) }}">
                    @if($item->afbeelding)
                        <img src="{{ asset('storage/' . $item->afbeelding) }}" alt="{{ $item->titel }}" class="w-full h-20 object-cover">
                    @else
                        <div class="w-full h-48 bg-gray-200 flex items-center justify-center text-gray-500 text-sm">
                            Geen afbeelding
                        </div>
                    @endif
                </a>

                <div class="p-4">
                    <h2 class="text-xl font-semibold mb-2">{{ $item->titel }}</h2>
                    <p class="text-gray-600 text-sm mb-3">
                        {{ Str::limit(strip_tags($item->content), 100) }}
                    </p>

                    <a href="{{ route('nieuwsitems.show', $item) }}" class="text-blue-600 text-sm font-medium hover:underline">
                        Lees meer →
                    </a>

                    @if(auth()->check() && auth()->user()->is_admin)
                        <div class="mt-4 flex space-x-2">
                            <a href="{{ route('admin.nieuwsitems.edit', $item->id) }}" class="text-yellow-600 hover:underline text-sm">Bewerken</a>

                            <form action="{{ route('admin.nieuwsitems.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Weet je zeker dat je dit nieuwsitem wilt verwijderen?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline text-sm">Verwijderen</button>
                            </form>
                        </div>
                    @endif
                </div>
            </div>
        @empty
            <p class="text-gray-500">Er zijn momenteel geen nieuwsitems beschikbaar.</p>
        @endforelse
    </div>

    @if ($nieuwsitems->hasPages())
        <div class="mt-8">
            {{ $nieuwsitems->links() }}
        </div>
    @endif
</div>
@endsection
