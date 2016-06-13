{include file="header.tpl"
css='<link rel="stylesheet" href="./modulos/front-end/css/validacion.css">'
js=''
}
{include file="panelLateral.tpl"}

 <!-- =============================================== -->
 
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Nuevo Ticket</li>
      </ol>
    </section>
    <section class="content">
 <!-- Horizontal Form -->
          <div class="box box-info ">
            <div class="box-header with-border">
              <h3 class="box-title">Nuevo Ticket</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="{$rutaCSS}../controlador/nuevoTicketAction.php" id="nuevoTicketForm" class="form-horizontal" method="POST" enctype="multipart/form-data">
              <div class="box-body">
                <div class="box">
                    <div class="box-body pad">
                      <div class="form-group">
                          <label for="comboDepto" class="col-sm-2 control-label">Departamento</label>
                          <div class="col-sm-3">
                             <select class="form-control select2" id="ddDepartamentos" name="Departamento" style="width: 100%;">
                              <option value = "-1" datos-depto="Seleccione un departamento 'Destino' para su ticket">Seleccione un Departamento...</option>
                              {if $Departamentos}
                                {foreach from=$Departamentos item=$departamento}
                                  <option value="{$departamento->getDepartamentoId()}" datos-depto="{$departamento->getDescripcion()}">{$departamento->getNombre()}</option>
                                {/foreach}
                              {/if}
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="textDepto" class="col-sm-1 control-label">Descripcion:</label>
                            <div class="col-sm-5">
                               <p class="form-control-static" id="descripcion-depto">...</p>
                            </div>
                          </div>
                      </div>  
                   </div>
                   <div class="box-body pad">
                      <div class="form-group">
                          <label for="comboTipo" class="col-sm-2 control-label">Tipo</label>
                          <div class="col-sm-3">
                          <select class="form-control select2" id="ddTipos" name="TicketTipo" style="width: 100%;">
                            <option value = "-1" datos-tipo="Seleccione un tipo de ticket, estos permiten organizar mejor su solicitud">Seleccione un Tipo...</option>
                            {if $TicketTipos}
                              {foreach from=$TicketTipos item=$TicketTipo}
                                <option value="{$TicketTipo->getTipoTicketId()}" datos-tipo="{$TicketTipo->getDescripcion()}">{$TicketTipo->getNombre()}</option>
                              {/foreach}
                            {/if}
                          </select>
                          </div>
                          <div class="form-group">
                            <label for="textTipoTicket" class="col-sm-1 control-label">Descripcion:</label>
                            <div class="col-sm-5">
                               <p class="form-control-static" id="descripcion-tTicket">...</p>
                            </div>
                          </div>
                      </div>  
                   </div>
                   <div class="box-body pad">
                      <div class="form-group">
                          <label for="comboTipo" class="col-sm-2 control-label">Estado</label>
                          <div class="col-sm-3">
                          <select class="form-control select2" id="ddEstados" name="Estado" style="width: 100%;">
                            <option value = "-1" datos-estado="Seleccione un estado para el ticket a crear">Seleccione un Estado...</option>
                            {if $TicketEstados}
                              {foreach from=$TicketEstados item=$Estado}
                                <option value="{$Estado->getEstadoId()}" datos-estado="{$Estado->getDescripcion()}">{$Estado->getNombre()}</option>
                              {/foreach}
                            {/if}
                          </select>
                          </div>
                          <div class="form-group">
                            <label for="textTipoTicket" class="col-sm-1 control-label">Descripcion:</label>
                            <div class="col-sm-5">
                               <p class="form-control-static" id="descripcion-Estado">...</p>
                            </div>
                          </div>
                      </div>  
                   </div>
                   <div class="box-body pad">
                      <div class="form-group">
                          <label for="comboTipo" class="col-sm-2 control-label">Prioridad</label>
                          <div class="col-sm-3">
                          <select class="form-control select2" id="ddPrioridades" name="Prioridad" style="width: 100%;">
                            <option value = "-1" datos-prioridad="Seleccione una prioridad para organizar mejor su solicitud">Seleccione una Prioridad...</option>
                            {if $Prioridades}
                              {foreach from=$Prioridades item=$Prioridad}
                                <option value="{$Prioridad->getPrioridadId()}" datos-prioridad="{$Prioridad->getDescripcion()}">{$Prioridad->getNombre()}</option>
                              {/foreach}
                            {/if}
                          </select>
                          </div>
                          <div class="form-group">
                            <label for="textTipoTicket" class="col-sm-1 control-label">Descripcion:</label>
                            <div class="col-sm-5">
                               <p class="form-control-static" id="descripcion-Prioridad">...</p>
                            </div>
                          </div>
                      </div>  
                   </div>
                   
                  </div>
                </div><!-- /.box-body Datos Principales -->
                
                {if $CamposCustom} 
                  <div class="box-body"><!-- /.box-body Campos Custom -->
                    <div class="box">
                      <div class="box-header">
                        <h3 class="box-title">Campos Personalizados
                        </h3>
                      </div>
                      <!-- /.box-header -->
  
                      <div class="form-group">
                        <label for="titulo" class="col-sm-2 control-label">Sistema Operativo</label>
                        <div class="col-md-4 radio">
                            <label>
                              <input type="radio" name="optionsRadios" id="optnWin" value="optnWindows" checked>
                              Windows
                            </label>
                        </div>
                        <div class="col-md-4 radio">
                            <label>
                              <input type="radio" name="optionsRadios" id="optnLinux" value="optnLinux">
                              Linux
                            </label>
                        </div>
                      </div>
    
                  
                      <div class="form-group">
                        <label for="comboTipo" class="col-sm-2 control-label">Tipo Evento</label>
                        <div class="col-sm-10">
                         <select class="form-control select2" style="width: 100%;">
                            <option selected="selected">Evento1</option>
                            <option>Evento1</option>
                            <option>Evento3</option>
                            <option>Evento4</option>
                            <option>Evento5</option>
                            <option>Evento6</option>
                            <option>Evento7</option>
                          </select>
                        </div>
                       
                      </div>
              
                      <div class="form-group">
                        <label for="lblTelefono" class="col-sm-2 control-label">Teléfono</label>
                        <div class="col-sm-10">
                          <div class="col-sm-4 input-group">
                            <div class="input-group-addon">
                              <i class="fa fa-phone"></i>
                            </div>
                            <input type="text" class="form-control" data-inputmask='"mask": "9-999-9999"' data-mask>
                            </div>
                        </div>
                      </div>
                      <br>
                  </div><!-- /.box-body Campos Custom -->
                </div>
                {/if}
                <div class="box-body"><!-- /.box-body Asunto Descripcion y Adjuntos -->
                    <div class="box">
                      <div class="box-header">
                        <h3 class="box-title">Descripción
                        </h3>
                      </div>
                        <!-- /.box-header -->

                      <div class="form-group">
                        <div class="box-body pad">
                          <label for="inputAsunto" class="col-sm-2 control-label">Asunto</label>
                          <div class="col-sm-6">
                            <input type="text" class="form-control" id="txtAsunto" name="Asunto">
                          </div>
                        </div>  
                        <div class="box-body pad">
                            <label for="inputDescripcion" class="col-sm-2 control-label">Descripción</label>
                            <div class="col-sm-6">
                              <textarea class="textarea_msg" placeholder="Ingrese una Descripción" name="Descripcion" id="txtDescripcion" style="width: 100%; height: 203px; font-size: 14px; line-height: 18px; border: 1px solid rgb(221, 221, 221); padding: 10px; margin: 0px;"></textarea>
                            </div>
                        </div> 
                        <div class="box-body pad">
                            <label for="archivo" class="col-sm-2 control-label">Adjuntar</label>
                            <input class="col-sm-10" type="file" id="archivo" name="adjuntos[]">
                        </div> 
                      </div>
                    </div>
                    <div class="box-footer pull-right">
                      <button onclick="window.location='/index.php?modulo=home';return false;" class="btn btn-danger pull-left btn-lg">Cancelar</button>
                      <button type="submit" class="btn btn-info btn-lg pull-right">Enviar</button>
                    </div>
                  </div><!-- /.box-body Asunto Descripcion y Adjuntos -->
              </div>
            </form>
  </div> 
    </section>
 <link rel="stylesheet" href="{$rutaCSS}bootstrap3-wysihtml5.min.css">
