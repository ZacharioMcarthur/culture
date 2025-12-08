@extends('layouts.culture')

@section('title', 'Accueil - Culture Béninoise')

@section('content')
<!-- Hero Section -->
<section class="hero-culture">
    <div class="container">
        <h1>Découvrez la Richesse Culturelle du Bénin</h1>
        <p>Plongez dans l'âme du Bénin à travers ses plats traditionnels, ses danses ancestrales, ses lieux mythiques et ses événements culturels uniques.</p>
        <div class="mt-4">
            <a href="#plats" class="btn btn-jaune-benin btn-lg me-3">Explorer les Plats</a>
            <a href="#lieux" class="btn btn-vert-benin btn-lg">Découvrir les Lieux</a>
        </div>
    </div>
</section>

<!-- Section Présentation -->
<section class="section-culture">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h2 class="mb-4 vert-benin">Le Bénin, Terre de Culture</h2>
                <p class="lead">Le Bénin, pays d'Afrique de l'Ouest, est un creuset culturel exceptionnel où se rencontrent traditions ancestrales et modernité. De Cotonou à Porto-Novo, en passant par Ouidah et Abomey, chaque région garde jalousement ses secrets culinaires, ses rythmes endiablés et ses sites historiques chargés de mystères.</p>
                <p>Notre plateforme vous invite à découvrir cette diversité culturelle à travers quatre piliers fondamentaux : la gastronomie, le patrimoine touristique, les arts chorégraphiques et les événements culturels qui rythment la vie béninoise.</p>
                <a href="#decouvrir" class="btn btn-vert-benin">En savoir plus</a>
            </div>
            <div class="col-lg-6">
                <img src="{{ asset('images/drapeauBenin.jpg') }}" alt="Drapeau du Bénin" class="img-fluid rounded shadow" style="max-height: 400px;">
            </div>
        </div>
    </div>
</section>

<!-- Section Plats Traditionnels -->
<section id="plats" class="section-culture bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="vert-benin">Plats Traditionnels Béninois</h2>
            <p class="lead">Découvrez les saveurs authentiques du Bénin</p>
        </div>
        <div class="row">
            @forelse($plats ?? [] as $plat)
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="carte-culture">
                    <div style="height: 200px; background: linear-gradient(135deg, #f8f9fa, #e9ecef); display: flex; align-items: center; justify-content: center;">
                        <i class="fas fa-utensils fa-3x text-muted"></i>
                    </div>
                    <div class="contenu">
                        <h3>{{ $plat->titre }}</h3>
                        <p>{{ Str::limit($plat->texte, 100) }}</p>
                        <small class="text-muted">
                            <i class="fas fa-calendar"></i> {{ \Carbon\Carbon::parse($plat->date_creation)->format('d/m/Y') }}
                        </small>
                        <a href="{{ route('contents.index', 'plats') }}" class="btn btn-jaune-benin mt-3">
                            <i class="fas fa-lock"></i> Découvrir (Connexion requise)
                        </a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center">
                <div style="padding: 60px 20px;">
                    <i class="fas fa-utensils fa-4x text-muted mb-3"></i>
                    <h3 class="text-muted">Aucun plat disponible pour le moment</h3>
                    <p class="text-muted">Nous travaillons à enrichir notre collection de plats traditionnels béninois.</p>
                </div>
            </div>
            @endforelse
        </div>
    </div>
</section>

<!-- Section Histoires et Contes -->
<section id="histoires" class="section-culture">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="vert-benin">Histoires et Contes Traditionnels</h2>
            <p class="lead">Découvrez la richesse du patrimoine oral béninois</p>
        </div>
        <div class="row">
            @forelse($histoires ?? [] as $histoire)
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="carte-culture">
                    <div style="height: 200px; background: linear-gradient(135deg, #f8f9fa, #e9ecef); display: flex; align-items: center; justify-content: center;">
                        <i class="fas fa-book-open fa-3x text-muted"></i>
                    </div>
                    <div class="contenu">
                        <h3>{{ $histoire->titre }}</h3>
                        <p>{{ Str::limit($histoire->texte, 100) }}</p>
                        <small class="text-muted">
                            <i class="fas fa-calendar"></i> {{ \Carbon\Carbon::parse($histoire->date_creation)->format('d/m/Y') }}
                        </small>
                        <a href="{{ route('contents.index', 'histoires') }}" class="btn btn-jaune-benin mt-3">
                            <i class="fas fa-lock"></i> Découvrir (Connexion requise)
                        </a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center">
                <div style="padding: 60px 20px;">
                    <i class="fas fa-book-open fa-4x text-muted mb-3"></i>
                    <h3 class="text-muted">Aucune histoire disponible pour le moment</h3>
                    <p class="text-muted">Nous travaillons à recueillir les contes et légendes traditionnels du Bénin.</p>
                </div>
            </div>
            @endforelse
        </div>
    </div>
