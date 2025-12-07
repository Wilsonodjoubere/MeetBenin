<!doctype html>
<html lang="fr" data-bs-theme="light">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Culture Bénin | Gestion des Utilisateurs</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes" />

    <!-- CSS Libraries -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">

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
            overflow-x: hidden;
            padding-top: 60px;
        }

        /* ===== HEADER ===== */
        .main-header {
            background: var(--header-bg);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            height: 60px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
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
            z-index: 1040;
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
            padding: 0;
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
            transform: translateX(-100%);
            transition: transform 0.3s ease;
        }

        .sidebar.active {
            transform: translateX(0);
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
            border-radius: 10px;
        }

        /* ===== MAIN CONTENT ===== */
        .main-content {
            margin-left: 0;
            padding: 20px;
            min-height: calc(100vh - 60px);
            transition: margin-left 0.3s ease;
        }

        .sidebar.active + .main-content {
            margin-left: 260px;
        }

        /* ===== RESPONSIVE ===== */
        @media (min-width: 992px) {
            .sidebar {
                transform: translateX(0);
            }
            
            .main-content {
                margin-left: 260px;
            }
            
            .menu-toggle {
                display: none;
            }
        }

        @media (max-width: 991px) {
            .sidebar {
                transform: translateX(-100%);
            }
            
            .sidebar.active {
                transform: translateX(0);
            }
            
            .main-content {
                margin-left: 0 !important;
            }
        }

        /* ===== CARD STYLES ===== */
        .breadcrumb {
            background: transparent;
            padding: 0;
            margin-bottom: 1.5rem;
        }

        .breadcrumb-item a {
            color: #6c757d;
            text-decoration: none;
        }

        .breadcrumb-item.active {
            color: #495057;
            font-weight: 500;
        }

        .main-card {
            background: var(--card-bg);
            border-radius: 12px;
            border: 1px solid #e2e8f0;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
            overflow: hidden;
            margin-bottom: 20px;
        }

        .card-header {
            background: white;
            border-bottom: 1px solid #e2e8f0;
            padding: 20px 25px;
        }

        .card-title {
            font-family: 'Poppins', sans-serif;
            font-weight: 600;
            color: var(--dark-color);
            font-size: 1.1rem;
            margin: 0;
        }

        .card-body {
            padding: 0;
        }

        .table-responsive {
            border-radius: 0 0 12px 12px;
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }

        .table {
            margin-bottom: 0;
            width: 100%;
            min-width: 600px;
        }

        .table th {
            font-weight: 600;
            color: #495057;
            font-size: 0.875rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            background: #f8fafc;
            border-bottom: 2px solid #e2e8f0;
            padding: 15px 20px;
            white-space: nowrap;
        }

        .table td {
            padding: 15px 20px;
            vertical-align: middle;
            border-bottom: 1px solid #f1f5f9;
        }

        .table tbody tr:hover {
            background-color: #f8fafc;
        }

        .table tbody tr:last-child td {
            border-bottom: none;
        }

        .btn-group-sm .btn {
            padding: 6px 10px;
            font-size: 0.875rem;
        }

        .btn-hover-scale {
            transition: all 0.2s ease;
        }

        .btn-hover-scale:hover {
            transform: scale(1.1);
        }

        .badge {
            font-weight: 500;
            font-size: 0.75rem;
            padding: 4px 8px;
        }

        .alert {
            border-radius: 8px;
            border: none;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        }

        .empty-state {
            padding: 40px 20px;
            text-align: center;
        }

        .empty-state i {
            font-size: 3rem;
            color: #cbd5e1;
            margin-bottom: 15px;
        }

        .empty-state p {
            color: #64748b;
            margin-bottom: 20px;
        }

        .card-footer {
            background: white;
            border-top: 1px solid #e2e8f0;
            padding: 15px 25px;
            font-size: 0.875rem;
        }

        .page-title-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            flex-wrap: wrap;
            gap: 15px;
        }

        .page-title-section h1 {
            font-family: 'Poppins', sans-serif;
            font-weight: 700;
            font-size: 1.8rem;
            color: var(--dark-color);
            margin: 0;
        }

        .page-title-section p {
            color: #64748b;
            margin-top: 5px;
            margin-bottom: 0;
        }

        /* Action buttons - CORRIGÉ */
        .action-buttons {
            display: flex;
            gap: 5px;
            justify-content: center;
            flex-wrap: nowrap;
            min-width: 120px;
        }

        .action-btn {
            padding: 6px 10px;
            border-radius: 6px;
            border: 1px solid #dee2e6;
            background: white;
            color: #495057;
            transition: all 0.2s ease;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            min-width: 36px;
            min-height: 36px;
        }

        .action-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .action-btn.edit {
            color: #f59e0b;
            border-color: #f59e0b;
        }

        .action-btn.edit:hover {
            background-color: #f59e0b;
            color: white;
        }

        .action-btn.view {
            color: #06b6d4;
            border-color: #06b6d4;
        }

        .action-btn.view:hover {
            background-color: #06b6d4;
            color: white;
        }

        .action-btn.delete {
            color: #ef4444;
            border-color: #ef4444;
        }

        .action-btn.delete:hover {
            background-color: #ef4444;
            color: white;
        }

        /* Responsive table - AMÉLIORÉ */
        @media (max-width: 768px) {
            .table-responsive {
                border: 1px solid #dee2e6;
                border-radius: 8px;
            }
            
            .table {
                min-width: 700px;
            }
            
            .action-buttons {
                flex-direction: row;
                gap: 3px;
            }
            
            .action-btn {
                padding: 5px 8px;
                min-width: 32px;
                min-height: 32px;
            }
            
            .page-title-section {
                flex-direction: column;
                align-items: flex-start;
            }
            
            .page-title-section h1 {
                font-size: 1.5rem;
            }
            
            .card-header {
                padding: 15px;
            }
            
            .main-content {
                padding: 15px;
            }
            
            .table td, .table th {
                padding: 12px 15px;
            }
        }

        @media (max-width: 576px) {
            .header-content {
                padding: 0 15px;
            }
            
            .header-title {
                font-size: 1rem;
            }
            
            .time-display {
                display: none;
            }
            
            .page-title-section h1 {
                font-size: 1.3rem;
            }
            
            .btn-group {
                flex-wrap: wrap;
                gap: 5px;
            }
            
            .table td, .table th {
                padding: 10px 12px;
                font-size: 0.85rem;
            }
            
            .action-buttons {
                flex-direction: column;
                gap: 2px;
                min-width: 80px;
            }
            
            .action-btn {
                padding: 4px 6px;
                font-size: 0.8rem;
            }
            
            .card-header .d-flex {
                flex-direction: column;
                align-items: flex-start;
                gap: 10px;
            }
            
            .badge {
                font-size: 0.7rem;
                padding: 3px 6px;
            }
        }

        /* Améliorations pour les très petits écrans */
        @media (max-width: 400px) {
            .action-buttons {
                flex-direction: column;
            }
            
            .table {
                min-width: 650px;
            }
            
            .page-title-section a.btn {
                width: 100%;
                justify-content: center;
            }
        }

        /* ===== SCROLLBAR ===== */
        ::-webkit-scrollbar {
            width: 6px;
            height: 6px;
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

        /* User avatar */
        .user-avatar {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid #e2e8f0;
        }

        .avatar-placeholder {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background: linear-gradient(135deg, #3b82f6, #2563eb);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 14px;
            border: 2px solid #e2e8f0;
        }
        
        /* Amélioration de l'affichage sur mobile */
        .mobile-hidden {
            display: table-cell;
        }
        
        @media (max-width: 768px) {
            .mobile-hidden {
                display: none;
            }
            
            .table th:nth-child(4),
            .table td:nth-child(4) {
                display: none;
            }
        }
    </style>
</head>

<body>

<!-- ===== HEADER ===== -->
<header class="main-header">
    <div class="header-content">
        <div class="header-left">
            <button class="menu-toggle" id="menuToggle">
                <i class="bi bi-list"></i>
            </button>
            <h1 class="header-title">
                <i class="bi bi-people-fill me-2"></i>Gestion des Utilisateurs
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
<aside class="sidebar" id="sidebar">
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
        </div>

        <!-- Navigation -->
        <nav class="sidebar-nav">
            <div class="nav-section-title">PRINCIPAL</div>
            <div class="nav-item">
                <a href="{{ url('/') }}" class="nav-link">
                    <i class="nav-icon bi bi-speedometer2"></i>
                    <span>Tableau de Bord</span>
                </a>
            </div>

            <div class="nav-section-title">GESTION DES DONNÉES</div>
            
            <div class="nav-item">
                <a href="{{ route('utilisateurs.index') }}" class="nav-link active">
                    <i class="nav-icon bi bi-people-fill"></i>
                    <span>Utilisateurs</span>
                    <span class="nav-badge badge bg-primary">{{ $utilisateurs->count() }}</span>
                </a>
            </div>

            <div class="nav-item">
                <a href="{{ route('langues.index') }}" class="nav-link">
                    <i class="nav-icon bi bi-translate"></i>
                    <span>Langues</span>
                    <span class="nav-badge badge bg-info">5</span>
                </a>
            </div>

            <div class="nav-item">
                <a href="{{ route('regions.index') }}" class="nav-link">
                    <i class="nav-icon bi bi-geo-alt-fill"></i>
                    <span>Régions</span>
                    <span class="nav-badge badge bg-success">7</span>
                </a>
            </div>

            <div class="nav-item">
                <a href="{{ route('contenus.index') }}" class="nav-link">
                    <i class="nav-icon bi bi-file-earmark-text"></i>
                    <span>Contenus</span>
                    <span class="nav-badge badge bg-warning">12</span>
                </a>
            </div>

            <div class="nav-item">
                <a href="{{ route('media.index') }}" class="nav-link">
                    <i class="nav-icon bi bi-images"></i>
                    <span>Médias</span>
                    <span class="nav-badge badge bg-purple">6</span>
                </a>
            </div>

            <div class="nav-item">
                <a href="{{ route('commentaires.index') }}" class="nav-link">
                    <i class="nav-icon bi bi-chat-text"></i>
                    <span>Commentaires</span>
                    <span class="nav-badge badge bg-pink">9</span>
                </a>
            </div>

            <div class="nav-item">
                <a href="{{ route('type-contenus.index') }}" class="nav-link">
                    <i class="nav-icon bi bi-tags"></i>
                    <span>Types Contenu</span>
                    <span class="nav-badge badge bg-secondary">4</span>
                </a>
            </div>

            <div class="nav-item">
                <a href="{{ route('types_media.index') }}" class="nav-link">
                    <i class="nav-icon bi bi-collection-play"></i>
                    <span>Types Média</span>
                    <span class="nav-badge badge bg-dark">3</span>
                </a>
            </div>

            <div class="nav-item">
                <a href="{{ route('roles.index') }}" class="nav-link">
                    <i class="nav-icon bi bi-person-badge"></i>
                    <span>Rôles</span>
                    <span class="nav-badge badge bg-danger">3</span>
                </a>
            </div>

            <div class="nav-item">
                <a href="{{ route('parler.index') }}" class="nav-link">
                    <i class="nav-icon bi bi-link-45deg"></i>
                    <span>Relations</span>
                    <span class="nav-badge badge bg-indigo">15</span>
                </a>
            </div>
        </nav>
    </div>
</aside>

<!-- ===== MAIN CONTENT ===== -->
<main class="main-content" id="mainContent">
    <!-- Fil d'Ariane -->
    <nav aria-label="breadcrumb" class="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Accueil</a></li>
            <li class="breadcrumb-item active">Utilisateurs</li>
        </ol>
    </nav>

    <!-- En-tête de page -->
    <div class="page-title-section">
        <div>
            <h1>Gestion des Utilisateurs</h1>
            <p>Administrez les utilisateurs de la plateforme</p>
        </div>
        <a href="{{ route('utilisateurs.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle me-2"></i>Nouvel utilisateur
        </a>
    </div>

    <!-- Message de succès -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
            <div class="d-flex align-items-center">
                <i class="bi bi-check-circle-fill me-2"></i>
                <div class="flex-grow-1">
                    <strong>Succès !</strong> {{ session('success') }}
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        </div>
    @endif

    <!-- Carte principale -->
    <div class="main-card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="card-title">
                    <i class="bi bi-people-fill me-2"></i>Liste des utilisateurs
                </h5>
                <span class="badge bg-light text-dark">{{ $utilisateurs->count() }} utilisateur(s)</span>
            </div>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle" id="utilisateursTable">
                    <thead>
                        <tr>
                            <th width="80" class="ps-4 mobile-hidden">#ID</th>
                            <th>Utilisateur</th>
                            <th class="mobile-hidden">Email</th>
                            <th>Rôle</th>
                            <th class="mobile-hidden">Langue</th>
                            <th>Statut</th>
                            <th width="150" class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($utilisateurs as $utilisateur)
                        <tr>
                            <td class="ps-4 fw-semibold text-muted mobile-hidden">
                                #{{ $utilisateur->id_utilisateur }}
                            </td>
                            
                            <td>
                                <div class="d-flex align-items-center">
                                    @if($utilisateur->photo)
                                        <img src="{{ asset('storage/photos/' . $utilisateur->photo) }}" 
                                             alt="{{ $utilisateur->prenom }} {{ $utilisateur->nom }}" 
                                             class="user-avatar me-2">
                                    @else
                                        <div class="avatar-placeholder me-2">
                                            <i class="bi bi-person-fill"></i>
                                        </div>
                                    @endif
                                    <div>
                                        <div class="fw-medium">{{ $utilisateur->prenom }} {{ $utilisateur->nom }}</div>
                                        <small class="text-muted d-block mobile-hidden">
                                            {{ $utilisateur->sexe === 'M' ? 'Homme' : ($utilisateur->sexe === 'F' ? 'Femme' : 'Non spécifié') }}
                                            @if($utilisateur->date_naissance)
                                                • {{ \Carbon\Carbon::parse($utilisateur->date_naissance)->age }} ans
                                            @endif
                                        </small>
                                        <small class="text-muted d-none d-sm-block d-md-none">
                                            {{ $utilisateur->email }}
                                        </small>
                                    </div>
                                </div>
                            </td>
                            
                            <td class="mobile-hidden">
                                <span class="text-muted">{{ $utilisateur->email }}</span>
                            </td>
                            
                            <td>
                                @php
                                    $roleColors = [
                                        'Administrateur' => 'danger',
                                        'Modérateur' => 'warning', 
                                        'Éditeur' => 'info',
                                        'Createur de Contenu' => 'success',
                                        'Traducteur' => 'secondary',
                                        'Visiteur' => 'light'
                                    ];
                                    $roleName = $utilisateur->role ? $utilisateur->role->nom_role : 'Non assigné';
                                    $color = $roleColors[$roleName] ?? 'secondary';
                                @endphp
                                <span class="badge bg-{{ $color }}">
                                    {{ $roleName }}
                                </span>
                            </td>
                            
                            <td class="mobile-hidden">
                                <span class="badge bg-light text-dark">
                                    {{ $utilisateur->langue ? $utilisateur->langue->nom_langue : 'Non spécifiée' }}
                                </span>
                            </td>
                            
                            <td>
                                @php
                                    $statusColors = [
                                        'actif' => 'success',
                                        'inactif' => 'secondary',
                                        'suspendu' => 'danger'
                                    ];
                                @endphp
                                <span class="badge bg-{{ $statusColors[$utilisateur->statut] ?? 'secondary' }}">
                                    {{ ucfirst($utilisateur->statut) }}
                                </span>
                            </td>
                            
                            <td class="text-center">
                                <div class="action-buttons">
                                    <!-- Bouton Voir -->
                                    <a href="{{ route('utilisateurs.show', $utilisateur->id_utilisateur) }}" 
                                       class="action-btn view" 
                                       title="Voir les détails"
                                       data-bs-toggle="tooltip">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    
                                    <!-- Bouton Éditer -->
                                    <a href="{{ route('utilisateurs.edit', $utilisateur->id_utilisateur) }}" 
                                       class="action-btn edit" 
                                       title="Éditer l'utilisateur"
                                       data-bs-toggle="tooltip">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    
                                    <!-- Bouton Supprimer -->
                                    <form action="{{ route('utilisateurs.destroy', $utilisateur->id_utilisateur) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="action-btn delete" 
                                                onclick="return confirm('Supprimer l\\'utilisateur « {{ $utilisateur->prenom }} {{ $utilisateur->nom }} » ?')" 
                                                title="Supprimer l'utilisateur"
                                                data-bs-toggle="tooltip">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach

                        @if($utilisateurs->isEmpty())
                        <tr>
                            <td colspan="7" class="text-center py-5">
                                <div class="empty-state">
                                    <i class="bi bi-people"></i>
                                    <p class="mb-3">Aucun utilisateur trouvé</p>
                                    <a href="{{ route('utilisateurs.create') }}" class="btn btn-primary">
                                        <i class="bi bi-plus-circle me-2"></i>Ajouter le premier utilisateur
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Pied de table -->
        @if($utilisateurs->isNotEmpty())
        <div class="card-footer">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <p class="mb-0 text-muted small">
                        Affichage de <strong>{{ $utilisateurs->count() }}</strong> utilisateur(s)
                    </p>
                </div>
                <div class="col-md-6 text-end">
                    <small class="text-muted">Dernière mise à jour : {{ now()->format('d/m/Y H:i') }}</small>
                </div>
            </div>
        </div>
        @endif
    </div>
</main>

<!-- Inclure jQuery et DataTables -->
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

<script>
    // Fonction pour basculer le sidebar
    function toggleSidebar() {
        const sidebar = document.getElementById('sidebar');
        sidebar.classList.toggle('active');
        
        // Sur mobile, ajouter un overlay sombre lorsque le sidebar est ouvert
        if (window.innerWidth < 992) {
            if (sidebar.classList.contains('active')) {
                // Ajouter un overlay
                const overlay = document.createElement('div');
                overlay.id = 'sidebarOverlay';
                overlay.style.position = 'fixed';
                overlay.style.top = '60px';
                overlay.style.left = '0';
                overlay.style.right = '0';
                overlay.style.bottom = '0';
                overlay.style.background = 'rgba(0,0,0,0.5)';
                overlay.style.zIndex = '1019';
                overlay.style.display = 'block';
                overlay.style.cursor = 'pointer';
                overlay.addEventListener('click', function() {
                    sidebar.classList.remove('active');
                    document.body.removeChild(this);
                });
                document.body.appendChild(overlay);
            } else {
                // Supprimer l'overlay si présent
                const overlay = document.getElementById('sidebarOverlay');
                if (overlay) {
                    document.body.removeChild(overlay);
                }
            }
        }
    }

    // Initialiser le toggle du sidebar
    document.getElementById('menuToggle').addEventListener('click', function(event) {
        event.stopPropagation();
        toggleSidebar();
    });

    // Fermer le sidebar en cliquant à l'extérieur (mobile uniquement)
    document.addEventListener('click', function(event) {
        const sidebar = document.getElementById('sidebar');
        const menuToggle = document.getElementById('menuToggle');
        const overlay = document.getElementById('sidebarOverlay');
        
        if (window.innerWidth < 992) {
            const isClickInsideSidebar = sidebar.contains(event.target);
            const isClickOnMenuToggle = menuToggle.contains(event.target);
            
            if (!isClickInsideSidebar && !isClickOnMenuToggle && sidebar.classList.contains('active')) {
                sidebar.classList.remove('active');
                if (overlay) {
                    document.body.removeChild(overlay);
                }
            }
        }
    });

    // Gestion du redimensionnement de la fenêtre
    window.addEventListener('resize', function() {
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('sidebarOverlay');
        
        // Si on passe à une taille d'écran supérieure à mobile, cacher le sidebar et overlay
        if (window.innerWidth >= 992) {
            sidebar.classList.remove('active');
            if (overlay) {
                document.body.removeChild(overlay);
            }
        }
    });

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

    // Confirmation de déconnexion
    const logoutForm = document.querySelector('.logout-form');
    if (logoutForm) {
        logoutForm.addEventListener('submit', function(e) {
            if (!confirm('Êtes-vous sûr de vouloir vous déconnecter ?')) {
                e.preventDefault();
            }
        });
    }

    // Initialiser DataTable
    $(document).ready(function() {
        $('#utilisateursTable').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.13.6/i18n/fr-FR.json"
            },
            "pageLength": 10,
            "lengthMenu": [10, 25, 50, 100],
            "order": [[0, 'asc']],
            "responsive": true,
            "dom": '<"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>rt<"row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
            "columnDefs": [
                { "orderable": false, "targets": [6] } // Désactiver le tri sur la colonne Actions
            ]
        });

        // Initialiser les tooltips
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        });
    });

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
</script>

</body>
</html>