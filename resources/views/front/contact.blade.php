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

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="phone" class="form-label">Numéro de téléphone</label>
                                <input type="tel" class="form-control" id="phone" name="phone" required
                                       placeholder="229 XX XX XX XX">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="institution" class="form-label">Institution (optionnel)</label>
                                <input type="text" class="form-control" id="institution" name="institution"
                                       placeholder="Université, École, etc.">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="subject" class="form-label">Sujet</label>
                            <select class="form-select" id="subject" name="subject" required>
                                <option value="">Choisissez un sujet</option>
                                <option value="information">Demande d'information</option>
                                <option value="collaboration">Proposition de collaboration</option>
                                <option value="technical">Problème technique</option>
                                <option value="suggestion">Suggestion</option>
                                <option value="other">Autre</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="message" class="form-label">Message</label>
                            <textarea class="form-control" id="message" name="message" rows="5" required
                                      placeholder="Décrivez votre demande en détail..."></textarea>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary btn-lg px-5">
                                <i class="fas fa-paper-plane me-2"></i>
                                Envoyer le message
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Contact Info -->
        <div class="col-lg-4 mb-4">
            <div class="card border-0 shadow-sm" style="border-radius: 16px;">
                <div class="card-body p-4">
                    <h5 class="card-title mb-4" style="color: #0A2E5C;">
                        <i class="fas fa-map-marker-alt me-2"></i>
                        Coordonnées
                    </h5>
                    
                    <div class="contact-info mb-4">
                        <div class="d-flex align-items-center mb-3">
                            <div class="contact-icon me-3">
                                <i class="fas fa-map-marker-alt text-primary"></i>
                            </div>
                            <div>
                                <strong>Adresse</strong><br>
                                <span>Cotonou, Bénin</span>
                            </div>
                        </div>
                        
                        <div class="d-flex align-items-center mb-3">
                            <div class="contact-icon me-3">
                                <i class="fas fa-phone text-primary"></i>
                            </div>
                            <div>
                                <strong>Téléphone</strong><br>
                                <span>+229 01 23 45 67 89</span>
                            </div>
                        </div>
                        
                        <div class="d-flex align-items-center mb-3">
                            <div class="contact-icon me-3">
                                <i class="fas fa-envelope text-primary"></i>
                            </div>
                            <div>
                                <strong>Email</strong><br>
                                <span>contact@culturebenin.bj</span>
                            </div>
                        </div>
                        
                        <div class="d-flex align-items-center">
                            <div class="contact-icon me-3">
                                <i class="fas fa-clock text-primary"></i>
                            </div>
                            <div>
                                <strong>Heures d'ouverture</strong><br>
                                <span>Lun-Ven: 8h-18h<br>Sam: 9h-13h</span>
                            </div>
                        </div>
                    </div>

                    <div class="quick-links">
                        <h6 class="mb-3">Liens rapides</h6>
                        <div class="d-grid gap-2">
                            <a href="#" class="btn btn-outline-primary btn-sm">
                                <i class="fas fa-book me-1"></i>
                                Documentation
                            </a>
                            <a href="#" class="btn btn-outline-primary btn-sm">
                                <i class="fas fa-question-circle me-1"></i>
                                FAQ
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- FAQ Section -->
        <div class="col-12">
            <div class="card border-0 shadow-sm" style="border-radius: 16px;">
                <div class="card-body p-5">
                    <h5 class="card-title mb-4" style="color: #0A2E5C;">
                        <i class="fas fa-question-circle me-2"></i>
                        Questions Fréquemment Posées
                    </h5>
                    
                    <div class="accordion" id="faqAccordion">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Comment puis-je accéder aux contenus culturels?
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Vous pouvez accéder à tous nos contenus culturels en naviguant sur notre site web. Certains contenus premium peuvent nécessiter un paiement de 100F pour un accès complet.
                                </div>
                            </div>
                        </div>
                        
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Comment puis-je contribuer à la plateforme?
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Vous pouvez contribuer en nous contactant via le formulaire ci-dessus ou en nous envoyant des contenus culturels que vous souhaitez partager avec la communauté.
                                </div>
                            </div>
                        </div>
                        
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    Comment fonctionne le paiement Feedapay?
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Le paiement Feedapay est sécurisé et instantané. Après avoir payé 100F, vous aurez immédiatement accès aux fonctionnalités premium du contenu sélectionné.
                                </div>
                            </div>
                        </div>
                        
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingFour">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    Puis-je télécharger les contenus?
                                </button>
                            </h2>
                            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Le téléchargement des contenus est disponible pour les utilisateurs premium après paiement. Les contenus gratuits peuvent être partagés via les réseaux sociaux.
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

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@endpush

@push('styles')
<style>
.contact-icon {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background: linear-gradient(135deg, #0A2E5C, #1A5F9E);
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
}

.contact-info {
    border-bottom: 1px solid #dee2e6;
    padding-bottom: 1rem;
    margin-bottom: 1rem;
}

.accordion-button {
    background: none;
    border: none;
    text-align: left;
    width: 100%;
    padding: 1rem;
    font-weight: 600;
    color: #0A2E5C;
}

.accordion-button:hover {
    background-color: #f8f9fa;
}

.card {
    transition: transform 0.2s ease, box-shadow 0.2s ease;
}

.card:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.1);
}
</style>
@endpush
