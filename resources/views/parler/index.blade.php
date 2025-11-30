@extends('layout')

@section('title', 'Associations Région-Langue')

@section('content')

<div class="container-fluid px-4">
    <!-- Fil d'Ariane -->
    <nav aria-label="breadcrumb" class="mb-3">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Accueil</a></li>
            <li class="breadcrumb-item active">Parler</li>
        </ol>
    </nav>

    <!-- En-tête de page -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h4 mb-1 text-gray-800">Associations Région-Langue</h1>
            <p class="text-muted mb-0">Gérez les langues parlées dans chaque région</p>
        </div>
        <a href="{{ route('parler.create') }}" class="btn btn-primary btn-sm">
            <i class="bi bi-plus-circle me-1"></i>Nouvelle association
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
                    <i class="bi bi-translate me-2"></i>Liste des associations
                </h5>
                <span class="badge bg-light text-dark fs-6">{{ $parlers->count() }} association(s)</span>
            </div>
        </div>

        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0" id="parlerTable">
                    <thead class="table-light">
                        <tr>
                            <th width="80" class="ps-4">#ID</th>
                            <th>Région</th>
                            <th>Langue</th>
                            <th width="120">Code</th>
                            <th width="150" class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($parlers as $parler)
                        <tr id="parler-{{ $parler->id_region }}-{{ $parler->id_langue }}">
                            <td class="ps-4 fw-semibold text-muted">
                                #{{ $parler->id_region }}-{{ $parler->id_langue }}
                            </td>
                            
                            <td>
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-geo-alt me-2 text-primary"></i>
                                    <span class="parler-region fw-medium">{{ $parler->region->nom_region ?? 'N/A' }}</span>
                                </div>
                            </td>
                            
                            <td>
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-translate me-2 text-success"></i>
                                    <span class="parler-langue fw-medium">{{ $parler->langue->nom_langue ?? 'N/A' }}</span>
                                </div>
                            </td>
                            
                            <td>
                                <span class="badge bg-primary parler-code px-2 py-1">
                                    {{ $parler->langue->code_langue ?? 'N/A' }}
                                </span>
                            </td>
                            
                            <td class="text-center">
                                <div class="btn-group btn-group-sm" role="group">
                                    <!-- Bouton Éditer -->
                                    <button class="btn btn-outline-warning border-0 btn-hover-scale" 
                                            onclick="editRow({{ $parler->id_region }}, {{ $parler->id_langue }})" 
                                            title="Éditer l'association"
                                            data-bs-toggle="tooltip">
                                        <i class="bi bi-pencil"></i>
                                    </button>
                                    
                                    <!-- Bouton Voir -->
                                    <a href="{{ route('parler.show', ['id_region' => $parler->id_region, 'id_langue' => $parler->id_langue]) }}" 
                                       class="btn btn-outline-info border-0 btn-hover-scale" 
                                       title="Voir les détails"
                                       data-bs-toggle="tooltip">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    
                                    <!-- Bouton Supprimer -->
                                    <form action="{{ route('parler.destroy', ['id_region' => $parler->id_region, 'id_langue' => $parler->id_langue]) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="btn btn-outline-danger border-0 btn-hover-scale" 
                                                onclick="return confirm('Supprimer l\\'association « {{ $parler->region->nom_region ?? 'N/A' }} - {{ $parler->langue->nom_langue ?? 'N/A' }} » ?')" 
                                                title="Supprimer l'association"
                                                data-bs-toggle="tooltip">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach

                        @if($parlers->isEmpty())
                        <tr>
                            <td colspan="5" class="text-center py-5 text-muted">
                                <i class="bi bi-inbox display-4 d-block mb-2"></i>
                                Aucune association trouvée
                                <br>
                                <a href="{{ route('parler.create') }}" class="btn btn-primary btn-sm mt-2">
                                    <i class="bi bi-plus-circle me-1"></i>Ajouter la première association
                                </a>
                            </td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Pied de table -->
        @if($parlers->isNotEmpty())
        <div class="card-footer bg-white py-3">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <p class="mb-0 text-muted small">
                        Affichage de <strong>{{ $parlers->count() }}</strong> association(s)
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

<!-- Modal pour confirmer la suppression -->
<div class="modal fade" id="deleteModal" tabindex="-1">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header border-0 pb-0">
                <h5 class="modal-title text-danger fs-6">
                    <i class="bi bi-exclamation-triangle-fill me-2"></i>Confirmation
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body py-3">
                <p class="mb-0 small">Êtes-vous sûr de vouloir supprimer cette association ?</p>
            </div>
            <div class="modal-footer border-0 pt-0">
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">
                    <i class="bi bi-x-circle me-1"></i>Annuler
                </button>
                <button type="button" class="btn btn-danger btn-sm" id="confirmDelete">
                    <i class="bi bi-trash me-1"></i>Supprimer
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Inclure DataTables -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

<script>
    // Initialiser DataTable
    $(document).ready(function() {
        $('#parlerTable').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.13.6/i18n/fr-FR.json"
            },
            "pageLength": 10,
            "lengthMenu": [10, 25, 50, 100],
            "order": [[0, 'asc']],
            "responsive": true,
            "dom": '<"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>rt<"row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
            "columnDefs": [
                { "orderable": false, "targets": [4] } // Désactiver le tri sur la colonne Actions
            ]
        });

        // Initialiser les tooltips
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        });
    });

    // --- Éditer une ligne complète ---
    function editRow(id_region, id_langue) {
        window.location.href = `/parler/${id_region}/${id_langue}/edit`;
    }

    // --- Notification ---
    function showNotification(message, type) {
        // Simple alert pour l'instant, vous pouvez utiliser un système de toast
        if (type === 'success') {
            alert('✅ ' + message);
        } else {
            alert('❌ ' + message);
        }
    }
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