@extends('layouts.app')

@section('content')
<div class="container auth-container" style="max-width: 400px;">
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <h2 class="mb-4 text-center">Connexion</h2>
    <form method="POST" action="{{ route('profil.login') }}">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">Adresse Email</label>
            <input type="email" class="form-control" id="email" name="email" required autofocus>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Mot de passe</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <button type="submit" class="btn btn-primary w-100">Se connecter</button>
    </form>
    <div class="mt-3 text-center">
        <a href="{{ route('profil.register.form') }}">Créer un compte</a>
    </div>
</div>
@endsection
