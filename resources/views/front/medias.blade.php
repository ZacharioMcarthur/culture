@extends('layouts.app')

@section('title', 'Médias')

@section('content')
<div class="container-fluid py-4">
    <!-- Header -->
    <div class="row align-items-center">
        <div class="col-sm-6">
            <h3 class="mb-0 fw-semibold text-dark">Liste des médias</h3>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-end mb-0">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="text-decoration-none">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Médias</li>
            </ol>
        </div>
    </div>

    <!-- Media Grid -->
    <div class="row">
        @forelse ($medias as $media)
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card border-0 shadow-sm h-100" style="border-radius: 12px;">
                    <div class="card-body p-4">
                        <!-- Media Preview -->
                        <div class="text-center mb-3">
                            @php
                                $chemin = $media->chemin;
                                $isImage = \Illuminate\Support\Str::contains($chemin, ['.jpg','.jpeg','.png','.gif','.webp','.bmp']);
                                $isVideo = \Illuminate\Support\Str::contains($chemin, ['.mp4','.webm','.ogg','.mov']);
                                $isAudio = \Illuminate\Support\Str::contains($chemin, ['.mp3','.wav','.ogg','.m4a']);
                            @endphp
                            
                            @if($isImage)
                                <img src="{{ asset('storage/'.$media->chemin) }}" 
                                     alt="Aperçu" 
                                     class="rounded shadow-sm" 
                                     style="width: 100%; height: 200px; object-fit: cover;"
                                     onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                <div class="rounded bg-light d-flex align-items-center justify-content-center d-none" 
                                     style="width: 100%; height: 200px;">
                                    <i class="bi bi-image text-muted" style="font-size: 3rem;"></i>
                                </div>
                            @elseif($isVideo)
                                <div class="rounded bg-primary bg-opacity-10 d-flex align-items-center justify-content-center" 
                                     style="width: 100%; height: 200px;">
                                    <i class="bi bi-play-btn-fill text-primary" style="font-size: 3rem;"></i>
                                </div>
                            @elseif($isAudio)
                                <div class="rounded bg-warning bg-opacity-10 d-flex align-items-center justify-content-center" 
                                     style="width: 100%; height: 200px;">
                                    <i class="bi bi-music-note-beamed text-warning" style="font-size: 3rem;"></i>
                                </div>
                            @else
                                <div class="rounded bg-secondary bg-opacity-10 d-flex align-items-center justify-content-center" 
                                     style="width: 100%; height: 200px;">
                                    <i class="bi bi-file-earmark text-secondary" style="font-size: 3rem;"></i>
                                </div>
                            @endif
                        </div>

                        <!-- Media Info -->
                        <h5 class="card-title text-dark mb-2">{{ basename($media->chemin) }}</h5>
                        
                        <!-- Description -->
                        <p class="card-text text-muted mb-3">
                            @if($media->description)
                                {{ Str::limit($media->description, 100) }}
                            @else
                                <span class="text-muted">Aucune description disponible</span>
                            @endif
                        </p>

                        <!-- Media Type -->
                        @if($media->typemedia)
                            <span class="badge bg-primary text-white rounded-pill px-3 py-2 mb-3">
                                {{ $media->typemedia->nom }}
                            </span>
                        @else
                            <span class="badge bg-light text-muted rounded-pill px-3 py-2 mb-3">
                                Non défini
                            </span>
                        @endif

                        <!-- Content Link -->
                        @if($media->contenu)
                            <div class="mb-3">
                                <small class="text-muted">Contenu lié:</small>
                                <div>
                                    <a href="{{ route('contenus.show', $media->contenu->id) }}" 
                                       class="fw-medium text-decoration-none text-primary">
                                        {{ $media->contenu->titre }}
                                    </a>
                                </div>
                            </div>
                        @endif

                        <!-- Actions -->
                        <div class="d-flex gap-2">
                            <!-- View Button -->
                            <button type="button" 
                                    class="btn btn-sm btn-info d-flex align-items-center"
                                    onclick="viewMedia('{{ asset('storage/'.$media->chemin) }}')"
                                    title="Voir le média">
                                <i class="bi bi-eye"></i>
                                Voir
                            </button>

                            <!-- See More Button -->
                            <button type="button" 
                                    class="btn btn-sm btn-success d-flex align-items-center"
                                    onclick="showMoreDetails({{ $media->id }})"
                                    title="Voir plus">
                                <i class="bi bi-arrow-right-circle"></i>
                                Voir plus (100F)
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center py-5">
                <div class="text-muted">
                    <i class="bi bi-inbox fs-1 mb-3 d-block"></i>
                    <h4>Aucun média trouvé</h4>
                    <p>Commencez par ajouter votre premier média à la plateforme.</p>
                </div>
            </div>
        @endforelse
    </div>

    <!-- Add Media Button -->
    <div class="fixed-bottom-0 end-0 p-4" style="z-index: 1000;">
        <a href="{{ route('medias.create') }}" 
           class="btn btn-primary btn-lg d-flex align-items-center gap-2 shadow-lg"
           style="border-radius: 50px; padding: 15px 30px;">
            <i class="bi bi-plus-lg"></i>
            <span>Ajouter un média</span>
        </a>
    </div>
