<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reina extends Model
{
    use HasFactory;

    protected $table = 'reinas';
    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'frase',
        'foto',
        'distrito',
        'observaciones',
        'miniatura',
    ];

    // public function reinas(): BelongsTo
    // {
    //     return $this->belongsTo(Distrito::class, 'distrito', 'id');
    // }
}
