<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Usuarios extends Authenticatable
{
    use HasFactory;

    protected $table = 'usuarios';

    // Defina aqui quaisquer campos ou métodos adicionais específicos do seu modelo Usuarios
}
