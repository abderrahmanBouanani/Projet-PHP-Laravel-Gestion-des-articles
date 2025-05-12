<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Application Laravel')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('custom.css') }}">
</head>
<body>
    <nav class="navbar navbar-expand-lg mb-4 sticky-top shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ route('articles.index') }}">LaravelApp</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('articles.index') }}"><i class="fas fa-home me-1"></i>Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('articles.create') }}"><i class="fas fa-plus-circle me-1"></i>Créer un article</a>
                </li>
                @if(session('profil_email'))
                    <li class="nav-item">
                        <span class="nav-link">Bonjour {{ session('profil_email') }}</span>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('profil') }}"><i class="fas fa-user me-1"></i>Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('profil.register.form') }}"><i class="fas fa-user-plus me-1"></i>Inscription</a>
                    </li>
                @endif
            </ul>
            @if(session('profil_email'))
            <div class="d-flex">
                <a href="{{ route('profil.logout') }}" class="btn btn-outline-danger">
                    <i class="fas fa-sign-out-alt me-1"></i> Déconnexion
                </a>
            </div>
            @endif
        </div>
    </div>
</nav>

    <main>
        @yield('content')
    </main>
</body>
</html>
