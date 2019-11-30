<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bloco extends Model
{
	protected $fillable = [
        'nome', 'descricao'
    ];

    //ALTER TABLE `blocos` ADD `created_at` DATETIME NULL DEFAULT NULL AFTER `descricao`, ADD `updated_at` DATETIME NULL DEFAULT NULL AFTER `created_at`;

    public function locais()
    {
        return $this->hasMany(Local::class, 'blocoId', 'id');
    }
}
