@extends('layout')

@section('title', 'Gestion des Contenus')

@section('content')

<div class="container-fluid px-4">
    <!-- Fil d'Ariane -->
    <nav aria-label="breadcrumb" class="mb-3">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Accueil</a></li>
            <li class="breadcrumb-item active">Contenus</li>
        </ol>
    </nav>

    <!-- En-tête de page -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h4 mb-1 text-gray-800">Contenus</h1>
            <p class="text-muted mb-0">Gestion des contenus culturels et linguistiques</p>
        </div>
        <a href="{{ route('contenus.create') }}" class="btn btn-primary btn-sm">
            <i class="bi bi-plus-circle me-1"></i>Nouveau contenu
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
                    <i class="bi bi-file-earmark-richtext me-2"></i>Liste des contenus
                </h5>
                <span class="badge bg-light text-dark fs-6">{{ $contenus->count() }} contenu(s)</span>
            </div>
        </div>

        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0" id="contenusTable">
                    <thead class="table-light">
                        <tr>
                            <th width="80" class="ps-4">#ID</th>
                            <th>Titre</th>
                            <th>Type</th>
                            <th>Région</th>
                            <th>Langue</th>
                            <th>Auteur</th>
                            <th>Statut</th>
                            <th width="180" class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($contenus as $contenu)
                        <tr id="contenu-{{ $contenu->id_contenu }}">
                            <td class="ps-4 fw-semibold text-muted">
                                #{{ $contenu->id_contenu }}
                            </td>
                            
                            <td>
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-file-text me-2 text-primary"></i>
                                    <div>
                                        <div class="fw-medium">{{ Str::limit($contenu->titre, 50) }}</div>
                                        <small class="text-muted">
                                            {{ $contenu->date_creation->format('d/m/Y') }}
                                            @if($contenu->parent_id)
                                                <span class="badge bg-info ms-1">Enfant</span>
                                            @endif
                                        </small>
                                    </div>
                                </div>
                            </td>
                            
                            <td>
                                <span class="badge bg-secondary">
                                    {{ $contenu->typeContenu ? $contenu->typeContenu->nom_type_contenu : '—' }}
                                </span>
                            </td>
                            
                            <td>
                                <span class="text-muted small">
                                    {{ $contenu->region ? $contenu->region->nom_region : '—' }}
                                </span>
                            </td>
                            
                            <td>
                                <span class="badge bg-light text-dark">
                                    {{ $contenu->langue ? $contenu->langue->nom_langue : '—' }}
                                </span>
                            </td>
                            
                            <td>
                                <div class="d-flex align-items-center">
                                    @if($contenu->auteur && $contenu->auteur->photo)
                                        <img src="{{ asset('storage/' . $contenu->auteur->photo) }}" 
                                             alt="{{ $contenu->auteur->prenom }}" 
                                             class="rounded-circle me-2" 
                                             width="24" height="24" style="object-fit: cover;">
                                    @else
                                        <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-2" 
                                             style="width: 24px; height: 24px;">
                                            <i class="bi bi-person-fill" style="font-size: 0.7rem;"></i>
                                        </div>
                                    @endif
                                    <span class="small">
                                        {{ $contenu->auteur ? $contenu->auteur->prenom . ' ' . $contenu->auteur->nom : '—' }}
                                    </span>
                                </div>
                            </td>
                            
                            <td>
                                @php
                                    $statusColors = [
                                        'brouillon' => 'secondary',
                                        'en_attente' => 'warning',
                                        'approuve' => 'success',
                                        'rejete' => 'danger'
                                    ];
                                    $statusLabels = [
                                        'brouillon' => 'Brouillon',
                                        'en_attente' => 'En attente',
                                        'approuve' => 'Approuvé',
                                        'rejete' => 'Rejeté'
                                    ];
                                @endphp
                                <span class="badge bg-{{ $statusColors[$contenu->statut] ?? 'secondary' }}">
                                    {{ $statusLabels[$contenu->statut] ?? $contenu->statut }}
                                </span>
                                @if($contenu->date_validation)
                                    <br>
                                    <small class="text-muted">
                                        {{ $contenu->date_validation->format('d/m/Y') }}
                                    </small>
                                @endif
                            </td>
                            
                            <td class="text-center">
                                <div class="btn-group btn-group-sm" role="group">
                                    <!-- Bouton Voir -->
                                    <a href="{{ route('contenus.show', $contenu->id_contenu) }}" 
                                       class="btn btn-outline-info border-0 btn-hover-scale" 
                                       title="Voir les détails"
                                       data-bs-toggle="tooltip">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    
                                    <!-- Bouton Éditer -->
                                    <a href="{{ route('contenus.edit', $contenu->id_contenu) }}" 
                                       class="btn btn-outline-warning border-0 btn-hover-scale" 
                                       title="Éditer le contenu"
                                       data-bs-toggle="tooltip">
                                        <i class="bi bi-pencil"></i>
                                    </a>

                                    <!-- Boutons de modération -->
                                    @if($contenu->statut === 'en_attente')
                                        <form action="{{ route('contenus.approuver', $contenu->id_contenu) }}" method="POST" class="d-inline">
                                            @csrf
                                            <button type="submit" 
                                                    class="btn btn-outline-success border-0 btn-hover-scale" 
                                                    title="Approuver le contenu"
                                                    data-bs-toggle="tooltip">
                                                <i class="bi bi-check-lg"></i>
                                            </button>
                                        </form>
                                        <form action="{{ route('contenus.rejeter', $contenu->id_contenu) }}" method="POST" class="d-inline">
                                            @csrf
                                            <button type="submit" 
                                                    class="btn btn-outline-danger border-0 btn-hover-scale" 
                                                    title="Rejeter le contenu"
                                                    data-bs-toggle="tooltip">
                                                <i class="bi bi-x-lg"></i>
                                            </button>
                                        </form>
                                    @endif
                                    
                                    <!-- Bouton Supprimer -->
                                    <form action="{{ route('contenus.destroy', $contenu->id_contenu) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="btn btn-outline-danger border-0 btn-hover-scale" 
                                                onclick="return confirm('Supprimer le contenu « {{ $contenu->titre }} » ?')" 
                                                title="Supprimer le contenu"
                                                data-bs-toggle="tooltip">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach

                        @if($contenus->isEmpty())
                        <tr>
                            <td colspan="8" class="text-center py-5 text-muted">
                                <i class="bi bi-file-earmark-text display-4 d-block mb-2"></i>
                                Aucun contenu trouvé
                                <br>
                                <a href="{{ route('contenus.create') }}" class="btn btn-primary btn-sm mt-2">
                                    <i class="bi bi-plus-circle me-1"></i>Ajouter le premier contenu
                                </a>
                            </td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Pied de table -->
        @if($contenus->isNotEmpty())
        <div class="card-footer bg-white py-3">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <p class="mb-0 text-muted small">
                        Affichage de <strong>{{ $contenus->count() }}</strong> contenu(s)
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
    // Initialiser DataTable
    $(document).ready(function() {
        $('#contenusTable').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.13.6/i18n/fr-FR.json"
            },
            "pageLength": 10,
            "lengthMenu": [10, 25, 50, 100],
            "order": [[0, 'desc']], // Tri par ID décroissant (plus récent d'abord)
            "responsive": true,
            "dom": '<"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>rt<"row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
            "columnDefs": [
                { "orderable": false, "targets": [7] } // Désactiver le tri sur la colonne Actions
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
    .card {
        border: 1px solid #e3e6f0;
        border-radius: 8px;
    }
    .table th {
        font-weight: 600;
        color: #495057;
        font-size: 0.875rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    .breadcrumb {
        background: transparent;
        padding: 0;
        margin-bottom: 1rem;
    }
    .breadcrumb-item a {
        color: #6c757d;
        text-decoration: none;
    }
    .breadcrumb-item.active {
        color: #495057;
    }
    /* DataTables custom */
    .dataTables_wrapper .dataTables_length,
    .dataTables_wrapper .dataTables_filter {
        padding: 1rem;
    }
    .dataTables_wrapper .dataTables_info {
        padding: 0.75rem;
    }
</style>

@endsection