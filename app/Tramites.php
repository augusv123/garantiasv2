<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tramites extends Model
{
    protected $table = 'Tramites';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'cliente'
    ];
}
