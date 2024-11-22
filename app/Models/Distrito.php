<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Distrito extends Model
{
    use HasFactory;

    protected $table = 'distritos';
    public $timestamps = false;
    protected $fillable = [
        'nombre'
    ];

    public function distritales(){
        return $this->hasMany(Distrito::class, 'distrito');
    }

    // public function reinas(): HasMany
    // {
    //     return $this->hasMany(Reina::class, 'id');
    // }
}
