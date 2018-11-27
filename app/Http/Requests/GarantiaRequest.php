<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class GarantiaRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Tomo las reglas de validación a aplicar al Request.
     * (en App/services/ValidatorExtended estan las rules personalizadas)
     *
     * @return array
     */
    public function rules()
    {
        return [
            'ordenProduccion' => 'min:5|max:10|required',
            'etiq' => 'required',
            'itemReg' => 'min:12|max:12|required',
            'userLogged' => 'required',
            'cuitEntidad' => 'min:11|max:11|required',
            'razonSoc' => 'required',
            'validezGarantia' => 'required',
            'numFactura' => 'required',
            'fechaCarton' => 'fecha_mayor_a_hoy', //que fecha no sea mayor a hoy |plazo_garantia:validezGarantia
            'fechaRecepcion' => 'fecha_mayor_a_hoy|ultimos_seismeses:ordenProduccion,etiq|menor_a_fecha_compra:fechaCarton', //valido que este dentro de los seis meses de compra y que fecha no sea mayor a hoy antes |plazo_garantia:validezGarantia ahora solo 6meses
        ];
    }
}
