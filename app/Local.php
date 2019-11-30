<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Local extends Model
{
    protected $table = 'locais';
	protected $fillable = [
        'nome', 'descricao'
    ];

    public function locais()
    {
        return $this->hasMany(Local::class, 'blocoId', 'id');
    }
}
