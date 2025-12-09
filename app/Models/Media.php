<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;

    protected $table = 'medias';
    protected $primaryKey = 'id_media';

    protected $fillable = [
        'chemin',
        'type',
        'id_contenu',
        'id_utilisateur',
        'description',
        'taille',
    ];

    public function contenu()
    {
        return $this->belongsTo(Contenu::class, 'id_contenu');
    }

    public function utilisateur()
    {
        return $this->belongsTo(Utilisateur::class, 'id_utilisateur', 'id');
    }
}

