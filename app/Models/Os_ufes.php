<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Os_ufes extends Model
{
    protected $table = 'os_ufes';

    // Definindo a relação com o modelo Os_gestao
    public function os_gestao()
    {
        return $this->hasMany(Os_gestao::class, 'id_ufes', 'id_ufes');
    }
}
