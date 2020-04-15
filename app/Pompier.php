<?php

namespace App;
use Illuminate\Notifications\Notifiable;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Pompier extends Authenticatable
{
    use Notifiable;

    protected $table = 'pompiers';




    protected $fillable = [
        'P_NOM','P_PRENOM','P_CODE','P_EMAIL', 'P_MDP'
    ];

    protected $hidden = [
        'P_MDP',
    ];




    public function getAuthPassword()
    {
      return $this->P_MDP;
    }
}



