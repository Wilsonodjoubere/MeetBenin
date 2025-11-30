@extends('layout')

@section('title', 'Ajouter un Commentaire')

@section('content')

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header">
                    <h4 class="mb-0">Ajouter un Nouveau Commentaire</h4>
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

                    <form action="{{ route('commentaires.store') }}" method="POST">
                        @csrf
                        
                        <div class="mb-3">
                            <label for="id_utilisateur" class="form-label">Utilisateur <span class="text-danger">*</span></label>
                            <select class="form-control @error('id_utilisateur') is-invalid @enderror" 
                                    id="id_utilisateur" name="id_utilisateur" required>
                                <option value="">Sélectionner un utilisateur</option>
                                @foreach($utilisateurs as $utilisateur)
                                    <option value="{{ $utilisateur->id }}" {{ old('id_utilisateur') == $utilisateur->id ? 'selected' : '' }}>
                                        {{ $utilisateur->name }} ({{ $utilisateur->email }})
                                    </option>
                                @endforeach
                            </select>
                            @error('id_utilisateur')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="id_contenu" class="form-label">Contenu <span class="text-danger">*</span></label>
                            <select class="form-control @error('id_contenu') is-invalid @enderror" 
                                    id="id_contenu" name="id_contenu" required>
                                <option value="">Sélectionner un contenu</option>
                                @foreach($contenus as $contenu)
                                    <option value="{{ $contenu->id_contenu }}" {{ old('id_contenu') == $contenu->id_contenu ? 'selected' : '' }}>
                                        {{ $contenu->titre }}
                                    </option>
                                @endforeach
                            </select>
                            @error('id_contenu')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="texte" class="form-label">Commentaire <span class="text-danger">*</span></label>
                            <textarea class="form-control @error('texte') is-invalid @enderror" 
                                      id="texte" name="texte" 
                                      rows="4" 
                                      placeholder="Saisissez votre commentaire..." 
                                      required>{{ old('texte') }}</textarea>
                            @error('texte')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="note" class="form-label">Note</label>
                            <select class="form-control @error('note') is-invalid @enderror" 
                                    id="note" name="note">
                                <option value="">Sans note</option>
                                <option value="1" {{ old('note') == '1' ? 'selected' : '' }}>⭐ 1/5</option>
                                <option value="2" {{ old('note') == '2' ? 'selected' : '' }}>⭐⭐ 2/5</option>
                                <option value="3" {{ old('note') == '3' ? 'selected' : '' }}>⭐⭐⭐ 3/5</option>
                                <option value="4" {{ old('note') == '4' ? 'selected' : '' }}>⭐⭐⭐⭐ 4/5</option>
                                <option value="5" {{ old('note') == '5' ? 'selected' : '' }}>⭐⭐⭐⭐⭐ 5/5</option>
                            </select>
                            @error('note')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('commentaires.index') }}" class="btn btn-secondary">
                                <i class="bi bi-arrow-left"></i> Retour à la liste
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-check-circle"></i> Créer le commentaire
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