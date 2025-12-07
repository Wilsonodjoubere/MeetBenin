

<?php $__env->startSection('title', 'Types de Média'); ?>

<?php $__env->startSection('content'); ?>

<div class="container-fluid px-4">
    <!-- Fil d'Ariane -->
    <nav aria-label="breadcrumb" class="mb-3">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>">Accueil</a></li>
            <li class="breadcrumb-item active">Types de Média</li>
        </ol>
    </nav>

    <!-- En-tête de page -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h4 mb-1 text-gray-800">Types de Média</h1>
            <p class="text-muted mb-0">Administrez les types de média disponibles dans le système</p>
        </div>
        <a href="<?php echo e(route('types_media.create')); ?>" class="btn btn-primary btn-sm">
            <i class="bi bi-plus-circle me-1"></i>Nouveau type
        </a>
    </div>

    <!-- Message de succès -->
    <?php if(session('success')): ?>
        <div class="alert alert-success alert-dismissible fade show shadow-sm mb-4" role="alert">
            <div class="d-flex align-items-center">
                <i class="bi bi-check-circle-fill me-2"></i>
                <div class="flex-grow-1">
                    <strong>Succès !</strong> <?php echo e(session('success')); ?>

                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        </div>
    <?php endif; ?>

    <!-- Carte principale -->
    <div class="card shadow-sm border-0">
        <div class="card-header bg-white py-3 border-bottom">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0 text-primary fs-6">
                    <i class="bi bi-collection-play-fill me-2"></i>Liste des types de média
                </h5>
                <span class="badge bg-light text-dark fs-6"><?php echo e($typesMedia->count()); ?> type(s)</span>
            </div>
        </div>

        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0" id="typesMediaTable">
                    <thead class="table-light">
                        <tr>
                            <th width="80" class="ps-4">#ID</th>
                            <th>Nom</th>
                            <th width="120">Code</th>
                            <th>Description</th>
                            <th width="100" class="text-center">Statut</th>
                            <th width="150" class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $typesMedia; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr id="type-<?php echo e($type->id); ?>">
                            <td class="ps-4 fw-semibold text-muted">
                                #<?php echo e($type->id); ?>

                            </td>
                            
                            <td class="editable" onclick="editCell(this, 'nom', <?php echo e($type->id); ?>)">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-file-earmark-medical me-2 text-primary"></i>
                                    <span class="type-nom fw-medium"><?php echo e($type->nom); ?></span>
                                </div>
                            </td>
                            
                            <td class="editable" onclick="editCell(this, 'code', <?php echo e($type->id); ?>)">
                                <span class="badge bg-primary type-code px-2 py-1">
                                    <?php echo e($type->code); ?>

                                </span>
                            </td>
                            
                            <td class="editable" onclick="editCell(this, 'description', <?php echo e($type->id); ?>)">
                                <span class="type-description text-muted small">
                                    <?php echo e($type->description ?: '—'); ?>

                                </span>
                            </td>
                            
                            <td class="text-center">
                                <span class="badge bg-<?php echo e($type->statut ? 'success' : 'danger'); ?> type-statut">
                                    <?php echo e($type->statut ? 'Actif' : 'Inactif'); ?>

                                </span>
                            </td>
                            
                            <td class="text-center">
                                <div class="btn-group btn-group-sm" role="group">
                                    <!-- Bouton Éditer -->
                                    <button class="btn btn-outline-warning border-0 btn-hover-scale" 
                                            onclick="editRow(<?php echo e($type->id); ?>)" 
                                            title="Éditer le type"
                                            data-bs-toggle="tooltip">
                                        <i class="bi bi-pencil"></i>
                                    </button>
                                    
                                    <!-- Bouton Voir -->
                                    <a href="<?php echo e(route('types-media.show', $type->id)); ?>" 
                                       class="btn btn-outline-info border-0 btn-hover-scale" 
                                       title="Voir les détails"
                                       data-bs-toggle="tooltip">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    
                                    <!-- Bouton Supprimer -->
                                    <form action="<?php echo e(route('types-media.destroy', $type->id)); ?>" method="POST" class="d-inline">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit" 
                                                class="btn btn-outline-danger border-0 btn-hover-scale" 
                                                onclick="return confirm('Supprimer le type « <?php echo e($type->nom); ?> » ?')" 
                                                title="Supprimer le type"
                                                data-bs-toggle="tooltip">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        <?php if($typesMedia->isEmpty()): ?>
                        <tr>
                            <td colspan="6" class="text-center py-5 text-muted">
                                <i class="bi bi-inbox display-4 d-block mb-2"></i>
                                Aucun type de média trouvé
                                <br>
                                <a href="<?php echo e(route('types_media.create')); ?>" class="btn btn-primary btn-sm mt-2">
                                    <i class="bi bi-plus-circle me-1"></i>Ajouter le premier type
                                </a>
                            </td>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Pied de table -->
        <?php if($typesMedia->isNotEmpty()): ?>
        <div class="card-footer bg-white py-3">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <p class="mb-0 text-muted small">
                        Affichage de <strong><?php echo e($typesMedia->count()); ?></strong> type(s)
                    </p>
                </div>
                <div class="col-md-6 text-end">
                    <small class="text-muted">Dernière mise à jour : <?php echo e(now()->format('d/m/Y H:i')); ?></small>
                </div>
            </div>
        </div>
        <?php endif; ?>
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
                <p class="mb-0 small">Êtes-vous sûr de vouloir supprimer ce type de média ?</p>
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
        $('#typesMediaTable').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.13.6/i18n/fr-FR.json"
            },
            "pageLength": 10,
            "lengthMenu": [10, 25, 50, 100],
            "order": [[0, 'asc']],
            "responsive": true,
            "dom": '<"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>rt<"row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
            "columnDefs": [
                { "orderable": false, "targets": [5] } // Désactiver le tri sur la colonne Actions
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

        const spanElement = cell.querySelector(`.type-${field}`);
        const originalValue = spanElement ? spanElement.textContent : '';
        
        cell.classList.add('editing');
        
        let inputHtml = '';
        if (field === 'code') {
            inputHtml = `
                <input type="text" 
                       class="form-control form-control-sm border-primary" 
                       value="${originalValue}" 
                       onkeypress="handleKeyPress(event, ${id}, '${field}')"
                       onblur="cancelEdit()"
                       maxlength="10"
                       style="min-width: 80px;">
            `;
        } else if (field === 'description') {
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

        fetch(`/types-media/${id}/api-update`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
            },
            body: JSON.stringify(data)
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Mettre à jour l'affichage
                const cell = editingRow.cell;
                if (field === 'code') {
                    cell.innerHTML = `<span class="badge bg-primary type-code px-2 py-1">${value}</span>`;
                } else if (field === 'nom') {
                    cell.innerHTML = `
                        <div class="d-flex align-items-center">
                            <i class="bi bi-file-earmark-medical me-2 text-primary"></i>
                            <span class="type-nom fw-medium">${value}</span>
                        </div>
                    `;
                } else {
                    cell.innerHTML = `<span class="type-${field} text-muted small">${value}</span>`;
                }
                cell.classList.remove('editing');
                editingRow = null;
                
                // Notification
                showNotification('Type de média mis à jour avec succès', 'success');
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
            
            if (field === 'code') {
                cell.innerHTML = `<span class="badge bg-primary type-code px-2 py-1">${originalValue}</span>`;
            } else if (field === 'nom') {
                cell.innerHTML = `
                    <div class="d-flex align-items-center">
                        <i class="bi bi-file-earmark-medical me-2 text-primary"></i>
                        <span class="type-nom fw-medium">${originalValue}</span>
                    </div>
                `;
            } else {
                cell.innerHTML = `<span class="type-${field} text-muted small">${originalValue}</span>`;
            }
            
            editingRow = null;
        }
    }

    // --- Éditer une ligne complète ---
    function editRow(id) {
        window.location.href = `/types-media/${id}/edit`;
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

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\CultureBenin\resources\views/types_media/index.blade.php ENDPATH**/ ?>