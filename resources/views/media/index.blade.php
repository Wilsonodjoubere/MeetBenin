@extends('layout')
@section('title', 'Médias')

@section('content')

<div class="container mt-4">
    <h2 class="mb-4">Gestion des Médias</h2>

    <div class="card shadow-sm">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span class="fw-bold">Liste des Médias</span>
            <a href="#" class="btn btn-primary" onclick="addNewMedia()">
                <i class="bi bi-plus-circle"></i> Ajouter un média
            </a>
        </div>

        <div class="card-body p-0">
            <table class="table table-striped mb-0">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Chemin</th>
                        <th>Description</th>
                        <th>Type Média</th>
                        <th>Contenu Associé</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="mediasTableBody">
                    <!-- Les données seront chargées dynamiquement -->
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal pour confirmer la suppression -->
<div class="modal fade" id="deleteModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Confirmer la suppression</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                Êtes-vous sûr de vouloir supprimer ce média ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                <button type="button" class="btn btn-danger" id="confirmDelete">Supprimer</button>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>

<script>
    // --- Données Médias avec valeurs déjà ajoutées ---
    let medias = [
        { 
            id: 1, 
            chemin: "/images/dahomey.jpg", 
            description: "Portrait du Roi Béhanzin",
            type: "Image",
            contenu: "Histoire du Royaume du Dahomey"
        },
        { 
            id: 2, 
            chemin: "/videos/danses.mp4", 
            description: "Cérémonie traditionnelle",
            type: "Vidéo", 
            contenu: "Danses traditionnelles du Sud"
        },
        { 
            id: 3, 
            chemin: "/audio/chants.mp3", 
            description: "Chants sacrés Yoruba",
            type: "Audio",
            contenu: "Culture Yoruba au Bénin"
        },
        { 
            id: 4, 
            chemin: "/images/cuisine.jpg", 
            description: "Préparation du plat local",
            type: "Image",
            contenu: "Recettes culinaires locales"
        }
    ];

    let mediaToDelete = null;
    let editingRow = null;

    // --- Affichage dans le tableau ---
    function loadMedias() {
        let tbody = document.getElementById("mediasTableBody");
        tbody.innerHTML = "";

        medias.forEach((m) => {
            const row = document.createElement('tr');
            row.innerHTML = `
                <td>${m.id}</td>
                <td class="editable" onclick="editCell(this, 'chemin', ${m.id})">
                    <div class="text-truncate" style="max-width: 150px;" title="${m.chemin}">
                        ${m.chemin}
                    </div>
                </td>
                <td class="editable" onclick="editCell(this, 'description', ${m.id})">
                    <div class="text-truncate" style="max-width: 200px;" title="${m.description}">
                        ${m.description}
                    </div>
                </td>
                <td class="editable" onclick="editType(${m.id})">
                    <span class="badge bg-primary">${m.type}</span>
                </td>
                <td class="editable" onclick="editCell(this, 'contenu', ${m.id})">
                    <div class="text-truncate" style="max-width: 150px;" title="${m.contenu}">
                        ${m.contenu}
                    </div>
                </td>
                <td>
                    <div class="btn-group">
                        <button class="btn btn-info btn-sm text-white" onclick="updateMedia(${m.id})" title="Mettre à jour">
                            <i class="bi bi-check-circle"></i>
                        </button>
                        <button class="btn btn-danger btn-sm" onclick="confirmDelete(${m.id})" title="Supprimer">
                            <i class="bi bi-trash"></i>
                        </button>
                    </div>
                </td>
            `;
            tbody.appendChild(row);
        });
    }

    // --- Éditer une cellule texte ---
    function editCell(cell, field, id) {
        if (editingRow) {
            cancelEdit();
        }

        const media = medias.find(med => med.id === id);
        const originalValue = media[field];
        
        cell.classList.add('editing');
        cell.innerHTML = `
            <input type="text" 
                   class="form-control form-control-sm" 
                   value="${originalValue}" 
                   onkeypress="handleKeyPress(event, ${id}, '${field}')"
                   onblur="cancelEdit()">
        `;
        
        const input = cell.querySelector('input');
        input.focus();
        input.select();
        
        editingRow = { cell, field, id, originalValue };
    }

    // --- Éditer le type ---
    function editType(id) {
        if (editingRow) {
            cancelEdit();
        }

        const media = medias.find(med => med.id === id);
        const originalValue = media.type;
        
        const cell = document.querySelector(`tr:has(button[onclick="updateMedia(${id})"]) td:nth-child(4)`);
        cell.classList.add('editing');
        
        cell.innerHTML = `
            <select class="form-control form-control-sm" 
                    onchange="updateTypeValue(${id}, this.value)"
                    onblur="cancelEdit()">
                <option value="Image" ${originalValue === 'Image' ? 'selected' : ''}>Image</option>
                <option value="Vidéo" ${originalValue === 'Vidéo' ? 'selected' : ''}>Vidéo</option>
                <option value="Audio" ${originalValue === 'Audio' ? 'selected' : ''}>Audio</option>
                <option value="Document" ${originalValue === 'Document' ? 'selected' : ''}>Document</option>
            </select>
        `;
        
        const select = cell.querySelector('select');
        select.focus();
        
        editingRow = { cell, field: 'type', id, originalValue };
    }

    // --- Mettre à jour le type ---
    function updateTypeValue(id, value) {
        const media = medias.find(med => med.id === id);
        if (media) {
            media.type = value;
            loadMedias();
        }
        editingRow = null;
    }

    // --- Gérer la touche Entrée ---
    function handleKeyPress(event, id, field) {
        if (event.key === 'Enter') {
            updateCellValue(id, field, event.target.value);
        } else if (event.key === 'Escape') {
            cancelEdit();
        }
    }

    // --- Mettre à jour la valeur d'une cellule ---
    function updateCellValue(id, field, value) {
        const media = medias.find(med => med.id === id);
        if (media) {
            media[field] = value;
            loadMedias();
        }
        editingRow = null;
    }

    // --- Annuler l'édition ---
    function cancelEdit() {
        if (editingRow) {
            const { cell, originalValue } = editingRow;
            cell.classList.remove('editing');
            
            if (editingRow.field === 'type') {
                cell.innerHTML = `<span class="badge bg-primary">${originalValue}</span>`;
            } else {
                cell.innerHTML = originalValue;
            }
            
            editingRow = null;
        }
    }

    // --- Mettre à jour un média ---
    function updateMedia(id) {
        const media = medias.find(med => med.id === id);
        if (media) {
            alert(`Média "${media.description}" mis à jour avec succès !`);
            loadMedias();
        }
    }

    // --- Confirmer la suppression ---
    function confirmDelete(id) {
        mediaToDelete = id;
        const deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'));
        deleteModal.show();
    }

    // --- Supprimer un média ---
    function deleteMedia() {
        if (mediaToDelete) {
            const media = medias.find(med => med.id === mediaToDelete);
            medias = medias.filter(med => med.id !== mediaToDelete);
            loadMedias();
            
            alert(`Média "${media.description}" supprimé avec succès !`);
            mediaToDelete = null;
            
            const deleteModal = bootstrap.Modal.getInstance(document.getElementById('deleteModal'));
            deleteModal.hide();
        }
    }

    // --- Ajouter un nouveau média ---
    function addNewMedia() {
        const newId = medias.length > 0 ? Math.max(...medias.map(med => med.id)) + 1 : 1;
        const newMedia = {
            id: newId,
            chemin: '/nouveau/chemin',
            description: 'Nouvelle description',
            type: 'Image',
            contenu: 'Nouveau contenu'
        };
        
        medias.push(newMedia);
        loadMedias();
        
        // Focus sur la nouvelle ligne
        setTimeout(() => {
            const lastRow = document.querySelector('#mediasTableBody tr:last-child');
            if (lastRow) {
                const firstCell = lastRow.querySelector('.editable');
                if (firstCell) {
                    firstCell.click();
                }
            }
        }, 100);
    }

    // --- Initialiser les événements ---
    document.addEventListener('DOMContentLoaded', function() {
        loadMedias();
        document.getElementById('confirmDelete').addEventListener('click', deleteMedia);
        
        document.getElementById('deleteModal').addEventListener('hidden.bs.modal', function() {
            mediaToDelete = null;
        });
    });
</script>

<style>
    .editable {
        cursor: pointer;
        transition: background-color 0.2s;
    }
    .editable:hover {
        background-color: #f8f9fa;
    }
    .editing {
        background-color: #e3f2fd;
    }
    .table th {
        background-color: #f8f9fa;
        font-weight: 600;
        border-bottom: 2px solid #dee2e6;
    }
    .btn-group .btn {
        margin: 0 2px;
    }
    .badge {
        font-size: 0.85em;
        padding: 0.4em 0.6em;
    }
    .card-header {
        background-color: #f8f9fa;
        border-bottom: 1px solid #dee2e6;
        padding: 1rem 1.25rem;
    }
    .text-truncate {
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }
</style>

@endsection