<!doctype html>
<html lang="fr" data-bs-theme="light">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Culture Bénin | Tableau de Bord Administrateur</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes" />

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('adminlte/css/adminlte.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary-color: #2563eb;
            --secondary-color: #1d4ed8;
            --success-color: #10b981;
            --info-color: #06b6d4;
            --warning-color: #f59e0b;
            --danger-color: #ef4444;
            --dark-color: #1e293b;
            --light-color: #f8fafc;
            --sidebar-bg: #0f172a;
            --header-bg: #0f172a;
            --card-bg: #ffffff;
        }

        * {
            font-family: 'Inter', sans-serif;
        }

        body {
            background-color: #f1f5f9;
            color: #334155;
            min-height: 100vh;
        }

        /* ===== HEADER ===== */
        .main-header {
            background: var(--header-bg);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            height: 60px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
            z-index: 1030;
        }

        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 100%;
            padding: 0 20px;
        }

        .header-left {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .menu-toggle {
            background: none;
            border: none;
            color: white;
            font-size: 1.5rem;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .menu-toggle:hover {
            background: rgba(255, 255, 255, 0.1);
        }

        .header-title {
            color: white;
            font-family: 'Poppins', sans-serif;
            font-weight: 600;
            font-size: 1.2rem;
            margin: 0;
        }

        .header-actions {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .time-display {
            color: #cbd5e1;
            font-size: 0.9rem;
            font-weight: 500;
        }

        /* Logout Button dans le header */
        .logout-btn-header {
            background: linear-gradient(135deg, #ef4444, #dc2626);
            border: none;
            color: white;
            padding: 8px 16px;
            border-radius: 8px;
            font-weight: 500;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 8px;
            text-decoration: none;
            font-size: 0.9rem;
            cursor: pointer;
        }

        .logout-btn-header:hover {
            background: linear-gradient(135deg, #dc2626, #b91c1c);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(239, 68, 68, 0.3);
            color: white;
        }

        /* Formulaires de déconnexion */
        .logout-form {
            display: inline;
            margin: 0;
            padding: 0;
        }

        .logout-form button {
            background: none;
            border: none;
            color: inherit;
            cursor: pointer;
            font: inherit;
        }

        /* ===== SIDEBAR ===== */
        .sidebar {
            background: var(--sidebar-bg);
            width: 260px;
            position: fixed;
            top: 60px;
            left: 0;
            bottom: 0;
            z-index: 1020;
            overflow-y: auto;
            border-right: 1px solid rgba(255, 255, 255, 0.1);
            transition: transform 0.3s ease;
        }

        .sidebar-content {
            padding: 20px 0;
        }

        /* User Profile */
        .user-profile {
            padding: 20px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            margin-bottom: 20px;
        }

        .profile-info {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .profile-avatar {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            border: 2px solid var(--primary-color);
            padding: 2px;
            background: white;
        }

        .profile-text h5 {
            color: white;
            font-size: 1rem;
            margin: 0;
            font-weight: 600;
        }

        .profile-text span {
            color: #94a3b8;
            font-size: 0.85rem;
        }

        /* Navigation */
        .sidebar-nav {
            padding: 0 15px;
        }

        .nav-section-title {
            color: #94a3b8;
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            padding: 15px 0 8px;
            font-weight: 600;
            margin-top: 10px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        .nav-section-title:first-child {
            border-top: none;
            margin-top: 0;
        }

        .nav-item {
            margin-bottom: 5px;
        }

        .nav-link {
            color: #cbd5e1;
            padding: 10px 12px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            text-decoration: none;
            transition: all 0.3s ease;
            font-size: 0.9rem;
            font-weight: 500;
        }

        .nav-link:hover {
            background: rgba(255, 255, 255, 0.1);
            color: white;
        }

        .nav-link.active {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
        }

        .nav-icon {
            margin-right: 10px;
            font-size: 1.1rem;
            width: 20px;
            text-align: center;
        }

        .nav-badge {
            margin-left: auto;
            font-size: 0.75rem;
            padding: 3px 8px;
        }

        /* ===== MAIN CONTENT ===== */
        .main-content {
            margin-left: 260px;
            margin-top: 60px;
            padding: 20px;
            min-height: calc(100vh - 60px);
            transition: margin-left 0.3s ease;
        }

        .content-header {
            margin-bottom: 30px;
        }

        .content-header h1 {
            font-family: 'Poppins', sans-serif;
            font-weight: 700;
            font-size: 1.8rem;
            color: var(--dark-color);
            margin-bottom: 5px;
        }

        .content-header p {
            color: #64748b;
            margin: 0;
        }

        /* ===== STATS GRID ===== */
        .stats-container {
            margin-bottom: 30px;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 15px;
        }

        .stat-card {
            background: var(--card-bg);
            border-radius: 12px;
            padding: 20px;
            border: 1px solid #e2e8f0;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .stat-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            border-color: var(--primary-color);
        }

        .stat-icon {
            width: 50px;
            height: 50px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: white;
        }

        .stat-info {
            flex: 1;
        }

        .stat-number {
            font-family: 'Poppins', sans-serif;
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--dark-color);
            line-height: 1;
            margin-bottom: 5px;
        }

        .stat-label {
            font-size: 0.9rem;
            color: #64748b;
            font-weight: 500;
        }

        /* ===== QUICK ACTIONS ===== */
        .quick-actions {
            background: var(--card-bg);
            border-radius: 12px;
            padding: 25px;
            margin-bottom: 30px;
            border: 1px solid #e2e8f0;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        }

        .section-title {
            font-family: 'Poppins', sans-serif;
            font-size: 1.2rem;
            font-weight: 600;
            color: var(--dark-color);
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .section-title i {
            color: var(--primary-color);
        }

        .actions-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(180px, 1fr));
            gap: 15px;
        }

        .action-btn {
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 10px;
            padding: 20px;
            text-decoration: none;
            color: #334155;
            transition: all 0.3s ease;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        .action-btn:hover {
            background: linear-gradient(135deg, #eff6ff, #f0f9ff);
            border-color: var(--primary-color);
            color: var(--primary-color);
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(37, 99, 235, 0.1);
        }

        .action-icon {
            font-size: 1.8rem;
            margin-bottom: 12px;
            color: var(--primary-color);
        }

        .action-text {
            font-weight: 500;
            font-size: 0.9rem;
        }

        /* ===== ACTIVITY FEED ===== */
        .activity-section {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 20px;
            margin-bottom: 30px;
        }

        @media (max-width: 992px) {
            .activity-section {
                grid-template-columns: 1fr;
            }
        }

        .activity-card {
            background: var(--card-bg);
            border-radius: 12px;
            padding: 25px;
            border: 1px solid #e2e8f0;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
            height: 100%;
        }

        .activity-item {
            padding: 12px 0;
            border-bottom: 1px solid #f1f5f9;
        }

        .activity-item:last-child {
            border-bottom: none;
        }

        .activity-time {
            font-size: 0.8rem;
            color: #64748b;
            margin-bottom: 5px;
        }

        .activity-text {
            font-size: 0.95rem;
            color: #334155;
            font-weight: 500;
        }

        .activity-text i {
            margin-right: 8px;
        }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
            }
            
            .sidebar.active {
                transform: translateX(0);
            }
            
            .main-content {
                margin-left: 0;
            }
            
            .stats-grid {
                grid-template-columns: 1fr 1fr;
            }
            
            .actions-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 576px) {
            .stats-grid {
                grid-template-columns: 1fr;
            }
            
            .header-content {
                padding: 0 15px;
            }
            
            .main-content {
                padding: 15px;
            }
            
            .header-title {
                font-size: 1rem;
            }
            
            .time-display {
                display: none;
            }
        }

        /* ===== SCROLLBAR ===== */
        ::-webkit-scrollbar {
            width: 6px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f5f9;
        }

        ::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 3px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }

        /* Dark scrollbar for sidebar */
        .sidebar::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.05);
        }

        .sidebar::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.2);
        }

        /* ===== UTILITIES ===== */
        .text-success { color: var(--success-color); }
        .text-primary { color: var(--primary-color); }
        .text-info { color: var(--info-color); }
        .text-warning { color: var(--warning-color); }
        .text-danger { color: var(--danger-color); }

        .bg-success { background: var(--success-color); }
        .bg-primary { background: var(--primary-color); }
        .bg-info { background: var(--info-color); }
        .bg-warning { background: var(--warning-color); }
        .bg-danger { background: var(--danger-color); }
        .bg-purple { background: #8b5cf6; }
        .bg-pink { background: #ec4899; }
        .bg-indigo { background: #6366f1; }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            border: none;
            padding: 8px 16px;
            font-weight: 500;
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, var(--secondary-color), var(--primary-color));
            transform: translateY(-1px);
        }
    </style>
</head>

<body>

<!-- ===== HEADER ===== -->
<header class="main-header">
    <div class="header-content">
        <div class="header-left">
            <button class="menu-toggle">
                <i class="bi bi-list"></i>
            </button>
            <h1 class="header-title">
                <i class="bi bi-speedometer2 me-2"></i>Tableau de Bord
            </h1>
        </div>
        
        <div class="header-actions">
            <span class="time-display" id="currentTime"></span>
            <!-- Formulaire de déconnexion dans le header -->
            <form method="POST" action="{{ route('logout') }}" class="logout-form">
                @csrf
                <button type="submit" class="logout-btn-header">
                    <i class="bi bi-box-arrow-right"></i>
                    <span>Déconnexion</span>
                </button>
            </form>
        </div>
    </div>
</header>

<!-- ===== SIDEBAR ===== -->
<aside class="sidebar">
    <div class="sidebar-content">
        <!-- User Profile -->
        <div class="user-profile">
            <div class="profile-info">
                <img src="https://ui-avatars.com/api/?name=Admin+User&background=2563eb&color=fff&size=128" 
                     alt="Admin" class="profile-avatar">
                <div class="profile-text">
                    <h5>Admin User</h5>
                    <span>Administrateur</span>
                </div>
            </div>
            <!-- NOTE: Le bouton de déconnexion a été retiré du sidebar comme demandé -->
        </div>

        <!-- Navigation -->
        <nav class="sidebar-nav">
            <div class="nav-section-title">PRINCIPAL</div>
            <div class="nav-item">
                <a href="{{ url('/') }}" class="nav-link active">
                    <i class="nav-icon bi bi-speedometer2"></i>
                    <span>Tableau de Bord</span>
                </a>
            </div>

            <div class="nav-section-title">GESTION DES DONNÉES</div>
            
            <div class="nav-item">
                <a href="{{ route('utilisateurs.index') }}" target="_blank" class="nav-link">
                    <i class="nav-icon bi bi-people-fill"></i>
                    <span>Utilisateurs</span>
                    <span class="nav-badge badge bg-primary">8</span>
                </a>
            </div>

            <div class="nav-item">
                <a href="{{ route('langues.index') }}" target="_blank" class="nav-link">
                    <i class="nav-icon bi bi-translate"></i>
                    <span>Langues</span>
                    <span class="nav-badge badge bg-info">5</span>
                </a>
            </div>

            <div class="nav-item">
                <a href="{{ route('regions.index') }}" target="_blank" class="nav-link">
                    <i class="nav-icon bi bi-geo-alt-fill"></i>
                    <span>Régions</span>
                    <span class="nav-badge badge bg-success">7</span>
                </a>
            </div>

            <div class="nav-item">
                <a href="{{ route('contenus.index') }}" target="_blank" class="nav-link">
                    <i class="nav-icon bi bi-file-earmark-text"></i>
                    <span>Contenus</span>
                    <span class="nav-badge badge bg-warning">12</span>
                </a>
            </div>

            <div class="nav-item">
                <a href="{{ route('media.index') }}" target="_blank" class="nav-link">
                    <i class="nav-icon bi bi-images"></i>
                    <span>Médias</span>
                    <span class="nav-badge badge bg-purple">6</span>
                </a>
            </div>

            <div class="nav-item">
                <a href="{{ route('commentaires.index') }}" target="_blank" class="nav-link">
                    <i class="nav-icon bi bi-chat-text"></i>
                    <span>Commentaires</span>
                    <span class="nav-badge badge bg-pink">9</span>
                </a>
            </div>

            <div class="nav-item">
                <a href="{{ route('type-contenus.index') }}" target="_blank" class="nav-link">
                    <i class="nav-icon bi bi-tags"></i>
                    <span>Types Contenu</span>
                    <span class="nav-badge badge bg-secondary">4</span>
                </a>
            </div>

            <div class="nav-item">
                <a href="{{ route('types_media.index') }}" target="_blank" class="nav-link">
                    <i class="nav-icon bi bi-collection-play"></i>
                    <span>Types Média</span>
                    <span class="nav-badge badge bg-dark">3</span>
                </a>
            </div>

            <div class="nav-item">
                <a href="{{ route('roles.index') }}" target="_blank" class="nav-link">
                    <i class="nav-icon bi bi-person-badge"></i>
                    <span>Rôles</span>
                    <span class="nav-badge badge bg-danger">3</span>
                </a>
            </div>

            <div class="nav-item">
                <a href="{{ route('parler.index') }}" target="_blank" class="nav-link">
                    <i class="nav-icon bi bi-link-45deg"></i>
                    <span>Relations</span>
                    <span class="nav-badge badge bg-indigo">15</span>
                </a>
            </div>
        </nav>
    </div>
</aside>

<!-- ===== MAIN CONTENT ===== -->
<main class="main-content">
    <!-- Content Header -->
    <div class="content-header">
        <h1>Tableau de Bord Administrateur</h1>
        <p>Gérez votre plateforme Culture Bénin</p>
    </div>

    <!-- Statistics Grid -->
    <div class="stats-container">
        <div class="stats-grid">
            <!-- Utilisateurs -->
            <div class="stat-card">
                <div class="stat-icon bg-primary">
                    <i class="bi bi-people-fill"></i>
                </div>
                <div class="stat-info">
                    <div class="stat-number">8</div>
                    <div class="stat-label">Utilisateurs</div>
                </div>
            </div>

            <!-- Langues -->
            <div class="stat-card">
                <div class="stat-icon bg-info">
                    <i class="bi bi-translate"></i>
                </div>
                <div class="stat-info">
                    <div class="stat-number">5</div>
                    <div class="stat-label">Langues</div>
                </div>
            </div>

            <!-- Régions -->
            <div class="stat-card">
                <div class="stat-icon bg-success">
                    <i class="bi bi-geo-alt-fill"></i>
                </div>
                <div class="stat-info">
                    <div class="stat-number">7</div>
                    <div class="stat-label">Régions</div>
                </div>
            </div>

            <!-- Contenus -->
            <div class="stat-card">
                <div class="stat-icon bg-warning">
                    <i class="bi bi-file-earmark-text"></i>
                </div>
                <div class="stat-info">
                    <div class="stat-number">12</div>
                    <div class="stat-label">Contenus</div>
                </div>
            </div>

            <!-- Médias -->
            <div class="stat-card">
                <div class="stat-icon bg-purple">
                    <i class="bi bi-images"></i>
                </div>
                <div class="stat-info">
                    <div class="stat-number">6</div>
                    <div class="stat-label">Médias</div>
                </div>
            </div>

            <!-- Commentaires -->
            <div class="stat-card">
                <div class="stat-icon bg-pink">
                    <i class="bi bi-chat-text"></i>
                </div>
                <div class="stat-info">
                    <div class="stat-number">9</div>
                    <div class="stat-label">Commentaires</div>
                </div>
            </div>

            <!-- Types Contenu -->
            <div class="stat-card">
                <div class="stat-icon bg-secondary">
                    <i class="bi bi-tags"></i>
                </div>
                <div class="stat-info">
                    <div class="stat-number">4</div>
                    <div class="stat-label">Types Contenu</div>
                </div>
            </div>

            <!-- Types Média -->
            <div class="stat-card">
                <div class="stat-icon bg-dark">
                    <i class="bi bi-collection-play"></i>
                </div>
                <div class="stat-info">
                    <div class="stat-number">3</div>
                    <div class="stat-label">Types Média</div>
                </div>
            </div>

            <!-- Rôles -->
            <div class="stat-card">
                <div class="stat-icon bg-danger">
                    <i class="bi bi-person-badge"></i>
                </div>
                <div class="stat-info">
                    <div class="stat-number">3</div>
                    <div class="stat-label">Rôles</div>
                </div>
            </div>

            <!-- Relations -->
            <div class="stat-card">
                <div class="stat-icon bg-indigo">
                    <i class="bi bi-link-45deg"></i>
                </div>
                <div class="stat-info">
                    <div class="stat-number">15</div>
                    <div class="stat-label">Relations</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="quick-actions">
        <h3 class="section-title">
            <i class="bi bi-lightning-charge"></i>Actions Rapides
        </h3>
        <div class="actions-grid">
            <a href="{{ route('utilisateurs.create') }}" target="_blank" class="action-btn">
                <i class="bi bi-person-plus action-icon"></i>
                <span class="action-text">Nouvel Utilisateur</span>
            </a>
            <a href="{{ route('contenus.create') }}" target="_blank" class="action-btn">
                <i class="bi bi-file-plus action-icon"></i>
                <span class="action-text">Nouveau Contenu</span>
            </a>
            <a href="{{ route('media.create') }}" target="_blank" class="action-btn">
                <i class="bi bi-cloud-upload action-icon"></i>
                <span class="action-text">Uploader Média</span>
            </a>
            <a href="{{ route('langues.create') }}" target="_blank" class="action-btn">
                <i class="bi bi-translate action-icon"></i>
                <span class="action-text">Ajouter Langue</span>
            </a>
        </div>
    </div>

    <!-- Activity Feed -->
    <div class="activity-section">
        <!-- Recent Activity -->
        <div class="activity-card">
            <h3 class="section-title">
                <i class="bi bi-activity"></i>Activité Récente
            </h3>
            <div class="activity-list">
                <div class="activity-item">
                    <div class="activity-time">Il y a 5 minutes</div>
                    <div class="activity-text">
                        <i class="bi bi-person-plus text-success"></i>
                        Nouvel utilisateur <strong>Jean Dupont</strong> inscrit
                    </div>
                </div>
                <div class="activity-item">
                    <div class="activity-time">Il y a 15 minutes</div>
                    <div class="activity-text">
                        <i class="bi bi-file-earmark-plus text-primary"></i>
                        <strong>Histoire du Royaume du Dahomey</strong> publié
                    </div>
                </div>
                <div class="activity-item">
                    <div class="activity-time">Il y a 30 minutes</div>
                    <div class="activity-text">
                        <i class="bi bi-chat-left-text text-info"></i>
                        Nouveau commentaire sur <strong>Art Vodoun</strong>
                    </div>
                </div>
                <div class="activity-item">
                    <div class="activity-time">Il y a 1 heure</div>
                    <div class="activity-text">
                        <i class="bi bi-image text-warning"></i>
                        Photo <strong>Palais Royal</strong> uploadée
                    </div>
                </div>
            </div>
        </div>

        <!-- Stats Summary -->
        <div class="activity-card">
            <h3 class="section-title">
                <i class="bi bi-graph-up"></i>Statistiques
            </h3>
            <div class="activity-list">
                <div class="activity-item">
                    <div class="d-flex justify-content-between align-items-center">
                        <span>Utilisateurs Actifs</span>
                        <span class="badge bg-success">3</span>
                    </div>
                </div>
                <div class="activity-item">
                    <div class="d-flex justify-content-between align-items-center">
                        <span>Contenus Cette Semaine</span>
                        <span class="badge bg-primary">4</span>
                    </div>
                </div>
                <div class="activity-item">
                    <div class="d-flex justify-content-between align-items-center">
                        <span>Commentaires Cette Semaine</span>
                        <span class="badge bg-info">7</span>
                    </div>
                </div>
                <div class="activity-item">
                    <div class="d-flex justify-content-between align-items-center">
                        <span>Taux d'Engagement</span>
                        <span class="badge bg-warning">78%</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>

<script src="{{ asset('adminlte/js/adminlte.js') }}"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Update time display
        function updateTime() {
            const now = new Date();
            const timeString = now.toLocaleTimeString('fr-FR', { 
                hour: '2-digit', 
                minute: '2-digit' 
            });
            const dateString = now.toLocaleDateString('fr-FR', {
                weekday: 'long',
                day: 'numeric',
                month: 'long',
                year: 'numeric'
            });
            
            document.getElementById('currentTime').textContent = 
                `${dateString} • ${timeString}`;
        }
        
        setInterval(updateTime, 60000);
        updateTime();

        // Mobile menu toggle
        const menuToggle = document.querySelector('.menu-toggle');
        const sidebar = document.querySelector('.sidebar');
        const mainContent = document.querySelector('.main-content');
        
        if (menuToggle) {
            menuToggle.addEventListener('click', function() {
                sidebar.classList.toggle('active');
                
                // Ajuster le contenu principal sur mobile
                if (window.innerWidth <= 768) {
                    if (sidebar.classList.contains('active')) {
                        mainContent.style.marginLeft = '0';
                    } else {
                        mainContent.style.marginLeft = '0';
                    }
                }
            });
        }

        // Close sidebar when clicking outside on mobile
        document.addEventListener('click', function(event) {
            if (window.innerWidth <= 768) {
                const isClickInsideSidebar = sidebar.contains(event.target);
                const isClickOnMenuToggle = menuToggle.contains(event.target);
                
                if (!isClickInsideSidebar && !isClickOnMenuToggle && sidebar.classList.contains('active')) {
                    sidebar.classList.remove('active');
                }
            }
        });

        // Add animation to stat cards
        const statCards = document.querySelectorAll('.stat-card');
        statCards.forEach((card, index) => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(20px)';
            
            setTimeout(() => {
                card.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
                card.style.opacity = '1';
                card.style.transform = 'translateY(0)';
            }, index * 100);
        });

        // Confirmation de déconnexion
        const logoutForm = document.querySelector('.logout-form');
        if (logoutForm) {
            logoutForm.addEventListener('submit', function(e) {
                if (!confirm('Êtes-vous sûr de vouloir vous déconnecter ?')) {
                    e.preventDefault();
                }
            });
        }

        // Theme toggle (optional)
        const themeToggleBtn = document.createElement('button');
        themeToggleBtn.className = 'btn btn-secondary position-fixed bottom-3 end-3';
        themeToggleBtn.innerHTML = '<i class="bi bi-moon"></i>';
        themeToggleBtn.style.zIndex = '1000';
        themeToggleBtn.style.width = '45px';
        themeToggleBtn.style.height = '45px';
        themeToggleBtn.style.borderRadius = '50%';
        themeToggleBtn.style.display = 'flex';
        themeToggleBtn.style.alignItems = 'center';
        themeToggleBtn.style.justifyContent = 'center';
        themeToggleBtn.style.boxShadow = '0 2px 10px rgba(0,0,0,0.1)';
        
        themeToggleBtn.addEventListener('click', function() {
            const isLight = document.documentElement.getAttribute('data-bs-theme') === 'light';
            const newTheme = isLight ? 'dark' : 'light';
            
            document.documentElement.setAttribute('data-bs-theme', newTheme);
            this.innerHTML = isLight ? '<i class="bi bi-sun"></i>' : '<i class="bi bi-moon"></i>';
            
            // Update colors for dark mode
            if (newTheme === 'dark') {
                document.documentElement.style.setProperty('--card-bg', '#1e293b');
                document.documentElement.style.setProperty('--light-color', '#0f172a');
            } else {
                document.documentElement.style.setProperty('--card-bg', '#ffffff');
                document.documentElement.style.setProperty('--light-color', '#f8fafc');
            }
        });
        
        document.body.appendChild(themeToggleBtn);
    });
</script>

</body>
</html>