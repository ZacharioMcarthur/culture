<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Carbon\Carbon;

class Commentaire extends Model
{
    use HasFactory;

    protected $table = 'commentaires';

    protected $fillable = [
        'texte',
        'note',
        'date',
        'id_utilisateur',
        'id_contenu',
    ];

    protected $casts = [
        'date' => 'datetime',
        'note' => 'integer',
    ];

    public function utilisateur(): BelongsTo
    {
        return $this->belongsTo(Utilisateur::class, 'id_utilisateur');
    }

    public function contenu(): BelongsTo
    {
        return $this->belongsTo(Contenu::class, 'id_contenu');
    }

    public function getFormattedDateAttribute()
    {
        $now = Carbon::now();
        $commentDate = Carbon::parse($this->date);
        $diffInHours = $now->diffInHours($commentDate);

        if ($diffInHours < 24) {
            if ($diffInHours < 1) {
                $diffInMinutes = $now->diffInMinutes($commentDate);
                return "Il y a {$diffInMinutes} minute" . ($diffInMinutes > 1 ? 's' : '');
            }
            return "Il y a {$diffInHours} heure" . ($diffInHours > 1 ? 's' : '');
        }

        return $commentDate->format('d/m/Y à H:i');
    }

    public function canBeEditedBy(Utilisateur $user): bool
    {
        return $this->id_utilisateur === $user->id;
    }

    public function canBeDeletedBy(Utilisateur $user): bool
    {
        return $this->id_utilisateur === $user->id || $user->isAdmin() || $user->isModerator();
    }
}