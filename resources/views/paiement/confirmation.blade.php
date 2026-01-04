<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation de paiement - Culture Bénin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        .payment-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
            max-width: 500px;
            width: 100%;
            overflow: hidden;
        }
        .payment-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 30px;
            text-align: center;
        }
        .payment-body {
            padding: 40px;
        }
        .amount {
            font-size: 3rem;
            font-weight: bold;
            color: #667eea;
            text-align: center;
            margin: 20px 0;
        }
        .content-info {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 20px;
            margin: 20px 0;
        }
    </style>
</head>
<body>
    <div class="payment-card">
        <div class="payment-header">
            <i class="fas fa-credit-card fa-3x mb-3"></i>
            <h2>Confirmation de paiement</h2>
            <p class="mb-0">Finalisez votre achat pour accéder au contenu</p>
        </div>
        <div class="payment-body">
            <div class="content-info">
                <h5 class="mb-2"><i class="fas fa-book me-2"></i>{{ $contenu->titre }}</h5>
                <p class="text-muted mb-0">{{ Str::limit(strip_tags($contenu->extrait ?: $contenu->contenu), 100) }}</p>
            </div>

            <div class="amount">
                {{ number_format($paiement->montant, 2) }}€
            </div>

            <div class="alert alert-info">
                <i class="fas fa-info-circle me-2"></i>
                <strong>Mode simulation :</strong> Ce paiement est simulé pour les besoins de démonstration.
            </div>

            <form action="{{ route('paiement.confirmer', $paiement->id_paiement) }}" method="POST" class="mb-3">
                @csrf
                <button type="submit" class="btn btn-primary btn-lg w-100">
                    <i class="fas fa-check-circle me-2"></i>
                    Confirmer le paiement
                </button>
            </form>

            <form action="{{ route('paiement.annuler', $paiement->id_paiement) }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-outline-secondary w-100">
                    <i class="fas fa-times me-2"></i>
                    Annuler
                </button>
            </form>

            <div class="text-center mt-4">
                <a href="{{ route('home') }}" class="text-muted text-decoration-none">
                    <i class="fas fa-arrow-left me-2"></i>Retour à l'accueil
                </a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

