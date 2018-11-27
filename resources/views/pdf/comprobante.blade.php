

<!DOCTYPE html>
<html lang="en" style="margin:0px;">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title></title>

  </head>
  <body style="background-color:#003665;border:1px dotted #000;padding:20px;">

                <div class="zone" style="padding-bottom:20px;background-color:#fff;font-size: 5mm; font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif;">
                <div style="margin:12px;border-bottom:2px dotted #ddd;">
                    <img src="{{ asset('css/imagenes/logoticket.png') }}" alt="logo" height="80">
                    <div style="position: absolute; right: 10mm; top: 14mm; text-align: right; font-size: 4.5mm; ">
                        <b style="text-align:right;font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Registro de Garantia Extendida</b><br>ID
                         {{ $garantia->id_garantia }}
                    </div>
                </div>
                    <div style="width:100%;font-size:15px;height:110px;margin-top:10px;">
                        <div style="font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif;position: absolute; left: 10mm;width:75%;">

                        Orden : <b> {{ $garantia->orden }} </b>Etiqueta : <b> {{ $garantia->etiqueta }} </b><br>

                        Factura de compra : <b> {{ $garantia->factura }} </b><br>

                        DNI Comprador : <b> {{ $garantia->user->dni }} </b><br>

                        Modelo Producto : <b> {{ $garantia->descripcion }} </b><br>

                        Adquirido a : <b> {{ $garantia->cuit_adquirido }} / {{ $garantia->adquirido_a }} </b><br>

                        </div>
                        <div style="position: absolute; right: 3mm;width:25%;">

                          <img style="right:1mm;" src="{{ asset($garantia->qr) }}" alt="logo" height="100"><br>

                        </div>
                    </div>

                </div>
                <div style="width:100%;font-size:11.5px;text-align:left;color:#fff;">
                        <p style="text-align:justify;font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif;">No valido como Factura.
                         Este comprobante de garantia registrada deberá ser presentado en el local de adquisicion del producto para iniciar
                          el tramite en caso de necesitar ejecutar la garantia.
                          En caso que el local de compra no este disponible, consultas o inquietudes favor
                           dirigirse al siguiente correo electrónico: atencionalcliente@piero.com.ar o teléfono de contacto: +54 (011) 4117-7200
                        <hr>
                        <span style="font-size:10.5px;font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif;">Piero S.A.I.C &copy; 2016&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Fecha emisi&oacute;n: {{ $hoy }}</span>
                      </p>

                </div>
  </body>
</html>
