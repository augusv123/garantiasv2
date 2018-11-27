<!DOCTYPE html>
<html>
    <head>
        <title>Acceso restringido</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
            <!-- Styles -->
            <link rel="stylesheet" type="text/css" href="{{ asset('plugins/bootstrap/css/bootstrap.css') }}">
            <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-social.css') }}">
    </head>
    <body>
        <div class="box-admin" style="margin-top:50px;">
            <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="panel-title">Error de registro</div>
                    </div>
                    <div class="panel-body">
                        <img class="img-responsive center-block" src="{{ asset('css/imagenes/error_access.png') }}">
                        <hr>
                        <strong class="text-center">
                            <p class="text-center">Uno de los datos ingresados no es correcto. </p>
                            <ul>
                              <li>Verifique que los datos ingresados son correctos.</li>
                              <li>Verifique que la contraseña coincida con su verificación.</li>
                              <li>Verifique que anteriormente no se haya registrado con su DNI y/o email.</li>
                            </ul>
                            <p>
                                <a href="{{ route('auth.register') }}">Volver a intentarlo</a>
                            </p>
                        </strong>
                    </div>
                </div>

            </div>
        </div>

    </body>
</html>
