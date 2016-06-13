{include file="header.tpl"
css='<link rel="stylesheet" href="./modulos/back-end/css/validacion.css"><link rel="stylesheet" href="./modulos/back-end/css/jquery-ui.css"> '
js='' 
}
{include file="panelLateral.tpl"}
{literal}
<style>
.has-error {
    border-color: red;
    color:red;
    }
.has-success {
    border-color: green;
    color:green;
    }
</style>
{/literal}
  <!-- =============================================== -->
  
   <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/operador.php?modulo=dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Crear/Modificar Ticket</li>
      </ol>
    </section>
 <section class="content">
 <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Ticket</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="{$rutaCSS}../controlador/ticketAction.php{if $Ticket}&TicketId={$Ticket->getTicketId()}{/if}" id="nuevoticketForm" class="form-horizontal" method="POST" enctype="multipart/form-data">
              <div class="box-body">
                <div class="box">
                  <div class="form-group">
                    <div class="box-body pad">
                      <label for="inputAsunto" class="col-md-2 control-label">Propietario</label>
                      <div class="col-md-5">
                        <div class="input-group col-md-12"> 
                            <input type="text" class="form-control" id="searchUsuario" name="Creador" autocomplete="on">
                            <span class="glyphicon form-control-feedback" aria-hidden="true" id="emailValido">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <input type="hidden" id="Propietario-Tipo" name="Propietario-Tipo">
                       </div>
                    </div>  
                  </div>
                  <div class="form-group">
                    <div class="box-body pad">
                      <label for="comboDepto" class="col-md-2 control-label">Departamento</label>
                      <div class="col-md-5">
                       <select class="form-control select2" id="ddDepartamentos" name="Departamento" style="width: 100%;">
                          <option value = "-1">Seleccione un Departamento...</option>
                          {if $Departamentos}
                            {foreach from=$Departamentos item=$departamento}
                              <option value="{$departamento->getDepartamentoId()}">{$departamento->getNombre()}</option>
                            {/foreach}
                          {/if}
                        </select>
                      </div>
                    </div>  
                  </div>
                  <div class="form-group">
                    <div class="box-body pad">
                      <label for="comboTipo" class="col-md-2 control-label">Tipo</label>
                      <div class="col-md-5">
                       <select class="form-control select2" id="ddTipos" name="TicketTipo" style="width: 100%;">
                         <option value = "-1">Seleccione un Tipo...</option>
                              {if $TicketTipos}
                                {foreach from=$TicketTipos item=$TicketTipo}
                                  <option value="{$TicketTipo->getTipoTicketId()}">{$TicketTipo->getNombre()}</option>
                                {/foreach}
                              {/if}
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="box-body pad">
                      <label for="comboPrioridad" class="col-md-2 control-label" >Prioridad</label>
                      <div class="col-md-5">
                       <select class="form-control select2" id="ddPrioridades" name="Prioridad" style="width: 100%;">
                          <option value = "-1">Seleccione una Prioridad...</option>
                            {if $Prioridades}
                              {foreach from=$Prioridades item=$Prioridad}
                                <option value="{$Prioridad->getPrioridadId()}">{$Prioridad->getNombre()}</option>
                              {/foreach}
                            {/if}
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="box-body pad">
                      <label for="comboPrioridad" class="col-md-2 control-label" >Estado</label>
                      <div class="col-md-5">
                       <select class="form-control select2" id="ddEstado" name="Estado" style="width: 100%;">
                          <option value = "-1">Seleccione una Estado...</option>
                            {if $TicketEstados}
                              {foreach from=$TicketEstados item=$Estado}
                                <option value="{$Estado->getEstadoId()}">{$Estado->getNombre()}</option>
                              {/foreach}
                            {/if}
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="box-body pad">
                      <label for="comboSLA" class="col-md-2 control-label" >Asignar Operador</label>
                      <div class="col-md-5">
                       <select class="form-control select2" id="OperadorAsignado" name="OperadorAsignado" style="width: 100%;">
                          <option value = "-1">Seleccione un Operador</option>
                          {if $Operadores}
                              {foreach from=$Operadores item=$operador}
                                <option value="{$operador->getOperadorId()}">{$operador->getNombre()}</option>
                              {/foreach}
                            {/if}
                        </select>
                      </div>
                    </div>
                   </div>
                  {if $SLAs}
                    <div class="form-group">
                      <div class="box-body pad">
                        <label for="comboSLA" class="col-md-2 control-label" >SLA</label>
                        <div class="col-md-5">
                         <select class="form-control select2" id="ddSLAS" name="SLA" style="width: 100%;">
                            <option value = "-1">Seleccione un SLA...</option>
                              {foreach from=$SLAs item=$sla}
                                  <option value="{$sla->getSlaId()}">{$sla->getNombre()}</option>
                              {/foreach}
                          </select>
                        </div>
                      </div>
                    </div>
                  {/if}
                  </div>
                </div><!-- /.box-body Datos Principales -->
                {if $TicketCustomFields}
                  <div class="box-body"><!-- /.box-body Campos Custom -->
                    <div class="box">
                      <div class="box-header">
                        <h3 class="box-title">Campos Personalizados
                        </h3>
                      </div>
                      <!-- /.box-header -->
  
                      <div class="form-group">
                        <label for="titulo" class="col-md-2 control-label">Sistema Operativo</label>
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
                        <label for="comboTipo" class="col-md-2 control-label">Tipo Evento</label>
                        <div class="col-md-5">
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
                        <label for="lblTelefono" class="col-md-2 control-label">Teléfono</label>
                        <div class="col-md-7">
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
                {/if}
              </div>
                <div class="box-body"><!-- /.box-body Asunto Descripcion y Adjuntos -->
                    <div class="box">
                      <div class="box-header">
                        <h3 class="box-title">Descripción
                        </h3>
                      </div>
                        <!-- /.box-header -->

                      <div class="form-group">
                        <div class="box-body pad">
                          <label for="inputAsunto" class="col-md-2 control-label">Asunto</label>
                          <div class="col-md-5">
                            <input type="text" class="form-control" id="txtAsunto" name="Asunto">
                          </div>
                        </div>  
                        <div class="box-body pad">
                            <label for="inputDescripcion" class="col-sm-2 control-label">Descripción</label>
                            
                                <div class="col-md-10">
                                  <textarea class="textarea_msg" name="Descripcion" id="txtDescripcion" style="width: 521px; height: 203px; font-size: 14px; line-height: 18px; border: 1px solid rgb(221, 221, 221); padding: 10px; margin: 0px;"></textarea>
                                <!--  -->
                                </div>
                            
                            <label for="archivo" class="col-sm-2 control-label">Adjuntar</label>
                            <input class="col-sm-10" type="file" id="archivo" name="Archivos[]">
                            
                            <div class="box-footer col-sm-3 pull-right">
                              <button onclick="window.location='/operador.php?modulo=tickets';return false;" class="btn btn-danger pull-left btn-lg">Cancelar</button>
                              {if $Permisos->verificarPermiso(array("ticket_crear","ticket_editar"))}
                                  <button type="submit" class="btn btn-info pull-right btn-lg">Enviar</button>
                              {/if}
                            </div>
                         </div> 
              
                      </div>
                 
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
<!-- Validaciones de form-->
<script src="{$rutaJS}jquery-validator-min.js"></script>
<script src="{$rutaJS}validacionNuevoTicket.js"></script>
<script src="{$rutaJS}bootstrap3-wysihtml5.all.js"></script>
<script src="{$rutaJS}jquery-ui.js"></script>
<!-- No enter for submitting v1.0 -->
<script src="{$rutaJS}noEnter.js"></script>

{literal} 
<script>
  $(function () {
    //bootstrap WYSIHTML5 - text editor
    $(".textarea_msg").wysihtml5();
  });
</script>

<script type="text/javascript">
$().ready(function() {
 $( "#searchUsuario" ).autocomplete({
      minLength: 3,
      source: function(term, response){
        try { xhr.abort(); } catch(e){}
        xhr = $.getJSON('modulos/back-end/controlador/buscarEmailUsuarios.php',term, function(data){ response(data); });
    },
      focus: function( event, ui ) {
        $( "#searchUsuario" ).val( ui.item.Creador );
        return false;
      },
      select: function( event, ui ) {
        $( "#searchUsuario" ).val( ui.item.Creador );
        $( "#Propietario-Tipo" ).val( ui.item.Tipo );
      
        return false;
      }
    })
    .autocomplete( "instance" )._renderItem = function( ul, item ) {
      return $( "<li>" )
        .append( "<a> <small>" + item.Tipo + "</small> " +  item.Nombre + "<br>" +  item.Creador + "</a>" )
        .appendTo( ul );
    };

 });
</script>


{/literal}
  
  
  
{include file='footer.tpl'}