<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use GuzzleHttp\Client;

class FamiliasComercialesController extends Controller
{
    public function index(){



        $client = new Client(['base_uri' => 'http://localhost/api-garantias/public/api/']);
        // Send a request to https://foo.com/api/test
        $familiascomerciales = $client->request('GET', 'getFamiliasComerciales');
        $familiascomerciales = $familiascomerciales->getBody()->getContents();
        $familiascomerciales = json_decode($familiascomerciales);

        // Send a request to https://foo.com/api/test
        $categoriasDeGarantias = $client->request('GET', 'getCategoriasDeGarantias');
        $categoriasDeGarantias = $categoriasDeGarantias->getBody()->getContents();
        $categoriasDeGarantias = json_decode($categoriasDeGarantias);

        $famComGarantias = $client->request('GET', 'getFamComGarantias?empresa=1');
        $famComGarantias = $famComGarantias->getBody()->getContents();
        $famComGarantias = json_decode($famComGarantias);
        

        
        $familiascomercialesSAP = $client->request('GET', 'getGruposMateriales');
        $familiascomercialesSAP = $familiascomercialesSAP->getBody()->getContents();
        $familiascomercialesSAP = json_decode($familiascomercialesSAP);
        
        // $users = User::orderBy('id', 'ASC')->paginate(15);
        // dd($famComGarantias);
        
        // $familiascomercialesSAP = $client->request('GET', 'getDescripcionFamiliaSAP');
        // $familiascomercialesSAP = $familiascomercialesSAP->getBody()->getContents();
        // $familiascomercialesSAP = json_decode($familiascomercialesSAP);

        
        // 
        $familiascomerciales = array_merge($familiascomerciales, $familiascomercialesSAP);
        // descricao
        // fm-cod-com
        return view('admin.familias.index')->with('familiascomerciales', $familiascomerciales)->with('categoriasDeGarantias', $categoriasDeGarantias)->with('famComGarantias', $famComGarantias);
    }
    // es por ahi rey
public function famComGarantia(Request $request){

	$familiaComercial = $request->input('familiacomercial');
	$categoria = $request->input('categoria');
	$empresa = 1;
	
	$client = new Client(['base_uri' => 'http://localhost/api-garantias/public/api/','verify' => false]);
	$response = $client->request('GET', 'addFamComGarantia', [
		'query' => [
			'familiaComercial' => $familiaComercial,
			'empresa' => $empresa,
			'categoria' => $categoria,
		]
		]);
    $jsond = json_decode($response->getBody());
    return response()->json($jsond);
	// return $this->index();
}

public function deleteFamComGarantia(Request $request){
    
    $valoraborrar = $request->input('valoraborrar');
	$empresa = 1;
	
	$client = new Client(['base_uri' => 'http://localhost/api-garantias/public/api/','verify' => false]);
	$response = $client->request('GET', 'deleteFamComGarantia', [
		'query' => [
			'valoraborrar' => $valoraborrar,
			'empresa' => $empresa,
		]   
		]);
    $jsond = json_decode($response->getBody());
    return response()->json($jsond);

}
public function  getGruposMateriales(){
    $client = new \GuzzleHttp\Client();
    try{

    $response = $client->get('https://vhpirps1ci.hec.grupopiero.com:44300/sap/opu/odata/sap/ZGW_STOCKECO_INFO_SRV/GrupoMaterialSet?$format=json', [    'auth' => [$this->user, $this->pass] ,
     'headers' => [
         'Accept' => 'application/json'
         ]  ]);
        
    }
    catch(\Exception $e){
        return response()->json($e,500);
    }

    $response = $response->getBody()->getContents();
    $response = json_decode($response)->d->results;




    return response()->json($response);


}
}
