<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsersRoles extends Model
{   
    protected $table = 'users_roles';
	protected $fillable = [
        'user_id', 'role_id', 
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id', 'id');
    }
}
