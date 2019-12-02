<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servidor extends Model
{   
    protected $table = 'servidores';
	protected $fillable = [
        'siape', 'usuarioId', 'nome', 'CPF', 'telefone', 'tipo', 
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuarioId', 'id');
    }

    public function coordenadores()
    {
        return $this->hasOne(Coordenador::class, 'servidorId', 'id');
    }

    public function reservas()
    {
        return $this->hasMany(Reserva::class, 'servidorId', 'id');
    }
}
