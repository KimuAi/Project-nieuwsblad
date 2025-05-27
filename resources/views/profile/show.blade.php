@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 max-w-2xl">
    <div class="flex items-center space-x-6 mt-8 mb-6">
        @if($user->profielfoto)
            <img src="{{ asset('storage/' . $user->profielfoto) }}" alt="Profielfoto van {{ $user->name }}" class="w-32 h-32 rounded-full object-cover border-2 border-gray-300 shadow-md">
        @else
            <div class="w-32 h-32 rounded-full bg-gray-200 flex items-center justify-center text-gray-500 font-semibold text-xl border-2 border-gray-300">
                Geen foto
            </div>
        @endif
        <div>
            <h1 class="text-4xl font-extrabold text-gray-900">{{ $user->name }}</h1>
            <p class="text-xl text-gray-600">@{{ $user->username }}</p>
            <p class="mt-2 text-gray-700"><strong>Verjaardag:</strong> {{ $user->verjaardag ? $user->verjaardag->format('d-m-Y') : 'Niet ingevuld' }}</p>
        </div>
    </div>

    <section class="mb-10">
        <h2 class="text-2xl font-semibold border-b-2 border-gray-300 pb-2 mb-3 text-gray-800">Over mij</h2>
        <p class="text-gray-700 leading-relaxed">{{ $user->over_mij ?? 'Nog niets ingevuld.' }}</p>
    </section>

    <section>
        <h2 class="text-2xl font-semibold border-b-2 border-gray-300 pb-2 mb-4 text-gray-800">Recente nieuwsitems</h2>
        @if($nieuwsitems->isEmpty())
            <p class="text-gray-600">Geen nieuwsitems gevonden.</p>
        @else
            <ul class="space-y-3">
                @foreach($nieuwsitems as $nieuwsitem)
                    <li>
                        <a href="{{ route('nieuwsitems.show', $nieuwsitem) }}" class="text-blue-600 hover:underline font-medium">{{ $nieuwsitem->titel }}</a>
                        <span class="text-gray-500 text-sm ml-2">({{ $nieuwsitem->publicatiedatum->format('d-m-Y') }})</span>
                    </li>
                @endforeach
            </ul>
        @endif
    </section>
</div>
@endsection
