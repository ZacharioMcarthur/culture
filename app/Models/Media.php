<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Media extends Model
{
    use HasFactory;

    protected $table = 'medias';

    protected $fillable = [
        'chemin',
        'description',
        'id_contenu',
        'id_type_media',
        'langue_id',
    ];

    public function contenu(): BelongsTo
    {
        return $this->belongsTo(Contenu::class, 'id_contenu');
    }

    public function typeMedia(): BelongsTo
    {
        return $this->belongsTo(TypeMedia::class, 'id_type_media');
    }

    public function langue(): BelongsTo
    {
        return $this->belongsTo(Langue::class, 'langue_id');
    }

    public function isImage(): bool
    {
        return $this->typeMedia && $this->typeMedia->nom_media === 'Image';
    }

    public function isAudio(): bool
    {
        return $this->typeMedia && $this->typeMedia->nom_media === 'Audio';
    }

    public function isVideo(): bool
    {
        return $this->typeMedia && $this->typeMedia->nom_media === 'Vidéo';
    }

    public function isDocument(): bool
    {
        return $this->typeMedia && $this->typeMedia->nom_media === 'Document';
    }
}