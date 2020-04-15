<?php

namespace App;
use Illuminate\Notifications\Notifiable;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Responsable extends Authenticatable
{
    use Notifiable;


    protected $table='pompiers';



    protected $hidden =['P_MDP',];
    public function getAuthPassword()
    {
        return $this->P_MDP;
    }
}
