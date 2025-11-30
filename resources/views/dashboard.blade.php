<!doctype html>
<html lang="fr">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Culture Bénin | Tableau de Bord</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes" />

    <link rel="stylesheet" href="{{ asset('adminlte/css/adminlte.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

    <style>
        /* Styles améliorés pour le dashboard */
        .dashboard-widgets .small-box {
            border-radius: 12px;
            padding: 20px;
            transition: all 0.3s ease;
            border: none;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .dashboard-widgets .small-box:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.15);
        }

        .dashboard-widgets .inner {
            padding: 10px 0;
        }

        .dashboard-widgets .icon {
            font-size: 2.5rem;
            opacity: 0.8;
        }

        .stat-card {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }

        .stat-card-2 {
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            color: white;
        }

        .stat-card-3 {
            background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
            color: white;
        }

        .stat-card-4 {
            background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);
            color: white;
        }

        .stat-card-5 {
            background: linear-gradient(135deg, #fa709a 0%, #fee140 100%);
            color: white;
        }

        .stat-card-6 {
            background: linear-gradient(135deg, #a8edea 0%, #fed6e3 100%);
            color: #333;
        }

        .quick-actions {
            background: #fff;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .quick-action-btn {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            border-radius: 8px;
            padding: 12px 20px;
            margin: 5px;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
        }

        .quick-action-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            color: white;
        }

        .recent-activity {
            background: #fff;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .activity-item {
            padding: 10px 0;
            border-bottom: 1px solid #eee;
        }

        .activity-item:last-child {
            border-bottom: none;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .dashboard-section {
            margin-bottom: 30px;
        }

        .section-title {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 20px;
            color: #2c3e50;
            border-left: 4px solid #e74c3c;
            padding-left: 15px;
        }

        /* Style pour les liens ouvrant un nouvel onglet */
        .external-link {
            position: relative;
            padding-right: 20px;
        }

        .external-link::after {
            content: "↗";
            position: absolute;
            right: 8px;
            font-size: 0.9em;
            opacity: 0.7;
        }
    </style>
</head>

<body class="layout-fixed sidebar-expand-lg sidebar-open bg-body-tertiary">

<div class="app-wrapper">

    <!-- ======= TOP NAVBAR ======= -->
    <nav class="app-header navbar navbar-expand bg-body">
        <div class="container-fluid">

            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-lte-toggle="sidebar" href="#">
                        <i class="bi bi-list"></i>
                    </a>
                </li>
            </ul>

            <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link" data-bs-toggle="dropdown" href="#">
                        <i class="bi bi-bell-fill"></i>
                        <span class="badge bg-danger navbar-badge">3</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <span class="dropdown-header">3 Notifications</span>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="bi bi-person-plus me-2"></i> 2 nouveaux utilisateurs
                        </a>
                        <a href="#" class="dropdown-item">
                            <i class="bi bi-chat-text me-2"></i> 5 nouveaux commentaires
                        </a>
                        <a href="#" class="dropdown-item">
                            <i class="bi bi-file-text me-2"></i> 3 nouveaux contenus
                        </a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="bi bi-search"></i>
                    </a>
                </li>
            </ul>

        </div>
    </nav>
    <!-- ===== END NAVBAR ===== -->

    <!-- ======= SIDEBAR ======= -->
<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">

    <div class="sidebar-brand">
        <a href="#" class="brand-link">
            <img src="{{ asset('adminlte/img/AdminLTELogo.png') }}" class="brand-image">
            <span class="brand-text fw-light">Culture Bénin</span>
        </a>
    </div>

    <div class="sidebar-wrapper">
        <nav class="mt-2">

            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu">

                <li class="nav-header">TABLEAU DE BORD</li>

                <li class="nav-item">
                    <a href="{{ url('/') }}" class="nav-link">
                        <i class="nav-icon bi bi-speedometer2"></i>
                        <p>Dashboard Principal</p>
                    </a>
                </li>

                <li class="nav-header">GESTION DES TABLES</li>

                <li class="nav-item">
                    <a href="{{ route('utilisateurs.index') }}" target="_blank" class="nav-link">
                        <i class="nav-icon bi bi-people-fill"></i>
                        <p>Utilisateurs</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('langues.index') }}" target="_blank" class="nav-link">
                        <i class="nav-icon bi bi-flag-fill"></i>
                        <p>Langues</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('regions.index') }}" target="_blank" class="nav-link">
                        <i class="nav-icon bi bi-geo-alt-fill"></i>
                        <p>Régions</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('contenus.index') }}" target="_blank" class="nav-link">
                        <i class="nav-icon bi bi-file-earmark-text"></i>
                        <p>Contenus</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('type-contenus.index') }}" target="_blank" class="nav-link">
                        <i class="nav-icon bi bi-tags-fill"></i>
                        <p>Types de Contenu</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('types_media.index') }}" target="_blank" class="nav-link">
                        <i class="nav-icon bi bi-collection-play-fill"></i>
                        <p>Types Media</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('media.index') }}" target="_blank" class="nav-link">
                        <i class="nav-icon bi bi-image-fill"></i>
                        <p>Media</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('commentaires.index') }}" target="_blank" class="nav-link">
                        <i class="nav-icon bi bi-chat-square-text"></i>
                        <p>Commentaires</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('roles.index') }}" target="_blank" class="nav-link">
                        <i class="nav-icon bi bi-person-badge-fill"></i>
                        <p>Rôles</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('parler.index') }}" target="_blank" class="nav-link">
                        <i class="nav-icon bi bi-link-45deg"></i>
                        <p>Parler (Pivot)</p>
                    </a>
                </li>

            </ul>
        </nav>
    </div>

