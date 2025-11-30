@extends('layout')
@section('title', 'Régions')

@section('content')

<div class="container-fluid px-4">
    <!-- Fil d'Ariane -->
    <nav aria-label="breadcrumb" class="mb-3">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Accueil</a></li>
            <li class="breadcrumb-item active">Régions</li>
        </ol>
    </nav>

    <!-- En-tête de page -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h4 mb-1 text-gray-800">Régions</h1>
            <p class="text-muted mb-0">Administrez les régions du Bénin</p>
        </div>
        <a href="{{ route('regions.create') }}" class="btn btn-primary btn-sm">
            <i class="bi bi-plus-circle me-1"></i>Nouvelle région
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
                    <i class="bi bi-geo-alt-fill me-2"></i>Liste des régions
                </h5>
                <span class="badge bg-light text-dark fs-6">{{ $regions->count() }} région(s)</span>
            </div>
        </div>

        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0" id="regionsTable">
                    <thead class="table-light">
                        <tr>
                            <th width="80" class="ps-4">#ID</th>
                            <th>Nom</th>
                            <th>Description</th>
                            <th width="120">Population</th>
                            <th width="120">Superficie</th>
                            <th width="120">Localisation</th>
                            <th width="150" class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($regions as $region)
                        <tr id="region-{{ $region->id_region }}">
                            <td class="ps-4 fw-semibold text-muted">
                                #{{ $region->id_region }}
                            </td>
                            
                            <td class="editable" onclick="editCell(this, 'nom_region', {{ $region->id_region }})">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-geo me-2 text-primary"></i>
                                    <span class="region-nom_region fw-medium">{{ $region->nom_region }}</span>
                                </div>
                            </td>
                            
                            <td class="editable" onclick="editCell(this, 'description', {{ $region->id_region }})">
                                <span class="region-description text-muted small">
                                    {{ $region->description ?: '—' }}
                                </span>
                            </td>
                            
                            <td class="editable text-end" onclick="editCell(this, 'population', {{ $region->id_region }})">
                                <span class="region-population fw-semibold">
                                    {{ $region->population ? number_format($region->population, 0, ',', ' ') : '—' }}
                                </span>
                            </td>
                            
                            <td class="editable text-end" onclick="editCell(this, 'superficie', {{ $region->id_region }})">
                                <span class="region-superficie">
                                    {{ $region->superficie ? number_format($region->superficie, 0, ',', ' ') . ' km²' : '—' }}
                                </span>
                            </td>
                            
                            <td class="editable" onclick="editLocalisation({{ $region->id_region }})">
                                <span class="badge bg-info region-localisation">
                                    {{ $region->localisation ?: '—' }}
                                </span>
                            </td>
                            
                            <td class="text-center">
                                <div class="btn-group btn-group-sm" role="group">
                                    <!-- Bouton Éditer -->
                                    <button class="btn btn-outline-warning border-0 btn-hover-scale" 
                                            onclick="editRow({{ $region->id_region }})" 
                                            title="Éditer la région"
                                            data-bs-toggle="tooltip">
                                        <i class="bi bi-pencil"></i>
                                    </button>
                                    
                                    <!-- Bouton Voir -->
                                    <a href="{{ route('regions.show', $region->id_region) }}" 
                                       class="btn btn-outline-info border-0 btn-hover-scale" 
                                       title="Voir les détails"
                                       data-bs-toggle="tooltip">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    
                                    <!-- Bouton Supprimer -->
                                    <form action="{{ route('regions.destroy', $region->id_region) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="btn btn-outline-danger border-0 btn-hover-scale" 
                                                onclick="return confirm('Supprimer la région « {{ $region->nom_region }} » ?')" 
                                                title="Supprimer la région"
                                                data-bs-toggle="tooltip">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach

                        @if($regions->isEmpty())
                        <tr>
                            <td colspan="7" class="text-center py-5 text-muted">
                                <i class="bi bi-inbox display-4 d-block mb-2"></i>
                                Aucune région trouvée
                                <br>
                                <a href="{{ route('regions.create') }}" class="btn btn-primary btn-sm mt-2">
                                    <i class="bi bi-plus-circle me-1"></i>Ajouter la première région
                                </a>
                            </td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Pied de table -->
        @if($regions->isNotEmpty())
        <div class="card-footer bg-white py-3">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <p class="mb-0 text-muted small">
                        Affichage de <strong>{{ $regions->count() }}</strong> région(s)
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
        $('#regionsTable').DataTable({
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

    let editingRow = null;

    // --- Éditer une cellule ---
    function editCell(cell, field, id) {
        if (editingRow) {
            cancelEdit();
        }

        const spanElement = cell.querySelector(`.region-${field}`);
        let originalValue = spanElement ? spanElement.textContent : '';
        
        // Nettoyer les formats numériques
        if (field === 'population' || field === 'superficie') {
            originalValue = originalValue.replace(/[^\d,]/g, '').replace(',', '');
        }
        
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
        } else if (field === 'population' || field === 'superficie') {
            inputHtml = `
                <input type="number" 
                       class="form-control form-control-sm border-primary text-end" 
                       value="${originalValue}" 
                       onkeypress="handleKeyPress(event, ${id}, '${field}')"
                       onblur="cancelEdit()"
                       style="min-width: 100px;">
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

    // --- Éditer la localisation ---
    function editLocalisation(id) {
        if (editingRow) {
            cancelEdit();
        }

        const cell = document.querySelector(`#region-${id} td:nth-child(6)`);
        const spanElement = cell.querySelector('.region-localisation');
        const originalValue = spanElement ? spanElement.textContent : '';
        
        cell.classList.add('editing');
        
        const inputHtml = `
            <select class="form-control form-control-sm border-primary" 
                    onchange="updateLocalisationValue(${id}, this.value)"
                    onblur="cancelEdit()">
                <option value="Sud" ${originalValue === 'Sud' ? 'selected' : ''}>Sud</option>
                <option value="Nord" ${originalValue === 'Nord' ? 'selected' : ''}>Nord</option>
                <option value="Est" ${originalValue === 'Est' ? 'selected' : ''}>Est</option>
                <option value="Ouest" ${originalValue === 'Ouest' ? 'selected' : ''}>Ouest</option>
                <option value="Centre" ${originalValue === 'Centre' ? 'selected' : ''}>Centre</option>
                <option value="Nord-Est" ${originalValue === 'Nord-Est' ? 'selected' : ''}>Nord-Est</option>
                <option value="Nord-Ouest" ${originalValue === 'Nord-Ouest' ? 'selected' : ''}>Nord-Ouest</option>
                <option value="Sud-Est" ${originalValue === 'Sud-Est' ? 'selected' : ''}>Sud-Est</option>
                <option value="Sud-Ouest" ${originalValue === 'Sud-Ouest' ? 'selected' : ''}>Sud-Ouest</option>
            </select>
        `;
        
        cell.innerHTML = inputHtml;
        
        const select = cell.querySelector('select');
        select.focus();
        
        editingRow = { cell, field: 'localisation', id, originalValue, spanElement };
    }

    // --- Mettre à jour la localisation ---
    function updateLocalisationValue(id, value) {
        const data = { localisation: value };

        fetch(`/regions/${id}/api-update`, {
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
                const cell = editingRow.cell;
                cell.innerHTML = `<span class="badge bg-info region-localisation">${value}</span>`;
                cell.classList.remove('editing');
                editingRow = null;
                
                showNotification('Localisation mise à jour avec succès', 'success');
            } else {
                showNotification('Erreur lors de la mise à jour', 'error');
                cancelEdit();
            }
        })
        .catch(error => {
            console.error('Error:', error);
            showNotification('Erreur lors de la mise à jour', 'error');
            cancelEdit();
        });
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

        fetch(`/regions/${id}/api-update`, {
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
                let displayValue = value;
                
                // Formater l'affichage
                if (field === 'population' && value) {
                    displayValue = parseInt(value).toLocaleString('fr-FR');
                } else if (field === 'superficie' && value) {
                    displayValue = parseInt(value).toLocaleString('fr-FR') + ' km²';
                }
                
                if (field === 'nom_region') {
                    cell.innerHTML = `
                        <div class="d-flex align-items-center">
                            <i class="bi bi-geo me-2 text-primary"></i>
                            <span class="region-nom_region fw-medium">${displayValue}</span>
                        </div>
                    `;
                } else if (field === 'localisation') {
                    cell.innerHTML = `<span class="badge bg-info region-localisation">${displayValue}</span>`;
                } else {
                    cell.innerHTML = `<span class="region-${field} ${field === 'population' || field === 'superficie' ? 'text-end' : ''}">${displayValue}</span>`;
                }
                
                cell.classList.remove('editing');
                editingRow = null;
                
                showNotification('Région mise à jour avec succès', 'success');
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
            
            let displayValue = originalValue;
            
            if (field === 'nom_region') {
                cell.innerHTML = `
                    <div class="d-flex align-items-center">
                        <i class="bi bi-geo me-2 text-primary"></i>
                        <span class="region-nom_region fw-medium">${displayValue}</span>
                    </div>
                `;
            } else if (field === 'localisation') {
                cell.innerHTML = `<span class="badge bg-info region-localisation">${displayValue}</span>`;
            } else {
                cell.innerHTML = `<span class="region-${field} ${field === 'population' || field === 'superficie' ? 'text-end' : ''}">${displayValue}</span>`;
            }
            
            editingRow = null;
        }
    }

    // --- Éditer une ligne complète ---
    function editRow(id) {
        window.location.href = `/regions/${id}/edit`;
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
    .text-end {
        text-align: right;
    }
</style>

@endsection