</section>

<!-- Section Articles Culturels -->
<section id="articles" class="section-culture bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="vert-benin">Articles Culturels</h2>
            <p class="lead">Explorez les trésors culturels du Bénin</p>
        </div>
        <div class="row">
            @forelse($articles ?? [] as $article)
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="carte-culture">
                    <div style="height: 200px; background: linear-gradient(135deg, #f8f9fa, #e9ecef); display: flex; align-items: center; justify-content: center;">
                        <i class="fas fa-landmark fa-3x text-muted"></i>
                    </div>
                    <div class="contenu">
                        <h3>{{ $article->titre }}</h3>
                        <p>{{ Str::limit($article->texte, 100) }}</p>
                        <small class="text-muted">
                            <i class="fas fa-calendar"></i> {{ \Carbon\Carbon::parse($article->date_creation)->format('d/m/Y') }}
                        </small>
                        <a href="{{ route('contents.index', 'articles') }}" class="btn btn-jaune-benin mt-3">
                            <i class="fas fa-lock"></i> Découvrir (Connexion requise)
                        </a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center">
                <div style="padding: 60px 20px;">
                    <i class="fas fa-landmark fa-4x text-muted mb-3"></i>
                    <h3 class="text-muted">Aucun article disponible pour le moment</h3>
                    <p class="text-muted">Nous travaillons à enrichir notre collection d'articles culturels sur le Bénin.</p>
                </div>
            </div>
            @endforelse
        </div>
    </div>
</section>

<!-- Section Appel à l'action -->
<section class="section-culture bg-light">
    <div class="container text-center">
        <h2 class="vert-benin mb-4">Rejoignez Notre Communauté</h2>
        <p class="lead mb-4">Inscrivez-vous pour recevoir les dernières actualités culturelles et participer à nos événements exclusifs.</p>
        <div>
            @auth
                <a href="{{ route('dashboard') }}" class="btn btn-vert-benin btn-lg me-3">Accéder au Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="btn btn-jaune-benin btn-lg me-3">Se connecter</a>
                <a href="{{ route('register') }}" class="btn btn-vert-benin btn-lg">S'inscrire</a>
            @endauth
        </div>
    </div>
</section>
@endsection

@push('styles')
<style>
.hero-culture {
    background: linear-gradient(135deg, #00432f 0%, #006b4a 50%, #008c6a 100%);
    color: white;
    padding: 120px 0 80px;
    text-align: center;
    position: relative;
    overflow: hidden;
}

.hero-culture::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffc002' fill-opacity='0.1'%3E%3Ccircle cx='30' cy='30' r='2'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
    opacity: 0.1;
}

.hero-culture h1 {
    font-size: 3.5rem;
    font-weight: 700;
    margin-bottom: 1.5rem;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
}

.hero-culture p {
    font-size: 1.3rem;
    margin-bottom: 2rem;
    opacity: 0.9;
    max-width: 600px;
    margin-left: auto;
    margin-right: auto;
}

.btn-jaune-benin {
    background-color: #ffc002;
    color: #00432f;
    border: 2px solid #ffc002;
    padding: 12px 30px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 1px;
    transition: all 0.3s ease;
}

.btn-jaune-benin:hover {
    background-color: #e6a800;
    border-color: #e6a800;
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(255, 192, 2, 0.3);
}

.btn-vert-benin {
    background-color: #00432f;
    color: white;
    border: 2px solid #00432f;
    padding: 12px 30px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 1px;
    transition: all 0.3s ease;
}

.btn-vert-benin:hover {
    background-color: #002a20;
    border-color: #002a20;
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(0, 67, 47, 0.3);
}

.vert-benin {
    color: #00432f !important;
}

.section-culture {
    padding: 80px 0;
}

.carte-culture {
    background: white;
    border-radius: 15px;
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    transition: all 0.3s ease;
    height: 100%;
}

.carte-culture:hover {
    transform: translateY(-10px);
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
}

.carte-culture img {
    width: 100%;
    height: 200px;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.carte-culture:hover img {
    transform: scale(1.05);
}

.carte-culture .contenu {
    padding: 25px;
}

.carte-culture h3 {
    color: #00432f;
    margin-bottom: 15px;
    font-size: 1.3rem;
    font-weight: 600;
}

.carte-culture p {
    color: #666;
    line-height: 1.6;
    margin-bottom: 15px;
}

.carte-culture .btn {
    border-radius: 25px;
    padding: 8px 20px;
    font-weight: 500;
}

@media (max-width: 768px) {
    .hero-culture h1 {
        font-size: 2.5rem;
    }

    .hero-culture p {
        font-size: 1.1rem;
    }

    .hero-culture {
        padding: 100px 20px 60px;
    }

    .section-culture {
        padding: 60px 0;
    }
}
</style>
@endpush
