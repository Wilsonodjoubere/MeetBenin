@extends('layout')

@section('title', 'Gestion des Utilisateurs')

@section('content')

<div class="container-fluid px-4">
    <!-- Fil d'Ariane -->
    <nav aria-label="breadcrumb" class="mb-3">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Accueil</a></li>
            <li class="breadcrumb-item active">Utilisateurs</li>
        </ol>
    </nav>

    <!-- En-tête de page -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h4 mb-1 text-gray-800">Utilisateurs</h1>
            <p class="text-muted mb-0">Gestion des utilisateurs de la plateforme</p>
        </div>
        <a href="{{ route('utilisateurs.create') }}" class="btn btn-primary btn-sm">
            <i class="bi bi-plus-circle me-1"></i>Nouvel utilisateur
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
                    <i class="bi bi-people-fill me-2"></i>Liste des utilisateurs
                </h5>
                <span class="badge bg-light text-dark fs-6">{{ $utilisateurs->count() }} utilisateur(s)</span>
            </div>
        </div>

        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0" id="utilisateursTable">
                    <thead class="table-light">
                        <tr>
                            <th width="80" class="ps-4">#ID</th>
                            <th>Utilisateur</th>
                            <th>Email</th>
                            <th>Rôle</th>
                            <th>Langue</th>
                            <th>Statut</th>
                            <th width="150" class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($utilisateurs as $utilisateur)
                        <tr id="utilisateur-{{ $utilisateur->id_utilisateur }}">
                            <td class="ps-4 fw-semibold text-muted">
                                #{{ $utilisateur->id_utilisateur }}
                            </td>
                            
                            <td>
                                <div class="d-flex align-items-center">
                                    @if($utilisateur->photo)
                                        <img src="{{ asset('storage/' . $utilisateur->photo) }}" 
                                             alt="{{ $utilisateur->prenom }} {{ $utilisateur->nom }}" 
                                             class="rounded-circle me-2" 
                                             width="32" height="32" style="object-fit: cover;">
                                    @else
                                        <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-2" 
                                             style="width: 32px; height: 32px;">
                                            <i class="bi bi-person-fill"></i>
                                        </div>
                                    @endif
                                    <div>
                                        <div class="fw-medium">{{ $utilisateur->prenom }} {{ $utilisateur->nom }}</div>
                                        <small class="text-muted">
                                            {{ $utilisateur->sexe === 'M' ? 'Homme' : ($utilisateur->sexe === 'F' ? 'Femme' : 'Non spécifié') }}
                                            @if($utilisateur->date_naissance)
                                                • {{ \Carbon\Carbon::parse($utilisateur->date_naissance)->age }} ans
                                            @endif
                                        </small>
                                    </div>
                                </div>
                            </td>
                            
                            <td>
                                <span class="text-muted">{{ $utilisateur->email }}</span>
                            </td>
                            
                            <td>
                                @php
                                    $roleColors = [
                                        'Administrateur' => 'danger',
                                        'Moderateur' => 'warning', 
                                        'Auteur' => 'info',
                                        'Manager' => 'success',
                                        'Utilisateur' => 'secondary'
                                    ];
                                    $roleName = $utilisateur->role ? $utilisateur->role->nom_role : 'Non assigné';
                                    $color = $roleColors[$roleName] ?? 'secondary';
                                @endphp
                                <span class="badge bg-{{ $color }}">
                                    {{ $roleName }}
                                </span>
                            </td>
                            
                            <td>
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
                                <div class="btn-group btn-group-sm" role="group">
                                    <!-- Bouton Éditer -->
                                    <a href="{{ route('utilisateurs.edit', $utilisateur->id_utilisateur) }}" 
                                       class="btn btn-outline-warning border-0 btn-hover-scale" 
                                       title="Éditer l'utilisateur"
                                       data-bs-toggle="tooltip">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    
                                    <!-- Bouton Voir -->
                                    <a href="{{ route('utilisateurs.show', $utilisateur->id_utilisateur) }}" 
                                       class="btn btn-outline-info border-0 btn-hover-scale" 
                                       title="Voir les détails"
                                       data-bs-toggle="tooltip">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    
                                    <!-- Bouton Supprimer -->
                                    <form action="{{ route('utilisateurs.destroy', $utilisateur->id_utilisateur) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="btn btn-outline-danger border-0 btn-hover-scale" 
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
                            <td colspan="7" class="text-center py-5 text-muted">
                                <i class="bi bi-people display-4 d-block mb-2"></i>
                                Aucun utilisateur trouvé
                                <br>
                                <a href="{{ route('utilisateurs.create') }}" class="btn btn-primary btn-sm mt-2">
                                    <i class="bi bi-plus-circle me-1"></i>Ajouter le premier utilisateur
                                </a>
                            </td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Pied de table -->
        @if($utilisateurs->isNotEmpty())
        <div class="card-footer bg-white py-3">
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
</div>

<!-- Inclure DataTables -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

<script>
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