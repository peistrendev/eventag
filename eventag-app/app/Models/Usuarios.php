<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable; 

use Illuminate\Database\Eloquent\Model;

class Usuarios extends Authenticatable
{
    protected $table = 'usuario';
    protected $fillable = ['email', 'password','name','rol_id'];

    public function rol(){
        return $this->hasOne(Rol::class);
    }
     public function expositor(){
        return $this->hasOne(Expositor::class);
    }
}
