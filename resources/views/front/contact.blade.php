@extends('layouts.app')

@section('title', 'Contact')

@section('content')
<div class="container-fluid py-4">
    <!-- Header -->
    <div class="row mb-4">
        <div class="col-12">
            <h1 class="h3 mb-0" style="color: #0A2E5C; font-weight: 700;">Contactez-nous</h1>
            <p class="text-muted mb-0">Nous sommes là pour répondre à vos questions</p>
        </div>
    </div>

    <div class="row">
        <!-- Contact Form -->
        <div class="col-lg-8 mb-4">
            <div class="card border-0 shadow-sm" style="border-radius: 16px;">
                <div class="card-body p-5">
                    <h5 class="card-title mb-4" style="color: #0A2E5C; font-weight: 600;">Envoyez-nous un message</h5>
                    
                    <form>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="nom" class="form-label">Nom complet *</label>
                                <input type="text" class="form-control" id="nom" required>
                            </div>
                            <div class="col-md-6">
                                <label for="email" class="form-label">Email *</label>
                                <input type="email" class="form-control" id="email" required>
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="telephone" class="form-label">Téléphone</label>
                                <input type="tel" class="form-control" id="telephone">
                            </div>
                            <div class="col-md-6">
                                <label for="etablissement" class="form-label">Établissement</label>
                                <input type="text" class="form-control" id="etablissement">
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="sujet" class="form-label">Sujet *</label>
                            <select class="form-select" id="sujet" required>
                                <option value="">Choisissez un sujet</option>
                                <option>Information générale</option>
                                <option>Support technique</option>
                                <option>Partenariat</option>
                                <option>Inscription établissement</option>
                                <option>Signaler un problème</option>
                                <option>Autre</option>
                            </select>
                        </div>
                        
                        <div class="mb-3">
                            <label for="message" class="form-label">Message *</label>
                            <textarea class="form-control" id="message" rows="6" required></textarea>
                        </div>
                        
                        <div class="mb-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="newsletter">
                                <label class="form-check-label" for="newsletter">
                                    Je souhaite recevoir la newsletter et les actualités de la plateforme
                                </label>
                            </div>
                        </div>
                        
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button type="reset" class="btn btn-outline-secondary">
                                <i class="fas fa-times me-2"></i>Effacer
                            </button>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-paper-plane me-2"></i>Envoyer le message
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Contact Info -->
        <div class="col-lg-4 mb-4">
            <div class="card border-0 shadow-sm mb-4" style="border-radius: 16px;">
                <div class="card-body p-4">
                    <h5 class="card-title mb-4" style="color: #0A2E5C; font-weight: 600;">Informations de contact</h5>
                    
                    <div class="d-flex align-items-start mb-4">
                        <div class="rounded-circle bg-primary bg-opacity-10 flex items-center justify-center me-3" 
                             style="width: 40px; height: 40px;">
                            <i class="fas fa-map-marker-alt text-primary"></i>
                        </div>
                        <div>
                            <h6 class="mb-1">Adresse</h6>
                            <p class="text-muted mb-0">
                                Cotonou, Bénin<br>
                                Quartier des Ministères<br>
                                Immeuble Culture Bénin
                            </p>
                        </div>
                    </div>
                    
                    <div class="d-flex align-items-start mb-4">
                        <div class="rounded-circle bg-success bg-opacity-10 flex items-center justify-center me-3" 
                             style="width: 40px; height: 40px;">
                            <i class="fas fa-phone text-success"></i>
                        </div>
                        <div>
                            <h6 class="mb-1">Téléphone</h6>
                            <p class="text-muted mb-0">
                                +229 01 46 62 03 46<br>
                                +229 97 84 52 31 78
                            </p>
                        </div>
                    </div>
                    
                    <div class="d-flex align-items-start mb-4">
                        <div class="rounded-circle bg-warning bg-opacity-10 flex items-center justify-center me-3" 
                             style="width: 40px; height: 40px;">
                            <i class="fas fa-envelope text-warning"></i>
                        </div>
                        <div>
                            <h6 class="mb-1">Email</h6>
                            <p class="text-muted mb-0">
                                nascimentozachario@gmail.com<br>
                                support@culturebenin.bj
                            </p>
                        </div>
                    </div>
                    
                    <div class="d-flex align-items-start">
                        <div class="rounded-circle bg-info bg-opacity-10 flex items-center justify-center me-3" 
                             style="width: 40px; height: 40px;">
                            <i class="fas fa-clock text-info"></i>
                        </div>
                        <div>
                            <h6 class="mb-1">Heures d'ouverture</h6>
                            <p class="text-muted mb-0">
                                Lundi - Vendredi: 8h00 - 18h00<br>
                                Samedi: 9h00 - 14h00<br>
                                Dimanche: Fermé
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Links -->
            <div class="card border-0 shadow-sm" style="border-radius: 16px;">
                <div class="card-body p-4">
                    <h5 class="card-title mb-4" style="color: #0A2E5C; font-weight: 600;">Liens rapides</h5>
                    
                    <div class="list-group list-group-flush">
                        <a href="#" class="list-group-item list-group-item-action border-0 px-0">
                            <i class="fas fa-question-circle text-primary me-2"></i>
                            Centre d'aide
                        </a>
                        <a href="#" class="list-group-item list-group-item-action border-0 px-0">
                            <i class="fas fa-book text-primary me-2"></i>
                            Documentation
                        </a>
                        <a href="#" class="list-group-item list-group-item-action border-0 px-0">
                            <i class="fas fa-users text-primary me-2"></i>
                            Communauté
                        </a>
                        <a href="#" class="list-group-item list-group-item-action border-0 px-0">
                            <i class="fas fa-shield-alt text-primary me-2"></i>
                            Politique de confidentialité
                        </a>
                        <a href="#" class="list-group-item list-group-item-action border-0 px-0">
                            <i class="fas fa-file-contract text-primary me-2"></i>
                            Conditions d'utilisation
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- FAQ Section -->
    <div class="row mt-5">
        <div class="col-12">
            <div class="card border-0 shadow-sm" style="border-radius: 16px;">
                <div class="card-header bg-white border-0 pt-4 pb-0">
                    <h5 class="card-title mb-0" style="color: #0A2E5C; font-weight: 600;">Questions fréquentes</h5>
                </div>
                <div class="card-body">
                    <div class="accordion" id="faqAccordion">
                        <div class="accordion-item border-0 mb-3">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                                    Comment inscrire mon établissement sur la plateforme ?
                                </button>
                            </h2>
                            <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Pour inscrire votre établissement, cliquez sur le bouton "Inscrire mon établissement" 
                                    dans la page des établissements. Remplissez le formulaire avec les informations 
                                    requises et notre équipe vous contactera dans les 48h pour valider votre inscription.
                                </div>
                            </div>
                        </div>
                        
                        <div class="accordion-item border-0 mb-3">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                                    Quels types d'événements puis-je publier ?
                                </button>
                            </h2>
                            <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Vous pouvez publier tous types d'événements académiques : examens, journées spéciales, 
                                    inscriptions, réunions parents-professeurs, séminaires, conférences, et toute autre 
                                    activité pertinente pour la communauté éducative.
                                </div>
                            </div>
                        </div>
                        
                        <div class="accordion-item border-0 mb-3">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                                    La plateforme est-elle gratuite ?
                                </button>
                            </h2>
                            <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Oui, l'inscription et l'utilisation de base de la plateforme sont entièrement gratuites 
                                    pour tous les établissements académiques du Bénin. Des fonctionnalités premium 
                                    peuvent être proposées à l'avenir.
                                </div>
                            </div>
                        </div>
                        
                        <div class="accordion-item border-0">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq4">
                                    Comment signaler un contenu inapproprié ?
                                </button>
                            </h2>
                            <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Chaque événement dispose d'un bouton de signalement. Vous pouvez également nous 
                                    contacter directement par email à support@culturebenin.bj pour signaler tout contenu 
                                    inapproprié ou abusif.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
.accordion-button {
    background-color: #f8f9fa;
    color: #0A2E5C;
    font-weight: 600;
}

.accordion-button:not(.collapsed) {
    background-color: rgba(10, 46, 92, 0.1);
    color: #0A2E5C;
}

.accordion-button:focus {
    box-shadow: 0 0 0 0.2rem rgba(10, 46, 92, 0.25);
}

.accordion-item {
    border: 1px solid #e9ecef;
    border-radius: 12px !important;
}

.form-control:focus {
    border-color: #0A2E5C;
    box-shadow: 0 0 0 0.2rem rgba(10, 46, 92, 0.25);
}

.btn-primary {
    background: linear-gradient(135deg, #0A2E5C, #1A5F9E);
    border: none;
}

.btn-primary:hover {
    background: linear-gradient(135deg, #1A5F9E, #0A2E5C);
}

.list-group-item {
    transition: all 0.2s ease;
}

.list-group-item:hover {
    background-color: rgba(10, 46, 92, 0.05);
    transform: translateX(4px);
}
</style>
@endpush
