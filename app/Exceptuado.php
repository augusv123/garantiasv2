<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exceptuado extends Model
{
    protected $table = "exceptuados";

    protected $fillable = ['orden', 'etiqueta'];

}
