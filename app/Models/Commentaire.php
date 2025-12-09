<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{
    use HasFactory;

    protected $table = 'commentaires';
    protected $primaryKey = 'id_commentaire';

    protected $fillable = [
        'id_contenu',
        'id_utilisateur',
        'message',
    ];

    public $timestamps = true;
    const UPDATED_AT = 'updated_at';

    public function contenu()
    {
        return $this->belongsTo(Contenu::class, 'id_contenu');
    }

    public function utilisateur()
    {
        return $this->belongsTo(Utilisateur::class, 'id_utilisateur', 'id');
    }

    public function getFormattedDateAttribute()
    {
        $now = now();
        $diff = $now->diffInMinutes($this->created_at);

        if ($diff < 60) {
            return $diff . ' minute' . ($diff > 1 ? 's' : '');
        } elseif ($diff < 1440) { // 24h = 1440 minutes
            $hours = floor($diff / 60);
            return $hours . ' heure' . ($hours > 1 ? 's' : '');
        } else {
            return $this->created_at->format('d/m/Y H:i');
        }
    }
}

