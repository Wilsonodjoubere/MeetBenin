@extends('layout')

@section('title', 'Ajouter une Région')

@section('content')

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header">
                    <h4 class="mb-0">Ajouter une Nouvelle Région</h4>
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

                    <form action="{{ route('regions.store') }}" method="POST">
                        @csrf
                        
                        <div class="mb-3">
                            <label for="nom_region" class="form-label">Nom de la région <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('nom_region') is-invalid @enderror" 
                                   id="nom_region" name="nom_region" 
                                   value="{{ old('nom_region') }}" 
                                   placeholder="Ex: Atlantique, Borgou, Zou..." required>
                            @error('nom_region')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="localisation" class="form-label">Localisation <span class="text-danger">*</span></label>
                            <select class="form-select @error('localisation') is-invalid @enderror" 
                                    id="localisation" name="localisation" required>
                                <option value="">Sélectionnez une zone</option>
                                <option value="Sud" {{ old('localisation') == 'Sud' ? 'selected' : '' }}>Sud</option>
                                <option value="Nord" {{ old('localisation') == 'Nord' ? 'selected' : '' }}>Nord</option>
                                <option value="Est" {{ old('localisation') == 'Est' ? 'selected' : '' }}>Est</option>
                                <option value="Ouest" {{ old('localisation') == 'Ouest' ? 'selected' : '' }}>Ouest</option>
                                <option value="Centre" {{ old('localisation') == 'Centre' ? 'selected' : '' }}>Centre</option>
                                <option value="Nord-Est" {{ old('localisation') == 'Nord-Est' ? 'selected' : '' }}>Nord-Est</option>
                                <option value="Nord-Ouest" {{ old('localisation') == 'Nord-Ouest' ? 'selected' : '' }}>Nord-Ouest</option>
                                <option value="Sud-Est" {{ old('localisation') == 'Sud-Est' ? 'selected' : '' }}>Sud-Est</option>
                                <option value="Sud-Ouest" {{ old('localisation') == 'Sud-Ouest' ? 'selected' : '' }}>Sud-Ouest</option>
                            </select>
                            @error('localisation')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" 
                                      id="description" name="description" 
                                      rows="4" placeholder="Description de la région...">{{ old('description') }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="population" class="form-label">Population</label>
                                <input type="number" class="form-control @error('population') is-invalid @enderror" 
                                       id="population" name="population" 
                                       value="{{ old('population') }}" 
                                       placeholder="Ex: 1500000"
                                       min="0">
                                <div class="form-text">Nombre d'habitants</div>
                                @error('population')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="superficie" class="form-label">Superficie</label>
                                <input type="number" class="form-control @error('superficie') is-invalid @enderror" 
                                       id="superficie" name="superficie" 
                                       value="{{ old('superficie') }}" 
                                       placeholder="Ex: 3200"
                                       min="0" step="0.01">
                                <div class="form-text">Superficie en km²</div>
                                @error('superficie')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('regions.index') }}" class="btn btn-secondary">
                                <i class="bi bi-arrow-left"></i> Retour à la liste
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-check-circle"></i> Créer la région
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
    .form-text {
        font-size: 0.875rem;
        color: #6c757d;
    }
</style>

@endsection