</div>
<script src="{$rutaJS}jQuery-2.2.0.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="{$rutaJS}bootstrap.min.js"></script>
<!-- FastClick -->
<script src="{$rutaJS}fastclick.js"></script>
<!-- AdminLTE App -->
<script src="{$rutaJS}app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{$rutaJS}demo.js"></script>
<!-- Validaciones FrontEnd -->
<script src="{$rutaJS}jquery-validator-min.js"></script>
<script src="{$rutaJS}validacionNuevoTicket.js"></script>
<script src="{$rutaJS}bootstrap3-wysihtml5.all.js"></script>

{literal} 
<script>
  $(function () {
    //bootstrap WYSIHTML5 - text editor
    $(".textarea_msg").wysihtml5();
  });
</script>
<script>

$(document).ready(function(){
        
        $("#ddDepartamentos").change(function(){
                var op = $("#ddDepartamentos option:selected").attr("datos-depto");
                $('#descripcion-depto').html(op);
        });
        $("#ddTipos").change(function(){
                var op = $("#ddTipos option:selected").attr("datos-tipo");
                $('#descripcion-tTicket').html(op);
        });
        $("#ddEstados").change(function(){
                var op = $("#ddEstados option:selected").attr("datos-estado");
                $('#descripcion-Estado').html(op);
        });
        $("#ddPrioridades").change(function(){
                var op = $("#ddPrioridades option:selected").attr("datos-prioridad");
                $('#descripcion-Prioridad').html(op);
        });
        $("#ddDepartamentos").val("-1").trigger('change');
        $("#ddTipos").val("-1").trigger('change');
        $("#ddPrioridades").val("-1").trigger('change');
        $("#ddEstados").val("-1").trigger('change');
});
</script>
{/literal}


{include file="footer.tpl"}