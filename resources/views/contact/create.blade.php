@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 max-w-lg">
    <h1 class="text-3xl font-bold mb-6">Contacteer ons</h1>

    @if(session('success'))
        <div class="bg-green-200 text-green-800 p-3 mb-4 rounded">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('contact.store') }}" method="POST" class="space-y-4">
        @csrf
        <div>
            <label for="naam" class="block font-semibold">Naam</label>
            <input type="text" name="naam" id="naam" value="{{ old('naam') }}" class="w-full border p-2 rounded">
            @error('naam')
                <p class="text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="email" class="block font-semibold">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}" class="w-full border p-2 rounded">
            @error('email')
                <p class="text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="bericht" class="block font-semibold">Bericht</label>
            <textarea name="bericht" id="bericht" rows="5" class="w-full border p-2 rounded">{{ old('bericht') }}</textarea>
            @error('bericht')
                <p class="text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Verstuur</button>
    </form>
</div>
@endsection
