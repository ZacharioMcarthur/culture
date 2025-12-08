@extends('layouts.culture')

@section('title', 'Paiement requis - ' . $contenu->titre)

@section('content')
<!-- Payment Required Section -->
<section class="section-culture">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header bg-warning">
                        <h3 class="card-title">
                            <i class="fas fa-lock"></i> Contenu Premium
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="text-center mb-4">
                            <i class="fas fa-lock fa-4x text-warning mb-3"></i>
                            <h4>Accès restreint</h4>
                            <p class="text-muted">Ce contenu nécessite un paiement pour être consulté en intégralité.</p>
                        </div>

                        <!-- Content Preview -->
                        <div class="border p-3 mb-4 bg-light">
                            <h5>{{ $preview['titre'] }}</h5>
                            <p><strong>Type :</strong> {{ $preview['type'] }}</p>
                            <p><strong>Région :</strong> {{ $preview['region'] }}</p>
                            <p>{{ $preview['preview_text'] }}...</p>
                            <p class="text-muted"><em>Le reste du contenu sera disponible après paiement.</em></p>
                        </div>

                        <!-- Payment Form -->
                        <div class="text-center">
                            <div class="mb-3">
                                <h4 class="text-success">{{ number_format($preview['prix'], 2) }} €</h4>
                                <p class="text-muted">Accès illimité au contenu complet</p>
                            </div>

                            <form action="{{ route('content.process.payment', $contenu->id) }}" method="POST">
                                @csrf

                                <!-- Simulation de paiement - Dans un vrai projet, intégrer Stripe/PayPal -->
                                <div class="mb-3">
                                    <label for="card_number" class="form-label">Numéro de carte</label>
                                    <input type="text" class="form-control" id="card_number" name="card_number"
                                           placeholder="1234 5678 9012 3456" required>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="expiry_date" class="form-label">Date d'expiration</label>
                                        <input type="text" class="form-control" id="expiry_date" name="expiry_date"
                                               placeholder="MM/AA" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="cvv" class="form-label">CVV</label>
                                        <input type="text" class="form-control" id="cvv" name="cvv"
                                               placeholder="123" required>
                                    </div>
                                </div>

                                <div class="alert alert-info">
                                    <i class="fas fa-info-circle"></i>
                                    <strong>Simulation :</strong> Cette page est en mode démonstration.
                                    Cliquez sur "Payer maintenant" pour simuler un paiement réussi.
                                </div>

                                <button type="submit" class="btn btn-success btn-lg">
                                    <i class="fas fa-credit-card"></i> Payer maintenant
                                </button>
                            </form>

                            <div class="mt-3">
                                <a href="{{ route('home') }}" class="btn btn-secondary">
                                    <i class="fas fa-arrow-left"></i> Retour à l'accueil
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Info Section -->
                <div class="card mt-3">
                    <div class="card-body">
                        <h5>Pourquoi payer ?</h5>
                        <ul class="list-unstyled">
                            <li><i class="fas fa-check text-success"></i> Accès complet au contenu culturel</li>
                            <li><i class="fas fa-check text-success"></i> Médias haute qualité (images, vidéos, audio)</li>
                            <li><i class="fas fa-check text-success"></i> Informations détaillées et authentiques</li>
                            <li><i class="fas fa-check text-success"></i> Soutien aux créateurs de contenu</li>
                            <li><i class="fas fa-check text-success"></i> Accès hors ligne (bientôt disponible)</li>
                        </ul>

                        <hr>

                        <h5>Politique de remboursement</h5>
                        <p class="text-muted">
                            Si le contenu ne correspond pas à vos attentes, contactez-nous dans les 7 jours
                            pour un remboursement complet.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection