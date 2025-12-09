<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Langue extends Model
{
    use HasFactory;

    protected $table = 'langues';
    protected $primaryKey = 'id_langue';

    protected $fillable = [
        'code',
        'nom',
    ];

    public function utilisateurs()
    {
        return $this->hasMany(Utilisateur::class, 'id_langue', 'id_langue');
    }
}

