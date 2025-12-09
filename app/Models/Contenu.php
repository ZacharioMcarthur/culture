<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Contenu extends Model
{
    use HasFactory;

    protected $table = 'contenus';
    protected $primaryKey = 'id_contenu';

    protected $fillable = [
        'titre',
        'slug',
        'extrait',
        'contenu',
        'statut',
        'prix',
        'id_categorie',
        'id_auteur',
        'vues',
    ];

    protected $casts = [
        'prix' => 'decimal:2',
        'vues' => 'integer',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($contenu) {
            if (empty($contenu->slug)) {
                $contenu->slug = Str::slug($contenu->titre);
            }
        });

        static::updating(function ($contenu) {
            if ($contenu->isDirty('titre') && empty($contenu->slug)) {
                $contenu->slug = Str::slug($contenu->titre);
            }
        });
    }

    public function categorie()
    {
        return $this->belongsTo(Categorie::class, 'id_categorie');
    }

    public function auteur()
    {
        return $this->belongsTo(Utilisateur::class, 'id_auteur', 'id');
    }

    public function medias()
    {
        return $this->hasMany(Media::class, 'id_contenu');
    }

    public function commentaires()
    {
        return $this->hasMany(Commentaire::class, 'id_contenu');
    }

    public function notes()
    {
        return $this->hasMany(Note::class, 'id_contenu');
    }

    public function paiements()
    {
        return $this->hasMany(Paiement::class, 'id_contenu');
    }

    public function moyenneNotes()
    {
        return $this->notes()->avg('valeur') ?? 0;
    }

    public function nombreNotes()
    {
        return $this->notes()->count();
    }

    public function incrementerVues()
    {
        $this->increment('vues');
    }
}

