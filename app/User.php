<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    protected $primaryKey = 'P_ID';
    protected $name='P_NOM';
    protected $email='P_EMAIL';
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'P_NOM', 'P_EMAIL', 'P_MDP','P_CODE','P_STATUT','P_GRADE',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'P_MDP',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */

    public function id()
    {
        return 'P_ID';
    }
    public function getAuthPassword()
    {
      return $this->M_DP;
    }
}
