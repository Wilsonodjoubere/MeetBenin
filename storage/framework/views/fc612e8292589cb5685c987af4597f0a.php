<!doctype html>
<html lang="fr">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Culture Bénin | <?php echo $__env->yieldContent('title', 'Administration'); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes" />

    <link rel="stylesheet" href="<?php echo e(asset('adminlte/css/adminlte.css')); ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

    <style>
        .editable {
            cursor: pointer;
        }
        .editable:hover {
            background: #f8f9fa;
        }
        .editing {
            background: #e3f2fd !important;
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
            <img src="<?php echo e(asset('adminlte/img/AdminLTELogo.png')); ?>" class="brand-image">
            <span class="brand-text fw-light">Culture Bénin</span>
        </a>
    </div>

    <div class="sidebar-wrapper">
        <nav class="mt-2">
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu">

                <li class="nav-header">TABLEAU DE BORD</li>
                <li class="nav-item">
                    <a href="<?php echo e(url('/')); ?>" class="nav-link">
                        <i class="nav-icon bi bi-speedometer2"></i>
                        <p>Dashboard Principal</p>
                    </a>
                </li>

                <li class="nav-header">GESTION DES TABLES</li>

                <li class="nav-item">
                    <a href="<?php echo e(url('/utilisateurs')); ?>" target="_blank" class="nav-link">
                        <i class="nav-icon bi bi-people-fill"></i>
                        <p>Utilisateurs</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?php echo e(url('/langues')); ?>" target="_blank" class="nav-link">
                        <i class="nav-icon bi bi-flag-fill"></i>
                        <p>Langues</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?php echo e(url('/regions')); ?>" target="_blank" class="nav-link">
                        <i class="nav-icon bi bi-geo-alt-fill"></i>
                        <p>Régions</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?php echo e(url('/contenus')); ?>" target="_blank" class="nav-link">
                        <i class="nav-icon bi bi-file-earmark-text"></i>
                        <p>Contenus</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?php echo e(url('/type-contenus')); ?>" target="_blank" class="nav-link">
                        <i class="nav-icon bi bi-tags-fill"></i>
                        <p>Types de Contenu</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?php echo e(url('/types-media')); ?>" target="_blank" class="nav-link">
                        <i class="nav-icon bi bi-collection-play-fill"></i>
                        <p>Types Media</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?php echo e(url('/media')); ?>" target="_blank" class="nav-link">
                        <i class="nav-icon bi bi-image-fill"></i>
                        <p>Media</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?php echo e(url('/commentaires')); ?>" target="_blank" class="nav-link">
                        <i class="nav-icon bi bi-chat-square-text"></i>
                        <p>Commentaires</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?php echo e(url('/roles')); ?>" target="_blank" class="nav-link">
                        <i class="nav-icon bi bi-person-badge-fill"></i>
                        <p>Rôles</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?php echo e(url('/parler')); ?>" target="_blank" class="nav-link">
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
                        <h3 class="mb-2"><?php echo $__env->yieldContent('title', 'Administration'); ?></h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-end">
                            <li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>">Accueil</a></li>
                            <li class="breadcrumb-item active"><?php echo $__env->yieldContent('title', 'Administration'); ?></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="app-content">
            <div class="container-fluid">
                <!-- Contenu spécifique à la page -->
                <?php echo $__env->yieldContent('content'); ?>
            </div>
        </div>

    </main>
    <!-- ===== END MAIN CONTENT ===== -->

</div>

<script src="<?php echo e(asset('adminlte/js/adminlte.js')); ?>"></script>

</body>
</html><?php /**PATH C:\xampp\htdocs\CultureBenin\resources\views/layout.blade.php ENDPATH**/ ?>