</aside>
<!-- ===== END SIDEBAR ===== -->
    <!-- ===== MAIN CONTENT ===== -->
    <main class="app-main">

        <div class="app-content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="mb-2">Tableau de Bord - Culture Bénin</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-end">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Accueil</a></li>
                            <li class="breadcrumb-item active">Tableau de Bord</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="app-content">
            <div class="container-fluid">
                
                <!-- ===== DASHBOARD FIXE ===== -->
                <div class="dashboard-section">
                    <h4 class="section-title">Statistiques Globales</h4>
                    <div class="stats-grid">
                        <!-- Utilisateurs -->
                        <div class="small-box stat-card">
                            <div class="inner">
                                <h3>8</h3>
                                <p>Utilisateurs</p>
                            </div>
                            <div class="icon">
                                <i class="bi bi-people-fill"></i>
                            </div>
                            <a href="{{ route('utilisateurs.index') }}" target="_blank" class="small-box-footer external-link">
                                Voir détails <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>

                        <!-- Langues -->
                        <div class="small-box stat-card-2">
                            <div class="inner">
                                <h3>5</h3>
                                <p>Langues</p>
                            </div>
                            <div class="icon">
                                <i class="bi bi-flag-fill"></i>
                            </div>
                            <a href="{{ route('langues.index') }}" target="_blank" class="small-box-footer external-link">
                                Voir détails <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>

                        <!-- Régions -->
                        <div class="small-box stat-card-3">
                            <div class="inner">
                                <h3>7</h3>
                                <p>Régions</p>
                            </div>
                            <div class="icon">
                                <i class="bi bi-geo-alt-fill"></i>
                            </div>
                            <a href="{{ route('regions.index') }}" target="_blank" class="small-box-footer external-link">
                                Voir détails <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>

                        <!-- Contenus -->
                        <div class="small-box stat-card-4">
                            <div class="inner">
                                <h3>12</h3>
                                <p>Contenus</p>
                            </div>
                            <div class="icon">
                                <i class="bi bi-file-earmark-text"></i>
                            </div>
                            <a href="{{ route('contenus.index') }}" target="_blank" class="small-box-footer external-link">
                                Voir détails <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>

                        <!-- Commentaires -->
                        <div class="small-box stat-card-5">
                            <div class="inner">
                                <h3>9</h3>
                                <p>Commentaires</p>
                            </div>
                            <div class="icon">
                                <i class="bi bi-chat-square-text"></i>
                            </div>
                            <a href="{{ route('commentaires.index') }}" target="_blank" class="small-box-footer external-link">
                                Voir détails <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>

                        <!-- Médias -->
                        <div class="small-box stat-card-6">
                            <div class="inner">
                                <h3>6</h3>
                                <p>Médias</p>
                            </div>
                            <div class="icon">
                                <i class="bi bi-image-fill"></i>
                            </div>
                            <a href="{{ route('media.index') }}" target="_blank" class="small-box-footer external-link">
                                Voir détails <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-8">
                        <!-- Actions Rapides -->
                        <div class="quick-actions">
                            <h5 class="mb-3"><i class="bi bi-lightning-fill me-2"></i>Actions Rapides</h5>
                            <div class="d-flex flex-wrap">
                                <a href="{{ route('utilisateurs.index') }}" target="_blank" class="quick-action-btn external-link">
                                    <i class="bi bi-people-fill me-1"></i> Gérer Utilisateurs
                                </a>
                                <a href="{{ route('contenus.index') }}" target="_blank" class="quick-action-btn external-link">
                                    <i class="bi bi-file-text me-1"></i> Voir Contenus
                                </a>
                                <a href="{{ route('media.index') }}" target="_blank" class="quick-action-btn external-link">
                                    <i class="bi bi-images me-1"></i> Gérer Médias
                                </a>
                                <a href="{{ route('langues.index') }}" target="_blank" class="quick-action-btn external-link">
                                    <i class="bi bi-translate me-1"></i> Langues
                                </a>
                            </div>
                        </div>

                        <!-- Activité Récente -->
                        <div class="recent-activity">
                            <h5 class="mb-3"><i class="bi bi-clock-history me-2"></i>Activité Récente</h5>
                            <div class="activity-item">
                                <div class="d-flex justify-content-between">
                                    <span><strong>Nouvel utilisateur</strong> - Jean Dupont</span>
                                    <small class="text-muted">Il y a 5 min</small>
                                </div>
                            </div>
                            <div class="activity-item">
                                <div class="d-flex justify-content-between">
                                    <span><strong>Contenu ajouté</strong> - Histoire du Royaume du Dahomey</span>
                                    <small class="text-muted">Il y a 15 min</small>
                                </div>
                            </div>
                            <div class="activity-item">
                                <div class="d-flex justify-content-between">
                                    <span><strong>Commentaire</strong> - Sur "Art Vodoun"</span>
                                    <small class="text-muted">Il y a 30 min</small>
                                </div>
                            </div>
                            <div class="activity-item">
                                <div class="d-flex justify-content-between">
                                    <span><strong>Média uploadé</strong> - Photo du Palais Royal</span>
                                    <small class="text-muted">Il y a 1 heure</small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <!-- Statistiques Rapides -->
                        <div class="recent-activity">
                            <h5 class="mb-3"><i class="bi bi-graph-up me-2"></i>Statistiques Rapides</h5>
                            <div class="activity-item">
                                <div class="d-flex justify-content-between">
                                    <span>Utilisateurs actifs aujourd'hui</span>
                                    <strong class="text-success">3</strong>
                                </div>
                            </div>
                            <div class="activity-item">
                                <div class="d-flex justify-content-between">
                                    <span>Nouveaux contenus (7j)</span>
                                    <strong class="text-info">4</strong>
                                </div>
                            </div>
                            <div class="activity-item">
                                <div class="d-flex justify-content-between">
                                    <span>Commentaires (7j)</span>
                                    <strong class="text-warning">7</strong>
                                </div>
                            </div>
                            <div class="activity-item">
                                <div class="d-flex justify-content-between">
                                    <span>Associations Région-Langue</span>
                                    <strong class="text-primary">5</strong>
                                </div>
                            </div>
                        </div>

                        <!-- Liens Rapides -->
                        <div class="recent-activity mt-4">
                            <h5 class="mb-3"><i class="bi bi-link-45deg me-2"></i>Liens Rapides</h5>
                            <div class="d-grid gap-2">
                                <a href="{{ route('type-contenus.index') }}" target="_blank" class="btn btn-outline-primary btn-sm external-link">
                                    <i class="bi bi-tags me-1"></i> Types de Contenu
                                </a>
                                <a href="{{ route('types_media.index') }}" target="_blank" class="btn btn-outline-success btn-sm external-link">
                                    <i class="bi bi-collection-play me-1"></i> Types de Média
                                </a>
                                <a href="{{ route('roles.index') }}" target="_blank" class="btn btn-outline-info btn-sm external-link">
                                    <i class="bi bi-person-badge me-1"></i> Gestion des Rôles
                                </a>
                                <a href="{{ route('parler.index') }}" target="_blank" class="btn btn-outline-warning btn-sm external-link">
                                    <i class="bi bi-link me-1"></i> Relations Parler
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </main>
    <!-- ===== END MAIN CONTENT ===== -->

</div>

<script src="{{ asset('adminlte/js/adminlte.js') }}"></script>

<script>
    // Animation des cartes de statistiques
    document.addEventListener('DOMContentLoaded', function() {
        const statCards = document.querySelectorAll('.small-box');
        
        statCards.forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-5px)';
            });
            
            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
            });
        });
    });
</script>

</body>
</html>