</div>

<!-- View Modal -->
<div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewModalLabel">Aperçu du média</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <div id="mediaPreview"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>

<!-- Payment Modal -->
<div class="modal fade" id="paymentModal" tabindex="-1" aria-labelledby="paymentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="paymentModalLabel">Accès Premium - 100F</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="text-center mb-4">
                    <i class="bi bi-lock-fill text-warning" style="font-size: 3rem;"></i>
                    <h4 class="mt-3">Accès complet requis</h4>
                    <p class="text-muted">Accédez à toutes les informations détaillées sur ce média pour seulement 100F CFA.</p>
                </div>
                
                <div class="mb-3">
                    <h6>Avantages de l'accès premium:</h6>
                    <ul>
                        <li>Informations complètes du média</li>
                        <li>Téléchargement en haute qualité</li>
                        <li>Accès aux métadonnées détaillées</li>
                        <li>Support prioritaire</li>
                    </ul>
                </div>

                <!-- Feedapay Payment Form -->
                <form id="paymentForm" action="https://feedapay.com/payment" method="POST">
                    <input type="hidden" name="amount" value="100">
                    <input type="hidden" name="currency" value="XOF">
                    <input type="hidden" name="item_name" value="Accès média premium">
                    <input type="hidden" name="item_id" id="mediaId" value="">
                    <input type="hidden" name="success_url" value="{{ url('/medias/success') }}">
                    <input type="hidden" name="cancel_url" value="{{ url('/medias/cancel') }}">
                    
                    <div class="mb-3">
                        <label for="phoneNumber" class="form-label">Numéro de téléphone</label>
                        <input type="tel" id="phoneNumber" name="phoneNumber" class="form-control" 
                               placeholder="229 XX XX XX XX" required>
                    </div>
                    
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-success">
                            <i class="bi bi-credit-card me-2"></i>
                            Payer avec Feedapay
                        </button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            Annuler
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
function viewMedia(mediaPath) {
    const modal = new bootstrap.Modal(document.getElementById('viewModal'));
    const preview = document.getElementById('mediaPreview');
    
    // Determine media type and create preview
    if (mediaPath.match(/\.(jpg|jpeg|png|gif|webp|bmp)$/i)) {
        preview.innerHTML = `<img src="${mediaPath}" class="img-fluid rounded" alt="Media preview">`;
    } else if (mediaPath.match(/\.(mp4|webm|ogg|mov)$/i)) {
        preview.innerHTML = `<video src="${mediaPath}" class="img-fluid rounded" controls>
                            <source src="${mediaPath}" type="video/mp4">
                            Votre navigateur ne supporte pas la vidéo.
                        </video>`;
    } else if (mediaPath.match(/\.(mp3|wav|ogg|m4a)$/i)) {
        preview.innerHTML = `<audio src="${mediaPath}" class="img-fluid rounded" controls>
                            <source src="${mediaPath}" type="audio/mpeg">
                            Votre navigateur ne supporte pas l'audio.
                        </audio>`;
    } else {
        preview.innerHTML = `<div class="text-center p-4">
                            <i class="bi bi-file-earmark" style="font-size: 4rem;"></i>
                            <p class="mt-3">Fichier non supporté pour l'aperçu</p>
                        </div>`;
    }
    
    modal.show();
}

function showMoreDetails(mediaId) {
    document.getElementById('mediaId').value = mediaId;
    const modal = new bootstrap.Modal(document.getElementById('paymentModal'));
    modal.show();
}

// Auto-close payment modal on successful payment
window.addEventListener('message', function(event) {
    if (event.data === 'payment-success') {
        const modal = bootstrap.Modal.getInstance(document.getElementById('paymentModal'));
        modal.hide();
        // Show success message
        alert('Paiement réussi! Vous avez maintenant accès aux fonctionnalités premium.');
        // Reload page to show premium content
        window.location.reload();
    }
});
</script>
@endpush

@push('styles')
<style>
.card {
    transition: transform 0.2s ease, box-shadow 0.2s ease;
}

.card:hover {
    transform: translateY(-4px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.15);
}

.btn {
    transition: all 0.2s ease;
}

.btn:hover {
    transform: translateY(-1px);
}

.modal-content {
    border-radius: 15px;
    border: none;
    box-shadow: 0 10px 30px rgba(0,0,0,0.2);
}

.modal-header {
    border-bottom: 1px solid #dee2e6;
    padding: 1rem 1.5rem;
}

.modal-body {
    padding: 2rem;
}

.fixed-bottom-0 {
    position: fixed;
    bottom: 20px;
    right: 20px;
}

.breadcrumb-item + .breadcrumb-item::before {
    content: ">";
    color: #6c757d;
    font-weight: bold;
    padding: 0 0.5rem;
}
</style>
@endpush
