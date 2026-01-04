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
        'date_creation',
        'date_validation',
        'id_moderateur',
        'parent_id',
        'id_langue',
        'id_region',
        'id_type_contenu',
    ];

    protected $casts = [
        'prix' => 'decimal:2',
        'vues' => 'integer',
        'date_creation' => 'datetime',
        'date_validation' => 'datetime',
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

    public function moderateur()
    {
        return $this->belongsTo(Utilisateur::class, 'id_moderateur', 'id');
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

    public function region()
    {
        return $this->belongsTo(Region::class, 'id_region');
    }

    public function langue()
    {
        return $this->belongsTo(Langue::class, 'id_langue');
    }

    public function typeContenu()
    {
        return $this->belongsTo(TypeContenu::class, 'id_type_contenu');
    }

    public function parent()
    {
        return $this->belongsTo(Contenu::class, 'parent_id');
    }

    public function enfants()
    {
        return $this->hasMany(Contenu::class, 'parent_id');
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

