<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    protected $table = 'utilisateurs';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'nom',
        'prenom',
        'email',
        'mot_de_passe',
        'sexe',
        'date_naissance',
        'photo',
        'statut',
        'id_role',
        'id_langue',
        'two_factor_enabled',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'mot_de_passe',
        'remember_token',
        'two_factor_secret',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'mot_de_passe' => 'hashed',
            'date_naissance' => 'date',
            'date_inscription' => 'datetime',
            'two_factor_enabled' => 'boolean',
        ];
    }

    /**
     * Get the password attribute.
     */
    public function getAuthPassword()
    {
        return $this->mot_de_passe;
    }

    /**
     * Set the password attribute.
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['mot_de_passe'] = bcrypt($value);
    }

    public function role()
    {
        return $this->belongsTo(Role::class, 'id_role');
    }

    public function langue()
    {
        return $this->belongsTo(Langue::class, 'id_langue');
    }

    public function contenus()
    {
        return $this->hasMany(Contenu::class, 'id_auteur');
    }

    public function commentaires()
    {
        return $this->hasMany(Commentaire::class, 'id_utilisateur');
    }

    public function notes()
    {
        return $this->hasMany(Note::class, 'id_utilisateur');
    }

    public function medias()
    {
        return $this->hasMany(Media::class, 'id_utilisateur');
    }

    public function paiements()
    {
        return $this->hasMany(Paiement::class, 'id_utilisateur');
    }
}

