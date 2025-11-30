@extends('layout')

@section('title', 'Types de Contenu')

@section('content')

<div class="container-fluid px-4">
    <!-- Fil d'Ariane -->
    <nav aria-label="breadcrumb" class="mb-3">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Accueil</a></li>
            <li class="breadcrumb-item active">Types de contenu</li>
        </ol>
    </nav>

    <!-- En-tête de page -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h4 mb-1 text-gray-800">Types de contenu</h1>
            <p class="text-muted mb-0">Administrez les types de contenu disponibles dans le système</p>
        </div>
        <a href="{{ route('type-contenus.create') }}" class="btn btn-primary btn-sm">
            <i class="bi bi-plus-circle me-1"></i>Nouveau type
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
                    <i class="bi bi-file-earmark-richtext-fill me-2"></i>Liste des types de contenu
                </h5>
                <span class="badge bg-light text-dark fs-6">{{ $typeContenus->count() }} type(s)</span>
            </div>
        </div>

        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0" id="typeContenusTable">
                    <thead class="table-light">
                        <tr>
                            <th width="80" class="ps-4">#ID</th>
                            <th>Nom du type</th>
                            <th>Description</th>
                            <th width="150" class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($typeContenus as $typeContenu)
                        <tr id="typeContenu-{{ $typeContenu->id_type_contenu }}">
                            <td class="ps-4 fw-semibold text-muted">
                                #{{ $typeContenu->id_type_contenu }}
                            </td>
                            
                            <td class="editable" onclick="editCell(this, 'nom_type_contenu', {{ $typeContenu->id_type_contenu }})">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-file-earmark-richtext me-2 text-primary"></i>
                                    <span class="typeContenu-nom_type_contenu fw-medium">{{ $typeContenu->nom_type_contenu }}</span>
                                </div>
                            </td>
                            
                            <td class="editable" onclick="editCell(this, 'description', {{ $typeContenu->id_type_contenu }})">
                                <span class="typeContenu-description text-muted small">
                                    {{ $typeContenu->description ?: '—' }}
                                </span>
                            </td>
                            
                            <td class="text-center">
                                <div class="btn-group btn-group-sm" role="group">
                                    <!-- Bouton Éditer -->
                                    <button class="btn btn-outline-warning border-0 btn-hover-scale" 
                                            onclick="editRow({{ $typeContenu->id_type_contenu }})" 
                                            title="Éditer le type"
                                            data-bs-toggle="tooltip">
                                        <i class="bi bi-pencil"></i>
                                    </button>
                                    
                                    <!-- Bouton Voir -->
                                    <a href="{{ route('type-contenus.show', $typeContenu->id_type_contenu) }}" 
                                       class="btn btn-outline-info border-0 btn-hover-scale" 
                                       title="Voir les détails"
                                       data-bs-toggle="tooltip">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    
                                    <!-- Bouton Supprimer -->
                                    <form action="{{ route('type-contenus.destroy', $typeContenu->id_type_contenu) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="btn btn-outline-danger border-0 btn-hover-scale" 
                                                onclick="return confirm('Supprimer le type « {{ $typeContenu->nom_type_contenu }} » ?')" 
                                                title="Supprimer le type"
                                                data-bs-toggle="tooltip">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach

                        @if($typeContenus->isEmpty())
                        <tr>
                            <td colspan="4" class="text-center py-5 text-muted">
                                <i class="bi bi-inbox display-4 d-block mb-2"></i>
                                Aucun type de contenu trouvé
                                <br>
                                <a href="{{ route('type-contenus.create') }}" class="btn btn-primary btn-sm mt-2">
                                    <i class="bi bi-plus-circle me-1"></i>Ajouter le premier type
                                </a>
                            </td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Pied de table -->
        @if($typeContenus->isNotEmpty())
        <div class="card-footer bg-white py-3">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <p class="mb-0 text-muted small">
                        Affichage de <strong>{{ $typeContenus->count() }}</strong> type(s) de contenu
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
        $('#typeContenusTable').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.13.6/i18n/fr-FR.json"
            },
            "pageLength": 10,
            "lengthMenu": [10, 25, 50, 100],
            "order": [[0, 'asc']],
            "responsive": true,
            "dom": '<"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>rt<"row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
            "columnDefs": [
                { "orderable": false, "targets": [3] } // Désactiver le tri sur la colonne Actions
            ]
        });

        // Initialiser les tooltips
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        });
    });

    let editingRow = null;

    // --- Éditer une cellule ---
    function editCell(cell, field, id) {
        if (editingRow) {
            cancelEdit();
        }

        const spanElement = cell.querySelector(`.typeContenu-${field}`);
        const originalValue = spanElement ? spanElement.textContent : '';
        
        cell.classList.add('editing');
        
        let inputHtml = '';
        if (field === 'description') {
            inputHtml = `
                <textarea class="form-control form-control-sm border-primary" 
                          onkeypress="handleKeyPress(event, ${id}, '${field}')"
                          onblur="cancelEdit()"
                          rows="2"
                          style="min-width: 200px;">${originalValue}</textarea>
            `;
        } else {
            inputHtml = `
                <input type="text" 
                       class="form-control form-control-sm border-primary" 
                       value="${originalValue}" 
                       onkeypress="handleKeyPress(event, ${id}, '${field}')"
                       onblur="cancelEdit()"
                       style="min-width: 150px;">
            `;
        }
        
        cell.innerHTML = inputHtml;
        
        const input = cell.querySelector('input, textarea');
        input.focus();
        input.select();
        
        editingRow = { cell, field, id, originalValue, spanElement };
    }

    // --- Gérer la touche Entrée ---
    function handleKeyPress(event, id, field) {
        if (event.key === 'Enter') {
            updateCellValue(id, field, event.target.value);
        } else if (event.key === 'Escape') {
            cancelEdit();
        }
    }

    // --- Mettre à jour la valeur d'une cellule via AJAX ---
    function updateCellValue(id, field, value) {
        const data = {};
        data[field] = value;

        fetch(`/type-contenus/${id}/api-update`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify(data)
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Mettre à jour l'affichage
                const cell = editingRow.cell;
                if (field === 'nom_type_contenu') {
                    cell.innerHTML = `
                        <div class="d-flex align-items-center">
                            <i class="bi bi-file-earmark-richtext me-2 text-primary"></i>
                            <span class="typeContenu-nom_type_contenu fw-medium">${value}</span>
                        </div>
                    `;
                } else {
                    cell.innerHTML = `<span class="typeContenu-${field} text-muted small">${value}</span>`;
                }
                cell.classList.remove('editing');
                editingRow = null;
                
                // Notification
                showNotification('Type de contenu mis à jour avec succès', 'success');
            } else {
                showNotification(Object.values(data.errors).join(', '), 'error');
                cancelEdit();
            }
        })
        .catch(error => {
            console.error('Error:', error);
            showNotification('Erreur lors de la mise à jour', 'error');
            cancelEdit();
        });
    }

    // --- Annuler l'édition ---
    function cancelEdit() {
        if (editingRow) {
            const { cell, originalValue, field, spanElement } = editingRow;
            cell.classList.remove('editing');
            
            if (field === 'nom_type_contenu') {
                cell.innerHTML = `
                    <div class="d-flex align-items-center">
                        <i class="bi bi-file-earmark-richtext me-2 text-primary"></i>
                        <span class="typeContenu-nom_type_contenu fw-medium">${originalValue}</span>
                    </div>
                `;
            } else {
                cell.innerHTML = `<span class="typeContenu-${field} text-muted small">${originalValue}</span>`;
            }
            
            editingRow = null;
        }
    }

    // --- Éditer une ligne complète ---
    function editRow(id) {
        window.location.href = `/type-contenus/${id}/edit`;
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
    .editable {
        cursor: pointer;
        transition: all 0.2s ease;
    }
    .editable:hover {
        background-color: #f8f9fa !important;
    }
    .editing {
        background-color: #e3f2fd !important;
        box-shadow: inset 0 0 0 1px #0d6efd;
    }
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