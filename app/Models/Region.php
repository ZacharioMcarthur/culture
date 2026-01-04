<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    protected $table = 'regions';
    protected $primaryKey = 'id_region';
    
    protected $fillable = [
        'nom',
        'description',
    ];

    protected $guarded = [];
    
    public function contenus()
    {
        return $this->hasMany(Contenu::class, 'id_region');
    }

    public function utilisateurs()
    {
        return $this->hasMany(Utilisateur::class, 'id_region');
    }
}
