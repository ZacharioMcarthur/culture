<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Paiement extends Model
{
    use HasFactory;

    protected $table = 'paiements';
    protected $primaryKey = 'id_paiement';

    protected $fillable = [
        'reference',
        'id_utilisateur',
        'id_contenu',
        'montant',
        'statut',
        'méthode',
        'payload',
    ];

    protected $casts = [
        'montant' => 'decimal:2',
        'payload' => 'array',
    ];

    public $timestamps = true;
    const UPDATED_AT = 'updated_at';

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($paiement) {
            if (empty($paiement->reference)) {
                $paiement->reference = 'PAY-' . strtoupper(Str::random(10)) . '-' . time();
            }
        });
    }

    public function utilisateur()
    {
        return $this->belongsTo(Utilisateur::class, 'id_utilisateur', 'id');
    }

    public function contenu()
    {
        return $this->belongsTo(Contenu::class, 'id_contenu');
    }

    public function estReussi()
    {
        return $this->statut === 'réussi';
    }

    public function estEchoue()
    {
        return $this->statut === 'échoué';
    }

    public function estInitie()
    {
        return $this->statut === 'initié';
    }
}

