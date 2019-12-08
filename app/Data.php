<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    protected $table = 'datas';
	protected $fillable = [
        'datahoraSolicitacao', 'dataHoraInicial', 'dataHoraFinal', 'reservaId'
    ];

    public function reserva()
    {
        return $this->belongsTo(Reserva::class, 'reservaId', 'id');
    }
}
