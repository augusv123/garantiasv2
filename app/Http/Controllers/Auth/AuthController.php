<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Flash;
use Session;
//Agrego siguientes para email verification on registry
use Illuminate\Http\Request;
use App\ActivationService;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;
    //Agregado Servicio de Activacion via email
    protected $activationService;
    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /* Metodos overrided para email verification */
    public function __construct(ActivationService $activationService)
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
        
        $this->activationService = $activationService;
    }

    public function register(Request $request)
    {
        $error = false;
        if($request->email != $request->email2)
        {   
            $error=true;
            Session::put('error_validacion_email','Los emails no coinciden.');
            // dd($validator->getMessageBag());
        }
        $validator = $this->validator($request->all());
        if ($validator->fails() || $error==true) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        $user = $this->create($request->all());
        
        $this->activationService->sendActivationMail($user);

        return redirect('/login')->with('status', 'Le hemos enviado un enlace de activación de cuenta. Verifique su e-mail.');
 }
    /* FIN Overrided */

    /**
     * Al loguearse verifico si usuario está activado, de no estarlo le mando un nuevo mail de confirmacion.
     *
     * @return void
     */
    public function authenticated(Request $request, $user)
    {
        if (!$user->activated) {
            $this->activationService->sendActivationMail($user);
            auth()->logout();
            return back()->with('warning', 'Necesitamos confirmar la existencia de su correo. Le hemos enviado un enlace de activación de cuenta, verifique su e-mail. Si el email no le llega puede que haya introducido un email erroneo al registrarse.');
        }
        //return redirect()->intended(Session::pull('referrer'));
        return redirect()->intended($this->redirectPath());
    }

    public function activateUser($token)
    {
        if ($user = $this->activationService->activateUser($token)) {
            auth()->login($user);
            return redirect($this->redirectPath());
        }
        abort(404);
    }

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
/*
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }
*/
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'dni' => 'required|min:8|max:8|unique:users',
            'password' => 'required|min:6|confirmed',
            'terms' => 'required|accepted'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'dni' => $data['dni'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
}
