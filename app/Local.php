<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Local extends Model
{
    protected $table = 'locais';
	protected $fillable = [
        'id','nome', 'status', 'numeroChave', 'capacidade', 'blocoId', 'coordenadorId'
    ];
    
     public function bloco()
    {
        return $this->belongsTo(Bloco::class, 'blocoId', 'id');
    }
    
     public function coordenador()
    {
        return $this->belongsTo(Coordenador::class, 'coordenadorId', 'id');
    }

    public function equipamentos()
    {
        return $this->hasMany(Equipamento::class, 'localId', 'id');
    }
    
     public function reservas()
    {
        return $this->hasMany(Reserva::class, 'localId', 'id');
    }
}
