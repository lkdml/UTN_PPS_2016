{include file="header.tpl"
css='<link rel="stylesheet" href="./modulos/back-end/css/validacion.css">'
js=''
}
{include file="panelLateral.tpl"}


  <!-- =============================================== -->
<div class="content-wrapper">
 <!-- Content Header (Page header) -->
 <section class="content-header">
   <h1>
      <strong>Alta/Modificación Tipo Ticket</strong>
     <small></small>
   </h1>
   <ol class="breadcrumb">
     <li><a href="/operador.php?modulo=dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
     <li class="active">Administración > Tipo de Ticket > Nuevo Tipo de Ticket</li>
   </ol>
 </section>

 <section class="content">
    <div class="box box-info">
         <!-- form start -->
        <form action="{$rutaCSS}../controlador/tipoTicketAction.php{if $TicketTipo}?tipoTicket={$TicketTipo->getTipoTicketId()}{/if}" id= "nuevoTipoTicketForm" class="form-horizontal"  method="post">
            <div class="box-body">
                <div class="box">
                    <div class="form-group">
                        <div class="box-body pad">
                            <label for="inputNombre" class="col-sm-2 control-label">Nombre</label>
                            <div class="col-sm-5">
                              <input type="text" class="form-control" id="inputNombre" name="nombre" {if $TicketTipo}value='{$TicketTipo->getNombre()}'{/if}>
                            </div>
                        </div>
                        <!-- body pad end -->
                         <div class="box-body pad">
                            <label for="inputDescripcion" class="col-sm-2 control-label">Descripción</label>
                            <div class="col-sm-5">
                              <input type="text" class="form-control" id="inputDescripcion" name="descripcion" {if $TicketTipo}value='{$TicketTipo->getDescripcion()}'{/if}>
                            </div>
                        </div>
                        <!-- body pad end -->
                        <!-- body pad end -->
                         <div class="box-body pad">
                            <label for="inputDescripcion" class="col-sm-2 control-label">Icono</label>
                            <div class="col-sm-5">
                                <button role="iconpicker" data-search="false" data-placement="bottom" data-rows="5" data-cols="6" id="icono" name="icono" {if $TicketTipo}data-icon='{$TicketTipo->getIcono()}'{/if} ></button>
                            </div>
                        </div>
                        <div class="box-body pad">
                          <label for="comboEstadosApertura" class="col-md-2 control-label" >Estado de apertura</label>
                          <div class="col-md-5">
                           <select class="form-control select2" id="comboEstadosApertura" name="EstadoApertura" style="width: 100%;">
                              <option value = "-1">Seleccione un Estado...</option>
                             
                                {if $TicketEstadosApertura}
                                  {foreach from=$TicketEstadosApertura item=$Estado}
                                    <option value="{$Estado->getEstadoId()}" {if $TicketTipo} {if $TicketTipo->getEstadoApertura()->getEstadoId() == $Estado->getEstadoId()} selected {/if}{/if}>{$Estado->getNombre()}</option>
                                  {/foreach}
                                {/if}
                            </select>
                          </div>
                        </div>
                        <div class="box-body pad">
                          <label for="comboEstadosCierre" class="col-md-2 control-label" >Estado de cierre</label>
                          <div class="col-md-5">
                           <select class="form-control select2" id="comboEstadosCierre" name="EstadoCierre" style="width: 100%;">
                              <option value = "-1">Seleccione un Estado...</option>
                                {if $TicketEstadosCierre}
                                  {foreach from=$TicketEstadosCierre item=$Estado}
                                    <option value="{$Estado->getEstadoId()}" {if $TicketTipo} {if $TicketTipo->getEstadoCierre()->getEstadoId() == $Estado->getEstadoId()} selected {/if}{/if}>{$Estado->getNombre()}</option>
                                  {/foreach}
                                {/if}
                            </select>
                          </div>
                        </div>
                  
                        <!-- body pad end -->
                    </div>
                    <!-- form group end -->
                </div>
                <!-- box end -->
                 <div class="box-footer col-sm-3 pull-right">
                  <button onclick="window.location='/operador.php?modulo=tipoTickets';return false;" class="btn btn-danger pull-left btn-lg">Cancelar</button>
                  {if $Permisos->verificarPermiso(array("tipoTicket_crear","tipoTicket_editar"))}
                      <button type="submit" class="btn btn-info pull-right btn-lg">Enviar</button>
                  {/if}
                </div>
            </div>
            <!-- box body end -->
             
           
        </form>
        <!-- form end -->
    </div>
    <!-- box info end-->
</div>
  
  
<!-- jQuery 2.2.0 -->
<script src="{$rutaJS}jQuery-2.2.0.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="{$rutaJS}bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="{$rutaJS}jquery.slimscroll.js"></script>
<!-- FastClick -->
<script src="{$rutaJS}fastclick.js"></script>
<!-- AdminLTE App -->
<script src="{$rutaJS}app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{$rutaJS}demo.js"></script>
<!--Iconpicker -->
<script src="{$rutaJS}bootstrap-iconpicker.js"></script>
<!-- Validaciones -->
<script src="{$rutaJS}jquery-validator-min.js"></script>
<script src="{$rutaJS}validacionNuevoTipoDeTicket.js"></script>
<!-- No enter for submitting v1.0 -->
<script src="{$rutaJS}noEnter.js"></script>

{literal}
<script>
    $("#icono").click(function(e){
    e.preventDefault();
    });
</script>
{/literal}


 {include file="footer.tpl"}