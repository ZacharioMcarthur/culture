<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Evenement extends Model
{
    protected $table = 'evenements';

    protected $fillable = [
        'titre',
        'description',
        'image',
        'date_debut',
        'date_fin',
        'heure_debut',
        'lieu',
        'prix',
        'programme',
        'organisateur',
        'statut'
    ];

    protected $casts = [
        'statut' => 'boolean',
        'date_debut' => 'date',
        'date_fin' => 'date',
        'prix' => 'decimal:2',
    ];

    public function galleries(): HasMany
    {
        return $this->hasMany(Gallerie::class);
    }
}

