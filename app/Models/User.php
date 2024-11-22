<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $table = 'residentes';
    public $timestamps = false;

    protected $fillable = [
        'dni',
        'apellido',
        'nombre',
        'anio',
        'domicilio',
        'email',
        'clave',
        'distrital',
        'habilitado',
        'observaciones',
        'artes',
        'educacion',
        'salud',
        'deportes',
        'laborsocial',
        'economia',
        'tipo',
        'vendimia',
        'artes_gral',
        'educacion_gral',
        'salud_gral',
        'deportes_gral',
        'laborsocial_gral',
        'economia_gral',
        // 'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    // protected $hidden = [
    //     'password',
    //     'remember_token',
    // ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    // protected $casts = [
    //     'email_verified_at' => 'datetime',
    //     'password' => 'hashed',
    // ];
}
