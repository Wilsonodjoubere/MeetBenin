@extends('layout')

@section('title', 'Commentaires')

@section('content')

<div class="container-fluid px-4">
    <!-- Fil d'Ariane -->
    <nav aria-label="breadcrumb" class="mb-3">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Accueil</a></li>
            <li class="breadcrumb-item active">Commentaires</li>
        </ol>
    </nav>

    <!-- En-tête de page -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h4 mb-1 text-gray-800">Commentaires</h1>
            <p class="text-muted mb-0">Gérez les commentaires des utilisateurs</p>
        </div>
        <a href="{{ route('commentaires.create') }}" class="btn btn-primary btn-sm">
            <i class="bi bi-plus-circle me-1"></i>Nouveau commentaire
        </a>
    </div>

    <!-- Message de succès -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show shadow-sm mb-4" role="alert">
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
    <div class="card shadow-sm border-0">
        <div class="card-header bg-white py-3 border-bottom">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0 text-primary fs-6">
                    <i class="bi bi-chat-left-text-fill me-2"></i>Liste des commentaires
                </h5>
                <span class="badge bg-light text-dark fs-6">{{ $commentaires->count() }} commentaire(s)</span>
            </div>
        </div>

        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0" id="commentairesTable">
                    <thead class="table-light">
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
                                <span class="badge bg-warning text-dark">
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
                                    <a href="{{ route('commentaires.show', $commentaire->id_commentaire) }}" 
                                       class="btn btn-outline-info border-0 btn-hover-scale" 
                                       title="Voir les détails"
                                       data-bs-toggle="tooltip">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    
                                    <a href="{{ route('commentaires.edit', $commentaire->id_commentaire) }}" 
                                       class="btn btn-outline-warning border-0 btn-hover-scale" 
                                       title="Éditer"
                                       data-bs-toggle="tooltip">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    
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
                            <td colspan="7" class="text-center py-5 text-muted">
                                <i class="bi bi-inbox display-4 d-block mb-2"></i>
                                Aucun commentaire trouvé
                                <br>
                                <a href="{{ route('commentaires.create') }}" class="btn btn-primary btn-sm mt-2">
                                    <i class="bi bi-plus-circle me-1"></i>Ajouter le premier commentaire
                                </a>
                            </td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Pied de table -->
        @if($commentaires->isNotEmpty())
        <div class="card-footer bg-white py-3">
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
</div>

<!-- Inclure DataTables -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

<script>
    $(document).ready(function() {
        $('#commentairesTable').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.13.6/i18n/fr-FR.json"
            },
            "pageLength": 10,
            "order": [[5, 'desc']], // Trier par date décroissante
            "responsive": true,
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
</script>

<style>
    .btn-hover-scale {
        transition: all 0.2s ease;
    }
    .btn-hover-scale:hover {
        transform: scale(1.1);
    }
</style>

@endsection