<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;


class Article extends Model implements SluggableInterface
{
    use SluggableTrait;

    protected $sluggable = [
        'build_from' => 'title',
        'save_to'    => 'slug',
    ];

    protected $table = "articles";

    protected $fillable = ['title', 'content', 'category_id', 'user_id'];

    /**
     * Relacion categoria a cual pertenece BELONGS.
     */
    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    /*
    * Relacion usuario a cual pertenece BELONGS.
    */
    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    /*
    * Relacion uno a muchos (un articulo muchas imgs)
    */
    public function images()
    {
    	return $this->hasMany('App\Image');
    }

    /*
    * Relacion muchos a muchos (un art puede tener muchos tag y un tag puede tener muchos art) BELONGSTOMANY.
    */
    public function tags()
    {
    	return $this->belongsToMany('App\Tag');
    }
}
