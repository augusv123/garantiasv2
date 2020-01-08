<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use GuzzleHttp\Client;

use App\Garantia;

use App\CategoriaGarantia;

use App\Evento;

use QrCode;

use Flash;

use Auth;

use Mail;

use Carbon\Carbon;

use App\Http\Requests\GarantiaRequest;

class EventosController extends Controller
{

	public function index()
    {
    	$eventos = Evento::orderBy('id', 'ASC')->paginate(5);
    	return view('admin.eventos.index')->with('eventos', $eventos);

    }



    public function postNuevoevento(Request $request){
        // try {
        //     if(Auth::User()!=null){
        //         if(Auth::User()->type != 'admin'){
        //             return -3;
        //         }
        //     }else return -3;
            
        // } catch (\Throwable $th) {
        //     return -3;
        // }
        $id = $request->input('idGarantiaAEjecutar');
        $observacion = $request->input('observaciones');
        $fecha = \DateTime::createFromFormat('d/m/Y', $request->input('fecha'));
        $tipo = $request->input('tipo');

        // Agrego un evento en BD para esta garantía
        if($request->input('idGarantiaAEjecutar') && $request->input('observaciones') && $request->input('fecha')){
            $evento = new Evento;
            $evento->garantia_id = $id;
            $evento->observaciones = $observacion;
						$evento->fecha = $fecha;
						$evento->tipo = $tipo;
            $evento->save();
            $ejecutada = true;
        }else{
            $ejecutada = false;
        }

        return json_encode($ejecutada);

    }

}
