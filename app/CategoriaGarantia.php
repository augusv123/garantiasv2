<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoriaGarantia extends Model
{
    protected $table = "cat_garantias";

    protected $fillable = ['descripcion'];


    /**
     * Relacion uno a muchos  (misma categoria para muchas garantias).
     */
    public function garantias()
    {
        return $this->hasMany('App\Garantia');
    }

}
