@extends('layouts.traducteur')

@section('title', 'Tableau de Bord Traducteur')

@section('content')
<!-- Hero Section -->
<div class="traducteur-hero py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h1 class="display-5 fw-bold mb-3">Bienvenue, Traducteur !</h1>
                <p class="lead mb-4">
                    Partagez la culture béninoise en traduisant des contenus vers différentes langues. 
                    Contribuez à rendre notre patrimoine accessible à tous.
                </p>
                <div class="d-flex flex-wrap gap-3">
                    <a href="{{ route('traducteur.nouvelle') }}" class="btn btn-light btn-lg">
                        <i class="bi bi-translate me-2"></i>Nouvelle Traduction
                    </a>
                    <a href="{{ route('traducteur.traductions') }}" class="btn btn-outline-light btn-lg">
                        <i class="bi bi-list-check me-2"></i>Mes Traductions
                    </a>
                </div>
            </div>
            <div class="col-lg-4 text-center">
                <i class="bi bi-translate" style="font-size: 8rem; opacity: 0.8;"></i>
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
                    <h3 class="text-primary">{{ $stats['traductions_terminees'] }}</h3>
                    <p class="mb-0">Traductions Terminées</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card feature-card border-warning">
                <div class="card-body text-center">
                    <h3 class="text-warning">{{ $stats['traductions_encours'] }}</h3>
                    <p class="mb-0">En Cours</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card feature-card border-info">
                <div class="card-body text-center">
                    <h3 class="text-info">{{ $stats['traductions_attente'] }}</h3>
                    <p class="mb-0">En Attente</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card feature-card border-success">
                <div class="card-body text-center">
                    <h3 class="text-success">{{ $stats['langues_maitrisees'] }}</h3>
                    <p class="mb-0">Langues Maîtrisées</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Contenus à Traduire -->
<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title mb-0">
                <i class="bi bi-translate me-2"></i>
                Contenus Disponibles pour Traduction
            </h5>
        </div>
        <div class="card-body">
            @forelse($contenusATraduire as $contenu)
            <div class="border-start border-4 border-primary ps-3 mb-3">
                <h6>{{ $contenu->titre }}</h6>
                <p class="text-muted mb-1">
                    Langue source: {{ $contenu->langue->nom_langue ?? 'Non spécifiée' }} • 
                    Type: {{ $contenu->typeContenu->nom ?? 'Non spécifié' }} • 
                    Créé le: {{ $contenu->created_at->format('d/m/Y') }}
                </p>
                <a href="{{ route('traducteur.nouvelle', ['contenu_id' => $contenu->id_contenu]) }}" 
                   class="btn btn-sm btn-primary">Traduire ce contenu</a>
            </div>
            @empty
            <p class="text-muted">Aucun contenu disponible pour traduction pour le moment.</p>
            @endforelse
        </div>
    </div>
</div>

<!-- Traductions Récents -->
<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title mb-0">
                <i class="bi bi-clock-history me-2"></i>
                Vos Traductions Récentes
            </h5>
        </div>
        <div class="card-body">
            @forelse($traductionsRecentes as $traduction)
            <div class="border-start border-4 border-success ps-3 mb-3">
                <h6>{{ $traduction->contenu->titre ?? 'Titre non disponible' }}</h6>
                <p class="text-muted mb-1">
                    De: {{ $traduction->langueSource->nom_langue ?? 'Inconnue' }} • 
                    Vers: {{ $traduction->langueCible->nom_langue ?? 'Inconnue' }} • 
                    Statut: {{ ucfirst($traduction->statut) }}
                </p>
                @if($traduction->statut == 'en_cours')
                <a href="{{ route('traducteur.edit', $traduction->id_traduction) }}" 
                   class="btn btn-sm btn-warning">Continuer la traduction</a>
                @endif
            </div>
            @empty
            <p class="text-muted">Aucune traduction effectuée pour le moment.</p>
            @endforelse
        </div>
    </div>
</div>
@endsection 