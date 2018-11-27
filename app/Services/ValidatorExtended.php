<?php namespace App\Services;

     use Illuminate\Validation\Validator;
     use Carbon\Carbon;
     use Illuminate\Support\Facades\Hash;
     use Illuminate\Support\Facades\Auth;
     use App\Exceptuado;

     class ValidatorExtended extends Validator {

         private $_custom_messages = array(
             "ultimos_seismeses" => "Su solicitud de extensión de garantía es rechazada por haberse requerido vencido el plazo de 12 meses para su obtención. Verifique que la fecha de recepción esté dentro de los 12 meses, de lo contrario solicite una excepción al 4117-7200 o via e-mail a atencionalcliente@piero.com.ar . ",
             "plazo_garantia" => "Se ha consumido el tiempo de garantia piero correspondiente al colchon que intenta registrar",
             "fecha_mayor_a_hoy" => "La fecha compra/recepcion no puede ser posterior a Hoy",
             "menor_a_fecha_compra" => "La fecha de recepcion del producto no puede ser anterior a la fecha de compra.",
             "current_password" => "La contraseña actual ingresada no es correcta",
         );

         public function __construct( $translator, $data, $rules, $messages = array(), $customAttributes = array() ) {
             parent::__construct( $translator, $data, $rules, $messages, $customAttributes );

             $this->_set_custom_stuff();
         }

         protected function _set_custom_stuff() {
             //setup our custom error messages
             $this->setCustomMessages( $this->_custom_messages );
         }

         /*
         *  Validacion para que la fecha esté dentro de los 6 meses de garantia legal
         */
        protected function validateUltimosSeismeses( $attribute, $value, $parameters, $validator) {

             $orden = array_get($this->data, $parameters[0]);
             $etiq = array_get($this->data, $parameters[1]);

             $hoy =  strtotime('today');
             $seisMesesAtras = strtotime ( '-12 month' , $hoy );
             $fechaCompra =  strtotime(str_replace('/', '-', $value));

             if($fechaCompra >= $seisMesesAtras) {
                 return true;
             }
             else {
                //aca deberé chequear que esté exceptuado o no
                if (Exceptuado::where('orden', '=', $orden)->where('etiqueta', '=', $etiq)->exists()) {
                    return true;
                }
                else{
                    return false;
                }

             }
        }

         /*
         *  Validacion para al registro del colchon no se haya consumido el plazo de la garantia piero correspondiente al mismo
         */
        protected function validatePlazoGarantia( $attribute, $value, $parameters, $validator) {

             $param1 = array_get($this->data, $parameters[0]);
             //$param1 = array_get($validator->getData(), $parameters[0]);

             $hoy =  strtotime('today');
             $fechaCompra =  strtotime(str_replace('/', '-', $value));
             $finDePlazo = strtotime ( '+'.$param1.' month' , $fechaCompra );

             if(($finDePlazo < $hoy)) {
                 return false;
             }
             else {
                 return true;
             }
        }

         /*
         *  Valida que la fecha de recepcion no sea mayor a la fecha de compra menor_a_fecha_compra (no puedo recibir antes de comprar)
         */
        protected function validateMenorAFechaCompra( $attribute, $value, $parameters, $validator) {

             $param1 = array_get($this->data, $parameters[0]);

             $fechaRecepcion =  strtotime(str_replace('/', '-', $value));
             $fechaCompra = strtotime (str_replace('/', '-', $param1));

             if(($fechaRecepcion < $fechaCompra)) {
                 return false;
             }
             else {
                 return true;
             }
        }

         /*
         *  Validacion para que la fecha de compra no sea mayor a hoy
         */
        protected function validateFechaMayorAHoy( $attribute, $value, $parameters, $validator) {

             $hoy =  strtotime('today');
             $fechaCompra =  strtotime(str_replace('/', '-', $value));

             if($fechaCompra <= $hoy) {
                 return true;
             }
             else {
                 return false;
             }
        }

        /*
        *  Validacion para chequear que la contraseña dada es la correcta para el usuario (utilizado para cambiar contraseña)
        */
        public function validateCurrentPassword($attribute, $value, $parameters)
        {
            return Hash::check($value, Auth::user()->password);
        }

    }
