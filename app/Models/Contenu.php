<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Contenu extends Model
{
    use HasFactory;

    protected $table = 'contenus';

    protected $fillable = [
        'titre',
        'texte',
        'date_creation',
        'statut',
        'parent_id',
        'date_validation',
        'id_region',
        'id_langue',
        'id_moderateur',
        'id_type_contenu',
        'id_auteur',
    ];

    protected $casts = [
        'date_creation' => 'datetime',
        'date_validation' => 'datetime',
    ];

    public function auteur(): BelongsTo
    {
        return $this->belongsTo(Utilisateur::class, 'id_auteur');
    }

    public function moderateur(): BelongsTo
    {
        return $this->belongsTo(Utilisateur::class, 'id_moderateur');
    }

    public function region(): BelongsTo
    {
        return $this->belongsTo(Region::class, 'id_region');
    }

    public function langue(): BelongsTo
    {
        return $this->belongsTo(Langue::class, 'id_langue');
    }

    public function typeContenu(): BelongsTo
    {
        return $this->belongsTo(TypeContenu::class, 'id_type_contenu');
    }

    public function medias(): HasMany
    {
        return $this->hasMany(Media::class, 'id_contenu');
    }

    public function commentaire(): HasOne
    {
        return $this->hasOne(Commentaire::class, 'id_contenu');
    }

    public function commentaires(): HasMany
    {
        return $this->hasMany(Commentaire::class, 'id_contenu');
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(Contenu::class, 'parent_id');
    }

    public function enfants(): HasMany
    {
        return $this->hasMany(Contenu::class, 'parent_id');
    }

    public function isValid(): bool
    {
        return $this->statut === 'valide';
    }

    public function isPending(): bool
    {
        return $this->statut === 'en_attente';
    }

    public function isBlocked(): bool
    {
        return $this->statut === 'bloque';
    }
}