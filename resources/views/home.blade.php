@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-6">Welkom bij het Nieuwsblad</h1>
    
    <h2 class="text-2xl font-semibold mb-4">Laatste Nieuws</h2>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        @forelse ($nieuwsitems as $item)
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h3 class="text-xl font-bold mb-2">{{ $item->titel }}</h3>
                <p class="text-sm text-gray-500 mb-2">
                    {{ $item->publicatiedatum ? $item->publicatiedatum->format('d-m-Y') : 'Datum onbekend' }}
                </p>
                <p>{{ \Illuminate\Support\Str::limit(strip_tags($item->content), 120) }}</p>
                <a href="{{ route('nieuwsitems.show', $item) }}" class="text-blue-600 hover:underline mt-3 inline-block">Lees verder →</a>
            </div>
        @empty
            <p>Er zijn nog geen nieuwsitems beschikbaar.</p>
        @endforelse
    </div>
</div>
@endsection
