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
      <strong>Alta/Modificación de Departamento</strong>
     <small></small>
   </h1>
   <ol class="breadcrumb">
     <li><a href="/operador.php?modulo=dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
     <li class="active">Administración > Departamentos > Nuevo Departamento</li>
   </ol>
 </section>

 <section class="content">
    <div class="box box-info">
         <!-- form start -->
        <form action="{$rutaCSS}../controlador/departamentoAction.php{if $Departamento}?Departamento={$Departamento->getDepartamentoId()}{/if}" class="form-horizontal" id="nuevoDepartamentoForm" method="post">
            <div class="box-body">
                <div class="box">
                    <div class="form-group">
                        <div class="box-body pad">
                            <label for="inputNombre" class="col-sm-2 control-label">Nombre</label>
                            <div class="col-sm-5">
                              <input type="text" class="form-control" id="inputNombre" name="nombre" {if $Departamento}value='{$Departamento->getNombre()}'{/if}>
                            </div>
                        </div>
                        <!-- body pad end -->
                         <div class="box-body pad">
                            <label for="inputDescripcion" class="col-sm-2 control-label">Descripción</label>
                            <div class="col-sm-5">
                              <input type="text" class="form-control" id="inputDescripcion" name="descripcion" {if $Departamento}value='{$Departamento->getDescripcion()}'{/if} >
                            </div>
                        </div>
                        <!-- body pad end -->
                         <div class="box-body pad">
                            <label for="inputDescripcion" class="col-sm-2 control-label">Departamento Padre</label>
                            <div class="col-sm-5">
                                <select class="form-control select2" id="DepartamentoPadre" name="idDeptoPadre" style="width: 100%;">
                                    <option value = "">Seleccione un Departamento Padre...</option>
                                    <option value = "-1">Ninguno</option>
                                    {if $Departamentos}
                                        {foreach from=$Departamentos item=departamento}
                                          <option value ="{$departamento->getDepartamentoId()}"
                                          {if $Departamento}
                                            {if $Departamento->getDepartamentoId() == $departamento->getPadreDeptoId()}selected{/if}
                                          {/if}
                                          >{$departamento->getNombre()}</option>
                                        {/foreach}
                                    {/if}
                                </select>
                            </div>
                        </div>
                        <!-- body pad end -->
                        
                        <div class="box-body pad">
                            <label for="inputDescripcion" class="col-sm-2 control-label">Visibilidad Usuario</label>
                            <div class="col-sm-5">
                                <input type="checkbox" id="Visibilidad" name="visibilidadUsuario" 
                                {if $Departamento}
                                    {if $Departamento->getVisibilidadUsuario()==1}
                                        checked
                                    {/if}
                                {/if}
                                >
                                </input>
                            </div>
                        </div>
                        <!-- body pad end -->
                        
                         <div class="box-body pad">
                            <label for="inputDescripcion" class="col-sm-2 control-label">Orden</label>
                            <div class="col-sm-5">
                                <select class="form-control select2" id="DeptoOrden" name="orden" style="width: 100%;">
                                    <option value = "">Seleccione un Orden...</option>
                                    <option value = "1">1</option>
                                    <option value = "2">2</option>
                                    <option value = "3">3</option>
                                    <option value = "4">4</option>
                                    <option value = "5">5</option>
                                </select>
                            </div>
                        </div>
                        <!-- body pad end -->
                        
                        <div class="box-body pad">
                            <label for="inputDescripcion" class="col-sm-2 control-label">Operador Default</label>
                            <div class="col-sm-5">
                                <select class="form-control select2" id="DeptoOperadorDefault" name="operadorDefault" style="width: 100%;">
                                    <option value = "">Seleccione un  Operador...</option>
                                    <option value = "-1">Ninguno</option>
                                        {if $Operadores}
                                            {foreach from=$Operadores item=operador}
                                              <option value ="{$operador->getOperadorId()}"
                                              {if $Departamento}
                                                {if $Departamento->getOperadorDefaultId() == $operador->getOperadorId()}selected{/if}
                                              {/if}
                                              >{$operador->getNombre()}</option>
                                            {/foreach}
                                    {/if}
                                </select>
                            </div>
                        </div>
                        <!-- body pad end -->
                        
                         <div class="box-body pad">
                            <label for="inputNombre" class="col-sm-2 control-label">Operadores asociados</label>
                            <div class="row">
                                <div class="col-xs-4">
                                    <select name="operadores_Disponibles[]" id="multiselect" class="form-control" size="8" multiple="multiple">
                                      {if OperadoresPorHabilitar}
                                        {foreach from=$OperadoresPorHabilitar item=$op}
                                          <option value="{$op->getOperadorId()}">{$op->getNombre()}</option>
                                        {/foreach}
                                      {/if}
                                    </select>
                                </div>
                                
                                <div class="col-sm-1">
                                    <button type="button" id="multiselect_rightAll" class="btn btn-block"><i class="glyphicon glyphicon-forward"></i></button>
                                    <button type="button" id="multiselect_rightSelected" class="btn btn-block"><i class="glyphicon glyphicon-chevron-right"></i></button>
                                    <button type="button" id="multiselect_leftSelected" class="btn btn-block"><i class="glyphicon glyphicon-chevron-left"></i></button>
                                    <button type="button" id="multiselect_leftAll" class="btn btn-block"><i class="glyphicon glyphicon-backward"></i></button>
                                </div>
                                
                                <div class="col-xs-4">
                                    <select name="operadores_Asignados[]" id="multiselect_to" class="form-control" size="8" multiple="multiple">
                                      {if OperadoresAsignados}
                                        {foreach from=$OperadoresAsignados item=$operadorAsignado}
                                          <option value="{$operadorAsignado->getOperadorId()}">{$operadorAsignado->getNombre()}</option>
                                        {/foreach}
                                      {/if}
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- body pad end -->
                        
                        
  
                    </div>
                    <!-- form group end -->
                </div>
                <!-- box end -->
                 <div class="box-footer col-sm-3 pull-right">
                  <button onclick="window.location='/operador.php?modulo=departamentos';return false;" class="btn btn-danger pull-left btn-lg">Cancelar</button>
                  {if $Permisos->verificarPermiso(array("departamentos_crear","departamentos_editar"))}
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
<!-- No enter for submitting v1.0 -->
<script src="{$rutaJS}noEnter.js"></script>

<script src="{$rutaJS}multiselect.js"></script>
<script type="text/javascript">
jQuery(document).ready(function($) {
    $('#multiselect').multiselect();
});
</script>

<!-- Validaciones -->
<script src="{$rutaJS}jquery-validator-min.js"></script>
<script src="{$rutaJS}validacionNuevoDepartamento.js"></script>

 {include file="footer.tpl"}