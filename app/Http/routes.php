<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//AUTH
Route::auth();
Route::get('user/activation/{token}', 'Auth\AuthController@activateUser')->name('user.activate');

Route::get('login', ['as' => 'auth.login', 'uses' => 'Auth\AuthController@showLoginForm']);
Route::post('login', ['as' => 'auth.login', 'uses' => 'Auth\AuthController@login']);
Route::get('logout', ['as' => 'auth.logout', 'uses' => 'Auth\AuthController@logout']);

// Password Reset Routes... NO HACE FALTA DECLARARLOS SI NO LAS VOY A PERSONALIZAR
//Route::get('password/reset/{token?}', ['as' => 'auth.password.reset', 'uses' => 'Auth\PasswordController@showResetForm']);
Route::get('password/email', ['as' => 'auth.password.email', 'uses' => 'Auth\PasswordController@sendResetLinkEmail']);
//Route::post('password/reset', ['as' => 'auth.password.reset', 'uses' => 'Auth\PasswordController@reset']);

//ADMINISTRACION USUARIOS-CONTROLADOR
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {

    Route::resource('users','UsersController');

    Route::get('/', [   //admin landing
        'uses' => 'UsersController@index',
        'as'   => 'admin.users.index'
        ]);

    Route::get('garantias', [   //para que me permita ver garantias actuales
        'uses' => 'GarantiasController@index',
        'as'   => 'admin.garantias.index'
        ]);

    Route::get('eventos', [   //para que me permita ver garantias actuales
        'uses' => 'EventosController@index',
        'as'   => 'admin.eventos.index'
        ]);
        Route::get('tramites', [   //para que me permita ver tramites
            'uses' => 'TramitesController@index',
            'as'   => 'admin.tramites.index'
            ]);
    
    Route::get('users/{id}/destroy', [   //para que me permita eliminar sin tener un formulario de por medio
    	'uses' => 'UsersController@destroy',
    	'as'   => 'admin.users.destroy'
    	]);

    Route::any('users/search', [   //para que me permita eliminar sin tener un formulario de por medio
    	'uses' => 'UsersController@search',
    	'as'   => 'admin.users.search'
    	]);

    Route::resource('exceptuados', 'ExceptuadosController', ['only' => [
        'index', 'store', 'create', 'edit', 'update'
    ]]);

    Route::get('exceptuados/{id}/destroy', [   //para que me permita eliminar sin tener un formulario de por medio
        'uses' => 'ExceptuadosController@destroy',
        'as'   => 'admin.exceptuados.destroy'
        ]);

    Route::get('dynamicModal/{id}',[
        'as'=>'dynamicModal',
        'uses'=> 'GarantiasController@getGarantiasUsr',
    ]);

});




//DESCARGA DE COMPROBANTES

Route::get('pdf/{id}', [
    'middleware' => ['auth', 'pertenecea'],
    'uses' => 'PdfController@comprobante',
    'as'   => 'pdf'
    ]);

Route::get('downloadPdf/{id}', [
    'middleware' => ['auth', 'pertenecea'],
    'uses' => 'PdfController@DescargarComprobante',
    'as'   => 'DescargarPdf'
    ]);




//consulta publica
   Route::get('/consulta/{id?}', [
        'uses' => 'GarantiasController@Consulta',
        'as'   => 'piero.consulta.id'
        ]);

   Route::get('/productosengarantia', [
             'uses' => 'GarantiasController@productosgep',
             'as'   => 'piero.productosgep'
   ]);

   Route::get('/confidencialidadypdp', [
             'uses' => 'GarantiasController@confidencialidadypdp',
             'as'   => 'piero.confidencialidadypdp'
   ]);

   Route::get('/tyc', [
             'uses' => 'GarantiasController@tyc',
             'as'   => 'piero.tyc'
   ]);

   Route::post('consulta/nuevo-evento', 'EventosController@postNuevoevento');

   Route::get('garantias/{id}/destroy', [   //para que me permita eliminar sin tener un formulario de por medio
     'middleware' => ['auth'],
     'uses' => 'GarantiasController@destroy',
     'as'   => 'garantias.destroy'
     ]);

//cambiar password user logged
Route::post('password/cambiar', [
        'middleware' => ['auth'],
        'uses' => 'UsersController@updatePass',
        'as'   => 'auth.passwords.cambiar'
    ]);
  //eliminar usuario y datos personales
    Route::get('perfil/eliminardatospersonales', [
            'middleware' => ['auth'],
            'uses' => 'UsersController@solicitaeliminar',
            'as'   => 'perfil.solicitaeliminar'
        ]);

Route::delete('/profile/reallydelete', [
        'middleware' => ['auth'],
        'uses' => 'UsersController@eliminardatospersonales',
        'as'   => 'perfil.eliminar'
    ]);

//buscar item sustituido por el que se esta cargando
Route::get('sustituido/{ord}/{etiq}', [
            'middleware' => ['auth'],
            'uses' => 'GarantiasController@sustituido',
            'as'   => 'auth.consultas.sustituido'
    ]);

//segurizar---
//FUTURO CONTROLADOR DE GARANTIAScontroller -- necesito estar loggeado
Route::controller('/', 'GarantiasController');
