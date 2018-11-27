

        <table class="footable table table-hover table-striped"   data-filter="#filtro" data-filter-text-only="true" >
      <thead>
          <tr class="tblheader">
            <th>Codigo ID</th>
            <th data-hide="phone">Modelo</th>
            <th data-hide="phone,tablet">Adquirido a</th>
            <th data-hide="phone,tablet">Fecha Compra</th>
            <th data-hide="phone,tablet">Factura</th>
            <th data-hide="phone">Vig. Hasta</th>
            <th>Opciones</th>
          </tr>
      </thead>
      <tbody>
    @if($garantias->isEmpty())
      <tr>
        <td colspan="7" style="font-size:13px;">Aún no ha registrado productos adquiridos.</td>
      </tr>
    @endif
    @foreach($garantias as $garantia)
          <tr>
            <td style="font-size:13px;">{{ $garantia->id_garantia }}</td>
            <td>{{ $garantia->desc }}</td>
            <td>{{ $garantia->adquirido_a }}</td>
            <td>{{ $garantia->fecha_compra }}</td>
            <td>{{ $garantia->factura }}</td>
            <td><span class="label {{ $garantia->style }}">@if($garantia->ejecutada) {{ 'EJECUTADA' }} @else {{ $garantia->caducidad }} @endif </span></td>
            <td>
              <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle {{ $garantia->disabled }}" type="button" data-toggle="dropdown">Opciones
                <span class="caret"></span></button>
                <ul class="dropdown-menu">
                  <li><a id="#verReclamo" target="_blank" href="{{ URL::route('pdf', $garantia->id_garantia) }}">Ver/Imprimir</a></li>
                  <li><a id="#envioEmail" target="_blank" href="{{ URL::route('DescargarPdf', $garantia->id_garantia) }}">Descargar PDF</a></li>
                </ul>
              </div>
            </td>
          </tr>
    @endforeach
      </tbody>
      </table>
