<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;

class Utilisateur extends Authenticatable
{
    use HasFactory, Notifiable, TwoFactorAuthenticatable;

    protected $table = 'utilisateurs';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nom',
        'prenom',
        'email',
        'mot_de_passe',
        'sexe',
        'date_naissance',
        'date_inscription',
        'photo',
        'statut',
        'id_role',
        'id_langue',
        'remember_token',
        'email_verified_at',
        'two_factor_enabled',
        'two_factor_secret',
    ];

    protected $hidden = [
        'mot_de_passe',
        'remember_token',
        'two_factor_secret',
    ];

    protected $casts = [
        'date_naissance' => 'date',
        'date_inscription' => 'datetime',
        'email_verified_at' => 'datetime',
        'statut' => 'integer',
        'two_factor_enabled' => 'boolean',
        'mot_de_passe' => 'hashed',
    ];

    // Relations
    public function role()
    {
        return $this->belongsTo(Role::class, 'id_role', 'id_role');
    }

    public function langue()
    {
        return $this->belongsTo(Langue::class, 'id_langue', 'id_langue');
    }

    public function contenus()
    {
        return $this->hasMany(Contenu::class, 'id_auteur', 'id');
    }

    public function commentaires()
    {
        return $this->hasMany(Commentaire::class, 'id_utilisateur', 'id');
    }

    public function notes()
    {
        return $this->hasMany(Note::class, 'id_utilisateur', 'id');
    }

    public function medias()
    {
        return $this->hasMany(Media::class, 'id_utilisateur', 'id');
    }

    public function paiements()
    {
        return $this->hasMany(Paiement::class, 'id_utilisateur', 'id');
    }

    // Méthodes d'authentification
    public function getAuthPassword()
    {
        return $this->mot_de_passe;
    }

    public function getAuthIdentifierName()
    {
        return 'id';
    }

    public function getAuthIdentifier()
    {
        return $this->getKey();
    }

    public function getRememberToken()
    {
        return $this->remember_token;
    }

    public function setRememberToken($value)
    {
        $this->remember_token = $value;
    }

    public function getRememberTokenName()
    {
        return 'remember_token';
    }
}
