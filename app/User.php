<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'dni',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    /*
    * Relacion usuario a todos sus articulos.
    */
    public function articles(){

        return $this->hasMany('App\Article');

    }

    /*
    * Relacion usuario a todas sus garantias.
    */
    public function garantias(){

        return $this->hasMany('App\Garantia');

    }

    //Check si es admin el user
    public function admin()
    {
        return $this->type === 'admin';
    }

    public function scopeSearchByKeyword($query, $keyword)
    {
        if ($keyword != '') {
            $query->where(function ($query) use ($keyword) {
                $query->where("name", "LIKE","%$keyword%")
                    ->orWhere("email", "LIKE", "%$keyword%")
                    ->orWhere("dni", "LIKE", "%$keyword%");
            });
        }
        return $query;
    }


}
