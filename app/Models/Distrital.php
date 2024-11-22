<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Distrital extends Model
{
    use HasFactory;

    public $timestamps = false;
    public $table = 'distrital';
    protected $fillable = [
        'nombre',
        'frase',
        'foto',
        'distrito',
        'unico',
    ];
    public function distritos(){
        return $this->belongsTo(Distrito::class, 'distrito');
    }
}
