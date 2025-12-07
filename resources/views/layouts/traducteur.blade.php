<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Tableau de Bord Traducteur')</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    
    <!-- Styles personnalisés -->
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        /* Hero Section */
        .traducteur-hero {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border-radius: 15px;
            margin-bottom: 2rem;
        }
        
        /* Cards */
        .feature-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border: none;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
        }
        
        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
        }
        
        /* Navigation */
        .traducteur-sidebar {
            min-height: 100vh;
            background: linear-gradient(180deg, #2c3e50 0%, #1a252f 100%);
            color: white;
            padding: 0;
        }
        
        .sidebar-header {
            padding: 30px 20px;
            text-align: center;
            background: rgba(0, 0, 0, 0.2);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .sidebar-header .user-avatar {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background: #3498db;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 15px;
            font-size: 2rem;
        }
        
        .sidebar-nav {
            padding: 20px 0;
        }
        
        .sidebar-nav .nav-link {
            color: #ecf0f1;
            padding: 12px 25px;
            margin: 5px 15px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            transition: all 0.3s ease;
        }
        
        .sidebar-nav .nav-link:hover {
            background: rgba(52, 152, 219, 0.2);
            color: white;
            text-decoration: none;
        }
        
        .sidebar-nav .nav-link.active {
            background: #3498db;
            color: white;
            box-shadow: 0 4px 12px rgba(52, 152, 219, 0.3);
        }
        
        .sidebar-nav .nav-link i {
            width: 25px;
            font-size: 1.2rem;
        }
        
        /* Main Content */
        .main-content {
            padding: 30px;
            min-height: 100vh;
        }
        
        /* Header */
        .main-header {
            background: white;
            padding: 20px 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
            margin-bottom: 30px;
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .traducteur-sidebar {
                min-height: auto;
            }
            
            .main-content {
                padding: 20px 15px;
            }
        }
        
        /* Utilities */
        .text-gradient {
            background: linear-gradient(135deg, #667eea, #764ba2);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .badge-traducteur {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 0.85rem;
        }
    </style>
    
    @stack('styles')
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 col-lg-2 traducteur-sidebar d-none d-md-block">
                <div class="sidebar-header">
                    <div class="user-avatar">
                        <i class="bi bi-person-fill"></i>
                    </div>
                    <h5 class="mb-1">{{ Auth::user()->prenom ?? 'Traducteur' }} {{ Auth::user()->nom ?? '' }}</h5>
                    <p class="small text-light mb-2">{{ Auth::user()->email ?? '' }}</p>
                    <span class="badge-traducteur">
                        <i class="bi bi-translate me-1"></i> Traducteur
                    </span>
                </div>
                
                <nav class="sidebar-nav">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('traducteur.landing') ? 'active' : '' }}" 
                               href="{{ route('traducteur.landing') }}">
                                <i class="bi bi-speedometer2 me-3"></i>
                                <span>Tableau de bord</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('traducteur.traductions') ? 'active' : '' }}" 
                               href="{{ route('traducteur.traductions') }}">
                                <i class="bi bi-list-check me-3"></i>
                                <span>Mes traductions</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('traducteur.nouvelle') ? 'active' : '' }}" 
                               href="{{ route('traducteur.nouvelle') }}">
                                <i class="bi bi-plus-circle me-3"></i>
                                <span>Nouvelle traduction</span>
                            </a>
                        </li>
                        <li class="nav-item mt-4">
                            <hr class="bg-light opacity-25 mx-3">
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('profile.edit') }}">
                                <i class="bi bi-person-circle me-3"></i>
                                <span>Mon profil</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-danger" href="{{ route('logout') }}"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="bi bi-box-arrow-right me-3"></i>
                                <span>Déconnexion</span>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </nav>
            </div>
            
            <!-- Main Content -->
            <div class="col-md-9 col-lg-10 ms-sm-auto px-0">
                <!-- Mobile Header -->
                <nav class="navbar navbar-dark bg-dark d-md-none">
                    <div class="container-fluid">
                        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" 
                                data-bs-target="#mobileSidebar">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <span class="navbar-brand ms-2">
                            <i class="bi bi-translate me-2"></i> Traducteur
                        </span>
                    </div>
                </nav>
                
                <!-- Mobile Sidebar (Offcanvas) -->
                <div class="offcanvas offcanvas-start traducteur-sidebar" tabindex="-1" id="mobileSidebar">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title text-white">Menu</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"></button>
                    </div>
                    <div class="offcanvas-body">
                        <!-- Le même contenu que la sidebar desktop -->
                        <div class="sidebar-header">
                            <div class="user-avatar">
                                <i class="bi bi-person-fill"></i>
                            </div>
                            <h5 class="mb-1">{{ Auth::user()->prenom ?? 'Traducteur' }} {{ Auth::user()->nom ?? '' }}</h5>
                            <p class="small text-light mb-2">{{ Auth::user()->email ?? '' }}</p>
                            <span class="badge-traducteur">
                                <i class="bi bi-translate me-1"></i> Traducteur
                            </span>
                        </div>
                        
                        <nav class="sidebar-nav">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link {{ request()->routeIs('traducteur.landing') ? 'active' : '' }}" 
                                       href="{{ route('traducteur.landing') }}">
                                        <i class="bi bi-speedometer2 me-3"></i>
                                        <span>Tableau de bord</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ request()->routeIs('traducteur.traductions') ? 'active' : '' }}" 
                                       href="{{ route('traducteur.traductions') }}">
                                        <i class="bi bi-list-check me-3"></i>
                                        <span>Mes traductions</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ request()->routeIs('traducteur.nouvelle') ? 'active' : '' }}" 
                                       href="{{ route('traducteur.nouvelle') }}">
                                        <i class="bi bi-plus-circle me-3"></i>
                                        <span>Nouvelle traduction</span>
                                    </a>
                                </li>
                                <li class="nav-item mt-4">
                                    <hr class="bg-light opacity-25 mx-3">
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-danger" href="{{ route('logout') }}"
                                       onclick="event.preventDefault(); document.getElementById('logout-form-mobile').submit();">
                                        <i class="bi bi-box-arrow-right me-3"></i>
                                        <span>Déconnexion</span>
                                    </a>
                                    <form id="logout-form-mobile" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                
                <!-- Main Content Area -->
                <main class="main-content">
                    <!-- Messages de session -->
                    @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="bi bi-check-circle me-2"></i>
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                    @endif
                    
                    @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="bi bi-exclamation-triangle me-2"></i>
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                    @endif
                    
                    <!-- Contenu de la page -->
                    @yield('content')
                </main>
                
                <!-- Footer -->
                <footer class="border-top bg-white py-4">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <p class="mb-0 text-muted">
                                    <i class="bi bi-c-circle"></i> {{ date('Y') }} Culture Benin - Plateforme de Traduction
                                </p>
                            </div>
                            <div class="col-md-6 text-md-end">
                                <p class="mb-0 text-muted">
                                    <i class="bi bi-clock me-1"></i> 
                                    {{ now()->format('d/m/Y H:i') }}
                                </p>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </div>
    
    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Scripts personnalisés -->
    <script>
        // Active le tooltip Bootstrap
        document.addEventListener('DOMContentLoaded', function() {
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
            var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl);
            });
            
            // Auto-dismiss alerts after 5 seconds
            setTimeout(function() {
                var alerts = document.querySelectorAll('.alert:not(.alert-permanent)');
                alerts.forEach(function(alert) {
                    var bsAlert = new bootstrap.Alert(alert);
                    bsAlert.close();
                });
            }, 5000);
        });
    </script>
    
    @stack('scripts')
</body>
</html>