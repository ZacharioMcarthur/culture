@extends('layouts.culture')

@section('title', $contenu->titre . ' - Culture Béninoise')

@section('content')
<!-- Content Header -->
<section class="section-culture bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <h1>{{ $contenu->titre }}</h1>
                <p class="text-muted">
                    <i class="fas fa-user"></i> Par {{ $contenu->auteur->prenom }} {{ $contenu->auteur->nom }} •
                    <i class="fas fa-map-marker-alt"></i> {{ $contenu->region->nom_region ?? 'N/A' }} •
                    <i class="fas fa-language"></i> {{ $contenu->langue->nom_langue ?? 'N/A' }} •
                    <i class="fas fa-calendar"></i> {{ \Carbon\Carbon::parse($contenu->date_creation)->format('d/m/Y') }}
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Content Body -->
<section class="section-culture">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <!-- Main Content -->
                <div class="card">
                    <div class="card-body">
                        @if($contenu->medias->where('id_type_media', 1)->count() > 0)
                            <div class="mb-4">
                                <div id="contentCarousel" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner">
                                        @foreach($contenu->medias->where('id_type_media', 1) as $index => $media)
                                        <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                            <img src="{{ asset($media->chemin) }}" class="d-block w-100" alt="{{ $media->description ?? $contenu->titre }}">
                                        </div>
                                        @endforeach
                                    </div>
                                    @if($contenu->medias->where('id_type_media', 1)->count() > 1)
                                    <a class="carousel-control-prev" href="#contentCarousel" role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#contentCarousel" role="button" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                    @endif
                                </div>
                            </div>
                        @endif

                        <div class="content-text">
                            {!! nl2br(e($contenu->texte)) !!}
                        </div>

                        @if($contenu->medias->where('id_type_media', 2)->count() > 0)
                            <div class="mt-4">
                                <h5>Médias Audio</h5>
                                @foreach($contenu->medias->where('id_type_media', 2) as $media)
                                <div class="mb-2">
                                    <audio controls class="w-100">
                                        <source src="{{ asset($media->chemin) }}" type="audio/mpeg">
                                        Votre navigateur ne supporte pas l'audio.
                                    </audio>
                                    @if($media->description)
                                        <small class="text-muted">{{ $media->description }}</small>
                                    @endif
                                </div>
                                @endforeach
                            </div>
                        @endif

                        @if($contenu->medias->where('id_type_media', 3)->count() > 0)
                            <div class="mt-4">
                                <h5>Vidéos</h5>
                                @foreach($contenu->medias->where('id_type_media', 3) as $media)
                                <div class="mb-3">
                                    <video controls class="w-100">
                                        <source src="{{ asset($media->chemin) }}" type="video/mp4">
                                        Votre navigateur ne supporte pas la vidéo.
                                    </video>
                                    @if($media->description)
                                        <small class="text-muted">{{ $media->description }}</small>
                                    @endif
                                </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Comments Section -->
                <div class="card mt-4">
                    <div class="card-header">
                        <h4>Commentaires et Notes</h4>
                    </div>
                    <div class="card-body">
                        @if($commentaires->count() > 0)
                            @foreach($commentaires as $commentaire)
                            <div class="comment mb-3 p-3 border rounded">
                                <div class="d-flex justify-content-between align-items-start">
                                    <div>
                                        <strong>{{ $commentaire->utilisateur->prenom }} {{ $commentaire->utilisateur->nom }}</strong>
                                        @if($commentaire->note)
                                            <span class="badge badge-warning ml-2">{{ $commentaire->note }}/5</span>
                                        @endif
                                        <small class="text-muted d-block">{{ $commentaire->formatted_date }}</small>
                                    </div>
                                    @if($commentaire->canBeEditedBy(auth()->user()) || $commentaire->canBeDeletedBy(auth()->user()))
                                    <div class="btn-group btn-group-sm">
                                        @if($commentaire->canBeEditedBy(auth()->user()))
                                        <button class="btn btn-outline-primary" onclick="editComment({{ $commentaire->id }}, '{{ addslashes($commentaire->texte) }}', {{ $commentaire->note ?? 'null' }})">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        @endif
                                        @if($commentaire->canBeDeletedBy(auth()->user()))
                                        <button class="btn btn-outline-danger" onclick="deleteComment({{ $commentaire->id }})">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                        @endif
                                    </div>
                                    @endif
                                </div>
                                <p class="mt-2">{{ $commentaire->texte }}</p>
                            </div>
                            @endforeach
                        @else
                            <p class="text-muted">Aucun commentaire pour le moment. Soyez le premier à commenter !</p>
                        @endif

                        <!-- Add Comment Form -->
                        <div class="mt-4">
                            <h5>Ajouter un commentaire</h5>
                            <form action="{{ route('content.comment.store', $contenu->id) }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="texte">Votre commentaire</label>
                                    <textarea class="form-control" id="texte" name="texte" rows="3" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="note">Note (optionnel)</label>
                                    <select class="form-control" id="note" name="note">
                                        <option value="">Pas de note</option>
                                        <option value="1">1 étoile</option>
                                        <option value="2">2 étoiles</option>
                                        <option value="3">3 étoiles</option>
                                        <option value="4">4 étoiles</option>
                                        <option value="5">5 étoiles</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-jaune-benin">Publier le commentaire</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">
                <!-- Content Info -->
                <div class="card">
                    <div class="card-header">
                        <h5>Informations</h5>
                    </div>
                    <div class="card-body">
                        <p><strong>Type :</strong> {{ $contenu->typeContenu->nom_contenu ?? 'N/A' }}</p>
                        <p><strong>Région :</strong> {{ $contenu->region->nom_region ?? 'N/A' }}</p>
                        <p><strong>Langue :</strong> {{ $contenu->langue->nom_langue ?? 'N/A' }}</p>
                        <p><strong>Auteur :</strong> {{ $contenu->auteur->prenom }} {{ $contenu->auteur->nom }}</p>
                        <p><strong>Date :</strong> {{ \Carbon\Carbon::parse($contenu->date_creation)->format('d/m/Y') }}</p>
                        @if($contenu->date_validation)
                            <p><strong>Validé le :</strong> {{ \Carbon\Carbon::parse($contenu->date_validation)->format('d/m/Y') }}</p>
                        @endif
                    </div>
                </div>

                <!-- Related Content -->
                <div class="card mt-3">
                    <div class="card-header">
                        <h5>Contenus similaires</h5>
                    </div>
                    <div class="card-body">
                        <p class="text-muted">Fonctionnalité à venir...</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Edit Comment Modal -->
<div class="modal fade" id="editCommentModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Modifier le commentaire</h4>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <form id="editCommentForm" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group">
                        <label for="edit_texte">Commentaire</label>
                        <textarea class="form-control" id="edit_texte" name="texte" rows="3" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="edit_note">Note</label>
                        <select class="form-control" id="edit_note" name="note">
                            <option value="">Pas de note</option>
                            <option value="1">1 étoile</option>
                            <option value="2">2 étoiles</option>
                            <option value="3">3 étoiles</option>
                            <option value="4">4 étoiles</option>
                            <option value="5">5 étoiles</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-primary">Modifier</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
function editComment(commentId, text, note) {
    $('#edit_texte').val(text);
    $('#edit_note').val(note);
    $('#editCommentForm').attr('action', '/commentaire/' + commentId);
    $('#editCommentModal').modal('show');
}

function deleteComment(commentId) {
    if (confirm('Êtes-vous sûr de vouloir supprimer ce commentaire ?')) {
        $.ajax({
            url: '/commentaire/' + commentId,
            type: 'DELETE',
            data: {
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                location.reload();
            },
            error: function(xhr) {
                alert('Erreur lors de la suppression');
            }
        });
    }
}
</script>
@endpush