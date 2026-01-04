@extends('layouts.app')

@section('title', $contenu->titre)

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">{{ $contenu->titre }}</h5>
                </div>
                <div class="card-body">
                    @if($needsPayment)
                        <div class="alert alert-warning">
                            <h5><i class="fas fa-lock"></i> Contenu Premium</h5>
                            <p>Ce contenu est réservé aux membres premium. Accédez-y pour seulement 100 FCFA.</p>
                            <div class="d-flex gap-2">
                                <a href="{{ route('payment.initiate', $contenu->id) }}" class="btn btn-primary">
                                    <i class="fas fa-credit-card"></i> Payer 100 FCFA
                                </a>
                                <a href="{{ route('contenustous') }}" class="btn btn-secondary">
                                    <i class="fas fa-arrow-left"></i> Retour
                                </a>
                            </div>
                        </div>
                    @else
                        @if($contenu->image)
                            <img src="{{ asset('storage/' . $contenu->image) }}" class="img-fluid mb-3" alt="{{ $contenu->titre }}">
                        @endif
                        
                        <div class="mb-3">
                            <span class="badge bg-primary">{{ $contenu->typeContenu->nom ?? 'N/A' }}</span>
                            @if($contenu->statut === 'payant')
                                <span class="badge bg-warning ms-1">Premium</span>
                            @endif
                        </div>

                        <div class="contenu-content">
                            {!! $contenu->contenu !!}
                        </div>

                        @if($contenu->medias->count() > 0)
                            <hr>
                            <h6>Médias associés:</h6>
                            <div class="row">
                                @foreach($contenu->medias as $media)
                                    <div class="col-md-4 mb-3">
                                        <div class="card">
                                            @if($media->type === 'image')
                                                <img src="{{ asset('storage/' . $media->url) }}" class="card-img-top" alt="{{ $media->titre }}">
                                            @else
                                                <div class="card-body text-center">
                                                    <i class="fas fa-file fa-2x"></i>
                                                    <p class="mb-0">{{ $media->titre }}</p>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif

                        <hr>
                        
                        <!-- Section commentaires -->
                        <div class="comments-section">
                            <h6>Commentaires ({{ $contenu->commentaires->count() }})</h6>
                            
                            @if(Auth::check())
                                <form action="{{ route('commentaires.userStore') }}" method="POST" class="mb-4">
                                    @csrf
                                    <input type="hidden" name="contenu_id" value="{{ $contenu->id }}">
                                    <div class="mb-3">
                                        <textarea name="contenu" class="form-control" rows="3" 
                                                  placeholder="Laissez votre commentaire..." required></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-paper-plane"></i> Envoyer
                                    </button>
                                </form>
                            @else
                                <p class="text-muted">
                                    <a href="{{ route('login') }}">Connectez-vous</a> pour laisser un commentaire.
                                </p>
                            @endif

                            @if($contenu->commentaires->count() > 0)
                                <div class="comments-list">
                                    @foreach($contenu->commentaires as $commentaire)
                                        <div class="card mb-2">
                                            <div class="card-body">
                                                <div class="d-flex justify-content-between">
                                                    <strong>{{ $commentaire->user->name }}</strong>
                                                    <small class="text-muted">{{ $commentaire->created_at->format('d/m/Y H:i') }}</small>
                                                </div>
                                                <p class="mb-0 mt-2">{{ $commentaire->contenu }}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
