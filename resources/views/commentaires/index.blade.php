<!doctype html>
<html lang="fr" data-bs-theme="light">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Culture Bénin | Gestion des Commentaires</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes" />

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('adminlte/css/adminlte.css') }}">
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
            transform: translateX(0);
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
            overflow: hidden;
        }

        .table {
            margin-bottom: 0;
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
        }

        .btn-hover-scale {
            transition: all 0.2s ease;
        }

        .btn-hover-scale:hover {
            transform: scale(1.1);
        }

        .badge {
            font-weight: 500;
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

        /* Note badges */
        .badge-warning { 
            background: linear-gradient(135deg, #f59e0b, #d97706);
            color: white;
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
                padding: 15px;
            }
            
            .page-title-section {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }
            
            .table-responsive {
                font-size: 0.875rem;
            }
            
            .btn-group {
                flex-wrap: wrap;
                gap: 5px;
            }
            
            .btn-group .btn {
                margin-bottom: 5px;
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
            
            .table th, .table td {
                padding: 12px 10px;
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
            border-radius: 8px;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, var(--secondary-color), var(--primary-color));
            transform: translateY(-1px);
        }

        /* Overlay pour sidebar mobile */
        .sidebar-overlay {
            position: fixed;
            top: 60px;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0,0,0,0.5);
            z-index: 1019;
            display: none;
            cursor: pointer;
        }

        .sidebar-overlay.active {
            display: block;
        }

        /* DataTables custom */
        .dataTables_wrapper .dataTables_length,
        .dataTables_wrapper .dataTables_filter {
            padding: 1rem;
        }

        .dataTables_wrapper .dataTables_info {
            padding: 0.75rem;
        }
        
        /* Bouton désactivé */
        .btn-disabled {
            opacity: 0.5;
            cursor: not-allowed;
            pointer-events: none;
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
                <i class="bi bi-chat-text me-2"></i>Gestion des Commentaires
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
                <a href="{{ route('commentaires.index') }}" class="nav-link active">
                    <i class="nav-icon bi bi-chat-text"></i>
                    <span>Commentaires</span>
                    <span class="nav-badge badge bg-pink">{{ $commentaires->count() }}</span>
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

<!-- Overlay pour mobile -->
<div class="sidebar-overlay" id="sidebarOverlay"></div>

<!-- ===== MAIN CONTENT ===== -->
<main class="main-content" id="mainContent">
    <!-- Fil d'Ariane -->
    <nav aria-label="breadcrumb" class="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Accueil</a></li>
            <li class="breadcrumb-item active">Commentaires</li>
        </ol>
    </nav>

    <!-- En-tête de page -->
    <div class="page-title-section">
        <div>
            <h1>Gestion des Commentaires</h1>
            <p>Gérez les commentaires des utilisateurs</p>
        </div>
        <a href="{{ route('commentaires.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle me-2"></i>Nouveau commentaire
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
                    <i class="bi bi-chat-left-text-fill me-2"></i>Liste des commentaires
                </h5>
                <span class="badge bg-light text-dark">{{ $commentaires->count() }} commentaire(s)</span>
            </div>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle" id="commentairesTable">
                    <thead>
                        <tr>
                            <th width="80" class="ps-4">#ID</th>
                            <th>Utilisateur</th>
                            <th>Contenu</th>
                            <th>Commentaire</th>
                            <th width="100" class="text-center">Note</th>
                            <th width="150" class="text-center">Date</th>
                            <th width="120" class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($commentaires as $commentaire)
                        <tr>
                            <td class="ps-4 fw-semibold text-muted">#{{ $commentaire->id_commentaire }}</td>
                            
                            <td>
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-person-circle me-2 text-primary"></i>
                                    <span class="fw-medium">{{ $commentaire->utilisateur->name ?? 'N/A' }}</span>
                                </div>
                            </td>
                            
                            <td>
                                <span class="text-muted small">{{ Str::limit($commentaire->contenu->titre ?? 'N/A', 30) }}</span>
                            </td>
                            
                            <td>
                                <span class="text-muted small">{{ Str::limit($commentaire->texte, 50) }}</span>
                            </td>
                            
                            <td class="text-center">
                                @if($commentaire->note)
                                <span class="badge badge-warning">
                                    {{ $commentaire->note }}/5
                                </span>
                                @else
                                <span class="badge bg-secondary">—</span>
                                @endif
                            </td>
                            
                            <td class="text-center">
                                <span class="text-muted small">{{ $commentaire->date->format('d/m/Y H:i') }}</span>
                            </td>
                            
                            <td class="text-center">
                                <div class="btn-group btn-group-sm" role="group">
                                    <!-- Bouton SHOW désactivé temporairement -->
                                    <span class="btn btn-outline-info border-0 btn-disabled" 
                                          title="Fonctionnalité temporairement indisponible"
                                          data-bs-toggle="tooltip">
                                        <i class="bi bi-eye"></i>
                                    </span>
                                    
                                    <!-- Bouton EDIT fonctionnel -->
                                    <a href="{{ route('commentaires.edit', $commentaire->id_commentaire) }}" 
                                       class="btn btn-outline-warning border-0 btn-hover-scale" 
                                       title="Éditer"
                                       data-bs-toggle="tooltip">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    
                                    <!-- Bouton DELETE fonctionnel -->
                                    <form action="{{ route('commentaires.destroy', $commentaire->id_commentaire) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="btn btn-outline-danger border-0 btn-hover-scale" 
                                                onclick="return confirm('Supprimer ce commentaire ?')" 
                                                title="Supprimer"
                                                data-bs-toggle="tooltip">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach

                        @if($commentaires->isEmpty())
                        <tr>
                            <td colspan="7" class="text-center py-5">
                                <div class="empty-state">
                                    <i class="bi bi-inbox"></i>
                                    <p class="mb-3">Aucun commentaire trouvé</p>
                                    <a href="{{ route('commentaires.create') }}" class="btn btn-primary">
                                        <i class="bi bi-plus-circle me-2"></i>Ajouter le premier commentaire
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
        @if($commentaires->isNotEmpty())
        <div class="card-footer">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <p class="mb-0 text-muted small">
                        Affichage de <strong>{{ $commentaires->count() }}</strong> commentaire(s)
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
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

<script>
    // Fonction pour basculer le sidebar
    function toggleSidebar() {
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('sidebarOverlay');
        
        sidebar.classList.toggle('active');
        overlay.classList.toggle('active');
    }

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
        $('#commentairesTable').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.13.6/i18n/fr-FR.json"
            },
            "pageLength": 10,
            "order": [[5, 'desc']],
            "responsive": true,
            "columnDefs": [
                { "orderable": false, "targets": [6] }
            ]
        });

        // Initialiser les tooltips
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        });
    });

    // Gestion du toggle sidebar
    document.getElementById('menuToggle').addEventListener('click', function(event) {
        event.stopPropagation();
        toggleSidebar();
    });

    document.getElementById('sidebarOverlay').addEventListener('click', function() {
        toggleSidebar();
    });

    window.addEventListener('resize', function() {
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('sidebarOverlay');
        
        if (window.innerWidth > 768) {
            sidebar.classList.remove('active');
            overlay.classList.remove('active');
        }
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