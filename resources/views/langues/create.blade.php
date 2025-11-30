@extends('layout')

@section('title', 'Ajouter une Langue')

@section('content')

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header">
                    <h4 class="mb-0">Ajouter une Nouvelle Langue</h4>
                </div>
                <div class="card-body">
                    
                    <!-- Message de succès -->
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <!-- Messages d'erreur -->
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('langues.store') }}" method="POST">
                        @csrf
                        
                        <div class="mb-3">
                            <label for="nom_langue" class="form-label">Nom de la langue <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('nom_langue') is-invalid @enderror" 
                                   id="nom_langue" name="nom_langue" 
                                   value="{{ old('nom_langue') }}" 
                                   placeholder="Ex: Français, Fon, Yoruba..." required>
                            @error('nom_langue')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="code_langue" class="form-label">Code de la langue <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('code_langue') is-invalid @enderror" 
                                   id="code_langue" name="code_langue" 
                                   value="{{ old('code_langue') }}" 
                                   placeholder="Ex: fr, fon, yor..." 
                                   maxlength="10" required>
                            <div class="form-text">Code court (max 10 caractères)</div>
                            @error('code_langue')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" 
                                      id="description" name="description" 
                                      rows="4" placeholder="Description de la langue...">{{ old('description') }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('langues.index') }}" class="btn btn-secondary">
                                <i class="bi bi-arrow-left"></i> Retour à la liste
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-check-circle"></i> Créer la langue
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
    .btn {
        padding: 0.5rem 1.5rem;
    }
</style>

@endsection