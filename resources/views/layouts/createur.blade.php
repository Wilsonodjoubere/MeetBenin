<!-- resources/views/layouts/createur.blade.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Espace Créateur</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <style>
        .createur-hero {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }
        .feature-card {
            transition: transform 0.3s ease;
            border: none;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        .feature-card:hover {
            transform: translateY(-5px);
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ route('createur.landing') }}">
                <i class="bi bi-pen-fill me-2"></i>Espace Créateur
            </a>
            
            <div class="navbar-nav ms-auto">
                <a class="nav-link" href="{{ route('createur.landing') }}">
                    <i class="bi bi-house me-1"></i>Accueil
                </a>
                <a class="nav-link" href="{{ route('createur.contenus') }}">
                    <i class="bi bi-folder me-1"></i>Mes Contenus
                </a>
                <a class="nav-link" href="{{ route('createur.nouveau') }}">
                    <i class="bi bi-plus-circle me-1"></i>Nouveau
                </a>
                <div class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                        <i class="bi bi-person-circle me-1"></i>{{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Profil</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item text-danger">Déconnexion</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <!-- Contenu principal -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-dark text-light py-4 mt-5">
        <div class="container text-center">
            <p>&copy; 2024 Culture Bénin - Espace Créateur. Tous droits réservés.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @yield('scripts')
</body>
</html>