<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coordenador extends Model
{
    protected $table = 'coordenadores';
	protected $fillable = [
        'id', 'servidorId', 'dataInicial', 'cargo', 'dataFinal'
    ];

    public function servidor()
    {
        return $this->belongsTo(Servidor::class, 'servidorId', 'id');
    }

    public function locais()
    {
        return $this->hasMany(Local::class, 'coordenadorId', 'id');
    }

    public function reservas()
    {
        return $this->hasMany(Reserva::class, 'coordenadorId', 'id');
    }
}
