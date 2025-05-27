@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-3xl font-bold mb-6">Veelgestelde vragen</h1>

    @foreach($categorieen as $categorie)
        <h2 class="text-2xl font-semibold mt-4 mb-2">{{ $categorie->naam }}</h2>
        <ul class="mb-6">
            @foreach($categorie->vragen as $vraag)
                <li class="mb-2">
                    <strong>{{ $vraag->vraag }}</strong>
                    <p>{{ $vraag->antwoord }}</p>
                </li>
            @endforeach
        </ul>
    @endforeach
</div>
@endsection
