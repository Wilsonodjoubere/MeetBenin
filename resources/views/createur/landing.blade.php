<!-- resources/views/createur/landing.blade.php -->
@extends('layouts.createur')

@section('title', 'Tableau de Bord')

@section('content')
<!-- Hero Section -->
<div class="createur-hero py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h1 class="display-5 fw-bold mb-3">Bienvenue, Créateur !</h1>
                <p class="lead mb-4">
                    Partagez la richesse culturelle du Bénin à travers vos créations. 
                    Documentez, racontez, inspirez.
                </p>
                <div class="d-flex flex-wrap gap-3">
                    <a href="{{ route('createur.nouveau') }}" class="btn btn-light btn-lg">
                        <i class="bi bi-plus-circle me-2"></i>Créer un Contenu
                    </a>
                    <a href="{{ route('createur.contenus') }}" class="btn btn-outline-light btn-lg">
                        <i class="bi bi-folder me-2"></i>Voir mes Contenus
                    </a>
                </div>
            </div>
            <div class="col-lg-4 text-center">
                <i class="bi bi-pencil-square" style="font-size: 8rem; opacity: 0.8;"></i>
            </div>
        </div>
    </div>
</div>

<!-- Statistiques -->
<div class="container mt-5">
    <div class="row g-4">
        <div class="col-md-3">
            <div class="card feature-card border-primary">
                <div class="card-body text-center">
                    <h3 class="text-primary">{{ $stats['contenus_crees'] }}</h3>
                    <p class="mb-0">Contenus Créés</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card feature-card border-success">
                <div class="card-body text-center">
                    <h3 class="text-success">{{ $stats['contenus_publies'] }}</h3>
                    <p class="mb-0">Publiés</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card feature-card border-warning">
                <div class="card-body text-center">
                    <h3 class="text-warning">{{ $stats['contenus_attente'] }}</h3>
                    <p class="mb-0">En Attente</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card feature-card border-info">
                <div class="card-body text-center">
                    <h3 class="text-info">{{ $stats['contenus_brouillon'] }}</h3>
                    <p class="mb-0">Brouillons</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Fonctionnalités -->
<div class="container mt-5">
    <h2 class="mb-4">Fonctionnalités Principales</h2>
    <div class="row g-4">
        <div class="col-md-4">
            <div class="card feature-card h-100">
                <div class="card-body text-center">
                    <i class="bi bi-file-earmark-plus text-primary" style="font-size: 3rem;"></i>
                    <h5 class="mt-3">Création de Contenu</h5>
                    <p class="text-muted">
                        Rédigez des articles, documentez des traditions, partagez des connaissances.
                    </p>
                    <a href="{{ route('createur.nouveau') }}" class="btn btn-primary">Commencer</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card feature-card h-100">
                <div class="card-body text-center">
                    <i class="bi bi-images text-success" style="font-size: 3rem;"></i>
                    <h5 class="mt-3">Gestion des Médias</h5>
                    <p class="text-muted">
                        Ajoutez des photos et vidéos pour enrichir vos contenus.
                    </p>
                    <a href="{{ route('media.index') }}" class="btn btn-success">Explorer</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card feature-card h-100">
                <div class="card-body text-center">
                    <i class="bi bi-graph-up text-info" style="font-size: 3rem;"></i>
                    <h5 class="mt-3">Suivi des Performances</h5>
                    <p class="text-muted">
                        Consultez les statistiques de vos contenus publiés.
                    </p>
                    <a href="{{ route('createur.contenus') }}" class="btn btn-info">Voir Stats</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Contenus Récents -->
<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title mb-0">
                <i class="bi bi-clock-history me-2"></i>
                Vos Contenus Récents
            </h5>
        </div>
        <div class="card-body">
            @forelse($contenusRecents as $contenu)
            <div class="border-start border-4 border-primary ps-3 mb-3">
                <h6>{{ $contenu->titre }}</h6>
                <p class="text-muted mb-1">
                    Type: {{ $contenu->typeContenu->nom ?? 'Non spécifié' }} • 
                    Créé le: {{ $contenu->created_at->format('d/m/Y') }}
                </p>
                <span class="badge 
                    @if($contenu->statut == 'publié') bg-success
                    @elseif($contenu->statut == 'en_attente') bg-warning
                    @else bg-secondary @endif">
                    {{ ucfirst($contenu->statut) }}
                </span>
            </div>
            @empty
            <p class="text-muted">Aucun contenu créé pour le moment.</p>
            @endforelse
        </div>
    </div>
</div>
@endsection