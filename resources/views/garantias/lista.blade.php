<!-- Modal Estado GTIA-->
<div id="estado" class="modal fade" role="dialog">
  <div class="modal-dialog modal-sm">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" style="">Estado de su garantía hoy</h4>
      </div>
      <div class="modal-body" style="text-align: center;">
            <p>Al hacer uso de su garantía deberá abonar el <span name="porcentajeGtia" id="porcentajeGtia" class="label label-default">Consultar</span> del precio actual del producto para obtener uno nuevo</p>
      </div>
    </div>
  </div>
</div>
<!-- FIN MODAL -->

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
      {{-- @if(!$garantia->ejecutada) --}}
          <tr>
            <td style="font-size:13px;">{{ $garantia->id_garantia }}</br><span class="label label-info">Reg. Fab:  {{ $garantia->orden }}E{{ $garantia->etiqueta }} </span> </td>
            <td>{{ $garantia->desc }}</td>
            <td>{{ $garantia->adquirido_a }}</td>
            <td>{{ $garantia->fecha_compra }}</td>
            <td>{{ $garantia->factura }}</td>
            <td><span class="label {{ $garantia->style }}">{{ $garantia->caducidad }}</span></br>
            @if($garantia->disabled)
              <a style="margin-top:4px;" class="btn btn-primary btn-xs disabled" href="#" > @if($garantia->style == 'label-info') Ejecutada &nbsp; <i class="fa fa-exchange" aria-hidden="true"></i>@else &nbsp;&nbsp; Expirada  &nbsp;&nbsp; <i class="fa fa-dot-circle-o" aria-hidden="true"></i>@endif</a>
            @else
              <a style="margin-top:4px;" class="btn btn-primary btn-xs checkEstadoGtia" href="#" data-toggle="modal" data-id="{{ $garantia->porcentajeReconocido }}" data-target="#estado">&nbsp;&nbsp;&nbsp;&nbsp;Estado <i class="fa fa-question-circle" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;&nbsp;</a>
            @endif
            </td>
            <td style="min-width:129px;">
              <div class="btn-group" role="group" aria-label="Opciones">
                <a style="min-height: 48px;display:inline;padding-top: 11px;padding-left: 5px;padding-right: 5px;" id="#verReclamo" target="_blank" class="btn btn-primary  {{ $garantia->disabled }}" href="{{ URL::route('pdf', $garantia->id_garantia) }}" data-toggle="descboton" data-placement="top" data-content="Descarga Registro GEP"><i class="fa fa-download" aria-hidden="true"></i> Registro</a>
                <a style="min-height: 48px;display:inline;padding-top: 11px;padding-left: 5px;padding-right: 5px;" class="btn btn-danger  {{ $garantia->disabled }}" onclick="return confirm('¿Está seguro que desea eliminar la garantía seleccionada? Esta acción no podrá deshacerse y perderá la garantía vigente.\n\nDetalle de Garantia\n' + '{{ $garantia->orden }}' + 'E' + '{{ $garantia->etiqueta }}' + ' ' + '{{ $garantia->desc }}' + '\nVig. Hasta: ' + '{{ $garantia->caducidad }}' + '\n\n Podrá volver a registrar el producto a futuro solo si este se encuentra dentro de los 12 meses desde la entrega .')" href="{{ URL::route('garantias.destroy', $garantia->id_garantia) }}"><i class="fa fa-trash" aria-hidden="true"></i></a>
              </div>
            </td>
          </tr>
      {{-- @endif --}}
    @endforeach
      </tbody>
      </table>
