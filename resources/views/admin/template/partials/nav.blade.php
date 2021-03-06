<nav class="navbar navbar-default" style="border-radius: 0px;">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Gestion de Garantías</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Usuarios <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="{{ route('admin.users.create') }}">Crear <span class="sr-only">(current)</span></a></li>
            <li><a href="{{ route('admin.users.index') }}">Ver Registrados</a></li>
          </ul>
        </li>
        <li><a href="{{ route('admin.garantias.index') }}">Garantias</a></li>
        <li><a href="{{ route('admin.eventos.index') }}">Eventos</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Excepciones <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="{{ route('admin.exceptuados.create') }}">Crear</a></li>
            <li><a href="{{ route('admin.exceptuados.index') }}">Ver Exceptuados</a></li>
          </ul>
        </li>
        <li><a href="{{ route('admin.tramites.index') }}">Tramites</a></li>
        <li><a href="{{ route('admin.familias.index') }}">Familias Comerciales</a></li>
      </ul>
      <!--
      <form class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
      -->
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">&nbsp;{{ Auth::user()->name }} <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="{{ url('/logout') }}">Cerrar Sesión</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>