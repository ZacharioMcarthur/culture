<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Parler extends Model
{
    use HasFactory;

    protected $table = 'parler';

    protected $fillable = [
        'region_id',
        'langue_id',
    ];

    public function region(): BelongsTo
    {
        return $this->belongsTo(Region::class, 'region_id');
    }

    public function langue(): BelongsTo
    {
        return $this->belongsTo(Langue::class, 'langue_id');
    }
}