@extends('layout')
@section('title', 'Ajouter un Rôle')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header">
                    <h4 class="mb-0">Ajouter un Nouveau Rôle</h4>
                </div>
                <div class="card-body">
                    
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('roles.store') }}" method="POST">
                        @csrf
                        
                        <div class="mb-3">
                            <label for="nom_role" class="form-label">Nom du rôle <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('nom_role') is-invalid @enderror" 
                                   id="nom_role" name="nom_role" 
                                   value="{{ old('nom_role') }}" 
                                   placeholder="Ex: Administrateur, Éditeur..."
                                   required>
                            @error('nom_role')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('roles.index') }}" class="btn btn-secondary">
                                <i class="bi bi-arrow-left"></i> Retour à la liste
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-check-circle"></i> Créer le rôle
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .card-header {
        background-color: #f8f9fa;
        border-bottom: 1px solid #dee2e6;
        padding: 1rem 1.5rem;
    }
    .form-label {
        font-weight: 600;
        color: #495057;
    }
</style>
@endsection# Vérifiez votre statut Git
git status

# Vérifiez vos commits
git log --oneline

# Vérifiez vos branches
git branch