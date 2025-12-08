<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use PragmaRX\Google2FALaravel\Supports\Authenticatable as TwoFactorAuthenticatable;

class Utilisateur extends Authenticatable implements TwoFactorAuthenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'utilisateurs';

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
        'google2fa_secret',
    ];

    protected $hidden = [
        'mot_de_passe',
        'remember_token',
    ];

    protected $casts = [
        'date_naissance' => 'date',
        'date_inscription' => 'datetime',
        'email_verified_at' => 'datetime',
    ];

    public function getAuthPassword()
    {
        return $this->mot_de_passe;
    }

    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class, 'id_role');
    }

    public function langue(): BelongsTo
    {
        return $this->belongsTo(Langue::class, 'id_langue');
    }

    public function contenus(): HasMany
    {
        return $this->hasMany(Contenu::class, 'id_auteur');
    }

    public function commentaires(): HasMany
    {
        return $this->hasMany(Commentaire::class, 'id_utilisateur');
    }

    /**
     * Get the column name for the "remember me" token.
     */
    public function getAuthIdentifierName(): string
    {
        return 'id';
    }

    /**
     * Get the unique identifier for the user.
     */
    public function getAuthIdentifier(): mixed
    {
        return $this->getKey();
    }

    /**
     * Get the password for the user.
     */
    public function getAuthPassword(): string
    {
        return $this->mot_de_passe;
    }

    /**
     * Get the token value for the "remember me" session.
     */
    public function getRememberToken(): string
    {
        return $this->{$this->getRememberTokenName()};
    }

    /**
     * Set the token value for the "remember me" session.
     */
    public function setRememberToken($value): void
    {
        $this->{$this->getRememberTokenName()} = $value;
    }

    /**
     * Get the column name for the "remember me" token.
     */
    public function getRememberTokenName(): string
    {
        return 'remember_token';
    }

    /**
     * Get the name of the unique identifier for the user.
     */
    public function getKeyName(): string
    {
        return 'id';
    }

    /**
     * Get the primary key for the model.
     */
    public function getKey(): mixed
    {
        return $this->getAttribute($this->getKeyName());
    }

    /**
     * Get the Google2FA secret key.
     */
    public function getGoogle2faSecretAttribute(): ?string
    {
        return $this->attributes['google2fa_secret'] ?? null;
    }

    /**
     * Set the Google2FA secret key.
     */
    public function setGoogle2faSecretAttribute(?string $value): void
    {
        $this->attributes['google2fa_secret'] = $value;
    }

    /**
     * Get the Google2FA secret key.
     */
    public function getGoogle2faSecret(): ?string
    {
        return $this->google2fa_secret;
    }

    /**
     * Set the Google2FA secret key.
     */
    public function setGoogle2faSecret(?string $secret): void
    {
        $this->google2fa_secret = $secret;
        $this->save();
    }
}
