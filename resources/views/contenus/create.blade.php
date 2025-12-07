@extends('layout')

@section('title', 'Créer un Contenu')

@section('content')

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-sm">
                <div class="card-header">
                    <h4 class="mb-0">Créer un Nouveau Contenu</h4>
                </div>
                <div class="card-body">
                    
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

                    <form action="{{ route('contenus.store') }}" method="POST">
                        @csrf
                        
                        <div class="row">
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label for="titre" class="form-label">Titre du contenu <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('titre') is-invalid @enderror" 
                                           id="titre" name="titre" 
                                           value="{{ old('titre') }}" 
                                           placeholder="Ex: Histoire du Royaume du Dahomey..." required>
                                    @error('titre')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="parent_id" class="form-label">Contenu parent</label>
                                    <select class="form-select @error('parent_id') is-invalid @enderror" 
                                            id="parent_id" name="parent_id">
                                        <option value="">Aucun (contenu principal)</option>
                                        @foreach($contenusParents as $parent)
                                            <option value="{{ $parent->id_contenu }}" {{ old('parent_id') == $parent->id_contenu ? 'selected' : '' }}>
                                                {{ $parent->titre }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('parent_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="texte" class="form-label">Contenu <span class="text-danger">*</span></label>
                            <textarea class="form-control @error('texte') is-invalid @enderror" 
                                      id="texte" name="texte" 
                                      rows="8" placeholder="Rédigez votre contenu ici..." required>{{ old('texte') }}</textarea>
                            @error('texte')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="id_region" class="form-label">Région <span class="text-danger">*</span></label>
                                    <select class="form-select @error('id_region') is-invalid @enderror" 
                                            id="id_region" name="id_region" required>
                                        <option value="">Sélectionnez une région</option>
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
                            </div>
                            
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="id_langue" class="form-label">Langue <span class="text-danger">*</span></label>
                                    <select class="form-select @error('id_langue') is-invalid @enderror" 
                                            id="id_langue" name="id_langue" required>
                                        <option value="" disabled selected>Sélectionnez une langue</option>
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
                            </div>
                            
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="id_type_contenu" class="form-label">Type de contenu <span class="text-danger">*</span></label>
                                    <select class="form-select @error('id_type_contenu') is-invalid @enderror" 
                                            id="id_type_contenu" name="id_type_contenu" required>
                                        <option value="">Sélectionnez un type</option>
                                        @foreach($typesContenu as $type)
                                            <option value="{{ $type->id_type_contenu }}" {{ old('id_type_contenu') == $type->id_type_contenu ? 'selected' : '' }}>
                                                {{ $type->nom_type_contenu }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('id_type_contenu')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="statut" class="form-label">Statut <span class="text-danger">*</span></label>
                                    <select class="form-select @error('statut') is-invalid @enderror" 
                                            id="statut" name="statut" required>
                                        <option value="brouillon" {{ old('statut') == 'brouillon' ? 'selected' : '' }}>Brouillon</option>
                                        <option value="en_attente" {{ old('statut') == 'en_attente' ? 'selected' : '' }}>En attente</option>
                                        <option value="approuve" {{ old('statut') == 'approuve' ? 'selected' : '' }}>Approuvé</option>
                                        <option value="rejete" {{ old('statut') == 'rejete' ? 'selected' : '' }}>Rejeté</option>
                                    </select>
                                    @error('statut')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="id_auteur" class="form-label">Auteur <span class="text-danger">*</span></label>
                                    <select class="form-select @error('id_auteur') is-invalid @enderror" 
                                            id="id_auteur" name="id_auteur" required>
                                        <option value="">Sélectionnez un auteur</option>
                                        @foreach($utilisateurs as $utilisateur)
                                            <option value="{{ $utilisateur->id_utilisateur }}" {{ old('id_auteur') == $utilisateur->id_utilisateur ? 'selected' : '' }}>
                                                {{ $utilisateur->prenom }} {{ $utilisateur->nom }} ({{ $utilisateur->role->nom_role ?? '—' }})
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('id_auteur')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="id_moderateur" class="form-label">Modérateur</label>
                                    <select class="form-select @error('id_moderateur') is-invalid @enderror" 
                                            id="id_moderateur" name="id_moderateur">
                                        <option value="">Aucun modérateur</option>
                                        @foreach($utilisateurs as $utilisateur)
                                            @if(in_array($utilisateur->role->nom_role ?? '', ['Administrateur', 'Moderateur']))
                                                <option value="{{ $utilisateur->id_utilisateur }}" {{ old('id_moderateur') == $utilisateur->id_utilisateur ? 'selected' : '' }}>
                                                    {{ $utilisateur->prenom }} {{ $utilisateur->nom }} ({{ $utilisateur->role->nom_role ?? '—' }})
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @error('id_moderateur')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <div class="form-text">Optionnel - pour l'approbation du contenu</div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('contenus.index') }}" class="btn btn-secondary">
                                <i class="bi bi-arrow-left"></i> Retour à la liste
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-check-circle"></i> Créer le contenu
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