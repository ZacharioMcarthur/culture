<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    protected $table = 'notes';
    protected $primaryKey = 'id_note';

    protected $fillable = [
        'id_contenu',
        'id_utilisateur',
        'valeur',
    ];

    protected $casts = [
        'valeur' => 'integer',
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
}

