<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = "tags";

    protected $fillable = ['name'];

    /*
    * Relacion muchos a muchos (un art puede tener muchos tag y un tag puede tener muchos art) BELONGSTOMANY.
    */
    public function articles()
    {
    	return $this->belongsToMany('App\Article');
    }
}
