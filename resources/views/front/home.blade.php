{{-- resources/views/front/home.blade.php --}}
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Culture Bénin - Découvrez la richesse culturelle</title>
    
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Playfair+Display:wght@400;700&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --primary-color: #2E8B57;
            --secondary-color: #D4AF37;
            --dark-color: #1A3C27;
            --light-color: #F5F5DC;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
            overflow-x: hidden;
        }
        
        .navbar-brand {
            font-family: 'Playfair Display', serif;
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--primary-color) !important;
        }
        
        .hero-section {
            background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), 
                        url('https://images.unsplash.com/photo-1545569341-9eb8b30979d9?ixlib=rb-4.0.3&auto=format&fit=crop&w=1950&q=80');
            background-size: cover;
            background-position: center;
            color: white;
            padding: 120px 0;
            text-align: center;
        }
        
        .category-card {
            transition: transform 0.3s;
            border: none;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        
        .category-card:hover {
            transform: translateY(-5px);
        }
        
        .article-card {
            border: none;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            transition: all 0.3s;
            height: 100%;
            cursor: pointer;
        }
        
        .article-card:hover {
            box-shadow: 0 8px 16px rgba(0,0,0,0.2);
        }
        
        .article-img {
            height: 200px;
            object-fit: cover;
            width: 100%;
        }
        
        .badge-culture {
            background-color: var(--primary-color);
            color: white;
        }
        
        .badge-histoire {
            background-color: var(--secondary-color);
            color: black;
        }
        
        .badge-cuisine {
            background-color: #DC3545;
            color: white;
        }
        
        .badge-architecture {
            background-color: #6f42c1;
            color: white;
        }
        
        .btn-creator {
            background: linear-gradient(45deg, var(--primary-color), #267349);
            border: none;
            padding: 10px 25px;
            font-weight: 600;
            color: white;
            border-radius: 25px;
            transition: all 0.3s;
        }
        
        .btn-creator:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(46, 139, 87, 0.3);
            color: white;
        }
        
        .footer {
            background-color: var(--dark-color);
            color: white;
            padding: 50px 0 20px;
        }
        
        .price-tag {
            background-color: var(--secondary-color);
            color: black;
            padding: 5px 15px;
            border-radius: 20px;
            font-weight: bold;
        }
        
        .region-filter {
            border-radius: 25px;
            padding: 8px 20px;
            border: 2px solid var(--primary-color);
        }
        
        .auth-buttons .btn {
            border-radius: 25px;
            padding: 8px 25px;
        }
        
        .payment-section {
            background: linear-gradient(135deg, var(--primary-color), var(--dark-color));
            color: white;
            border-radius: 15px;
        }
        
        .article-preview {
            position: relative;
            overflow: hidden;
            max-height: 100px;
            margin-bottom: 15px;
        }
        
        .article-preview::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 50px;
            background: linear-gradient(transparent, white);
        }
        
        .premium-badge {
            position: absolute;
            top: 10px;
            right: 10px;
            background-color: var(--secondary-color);
            color: black;
            padding: 5px 15px;
            border-radius: 20px;
            font-weight: bold;
            font-size: 0.8rem;
        }
        
        /* Interface de lecture */
        .reading-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.9);
            z-index: 9999;
            display: none;
            overflow-y: auto;
            padding: 20px;
        }
        
        .reading-container {
            max-width: 800px;
            margin: 40px auto;
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 20px 40px rgba(0,0,0,0.3);
            animation: slideUp 0.5s ease;
        }
        
        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .reading-header {
            background: linear-gradient(135deg, var(--primary-color), var(--dark-color));
            color: white;
            padding: 30px;
            position: relative;
        }
        
        .close-reading {
            position: absolute;
            top: 20px;
            right: 20px;
            background: rgba(255,255,255,0.2);
            border: none;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            color: white;
            font-size: 1.2rem;
            cursor: pointer;
            transition: background 0.3s;
        }
        
        .close-reading:hover {
            background: rgba(255,255,255,0.3);
        }
        
        .reading-content {
            padding: 40px;
            line-height: 1.8;
            font-size: 1.1rem;
        }
        
        .reading-content img {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
            margin: 20px 0;
        }
        
        .reading-content h2 {
            color: var(--primary-color);
            margin: 30px 0 15px;
            border-bottom: 2px solid var(--secondary-color);
            padding-bottom: 10px;
        }
        
        .reading-content h3 {
            color: var(--dark-color);
            margin: 25px 0 15px;
        }
        
        .reading-content p {
            margin-bottom: 20px;
            text-align: justify;
        }
        
        .reading-content ul, .reading-content ol {
            margin-bottom: 20px;
            padding-left: 30px;
        }
        
        .reading-content li {
            margin-bottom: 10px;
        }
        
        .reading-footer {
            background: #f8f9fa;
            padding: 20px 40px;
            border-top: 1px solid #dee2e6;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .article-meta {
            display: flex;
            align-items: center;
            gap: 15px;
            flex-wrap: wrap;
        }
        
        .reading-actions {
            display: flex;
            gap: 10px;
        }
        
        .btn-read-action {
            padding: 8px 20px;
            border-radius: 20px;
            border: none;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s;
        }
        
        .btn-like {
            background-color: #e9ecef;
            color: #495057;
        }
        
        .btn-like:hover {
            background-color: #dc3545;
            color: white;
        }
        
        .btn-share {
            background-color: #e9ecef;
            color: #495057;
        }
        
        .btn-share:hover {
            background-color: #0d6efd;
            color: white;
        }
        
        .btn-save {
            background-color: #e9ecef;
            color: #495057;
        }
        
        .btn-save:hover {
            background-color: var(--primary-color);
            color: white;
        }
        
        /* Styles pour le formulaire Fexe Pay */
        .fexpay-logo {
            background: linear-gradient(45deg, #FF6B00, #FF8C00);
            color: white;
            padding: 5px 15px;
            border-radius: 10px;
            font-weight: bold;
            font-size: 1.2rem;
        }
        
        .payment-option {
            border: 2px solid #dee2e6;
            border-radius: 10px;
            padding: 15px;
            cursor: pointer;
            transition: all 0.3s;
        }
        
        .payment-option:hover {
            border-color: var(--primary-color);
            background-color: #f8fff9;
        }
        
        .payment-option.selected {
            border-color: var(--primary-color);
            background-color: #e8f5e9;
        }
        
        .operator-logo {
            width: 60px;
            height: 60px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            font-weight: bold;
        }
        
        .mtn-logo {
            background-color: #FFCC00;
            color: black;
        }
        
        .moov-logo {
            background-color: #00A859;
            color: white;
        }
        
        .card-logo {
            background-color: #1A237E;
            color: white;
        }
        
        .payment-steps {
            display: flex;
            align-items: center;
            margin-bottom: 30px;
        }
        
        .step {
            flex: 1;
            text-align: center;
            position: relative;
        }
        
        .step-number {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: #dee2e6;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 10px;
            font-weight: bold;
        }
        
        .step.active .step-number {
            background-color: var(--primary-color);
            color: white;
        }
        
        .step.completed .step-number {
            background-color: #28a745;
            color: white;
        }
        
        .step-line {
            position: absolute;
            top: 20px;
            left: 50%;
            right: -50%;
            height: 2px;
            background-color: #dee2e6;
            z-index: -1;
        }
        
        /* Responsive pour interface de lecture */
        @media (max-width: 768px) {
            .reading-container {
                margin: 20px;
                border-radius: 10px;
            }
            
            .reading-header {
                padding: 20px;
            }
            
            .reading-content {
                padding: 20px;
                font-size: 1rem;
            }
            
            .reading-footer {
                flex-direction: column;
                gap: 15px;
                align-items: flex-start;
            }
        }
        
        .article-quote {
            border-left: 4px solid var(--secondary-color);
            padding-left: 20px;
            margin: 25px 0;
            font-style: italic;
            color: #555;
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 0 10px 10px 0;
        }
        
        .article-highlight {
            background-color: #fff3cd;
            border: 1px solid #ffeaa7;
            padding: 15px;
            border-radius: 8px;
            margin: 20px 0;
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <i class="fas fa-landmark me-2"></i>Culture Bénin
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#home">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#articles">Articles</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#categories">Catégories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#regions">Régions</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">À propos</a>
                    </li>
                </ul>
                
                <div class="auth-buttons">
                    <a href="{{ route('login') }}" class="btn btn-creator">
                        <i class="fas fa-pen-nib me-2"></i>Devenir Créateur CultureBénin
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <main style="padding-top: 76px;">
        <!-- Hero Section -->
        <section id="home" class="hero-section">
            <div class="container">
                <h1 class="display-4 fw-bold mb-4">Découvrez la richesse culturelle du Bénin</h1>
                <p class="lead mb-4">Explorez des articles exclusifs sur l'histoire, les traditions, et le patrimoine béninois</p>
                <a href="#articles" class="btn btn-creator btn-lg">
                    <i class="fas fa-book-open me-2"></i>Explorer les articles
                </a>
            </div>
        </section>

        <!-- Catégories -->
        <section id="categories" class="py-5 bg-light">
            <div class="container">
                <div class="row mb-5">
                    <div class="col-12 text-center">
                        <h2 class="fw-bold">Catégories populaires</h2>
                        <p class="text-muted">Choisissez votre domaine d'intérêt</p>
                    </div>
                </div>
                
                <div class="row g-4">
                    <div class="col-md-3 col-sm-6">
                        <div class="category-card card text-center p-4">
                            <div class="card-body">
                                <div class="mb-3">
                                    <i class="fas fa-monument fa-3x text-primary"></i>
                                </div>
                                <h5 class="card-title">Patrimoine</h5>
                                <p class="card-text text-muted">Sites historiques et monuments</p>
                                <span class="badge bg-primary">15 articles</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-3 col-sm-6">
                        <div class="category-card card text-center p-4">
                            <div class="card-body">
                                <div class="mb-3">
                                    <i class="fas fa-masks-theater fa-3x text-warning"></i>
                                </div>
                                <h5 class="card-title">Traditions</h5>
                                <p class="card-text text-muted">Coutumes et cérémonies</p>
                                <span class="badge bg-warning">22 articles</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-3 col-sm-6">
                        <div class="category-card card text-center p-4">
                            <div class="card-body">
                                <div class="mb-3">
                                    <i class="fas fa-utensils fa-3x text-success"></i>
                                </div>
                                <h5 class="card-title">Cuisine</h5>
                                <p class="card-text text-muted">Saveurs et spécialités</p>
                                <span class="badge bg-success">18 articles</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-3 col-sm-6">
                        <div class="category-card card text-center p-4">
                            <div class="card-body">
                                <div class="mb-3">
                                    <i class="fas fa-music fa-3x text-info"></i>
                                </div>
                                <h5 class="card-title">Arts & Musique</h5>
                                <p class="card-text text-muted">Expressions artistiques</p>
                                <span class="badge bg-info">12 articles</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Articles -->
        <section id="articles" class="py-5">
            <div class="container">
                <div class="row mb-5">
                    <div class="col-md-8">
                        <h2 class="fw-bold">Articles récents</h2>
                        <p class="text-muted">Découvrez nos derniers contenus exclusifs</p>
                    </div>
                    <div class="col-md-4">
                        <select class="form-select region-filter" id="regionFilter">
                            <option value="all">Toutes les régions</option>
                            <option value="atlantique">Atlantique</option>
                            <option value="oueme">Ouémé</option>
                            <option value="borgou">Borgou</option>
                            <option value="donga">Donga</option>
                            <option value="zou">Zou</option>
                        </select>
                    </div>
                </div>
                
                <div class="row g-4" id="articlesContainer">
                    <!-- Article Gratuit 1: Les Guélédés -->
                    <div class="col-lg-4 col-md-6 article-item" data-region="zou" data-category="culture">
                        <div class="article-card card" onclick="readFreeArticle(1)">
                            <div class="position-relative">
                                <img src="https://images.unsplash.com/photo-1518834103328-93d45986dce1?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                                     class="card-img-top article-img" alt="Guélédés du Bénin">
                                <span class="badge-culture badge position-absolute top-0 start-0 m-3">Tradition</span>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Les Guélédés du Bénin</h5>
                                <p class="card-text text-muted">Masques spectaculaires et danses traditionnelles des populations Yoruba...</p>
                                <div class="article-preview">
                                    <p class="text-muted">Les Guélédés sont des masques traditionnels portés lors des cérémonies religieuses et sociales chez les Yoruba. Ces masques, souvent spectaculaires et colorés, représentent des figures animales ou humaines...</p>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <span class="price-tag">GRATUIT</span>
                                        <small class="text-muted ms-2"><i class="fas fa-user me-1"></i>Prof. Amina Gbadamassi</small>
                                    </div>
                                    <button class="btn btn-primary" onclick="event.stopPropagation(); readFreeArticle(1)">
                                        <i class="fas fa-book-open me-1"></i>Lire maintenant
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Article Gratuit 2: Tata Somba -->
                    <div class="col-lg-4 col-md-6 article-item" data-region="donga" data-category="architecture">
                        <div class="article-card card" onclick="readFreeArticle(2)">
                            <div class="position-relative">
                                <img src="https://images.unsplash.com/photo-1545569341-9eb8b30979d9?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                                     class="card-img-top article-img" alt="Architecture Tata Somba">
                                <span class="badge-architecture badge position-absolute top-0 start-0 m-3">Architecture</span>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">L'Architecture des Tata Somba</h5>
                                <p class="card-text text-muted">Maisons-forteresses uniques du Nord-Bénin classées au patrimoine mondial...</p>
                                <div class="article-preview">
                                    <p class="text-muted">Les Tata Somba sont des habitations traditionnelles des populations Somba et Tammari du Nord-Bénin. Ces maisons-forteresses en terre, souvent à deux étages, sont conçues pour la défense...</p>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <span class="price-tag">GRATUIT</span>
                                        <small class="text-muted ms-2"><i class="fas fa-user me-1"></i>Arch. Yves Tokponto</small>
                                    </div>
                                    <button class="btn btn-primary" onclick="event.stopPropagation(); readFreeArticle(2)">
                                        <i class="fas fa-book-open me-1"></i>Lire maintenant
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Articles Payants (comme avant) -->
                    <div class="col-lg-4 col-md-6 article-item" data-region="atlantique" data-category="histoire">
                        <div class="article-card card">
                            <div class="position-relative">
                                <img src="https://images.unsplash.com/photo-1545569341-9eb8b30979d9?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                                     class="card-img-top article-img" alt="Royaume du Dahomey">
                                <span class="badge-histoire badge position-absolute top-0 start-0 m-3">Histoire</span>
                                <div class="premium-badge">PREMIUM</div>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Le Royaume du Dahomey</h5>
                                <p class="card-text text-muted">Découvrez l'histoire fascinante de l'un des plus puissants royaumes d'Afrique de l'Ouest...</p>
                                <div class="article-preview">
                                    <p class="text-muted">Le Royaume du Dahomey, fondé au 17ème siècle, était l'un des États les plus puissants d'Afrique de l'Ouest. Connu pour son administration centralisée, son armée redoutable...</p>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <span class="price-tag">500 FCFA</span>
                                        <small class="text-muted ms-2"><i class="fas fa-user me-1"></i>Dr. Koffi Adékambi</small>
                                    </div>
                                    <button class="btn btn-warning" onclick="showFexpayPayment(1, 'Le Royaume du Dahomey', 500)">
                                        <i class="fas fa-lock me-1"></i>Payer pour lire
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- ... autres articles payants ... -->
                    
                </div>
            </div>
        </section>

        <!-- Interface de lecture -->
        <div id="readingOverlay" class="reading-overlay">
            <div class="reading-container">
                <div class="reading-header">
                    <button class="close-reading" onclick="closeReading()">
                        <i class="fas fa-times"></i>
                    </button>
                    <h1 id="readingTitle">Les Guélédés du Bénin</h1>
                    <div class="article-meta mt-3">
                        <span id="readingCategory" class="badge-culture badge">Tradition</span>
                        <span class="text-white-50">
                            <i class="fas fa-user me-1"></i>
                            <span id="readingAuthor">Prof. Amina Gbadamassi</span>
                        </span>
                        <span class="text-white-50">
                            <i class="fas fa-calendar me-1"></i>
                            <span id="readingDate">10 Janvier 2024</span>
                        </span>
                        <span class="text-white-50">
                            <i class="fas fa-clock me-1"></i>
                            <span id="readingTime">8 min de lecture</span>
                        </span>
                    </div>
                </div>
                
                <div class="reading-content">
                    <img id="readingImage" src="https://images.unsplash.com/photo-1518834103328-93d45986dce1?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80" 
                         alt="Image de l'article" class="mb-4">
                    
                    <div id="readingContent">
                        <!-- Contenu injecté par JavaScript -->
                    </div>
                </div>
                
                <div class="reading-footer">
                    <div class="article-meta">
                        <span class="text-muted">
                            <i class="fas fa-eye me-1"></i>
                            <span id="readingViews">1,245</span> vues
                        </span>
                        <span class="text-muted">
                            <i class="fas fa-heart me-1"></i>
                            <span id="readingLikes">89</span> j'aime
                        </span>
                    </div>
                    <div class="reading-actions">
                        <button class="btn-read-action btn-like" onclick="likeArticle()">
                            <i class="fas fa-heart me-1"></i>J'aime
                        </button>
                        <button class="btn-read-action btn-share" onclick="shareArticle()">
                            <i class="fas fa-share-alt me-1"></i>Partager
                        </button>
                        <button class="btn-read-action btn-save" onclick="saveArticle()">
                            <i class="fas fa-bookmark me-1"></i>Sauvegarder
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Fexe Pay -->
        <div class="modal fade" id="fexpayModal" tabindex="-1" aria-hidden="true">
            <!-- Code du modal Fexe Pay (identique à précédemment) -->
            <!-- ... -->
        </div>

        <!-- Sections suivantes identiques -->
        <!-- ... -->
    </main>

    <!-- Footer -->
    <!-- ... -->

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // ========== CONTENU COMPLET DES ARTICLES ==========
        
        const freeArticles = {
            1: {
                title: "Les Guélédés du Bénin",
                author: "Prof. Amina Gbadamassi",
                date: "10 Janvier 2024",
                image: "https://images.unsplash.com/photo-1518834103328-93d45986dce1?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80",
                category: "Tradition",
                categoryClass: "badge-culture",
                views: "1,845",
                likes: "156",
                readingTime: "8 min",
                content: `
                    <h2>Introduction</h2>
                    <p>Les Guélédés sont des masques traditionnels portés lors des cérémonies religieuses et sociales chez les Yoruba du Bénin, du Nigeria et du Togo. Ces masques spectaculaires et colorés représentent des figures animales ou humaines et sont utilisés dans des danses rituelles qui célèbrent la maternité, la fertilité et la protection de la communauté.</p>
                    
                    <div class="article-quote">
                        "Le Guélédé n'est pas seulement un masque, c'est un pont entre les vivants et les ancêtres, une célébration de la sagesse féminine et une protection contre les forces obscures." - Proverbe Yoruba
                    </div>
                    
                    <h2>Origines et Signification</h2>
                    <p>Le culte Guélédé trouve son origine dans la société yoruba où il est pratiqué exclusivement par les femmes. Le mot "Guélédé" signifie littéralement "porteur de masque". La tradition remonte au XVIIIe siècle et est classée au patrimoine culturel immatériel de l'UNESCO depuis 2008.</p>
                    
                    <p>Ces masques servent principalement à :</p>
                    <ul>
                        <li><strong>Honorer les mères et les ancêtres féminins</strong> : Reconnaissance du rôle central des femmes dans la société</li>
                        <li><strong>Protéger la communauté</strong> : Contre les forces maléfiques et la sorcellerie</li>
                        <li><strong>Célébrer les récoltes</strong> : Rituels agricoles pour assurer la fertilité des terres</li>
                        <li><strong>Éduquer les jeunes</strong> : Transmission des valeurs et traditions</li>
                    </ul>
                    
                    <img src="https://images.unsplash.com/photo-1518834103328-93d45986dce1?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80" alt="Masque Guélédé détaillé" class="mb-4">
                    
                    <h2>Caractéristiques des Masques</h2>
                    <p>Les masques Guélédé sont reconnaissables à leurs caractéristiques distinctives :</p>
                    
                    <h3>1. La Coiffe Sculptée</h3>
                    <p>La partie supérieure du masque représente souvent :</p>
                    <ul>
                        <li>Scènes de la vie quotidienne (marché, travaux agricoles)</li>
                        <li>Animaux symboliques (serpent pour la sagesse, oiseau pour la liberté)</li>
                        <li>Figures mythologiques (ancêtres, divinités)</li>
                        <li>Objets modernes (montres, voitures) montrant l'adaptation aux temps actuels</li>
                    </ul>
                    
                    <h3>2. Les Scarifications Faciales</h3>
                    <p>Chaque lignée yoruba possède ses propres marques tribales appelées "ila". Ces scarifications identifient :</p>
                    <ul>
                        <li>L'appartenance familiale et clanique</li>
                        <li>Le statut social</li>
                        <li>Les rites de passage (mariage, initiation)</li>
                    </ul>
                    
                    <div class="article-highlight">
                        <h4><i class="fas fa-lightbulb me-2"></i>À Savoir</h4>
                        <p>Les masques Guélédé peuvent peser jusqu'à 15 kg et mesurer plus d'un mètre de haut. Les danseurs doivent posséder une force et une endurance exceptionnelles pour les porter pendant les longues cérémonies.</p>
                    </div>
                    
                    <h3>3. Les Couleurs Symboliques</h3>
                    <ul>
                        <li><strong>Rouge</strong> : Vie, énergie, pouvoir</li>
                        <li><strong>Blanc</strong> : Pureté, spiritualité, ancêtres</li>
                        <li><strong>Noir</strong> : Mystère, profondeur, protection</li>
                        <li><strong>Jaune</strong> : Richesse, prospérité, soleil</li>
                    </ul>
                    
                    <h2>La Cérémonie Guélédé</h2>
                    <p>La cérémonie se déroule généralement la nuit et comprend plusieurs phases :</p>
                    
                    <h3>Préparation Rituelle</h3>
                    <p>Avant la cérémonie, les masques sont bénis par les prêtresses. Des offrandes sont faites aux ancêtres : ignames, noix de cola, huile de palme.</p>
                    
                    <h3>Procession Nocturne</h3>
                    <p>La procession commence avec :</p>
                    <ol>
                        <li>Appel des tambours parlants (dùndún)</li>
                        <li>Entrée des masques en file indienne</li>
                        <li>Chants traditionnels (oríkì) louant les ancêtres</li>
                        <li>Danses circulaires et acrobatiques</li>
                    </ol>
                    
                    <h3>Performance Théâtrale</h3>
                    <p>Chaque masque présente une chorégraphie spécifique :</p>
                    <ul>
                        <li>Imitation des mouvements d'animaux</li>
                        <li>Gestes satiriques critiquant les comportements antisociaux</li>
                        <li>Interactions avec le public</li>
                    </ul>
                    
                    <img src="https://images.unsplash.com/photo-1545569341-9eb8b30979d9?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80" alt="Cérémonie Guélédé" class="mb-4">
                    
                    <h2>Importance Culturelle Contemporaine</h2>
                    <p>Au-delà de l'aspect rituel, les Guélédés jouent un rôle social crucial :</p>
                    
                    <h3>Éducation et Transmission</h3>
                    <p>Les performances servent à :</p>
                    <ul>
                        <li>Enseigner l'histoire et la mythologie yoruba</li>
                        <li>Transmettre les valeurs morales (respect, solidarité, courage)</li>
                        <li>Apprendre les techniques artisanales aux jeunes</li>
                    </ul>
                    
                    <h3>Régulation Sociale</h3>
                    <p>Par des performances satiriques, les Guélédés :</p>
                    <ul>
                        <li>Critiquent les dirigeants corrompus</li>
                        <li>Dénoncent les injustices sociales</li>
                        <li>Encouragent les comportements vertueux</li>
                    </ul>
                    
                    <h3>Conservation Culturelle</h3>
                    <p>Face à la mondialisation, les Guélédés :</p>
                    <ul>
                        <li>Préservent l'identité culturelle yoruba</li>
                        <li>Attirent le tourisme culturel</li>
                        <li>Inspirent les artistes contemporains</li>
                    </ul>
                    
                    <div class="article-quote">
                        "Dans le monde moderne où tout s'uniformise, le Guélédé reste un gardien de notre mémoire collective et un témoin de notre génie créatif." - Ancien du village de Savè
                    </div>
                    
                    <h2>Conclusion</h2>
                    <p>Les Guélédés du Bénin représentent bien plus qu'un simple art masqué. Ils incarnent la mémoire collective, les croyances spirituelles et la résilience culturelle du peuple yoruba. Dans un monde en constante évolution, ces traditions millénaires continuent de fasciner par leur beauté et leur profondeur symbolique, offrant une fenêtre unique sur la riche diversité culturelle du Bénin.</p>
                    
                    <p>La préservation de cet héritage culturel est essentielle pour les générations futures, car il témoigne de la créativité, de la spiritualité et de la sagesse des ancêtres africains. Chaque masque, chaque danse, chaque chant raconte une histoire qui mérite d'être entendue et préservée.</p>
                    
                    <div class="article-highlight">
                        <h4><i class="fas fa-book me-2"></i>Pour Approfondir</h4>
                        <p>Si ce sujet vous intéresse, nous vous recommandons de visiter le Musée Ethnographique de Porto-Novo qui possède une collection exceptionnelle de masques Guélédé, ou d'assister au Festival des Arts et Cultures Yoruba qui se tient chaque année à Savè.</p>
                    </div>
                `
            },
            
            2: {
                title: "L'Architecture des Tata Somba",
                author: "Arch. Yves Tokponto",
                date: "5 Janvier 2024",
                image: "https://images.unsplash.com/photo-1545569341-9eb8b30979d9?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80",
                category: "Architecture",
                categoryClass: "badge-architecture",
                views: "2,120",
                likes: "203",
                readingTime: "10 min",
                content: `
                    <h2>Introduction aux Tata Somba</h2>
                    <p>Les Tata Somba, également appelés "tata" ou "soukala", sont des habitations traditionnelles des populations Somba et Tammari du Nord-Bénin. Ces maisons-forteresses en terre, souvent à deux étages, représentent l'une des architectures les plus originales et ingénieuses d'Afrique de l'Ouest. Classés au patrimoine mondial de l'UNESCO, ces édifices témoignent d'une adaptation exceptionnelle à l'environnement et d'un savoir-faire architectural millénaire.</p>
                    
                    <div class="article-quote">
                        "Le Tata Somba n'est pas seulement une maison, c'est un microcosme qui abrite la famille, protège les récoltes, accueille les ancêtres et défie le temps." - Ancien du village de Boukoumbé
                    </div>
                    
                    <h2>Origines Historiques</h2>
                    <p>L'architecture Tata Somba trouve ses racines dans le XVIe siècle, période de conflits interethniques dans la région de l'Atacora. Les populations, cherchant à se protéger des razzias, ont développé ces maisons-forteresses qui offraient à la fois protection et autonomie.</p>
                    
                    <h3>Contexte Historique</h3>
                    <ul>
                        <li><strong>XVIe-XIXe siècles</strong> : Période d'insécurité due aux guerres tribales et à la traite des esclaves</li>
                        <li><strong>Adaptation défensive</strong> : Nécessité de structures facilement défendables</li>
                        <li><strong>Autonomie</strong> : Capacité à résister aux sièges grâce au stockage intégré</li>
                    </ul>
                    
                    <h2>Caractéristiques Architecturales</h2>
                    <p>Chaque Tata Somba est une véritable forteresse miniature aux caractéristiques uniques :</p>
                    
                    <h3>1. Structure Défensive</h3>
                    <ul>
                        <li><strong>Murs épais</strong> : Jusqu'à 50 cm d'épaisseur pour l'isolation thermique et la protection</li>
                        <li><strong>Ouvertures minimales</strong> : Petites fenêtres pour éviter les intrusions</li>
                        <li><strong>Entrée unique</strong> : Porte étroite (60 cm de large) facile à défendre</li>
                        <li><strong>Meurtrières</strong> : Fentes permettant de tirer des flèches en sécurité</li>
                    </ul>
                    
                    <img src="https://images.unsplash.com/photo-1545569341-9eb8b30979d9?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80" alt="Structure Tata Somba" class="mb-4">
                    
                    <h3>2. Organisation Verticale</h3>
                    <p>Le Tata Somba s'organise sur deux niveaux :</p>
                    
                    <div class="article-highlight">
                        <h4><i class="fas fa-layer-group me-2"></i>Niveau Inférieur (Rez-de-chaussée)</h4>
                        <ul>
                            <li><strong>Étable</strong> : Pour les petits animaux (chèvres, moutons)</li>
                            <li><strong>Grenier</strong> : Stockage des céréales (mil, sorgho, maïs)</li>
                            <li><strong>Cuisine d'été</strong> : Préparation des repas en saison sèche</li>
                            <li><strong>Atelier</strong> : Artisanat et réparation des outils</li>
                        </ul>
                    </div>
                    
                    <div class="article-highlight">
                        <h4><i class="fas fa-home me-2"></i>Niveau Supérieur (Étage)</h4>
                        <ul>
                            <li><strong>Pièces d'habitation</strong> : Chambres pour la famille</li>
                            <li><strong>Cuisine d'hiver</strong> : Pour la saison des pluies</li>
                            <li><strong>Salle commune</strong> : Vie familiale et réceptions</li>
                            <li><strong>Autel ancestral</strong> : Culte des ancêtres</li>
                        </ul>
                    </div>
                    
                    <h3>3. Toiture-Terrasse</h3>
                    <p>La toiture plate sert plusieurs fonctions :</p>
                    <ul>
                        <li><strong>Séchage</strong> : Céréales, légumes, fruits</li>
                        <li><strong>Surveillance</strong> : Vue panoramique sur les environs</li>
                        <li><strong>Vie sociale</strong> : Rencontres familiales le soir</li>
                        <li><strong>Collecte d'eau</strong> : Système de gouttières rudimentaires</li>
                    </ul>
                    
                    <h2>Techniques de Construction</h2>
                    <p>La construction utilise exclusivement des matériaux locaux et des techniques transmises de génération en génération :</p>
                    
                    <h3>Matériaux Utilisés</h3>
                    <ul>
                        <li><strong>Terre argileuse</strong> : Mélangée à de la paille pour la cohésion</li>
                        <li><strong>Bois local</strong> : Pour les planchers et les charpentes</li>
                        <li><strong>Pierres</strong> : Fondations et renforcement des angles</li>
                        <li><strong>Végétaux</strong> : Toiture en paille ou en terre compactée</li>
                    </ul>
                    
                    <h3>Processus de Construction</h3>
                    <ol>
                        <li><strong>Préparation du site</strong> : Nivellement et traçage</li>
                        <li><strong>Fondations</strong> : Pierres empilées sans mortier</li>
                        <li><strong>Élévation des murs</strong> : Technique de la terre banchée</li>
                        <li><strong>Séchage</strong> : Plusieurs semaines entre chaque couche</li>
                        <li><strong>Finitions</strong> : Enduit de terre fine et décoration</li>
                    </ol>
                    
                    <img src="https://images.unsplash.com/photo-1518834103328-93d45986dce1?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80" alt="Construction Tata Somba" class="mb-4">
                    
                    <div class="article-quote">
                        "Construire un Tata Somba, c'est comme élever un membre de la famille. Chaque pierre, chaque poignée de terre raconte une histoire et porte l'énergie de ceux qui l'ont façonnée." - Maître constructeur Somba
                    </div>
                    
                    <h2>Symbolisme et Organisation Sociale</h2>
                    <p>Le Tata Somba n'est pas qu'un habitat, c'est un symbole fort de l'organisation sociale :</p>
                    
                    <h3>Organisation Familiale</h3>
                    <ul>
                        <li><strong>Hiérarchie spatiale</strong> : Chaque membre a sa place définie</li>
                        <li><strong>Zones sacrées</strong> : Espaces réservés aux rites et ancêtres</li>
                        <li><strong>Circulation</strong> : Chemins codifiés selon le statut et l'âge</li>
                    </ul>
                    
                    <h3>Symboles Architecturaux</h3>
                    <ul>
                        <li><strong>Forme circulaire</strong> : Représentation de l'univers et du cycle de la vie</li>
                        <li><strong>Hauteur</strong> : Prestige familial et protection spirituelle</li>
                        <li><strong>Orientation</strong> : Selon les points cardinaux et les éléments naturels</li>
                    </ul>
                    
                    <h2>Adaptation au Climat</h2>
                    <p>Le Tata Somba est parfaitement adapté au climat tropical de l'Atacora :</p>
                    
                    <h3>Régulation Thermique</h3>
                    <ul>
                        <li><strong>Inertie thermique</strong> : Fraîcheur diurne, chaleur nocturne</li>
                        <li><strong>Ventilation naturelle</strong> : Courants d'air contrôlés</li>
                        <li><strong>Protection solaire</strong> : Surplombs et orientation optimale</li>
                    </ul>
                    
                    <h3>Gestion de l'Eau</h3>
                    <ul>
                        <li><strong>Étanchéité</strong> : Enduits spéciaux pour la saison des pluies</li>
                        <li><strong>Drainage</strong> : Pentes étudiées pour l'écoulement</li>
                        <li><strong>Récupération</strong> : Systèmes traditionnels de collecte</li>
                    </ul>
                    
                    <div class="article-highlight">
                        <h4><i class="fas fa-thermometer-half me-2"></i>Performance Environnementale</h4>
                        <p>Les Tata Somba maintiennent naturellement une température intérieure de 25-28°C même quand l'extérieur atteint 40°C, sans aucune consommation d'énergie.</p>
                    </div>
                    
                    <h2>Valeur Patrimoniale et Conservation</h2>
                    <p>Classés au patrimoine mondial de l'UNESCO depuis 1985, les Tata Somba font face à des défis de conservation :</p>
                    
                    <h3>Défis Contemporains</h3>
                    <ul>
                        <li><strong>Exode rural</strong> : Départ des jeunes vers les villes</li>
                        <li><strong>Matériaux modernes</strong> : Tentation du ciment et de la tôle</li>
                        <li><strong>Transmission</strong> : Risque de perte des savoir-faire</li>
                        <li><strong>Climat</strong> : Érosion accélérée par les pluies torrentielles</li>
                    </ul>
                    
                    <h3>Initiatives de Conservation</h3>
                    <ul>
                        <li><strong>Écoles de construction</strong> : Formation des jeunes artisans</li>
                        <li><strong>Tourisme responsable</strong> : Revenus pour les communautés</li>
                        <li><strong>Recherche</strong> : Documentation des techniques traditionnelles</li>
                        <li><strong>Législation</strong> : Protection des sites et savoir-faire</li>
                    </ul>
                    
                    <img src="https://images.unsplash.com/photo-1565958011703-44f9829ba187?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80" alt="Village Tata Somba" class="mb-4">
                    
                    <h2>Inspiration Contemporaine</h2>
                    <p>L'architecture Tata Somba inspire les architectes modernes :</p>
                    
                    <h3>Principes Transposables</h3>
                    <ul>
                        <li><strong>Bioclimatisme</strong> : Conception adaptée au climat</li>
                        <li><strong>Autonomie</strong> : Production et stockage intégrés</li>
                        <li><strong>Polyvalence</strong> : Espaces multifonctionnels</li>
                        <li><strong>Résilience</strong> : Structures adaptées aux changements</li>
                    </ul>
                    
                    <h3>Projets Inspirés</h3>
                    <ul>
                        <li><strong>Éco-lodges</strong> : Tourisme durable dans l'Atacora</li>
                        <li><strong>Habitat social</strong> : Solutions économiques et écologiques</li>
                        <li><strong>Centres culturels</strong> : Mise en valeur du patrimoine</li>
                    </ul>
                    
                    <div class="article-quote">
                        "Le Tata Somba nous enseigne que l'architecture la plus sophistiquée est souvent la plus simple, celle qui dialogue avec son environnement et répond aux besoins réels des habitants." - Architecte contemporain
                    </div>
                    
                    <h2>Conclusion</h2>
                    <p>Les Tata Somba du Nord-Bénin représentent un patrimoine architectural exceptionnel qui dépasse la simple fonction d'habitat. Ils incarnent la sagesse accumulée de générations, une parfaite adaptation à l'environnement, et une philosophie de vie en harmonie avec la nature.</p>
                    
                    <p>Dans un monde confronté aux défis du changement climatique et de la perte d'identité culturelle, ces maisons-forteresses nous rappellent l'importance de construire avec humilité, intelligence et respect pour les générations futures. Leur préservation n'est pas seulement un devoir patrimonial, mais une source d'inspiration précieuse pour l'architecture de demain.</p>
                    
                    <div class="article-highlight">
                        <h4><i class="fas fa-map-marker-alt me-2"></i>À Visiter</h4>
                        <p>Pour découvrir les Tata Somba, visitez les villages de Boukoumbé, Natitingou et Tanguiéta dans la région de l'Atacora. La meilleure période est de novembre à février, pendant la saison sèche.</p>
                    </div>
                `
            }
        };

        // ========== FONCTIONS POUR ARTICLES GRATUITS ==========
        function readFreeArticle(articleId) {
            const article = freeArticles[articleId];
            if (!article) return;
            
            document.getElementById('readingTitle').textContent = article.title;
            document.getElementById('readingAuthor').textContent = article.author;
            document.getElementById('readingDate').textContent = article.date;
            document.getElementById('readingImage').src = article.image;
            document.getElementById('readingViews').textContent = article.views;
            document.getElementById('readingLikes').textContent = article.likes;
            document.getElementById('readingTime').textContent = article.readingTime;
            document.getElementById('readingContent').innerHTML = article.content;
            
            // Mettre à jour la catégorie
            const categoryElement = document.getElementById('readingCategory');
            categoryElement.className = `${article.categoryClass} badge`;
            categoryElement.textContent = article.category;
            
            // Afficher l'interface de lecture
            document.getElementById('readingOverlay').style.display = 'block';
            document.body.style.overflow = 'hidden';
        }

        function closeReading() {
            document.getElementById('readingOverlay').style.display = 'none';
            document.body.style.overflow = 'auto';
        }

        // ========== FONCTIONS POUR FEXE PAY ==========
        // ... (les fonctions Fexe Pay restent identiques au code précédent)
        // ... (showFexpayPayment, selectPayment, nextStep, prevStep, processPayment, etc.)

        // ========== FONCTIONS D'INTERACTION ==========
        function likeArticle() {
            const likesElement = document.getElementById('readingLikes');
            let likes = parseInt(likesElement.textContent.replace(',', ''));
            likesElement.textContent = (likes + 1).toLocaleString();
            alert('Merci pour votre like !');
        }

        function shareArticle() {
            const title = document.getElementById('readingTitle').textContent;
            const url = window.location.href;
            navigator.clipboard.writeText(`${title} - ${url}`).then(() => {
                alert('Lien copié dans le presse-papier !');
            });
        }

        function saveArticle() {
            alert('Article sauvegardé dans vos favoris !');
        }

        // ========== FONCTIONS UTILITAIRES ==========
        document.addEventListener('DOMContentLoaded', function() {
            // Gestion du défilement fluide
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function(e) {
                    e.preventDefault();
                    const targetId = this.getAttribute('href');
                    if(targetId === '#') return;
                    
                    const target = document.querySelector(targetId);
                    if(target) {
                        window.scrollTo({
                            top: target.offsetTop - 80,
                            behavior: 'smooth'
                        });
                    }
                });
            });

            // Filtrage des articles par région
            document.getElementById('regionFilter').addEventListener('change', function() {
                const region = this.value;
                const articles = document.querySelectorAll('.article-item');
                
                articles.forEach(article => {
                    if(region === 'all' || article.dataset.region === region) {
                        article.style.display = 'block';
                    } else {
                        article.style.display = 'none';
                    }
                });
            });

            // Fermer la lecture en cliquant en dehors
            document.getElementById('readingOverlay').addEventListener('click', function(e) {
                if (e.target === this) {
                    closeReading();
                }
            });

            console.log('Culture Bénin Frontend chargé avec articles complets !');
        });
    </script>
</body>
</html>