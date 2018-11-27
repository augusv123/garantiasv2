<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use App\Garantia;
class PerteneceA
{


    protected $auth;

    //Crear una nueva instancia de filtro
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $garantia = Garantia::where('id_garantia' , '=', $request->id)->where('user_id' , '=', $this->auth->user()->id)->first();
        if($garantia)
        {
            return $next($request);
        }
        else
        {
            abort(401);
        }
        
    }
}
