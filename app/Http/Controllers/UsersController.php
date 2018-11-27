<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;
use Illuminate\Support\Facades\Input;
use Flash, Auth, Hash;

use App\Http\Requests\UserRequest;

use App\Http\Requests\ChangePasswordRequest;

class UsersController extends Controller
{

    public function _construct(){
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('id', 'ASC')->paginate(15);

        return view('admin.users.index')->with('users', $users);
    }

    /**
     * Muestra un listado de usuarios.
     *
     * @return \Illuminate\Http\Response
     */
    public function search()
    {
        $keyword = Input::get('q', '');
        $users = User::SearchByKeyword($keyword)->paginate(15);
        return view('admin.users.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $user = new User($request -> all());
        $user->password = bcrypt($request->password);
        $user->save();

        Flash::success('El usuario <strong>' . $user->name . '</strong> ha sido creado de manera exitosa!');
        return redirect()->route('admin.users.index');
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
        $user = User::find($id);

        return view('admin.users.edit')->with('user', $user);
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
       $user = User::find($id);
       $user->name = $request->name;
       $user->email = $request->email;
       $user->type = $request->type;

       $user->save();

       Flash::success('El usuario ha sido editado con exito.');
       return redirect()->back();
    }

     /**
     * Actualiza user password & profile
     */
    public function updatePass(ChangePasswordRequest $request)
    {

        $user = User::find(Auth::user()->id);
        $user->password = Hash::make($request->input('clave'));

        $user->save();

        Flash::success('Su contraseña ha sido actualizada con exito');
        return redirect()->back();

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        Flash::error('El usuario <strong>' . $user->name . '</strong> ha sido borrado de manera exitosa');
        return redirect()->route('admin.users.index');
    }

    /**
     * Eliminar usuario y datos personales del sistema.
     *
     */
     public function solicitaeliminar()
     {
         return view('auth.perfilsolicitaeliminar');
     }

    public function eliminardatospersonales() // ATENCION / con la implementacion de este metodo. el llamado a un metodo de otro controlador puede causar problemas. Habria que generar un servicio que provea la caducidad de la garantia. 5/6/18
    {
        $user = User::find(Auth::user()->id);
        $garantiasSinEjecutar = $user->garantias->where('ejecutada', '=', 0 );

        foreach ($garantiasSinEjecutar as $garantia) {
          $garantia->caducidad = app(\App\Http\Controllers\GarantiasController::class)->calculoCaducidadGarantia($garantia);
          if(strtotime(date("Y-m-d", strtotime(str_replace('/', '-', $garantia->caducidad)))) > strtotime(date('Y-m-d'))) {
            Flash::error('<i style="font-size:24px;vertical-align: middle;" class="fa fa-exclamation-triangle" aria-hidden="true"></i> <span style="vertical-align:middle;"> Debe renunciar a las garantias vigentes antes de poder eliminar su cuenta definitivamente.</span>');
            return redirect()->action('GarantiasController@getIndex');
          }
        }
        //$user->delete();
        Auth::logout();
        Flash::success('El usuario <strong>' . $user->name . '</strong> ha sido eliminado de manera exitosa.');
        return redirect()->route('auth.login');
    }

}
