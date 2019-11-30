<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    const CREATED_AT = 'dataHoraSolicitacao';
    const UPDATED_AT = 'dataHoraAtualizacao';
	protected $fillable = [
        'dataHoraSolicitacao', 'dataHoraAtualizacao', 'servidorId', 'localId', 'status', 'tipo', 'responsavel', 'cordenadorId'
    ];

    public function servidor()
    {
        return $this->belongsTo(Servidor::class, 'servidorId', 'id');
    }

    public function coordenador()
    {
        return $this->belongsTo(Coordenador::class, 'coordenadorId', 'id');
    }

    public function local()
    {
        return $this->belongsTo(Local::class, 'localId', 'id');
    }

    public function datas()
    {
        return $this->hasMany(Data::class, 'reservaId', 'id');
    }
}
