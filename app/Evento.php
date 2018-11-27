<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    protected $table = "eventos";

    protected $fillable = ['garantia_id', 'observaciones', 'fecha', 'tipo'];

    /*
    * Relacion garantia a cual pertenece BELONGS.
    */
    public function garantia()
    {
    	return $this->belongsTo('App\Garantia');
    }
}
