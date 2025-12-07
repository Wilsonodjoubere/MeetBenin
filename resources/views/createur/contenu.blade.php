<!-- resources/views/createur/contenus.blade.php -->
@extends('layouts.createur')

@section('title', 'Mes Contenus')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Mes Contenus</h1>
        <a href="{{ route('createur.nouveau') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle me-2"></i>Nouveau Contenu
        </a>
    </div>

    <!-- Filtres -->
    <div class="card mb-4">
        <div class="card-body">
            <form method="GET" class="row g-3">
                <div class="col-md-4">
                    <label for="statut" class="form-label">Statut</label>
                    <select name="statut" id="statut" class="form-select">
                        <option value="">Tous les statuts</option>
                        <option value="brouillon">Brouillon</option>
                        <option value="en_attente">En attente</option>
                        <option value="publié">Publié</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="type" class="form-label">Type de contenu</label>
                    <select name="type_contenu_id" id="type" class="form-select">
                        <option value="">Tous les types</option>
                        @foreach($typesContenu as $type)
                        <option value="{{ $type->id }}">{{ $type->nom }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4 d-flex align-items-end">
                    <button type="submit" class="btn btn-outline-primary me-2">Filtrer</button>
                    <a href="{{ route('createur.contenus') }}" class="btn btn-outline-secondary">Réinitialiser</a>
                </div>
            </form>
        </div>
    </div>

    <!-- Liste des contenus -->
    <div class="card">
        <div class="card-body">
            @if($contenus->count() > 0)
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Titre</th>
                            <th>Type</th>
                            <th>Statut</th>
                            <th>Date de création</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($contenus as $contenu)
                        <tr>
                            <td>
                                <strong>{{ $contenu->titre }}</strong>
                                @if($contenu->description)
                                <br><small class="text-muted">{{ Str::limit($contenu->description, 50) }}</small>
                                @endif
                            </td>
                            <td>{{ $contenu->typeContenu->nom ?? '-' }}</td>
                            <td>
                                <span class="badge 
                                    @if($contenu->statut == 'publié') bg-success
                                    @elseif($contenu->statut == 'en_attente') bg-warning
                                    @else bg-secondary @endif">
                                    {{ ucfirst($contenu->statut) }}
                                </span>
                            </td>
                            <td>{{ $contenu->created_at->format('d/m/Y H:i') }}</td>
                            <td>
                                <div class="btn-group btn-group-sm">
                                    <a href="{{ route('contenus.show', $contenu->id) }}" 
                                       class="btn btn-outline-primary" title="Voir">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    <a href="{{ route('contenus.edit', $contenu->id) }}" 
                                       class="btn btn-outline-secondary" title="Modifier">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="d-flex justify-content-center mt-4">
                {{ $contenus->links() }}
            </div>
            @else
            <div class="text-center py-5">
                <i class="bi bi-folder-x" style="font-size: 3rem; color: #6c757d;"></i>
                <h4 class="mt-3">Aucun contenu trouvé</h4>
                <p class="text-muted">Commencez par créer votre premier contenu.</p>
                <a href="{{ route('createur.nouveau') }}" class="btn btn-primary">
                    <i class="bi bi-plus-circle me-2"></i>Créer mon premier contenu
                </a>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection