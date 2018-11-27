<style>
input[type=checkbox] {
  transform: scale(2);
}
</style>
<!-- Modal -->
<div id="terminos" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="min-height:65px;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" style="margin-top: -5px;">Terminos y condiciones
          <p id="notaHabilitaAcept" style="font-size:12px;position:absolute;">(Para habilitar el botón Continuar deberá deslizarse hasta el final de los terminos expuestos y tildar la opcion aceptar.)</p>
            <span class="test">
              <button type="button" class="btn btn-success" id="confirm" style="margin-top:-16px;padding:0px 0px;float:right;margin-right:15px;" disabled>
                <span style="padding: 18px;line-height: 2.4;font-size: 18px;" data-placement="bottom" data-container=".test" data-toggle="popover" title="Atención!" data-content="Para habilitar el botón continuar deberá deslizarse hasta el final de los terminos y condiciones y tildar la aceptación de los mismos ." class="scrollParaHabilitar" ><i class="fa fa-check" aria-hidden="true"></i>Continuar </span>
              </button>
            </span>
        </h4>
      </div>
      <div class="modal-body" style="max-height:400px;overflow-y:auto;">

        <div id="agreement" style="height:100%;">
text
      </div>
      <div class="form-check" id="checkTyC">
<input type="checkbox" class="form-check-input" id="checkBoxID">
<label style="color:#00274e;font-size:20px;" class="form-check-label" for="exampleCheck1"> &nbsp;Acepto los terminos y condiciones</label>
</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default printer" data-dismiss="modal"><i class="fa fa-print" aria-hidden="true"></i> Imprimir</button>
        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i> Cerrar</button>
      </div>
    </div>

  </div>
</div>
<!-- FIN MODAL -->
