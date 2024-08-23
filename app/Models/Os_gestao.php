<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Os_gestao extends Model
{
    protected $table = 'os_gestao';

    // Definindo a relação com o modelo Os_ufes
    public function os_ufes()
    {
        return $this->belongsTo(Os_ufes::class, 'id_ufes', 'id_ufes');
    }

    // Adicionar outras relações se necessário
    public function status()
    {
        return $this->belongsTo(Status::class, 'fk_Status_id_status', 'id');
    }

    public function usuario()
    {
        return $this->belongsTo(User::class, 'fk_Usuario_id_usuario', 'id');
    }
}
