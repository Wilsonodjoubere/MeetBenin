<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Présentation - Culture Béninoise</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --benin-green: #008751;
            --benin-yellow: #fcd116;
            --benin-red: #e8112d;
            --earth-brown: #8B4513;
            --neutral-beige: #F5F5DC;
        }
        
        body {
            background: linear-gradient(135deg, var(--neutral-beige) 0%, #ffffff 100%);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
        }
        
        .benin-header {
            background: linear-gradient(90deg, var(--benin-green) 0%, var(--benin-yellow) 50%, var(--benin-red) 100%);
            color: white;
            padding: 2rem 0;
            margin-bottom: 2rem;
        }
        
        .welcome-card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 135, 81, 0.1);
            background: white;
            transition: transform 0.3s ease;
        }
        
        .welcome-card:hover {
            transform: translateY(-5px);
        }
        
        .culture-icon {
            font-size: 3rem;
            color: var(--benin-green);
            margin-bottom: 1rem;
        }
        
        .btn-benin {
            background: linear-gradient(45deg, var(--benin-green), var(--benin-yellow));
            border: none;
            color: white;
            padding: 12px 30px;
            border-radius: 25px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .btn-benin:hover {
            transform: scale(1.05);
            box-shadow: 0 5px 15px rgba(0, 135, 81, 0.3);
            color: white;
        }
        
        .feature-card {
            background: white;
            border-radius: 10px;
            padding: 2rem;
            text-align: center;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            height: 100%;
            border-top: 4px solid var(--benin-green);
        }
        
        .user-avatar {
            width: 100px;
            height: 100px;
            background: linear-gradient(45deg, var(--benin-green), var(--benin-yellow));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 2.5rem;
            font-weight: bold;
            margin: 0 auto 1rem;
        }
        
        .pattern-bg {
            background-image: url("data:image/svg+xml,%3Csvg width='100' height='100' viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M11 18c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm48 25c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm-43-7c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm63 31c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM34 90c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm56-76c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM12 86c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm28-65c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm23-11c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-6 60c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm29 22c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zM32 63c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm57-13c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-9-21c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM60 91c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM35 41c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM12 60c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2z' fill='%23008751' fill-opacity='0.05' fill-rule='evenodd'/%3E%3C/svg%3E");
        }
    </style>
</head>
<body class="pattern-bg">
    <!-- En-tête Bénin -->
    <div class="benin-header text-center">
        <div class="container">
            <h1 class="display-4 fw-bold">🌅 Akwaba</h1>
            <p class="lead">Bienvenue dans votre espace personnel</p>
        </div>
    </div>

    <div class="container">
        <!-- Carte de bienvenue -->
        <div class="row justify-content-center mb-5">
            <div class="col-md-8">
                <div class="welcome-card p-4 text-center">
                    <div class="user-avatar">
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    </div>
                    <h2 class="fw-bold text-benin-green">Bonjour, {{ Auth::user()->name }} !</h2>
                    <p class="text-muted">Nous sommes heureux de vous revoir dans votre espace dédié</p>
                    
                    <div class="mt-4">
                        <a href="{{ route('consumer.profile') }}" class="btn btn-benin me-3">
                            👤 Mon Profil
                        </a>
                        <button class="btn btn-outline-benin" style="border-color: var(--benin-green); color: var(--benin-green);">
                            📱 Mes Activités
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Fonctionnalités -->
        <div class="row g-4">
            <div class="col-md-4">
                <div class="feature-card">
                    <div class="culture-icon">🎨</div>
                    <h4>Culture Locale</h4>
                    <p>Découvrez les richesses culturelles du Bénin</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature-card">
                    <div class="culture-icon">🛍️</div>
                    <h4>Boutique</h4>
                    <p>Produits artisanaux et locaux</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature-card">
                    <div class="culture-icon">📚</div>
                    <h4>Savoir</h4>
                    <p>Apprenez et partagez vos connaissances</p>
                </div>
            </div>
        </div>

        <!-- Citation béninoise -->
        <div class="row mt-5">
            <div class="col-12">
                <div class="text-center p-4" style="background: rgba(0, 135, 81, 0.1); border-radius: 10px;">
                    <p class="fst-italic mb-0">"La sagesse est comme un baobab, une seule personne ne peut l'embrasser."</p>
                    <small class="text-muted">- Proverbe béninois</small>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>