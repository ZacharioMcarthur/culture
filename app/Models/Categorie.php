<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Categorie extends Model
{
    use HasFactory;

    protected $table = 'categories';
    protected $primaryKey = 'id_categorie';

    protected $fillable = [
        'nom',
        'slug',
        'description',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($categorie) {
            if (empty($categorie->slug)) {
                $categorie->slug = Str::slug($categorie->nom);
            }
        });

        static::updating(function ($categorie) {
            if ($categorie->isDirty('nom') && empty($categorie->slug)) {
                $categorie->slug = Str::slug($categorie->nom);
            }
        });
    }

    public function contenus()
    {
        return $this->hasMany(Contenu::class, 'id_categorie');
    }
}

