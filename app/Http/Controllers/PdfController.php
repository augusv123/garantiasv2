<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use GuzzleHttp\Client;

use App\Garantia;

use QrCode;

use Flash;

use Auth;

use PDF;
class PdfController extends Controller
{
    public function comprobante($id) 
    {
        $garantia = json_decode($this->getData($id));
        $hoy = date('Y-m-d');
		$comprobante = $id;
		// $garantia = 3;
        // $hoy = 2;
        // $comprobante = 1;
        // $view =  \View::make('pdf.pruebapdf', compact('garantia', 'hoy', 'comprobante'))->render();
        // $pdf = \App::make('dompdf.wrapper');
		// $pdf->loadHTML($view);

		$data = [
			'garantia' => $garantia,
			'hoy' => $hoy,
			'comprobante' => $comprobante
			  ];
	
			//   $data2 = [
			// 	'garantia' => 125,
			// 	'hoy' => 2132,
			// 	  ];
		
		  $pdf = @PDF::loadView('pdf.comprobante',$data)->setPaper('a4', 'landscape');  
		
		//   $options = $pdf->getOptions();
		//   $options->setIsHtml5ParserEnabled(true);
		//   $pdf->setOptions($options);
		//   $pdf->setOptions('setIsHtml5ParserEnabled',true);

        return @$pdf->setPaper('a6', 'landscape')->stream('prueba');
    }

    public function DescargarComprobante($id) 
    {
        $garantia = json_decode($this->getData($id));
        $hoy = date('Y-m-d');
        $comprobante = $id;
		$pdf = PDF::loadView('pdf.comprobante', compact('garantia', 'hoy', 'comprobante'));
		return $pdf->setPaper('a6', 'landscape')->download($id.'.pdf');
    }

    public function getData($id) 
    {
		$urlQr = "qrcodes/";

    	if($id != null){
    	$garantia = Garantia::where('id_garantia' , '=', $id)->first();
    		if(!$garantia){
    			$garantia = null;  //RETORNAR VISTA 404
    		}else{
    		/* Traigo relaciones */
    			$garantia->user;

    		/* Busco en API Descripcion */
    		$client = new Client(['base_uri' => 'http://localhost/api-garantias/public/api/item','verify' => false]);
			$response = $client->request('GET', '', [
					'query' => [
							'tag' => 'item',
							'itcodigo' => $garantia->it_codigo,
					]
				]);

				$jsond = json_decode($response->getBody());
			if($jsond->success){
				$garantia->descripcion = $jsond->descripcion;
				$garantia->caducidad =  date ( 'j/m/Y' , strtotime('+5 years' , strtotime(date($garantia->fecha_compra))));
			}else{ 
				$garantia->descripcion = "No encontrado"; 
			}
			
			QrCode::format('png')->size(150)->margin(1)->generate('http://garantias.piero.com.ar/consulta/'.$id, '../public/qrcodes/'.$id.'.png');

			$garantia->qr = $urlQr.$garantia->id_garantia.".png";
		}
		}else{
			$garantia = null;
		}

		return json_encode($garantia);

/*
        $data =  [
            'quantity'      => '1' ,
            'description'   => 'some ramdom text',
            'price'   => '500',
            'total'     => '500'
        ];
        return $data;
*/
    }
}
