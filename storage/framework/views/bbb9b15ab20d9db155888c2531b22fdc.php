
<?php $__env->startSection('title', 'Rôles'); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid px-4">
    <nav aria-label="breadcrumb" class="mb-3">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>">Accueil</a></li>
            <li class="breadcrumb-item active">Rôles</li>
        </ol>
    </nav>

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h4 mb-1 text-gray-800">Rôles</h1>
            <p class="text-muted mb-0">Gestion des rôles utilisateurs</p>
        </div>
        <a href="<?php echo e(route('roles.create')); ?>" class="btn btn-primary btn-sm">
            <i class="bi bi-plus-circle me-1"></i>Nouveau rôle
        </a>
    </div>

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

    <div class="card shadow-sm border-0">
        <div class="card-header bg-white py-3 border-bottom">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0 text-primary fs-6">
                    <i class="bi bi-person-badge-fill me-2"></i>Liste des rôles
                </h5>
                <span class="badge bg-light text-dark fs-6"><?php echo e($roles->count()); ?> rôle(s)</span>
            </div>
        </div>

        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th width="80" class="ps-4">#ID</th>
                            <th>Nom du rôle</th>
                            <th width="150" class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td class="ps-4 fw-semibold text-muted">#<?php echo e($role->id); ?></td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-person-badge me-2 text-primary"></i>
                                    <span class="fw-medium"><?php echo e($role->nom_role); ?></span>
                                </div>
                            </td>
                            <td class="text-center">
                                <div class="btn-group btn-group-sm" role="group">
                                    <a href="<?php echo e(route('roles.edit', $role->id)); ?>" 
                                       class="btn btn-outline-warning border-0 btn-hover-scale" 
                                       title="Éditer le rôle"
                                       data-bs-toggle="tooltip">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    
                                    <a href="<?php echo e(route('roles.show', $role->id)); ?>" 
                                       class="btn btn-outline-info border-0 btn-hover-scale" 
                                       title="Voir les détails"
                                       data-bs-toggle="tooltip">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    
                                    <form action="<?php echo e(route('roles.destroy', $role->id)); ?>" method="POST" class="d-inline">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit" 
                                                class="btn btn-outline-danger border-0 btn-hover-scale" 
                                                onclick="return confirm('Supprimer le rôle « <?php echo e($role->nom_role); ?> » ?')" 
                                                title="Supprimer le rôle"
                                                data-bs-toggle="tooltip">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        <?php if($roles->isEmpty()): ?>
                        <tr>
                            <td colspan="3" class="text-center py-5 text-muted">
                                <i class="bi bi-inbox display-4 d-block mb-2"></i>
                                Aucun rôle trouvé
                                <br>
                                <a href="<?php echo e(route('roles.create')); ?>" class="btn btn-primary btn-sm mt-2">
                                    <i class="bi bi-plus-circle me-1"></i>Ajouter le premier rôle
                                </a>
                            </td>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

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
</style>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\CultureBenin\resources\views/roles/index.blade.php ENDPATH**/ ?>