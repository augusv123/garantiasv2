<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Flash;

use App\Exceptuado;

class ExceptuadosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $exceptuados = Exceptuado::orderBy('id', 'ASC')->paginate(5);
        return view('admin.exceptuados.index')->with('exceptuados', $exceptuados);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.exceptuados.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $exceptuado = new Exceptuado($request -> all());
        $exceptuado->orden = $request->input('orden');
        $exceptuado->etiqueta = $request->input('etiqueta');
        $exceptuado->save();
        return redirect()->action('ExceptuadosController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $exceptuado = Exceptuado::find($id);

        return view('admin.exceptuados.edit')->with('exceptuado', $exceptuado);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       $exceptuado = Exceptuado::find($id);
       $exceptuado->orden = $request->orden;
       $exceptuado->etiqueta = $request->etiqueta;

       $exceptuado->save();

        return redirect()->route('admin.exceptuados.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $exceptuado = Exceptuado::find($id);
        $exceptuado->delete();

        Flash::error('La excepcion sobre la orden <strong>' . $exceptuado->orden . 'E' . $exceptuado->etiqueta . '</strong> ha sido borrada de manera exitosa');
        return redirect()->route('admin.exceptuados.index');
    }
}
