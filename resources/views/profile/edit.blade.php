@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Profiel bewerken</h1>

    @if(session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
    @endif

    <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
        @csrf
        @method('POST')

        <div class="mb-3">
            <label for="username">Gebruikersnaam</label>
            <input id="username" type="text" name="username" value="{{ old('username', $user->username) }}" class="form-control @error('username') is-invalid @enderror" required>
            @error('username')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="email">E-mail</label>
            <input id="email" type="email" name="email" value="{{ old('email', $user->email) }}" class="form-control @error('email') is-invalid @enderror" required>
            @error('email')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="over_mij">Bio</label>
            <textarea id="over_mij" name="over_mij" class="form-control @error('over_mij') is-invalid @enderror" rows="4">{{ old('over_mij', $user->over_mij) }}</textarea>
            @error('over_mij')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="profielfoto">Profielfoto</label>
            @if($user->profielfoto)
                <div>
                    <img src="{{ asset('storage/' . $user->profielfoto) }}" alt="Profielfoto" style="max-width: 150px; max-height: 150px;">
                </div>
            @endif
            <input id="profielfoto" type="file" name="profielfoto" class="form-control @error('profielfoto') is-invalid @enderror" accept="image/*">
            @error('profielfoto')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Opslaan</button>
    </form>
</div>
@endsection
