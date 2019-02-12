<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Tramites;
class TramitesController extends Controller
{
    public function create($iduser){

        $t = new Tramites();
        $t->cliente = $iduser;
        $t->save();

        return $t->id;
     }

     public function index (){

      $tramites= Tramites::all();
      // var_dump($tramites);
    	return view('admin.tramites.index')->with('tramites', $tramites);

     }
}
