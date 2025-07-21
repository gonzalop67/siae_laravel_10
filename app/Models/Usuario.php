<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticable;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticable
{
    use HasFactory, Notifiable;
    protected $table = 'sw_usuario';
    protected $primaryKey = 'id_usuario';

    protected $guarded = [];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function perfiles()
    {
        return $this->belongsToMany(Perfil::class, 'sw_usuario_perfil', 'id_usuario', 'id_perfil');
    }
}
