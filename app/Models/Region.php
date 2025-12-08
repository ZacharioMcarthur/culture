<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Region extends Model
{
    use HasFactory;

    protected $table = 'regions';

    protected $fillable = [
        'nom_region',
        'type_region',
        'description',
        'population',
        'superficie',
        'localisation',
        'code_region',
    ];

    protected $casts = [
        'population' => 'integer',
        'superficie' => 'decimal:2',
    ];

    public function contenus(): HasMany
    {
        return $this->hasMany(Contenu::class, 'id_region');
    }

    public function langues(): BelongsToMany
    {
        return $this->belongsToMany(Langue::class, 'parler', 'region_id', 'langue_id');
    }
}