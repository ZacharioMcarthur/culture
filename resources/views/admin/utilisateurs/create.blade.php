@extends('admin.layout')

@section('title', 'Ajouter un utilisateur')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('admin.utilisateurs.index') }}">Utilisateurs</a></li>
    <li class="breadcrumb-item active">Ajouter</li>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Ajouter un nouvel utilisateur</h3>
        </div>
        <form action="{{ route('admin.utilisateurs.store') }}" method="POST">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nom">Nom *</label>
                            <input type="text" class="form-control @error('nom') is-invalid @enderror"
                                   id="nom" name="nom" value="{{ old('nom') }}" required>
                            @error('nom')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="prenom">Prénom</label>
                            <input type="text" class="form-control @error('prenom') is-invalid @enderror"
                                   id="prenom" name="prenom" value="{{ old('prenom') }}">
                            @error('prenom')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email">Email *</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                   id="email" name="email" value="{{ old('email') }}" required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="sexe">Sexe *</label>
                            <select class="form-control @error('sexe') is-invalid @enderror" id="sexe" name="sexe" required>
                                <option value="">Sélectionner</option>
                                <option value="M" {{ old('sexe') === 'M' ? 'selected' : '' }}>Homme</option>
                                <option value="F" {{ old('sexe') === 'F' ? 'selected' : '' }}>Femme</option>
                                <option value="Autre" {{ old('sexe') === 'Autre' ? 'selected' : '' }}>Autre</option>
                            </select>
                            @error('sexe')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="mot_de_passe">Mot de passe *</label>
                            <input type="password" class="form-control @error('mot_de_passe') is-invalid @enderror"
                                   id="mot_de_passe" name="mot_de_passe" required>
                            @error('mot_de_passe')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="mot_de_passe_confirmation">Confirmer le mot de passe *</label>
                            <input type="password" class="form-control"
                                   id="mot_de_passe_confirmation" name="mot_de_passe_confirmation" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="date_naissance">Date de naissance</label>
                            <input type="date" class="form-control @error('date_naissance') is-invalid @enderror"
                                   id="date_naissance" name="date_naissance" value="{{ old('date_naissance') }}">
                            @error('date_naissance')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="id_role">Rôle</label>
                            <select class="form-control @error('id_role') is-invalid @enderror" id="id_role" name="id_role">
                                <option value="">Aucun rôle</option>
                                @foreach($roles as $role)
                                    <option value="{{ $role->id_role }}" {{ old('id_role') == $role->id_role ? 'selected' : '' }}>
                                        {{ $role->nom_role }}
                                    </option>
                                @endforeach
                            </select>
                            @error('id_role')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="id_langue">Langue</label>
                            <select class="form-control @error('id_langue') is-invalid @enderror" id="id_langue" name="id_langue">
                                <option value="">Aucune langue</option>
                                @foreach($langues as $langue)
                                    <option value="{{ $langue->id_langue }}" {{ old('id_langue') == $langue->id_langue ? 'selected' : '' }}>
                                        {{ $langue->nom }} ({{ $langue->code }})
                                    </option>
                                @endforeach
                            </select>
                            @error('id_langue')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="statut">Statut</label>
                            <div class="custom-control custom-switch">
                                <input type="hidden" name="statut" value="0">
                                <input type="checkbox" class="custom-control-input" id="statut" name="statut" value="1" {{ old('statut', 1) ? 'checked' : '' }}>
                                <label class="custom-control-label" for="statut">Actif</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Créer l'utilisateur</button>
                <a href="{{ route('admin.utilisateurs.index') }}" class="btn btn-secondary">Annuler</a>
            </div>
        </form>
    </div>
@endsection

