<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $table = 'settings';
    protected $primaryKey = 'id_setting';

    protected $fillable = [
        'cle',
        'valeur',
    ];

    public static function getValue($key, $default = null)
    {
        $setting = static::where('cle', $key)->first();
        return $setting ? $setting->valeur : $default;
    }

    public static function setValue($key, $value)
    {
        return static::updateOrCreate(
            ['cle' => $key],
            ['valeur' => $value]
        );
    }
}

