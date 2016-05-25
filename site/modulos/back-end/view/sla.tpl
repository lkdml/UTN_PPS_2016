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
      <strong>Alta/Modificación SLA</strong>
     <small></small>
   </h1>
   <ol class="breadcrumb">
     <li><a href="/operador.php?modulo=dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
     <li class="active">Administración > SLAs > Nuevo SLA</li>
   </ol>
 </section>

 <section class="content">
    <div class="box box-info">
         <!-- form start -->
        <form action="{$rutaCSS}../controlador/slaAction.php{if $Sla}?slaId={$Sla->getSlaId()}{/if}" id = "nuevoSLAForm" class="form-horizontal" method="post">
            <div class="box-body">
                
                <!--DATOS GENERALES -->
                <div class="box">
                    <div class="box-header">
                      <h3 class="box-title">Datos Generales
                      </h3>
                    </div>
                    <div class="form-group">
                        <div class="box-body pad">
                            <label for="inputNombre" class="col-sm-2 control-label">Nombre</label>
                            <div class="col-sm-5">
                              <input type="text" class="form-control" id="inputNombre" name="nombre" {if $Sla}value="{$Sla->getNombre()}"{/if}>
                            </div>
                        </div>
                        <!-- body pad end -->
                         <div class="box-body pad">
                            <label for="inputDescripcion" class="col-sm-2 control-label">Descripción</label>
                            <div class="col-sm-5">
                              <input type="text" class="form-control" id="inputDescripcion" name="descripcion" {if $Sla}value="{$Sla->getDescripcion()}"{/if}>
                            </div>
                        </div>
                        <!-- body pad end -->
                        
                        <div class="box-body pad">
                            <label for="inputActivo" class="col-sm-2 control-label">Activo</label>
                            <div class="col-sm-5">
                                <input type="checkbox" id="Activo" name="estado" 
                                {if $Sla}
                                    {if $Sla->getEstado()==1}
                                        checked
                                    {/if}
                                {/if}
                                >
                                </input>
                            </div>
                        </div>
                        <!-- body pad end -->
                        
                    </div>   
                </div>
                <!--DATOS GENERALES -->
                
                <!--DATOS CONDICIONES TICKET -->
                <div class="box">
                    <div class="box-header">
                      <h3 class="box-title">Ticket en
                      </h3>
                    </div>
                    <div class="form-group">
                        
                        <div class="box-body pad">
                            <label for="comboDeptoOrigen" class="col-sm-2 control-label">Departamento</label>
                            <div class="col-sm-5">
                                <select class="form-control select2" style="width: 100%;" id="ddDeptos" name="departamentoOrigen">
                                  <option value = "">Seleccione un Departamento...</option>
                                  {if $Departamentos}
                                        {foreach from=$Departamentos item=depto}
                                          <option value ="{$depto->getDepartamentoId()}"
                                          {if $Sla}
                                            {if $Sla->getDepartamentoOrigen() == $depto->getDepartamentoId()}selected{/if}
                                          {/if}
                                          >{$depto->getNombre()}</option>
                                        {/foreach}
                                    {/if}
                                </select>
                            </div> 
                            <!-- select  end -->
                        </div>
                        <!-- body pad end -->
                        <div class="box-body pad">
                            <label for="comboEstadoOrigen" class="col-sm-2 control-label">Estado</label>
                            <div class="col-sm-5">
                                <select class="form-control select2" style="width: 100%;" id = "ddEstados" name = "estadoOrigen">
                                  <option value = "">Seleccione un Estado...</option>
                                  {if $Estados}
                                        {foreach from=$Estados item=estado}
                                          <option value ="{$estado->getEstadoId()}"
                                          {if $Sla}
                                            {if $Sla->getEstadoOrigen() == $estado->getEstadoId()}selected{/if}
                                          {/if}
                                          >{$estado->getNombre()}</option>
                                        {/foreach}
                                    {/if}
                                </select>
                            </div> 
                            <!-- select  end -->
                        </div>
                        <!-- body pad end -->
                        <div class="box-body pad">
                            <label for="comboPrioridadOrigen" class="col-sm-2 control-label">Prioridad</label>
                            <div class="col-sm-5">
                                <select class="form-control select2" style="width: 100%;" id = "ddPrioridades" name="prioridadOrigen">
                                  <option value = "">Seleccione una Prioridad...</option>
                                  {if $Prioridades}
                                        {foreach from=$Prioridades item=prioridad}
                                          <option value ="{$prioridad->getPrioridadId()}"
                                          {if $Sla}
                                            {if $Sla->getPrioridadOrigen() == $prioridad->getPrioridadId()}selected{/if}
                                          {/if}
                                          >{$prioridad->getNombre()}</option>
                                        {/foreach}
                                    {/if}
                                </select>
                            </div> 
                            <!-- select  end -->
                        </div>
                        <!-- body pad end -->
                        
                         <div class="box-body pad">
                            <label for="comboPrioridadOrigen" class="col-sm-2 control-label">Tipo de Ticket</label>
                            <div class="col-sm-5">
                                <select class="form-control select2" style="width: 100%;" id = "ddPrioridades" name="tipoTicketOrigen">
                                  <option value = "">Seleccione un Tipo de Ticket...</option>
                                  {if $TipoTickets}
                                        {foreach from=$TipoTickets item=tipoTicket}
                                          <option value ="{$tipoTicket->getTipoTicketId()}"
                                          {if $Sla}
                                            {if $Sla->getTipoTicketOrigen()->getTipoTicketId() == $tipoTicket->getTipoTicketId()}selected{/if}
                                          {/if}
                                          >{$tipoTicket->getNombre()}</option>
                                        {/foreach}
                                    {/if}
                                </select>
                            </div> 
                            <!-- select  end -->
                        </div>
                        <!-- body pad end -->
                    </div>
                    <!-- form group end -->
                </div>
                <!-- box end -->
                <!--DATOS CONDICIONES TICKET -->
                
                <!--DATOS VENCIMIENTO -->
                <!-- box begin -->
                <div class="box">
                    <div class="box-header">
                      <h3 class="box-title">Vencimiento en
                      </h3>
                    </div>
                    <div class="form-group">
                        <div class="box-body pad">
                            <label for="inputCondicionHoras" class="col-sm-2 control-label">Horas</label>
                            <div class="col-sm-5">
                              <input type="text" class="form-control" id="inputCondicionHoras" name = "condicionHora" {if $Sla}value="{$Sla->getCondicionHora()}"{/if}>
                            </div>
                        </div>
                        <!-- body pad end -->
                    </div>
                    <!-- form group end -->
                </div>
                 <!-- box  end -->
                 <!--DATOS VENCIMIENTO -->
                
                <!--DATOS Acción Cambiar -->
                <!-- box Cambiar begin -->
                <div class="box">
                    <div class="box-header">
                      <h3 class="box-title">Cambiar
                      </h3>
                    </div>
                    <div class="form-group">
                         <div class="box-body pad">
                            <label for="comboDeptoOrigen" class="col-sm-2 control-label">Departamento</label>
                            <div class="col-sm-5">
                                <select class="form-control select2" style="width: 100%;" id = "ddDeptoOrigen" name="accionDepartamento">
                                  <option value = "">Seleccione un Departamento...</option>
                                   {if $Departamentos}
                                        {foreach from=$Departamentos item=depto}
                                          <option value ="{$depto->getDepartamentoId()}"
                                          {if $Sla}
                                            {if $Sla->getAccionDepartamento() == $depto->getDepartamentoId()}selected{/if}
                                          {/if}
                                          >{$depto->getNombre()}</option>
                                        {/foreach}
                                    {/if}
                                </select>
                            </div> 
                            <!-- select  end -->
                        </div>
                        <!-- body pad end -->
                        <div class="box-body pad">
                            <label for="comboEstadoOrigen" class="col-sm-2 control-label">Estado</label>
                            <div class="col-sm-5">
                                <select class="form-control select2" style="width: 100%;" id="ddEstadosOrigen" name="accionEstado">
                                  <option value = "">Seleccione un Estado...</option>
                                  {if $Estados}
                                        {foreach from=$Estados item=estado}
                                          <option value ="{$estado->getEstadoId()}"
                                          {if $Sla}
                                            {if $Sla->getAccionEstado() == $estado->getEstadoId()}selected{/if}
                                          {/if}
                                          >{$estado->getNombre()}</option>
                                        {/foreach}
                                    {/if}
                                </select>
                            </div> 
                            <!-- select  end -->
                        </div>
                        <!-- body pad end -->
                        <div class="box-body pad">
                            <label for="comboPrioridadOrigen" class="col-sm-2 control-label">Prioridad</label>
                            <div class="col-sm-5">
                                <select class="form-control select2" style="width: 100%;" id= "ddPrioridadOrigen" name= "accionPrioridad">
                                  <option value = "">Seleccione una Prioridad...</option>
                                  {if $Prioridades}
                                        {foreach from=$Prioridades item=prioridad}
                                          <option value ="{$prioridad->getPrioridadId()}"
                                          {if $Sla}
                                            {if $Sla->getAccionPrioridad() == $prioridad->getPrioridadId()}selected{/if}
                                          {/if}
                                          >{$prioridad->getNombre()}</option>
                                        {/foreach}
                                    {/if}
                                </select>
                            </div> 
                            <!-- select  end -->
                        </div>
                        <!-- body pad end -->
                         <div class="box-body pad">
                            <label for="comboPrioridadOrigen" class="col-sm-2 control-label">Operador Asignado</label>
                            <div class="col-sm-5">
                                <select class="form-control select2" style="width: 100%;" id="ddOperadores" name="accionOperadorAsignado">
                                  <option value = "">Seleccione un Operador...</option>
                                  {if $Operadores}
                                        {foreach from=$Operadores item=operador}
                                          <option value ="{$operador->getOperadorId()}"
                                          {if $Sla}
                                            {if $Sla->getAccionOperadorAsignado() == $operador->getOperadorId()}selected{/if}
                                          {/if}
                                          >{$operador->getNombre()}</option>
                                        {/foreach}
                                    {/if}
                                </select>
                            </div> 
                            <!-- select  end -->
                        </div>
                        <!-- body pad end -->
                        
                        <div class="box-body pad">
                            <label for="comboPrioridadOrigen" class="col-sm-2 control-label">SLA</label>
                            <div class="col-sm-5">
                                <select class="form-control select2" style="width: 100%;" id="sla" name="sla">
                                  <option value = "">Seleccione un SLA...</option>
                                  {if $Slas}
                                        {foreach from=$Slas item=sla}
                                          <option value ="{$sla->getSlaId()}"
                                          {if $Sla}
                                            {if $Sla->getSlaId() == $sla->getSlaId()}selected{/if}
                                          {/if}
                                          >{$sla->getNombre()}</option>
                                        {/foreach}
                                    {/if}
                                </select>
                            </div> 
                            <!-- select  end -->
                        </div>
                        <!-- body pad end -->
  
                    </div>
                    <!-- form group end -->
                </div>
                 <!-- box Accion end -->
                 <!--DATOS Acción Cambiar -->
                
                <!--DATOS Template -->
                <div class="box">
                    <div class="box-header">
                      <h3 class="box-title">Plantilla Email
                      </h3>
                    </div>
                    <div class="form-group">
                        <div class="box-body pad">
                            <label for="comboPrioridadOrigen" class="col-sm-2 control-label">Template</label>
                            <div class="col-sm-5">
                                <select class="form-control select2" style="width: 100%;" id="template" name="template" data-toggle="tooltip" title="En caso de no seleccionar uno, se utilizará el template por defecto">
                                  <option value = "">Seleccione un Template...</option>
                                  {if $Templates}
                                        {foreach from=$Templates item=template}
                                          <option value ="{$template->getEmailId()}"
                                          {if $Sla}
                                            {if $Sla->getEmailTemplate()->getEmailId() == $template->getEmailId()}selected{/if}
                                          {/if}
                                          >{$template->getNombre()}</option>
                                        {/foreach}
                                    {/if}
                                </select>
                                
                            </div> 
                            <!-- select  end -->
                        </div>
                        <!-- body pad end -->
                    </div>
                    <!-- form group end -->
                </div>
                 <!--DATOS Template -->
                
                
                
            </div>
            <!-- box body end -->
             
            <div class="box-footer">
                 <button type="submit" class="btn btn-info pull-left">Enviar</button>
                <button onclick="history.go(-1);" class="btn btn-danger pull-right">Cancelar</button>
            </div>
            <!-- /.box-footer -->
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
<!-- Validaciones -->
<script src="{$rutaJS}jquery-validator-min.js"></script>
<script src="{$rutaJS}validacionNuevoSLA.js"></script>

 {include file="footer.tpl"}