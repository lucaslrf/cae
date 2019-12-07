<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipamento extends Model
{
    protected $table = 'equipamentos';
	protected $fillable = [
        'id','nome', 'status', 'tombo', 'decricao', 'localId'
    ];
    
     public function Local()
    {
        return $this->belongsTo(Local::class, 'localId', 'id');
    }
    
}
