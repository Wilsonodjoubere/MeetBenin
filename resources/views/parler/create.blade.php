@extends('layout')

@section('title', 'Ajouter une Association Région-Langue')

@section('content')

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header">
                    <h4 class="mb-0">Ajouter une Nouvelle Association Région-Langue</h4>
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
                    @if(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('parler.store') }}" method="POST">
                        @csrf
                        
                        <div class="mb-3">
                            <label for="id_region" class="form-label">Région <span class="text-danger">*</span></label>
                            <select class="form-control @error('id_region') is-invalid @enderror" 
                                    id="id_region" name="id_region" required>
                                <option value="">Sélectionner une région</option>
                                @foreach($regions as $region)
                                    <option value="{{ $region->id_region }}" {{ old('id_region') == $region->id_region ? 'selected' : '' }}>
                                        {{ $region->nom_region }}
                                    </option>
                                @endforeach
                            </select>
                            @error('id_region')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="id_langue" class="form-label">Langue <span class="text-danger">*</span></label>
                            <select class="form-control @error('id_langue') is-invalid @enderror" 
                                    id="id_langue" name="id_langue" required>
                                <option value="">Sélectionner une langue</option>
                                @foreach($langues as $langue)
                                    <option value="{{ $langue->id_langue }}" {{ old('id_langue') == $langue->id_langue ? 'selected' : '' }}>
                                        {{ $langue->nom_langue }} ({{ $langue->code_langue }})
                                    </option>
                                @endforeach
                            </select>
                            @error('id_langue')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="alert alert-info">
                            <div class="d-flex align-items-center">
                                <i class="bi bi-info-circle me-2"></i>
                                <div>
                                    <strong>Information :</strong> Cette association indique que la langue sélectionnée est parlée dans la région choisie.
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('parler.index') }}" class="btn btn-secondary">
                                <i class="bi bi-arrow-left"></i> Retour à la liste
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-check-circle"></i> Créer l'association
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
    .alert-info {
        border-left: 4px solid #0dcaf0;
    }
</style>

@endsection