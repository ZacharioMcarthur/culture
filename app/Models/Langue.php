<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Langue extends Model
{
    use HasFactory;

    protected $table = 'langues';

    protected $fillable = [
        'nom_langue',
        'code_langue',
        'description',
    ];

    public function utilisateurs(): HasMany
    {
        return $this->hasMany(Utilisateur::class, 'id_langue');
    }

    public function contenus(): HasMany
    {
        return $this->hasMany(Contenu::class, 'id_langue');
    }

    public function medias(): HasMany
    {
        return $this->hasMany(Media::class, 'langue_id');
    }

    public function regions(): BelongsToMany
    {
        return $this->belongsToMany(Region::class, 'parler', 'langue_id', 'region_id');
    }
}