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
      <strong>Alta/Modificación de Prioridad</strong>
     <small></small>
   </h1>
   <ol class="breadcrumb">
     <li><a href="/operador.php?modulo=dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
     <li class="active">Administración > Prioridades > Nueva Prioridad</li>
   </ol>
 </section>

 <section class="content">
    <div class="box box-info">
         <!-- form start -->
        <form action="{$rutaCSS}../controlador/prioridadAction.php{if $Prioridad}?prioridadId={$Prioridad->getPrioridadId()}{/if}" class="form-horizontal"  method="post" id="nuevaPrioridadForm">
            <div class="box-body">
                <div class="box">
                    <div class="form-group">
                        <div class="box-body pad">
                            <label for="inputNombre" class="col-sm-2 control-label">Nombre</label>
                            <div class="col-sm-5">
                              <input type="text" class="form-control" id="inputNombre" name="nombre"
                                {if $Prioridad}
                                    value='{$Prioridad->getNombre()}'
                                {/if}
                                >
                                </input>
                            </div>
                        </div>
                        <!-- body pad end -->
                         <div class="box-body pad">
                            <label for="inputDescripcion" class="col-sm-2 control-label">Descripción</label>
                            <div class="col-sm-5">
                              <input type="text" class="form-control" id="inputDescripcion" name="descripcion" 
                                {if $Prioridad}
                                    value='{$Prioridad->getDescripcion()}'
                                {/if}
                                >
                                </input>
                            </div>
                        </div>
                        <!-- body pad end -->
                        <!-- Color Picker -->
                        <div class="box-body pad">
                            <label for="inputColor" class="col-sm-2 control-label">Color</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control my-colorpicker1" id="inputColor" name="color"
                                {if $Prioridad}
                                    value='{$Prioridad->getColor()}'
                                {/if}
                                >
                                </input>
                            </div>
                        </div>
                        <div class="box-body pad">
                            <label for="inputDescripcion" class="col-sm-2 control-label">Visible en el Front-end?</label>
                            <div class="col-sm-2">
                                <input type="checkbox" id="acierre" name="visibleFront" 
                                {if $Prioridad}
                                    {if $Prioridad->getVisibleFront()==1}
                                        checked
                                    {/if}
                                {/if}
                                >
                                </input>
                            </div>
                        </div>
                        <!--color end -->
                        <!-- Orden Picker -- >
                        <div class="box-body pad">
                            <label for="inputColor" class="col-sm-2 control-label">Orden</label>
                            <div class="col-sm-5">
                                <select name="orden" class="form-control" {if $Prioridad}value='{$Prioridad->getOrden()}'{/if}>
                                      {if Prioridades}
                                        {$count=0}
                                        {foreach from=Prioridades item=itemPrioridad}
                                          <option value=$count>test</option>
                                          {$count = $count +1}
                                          {var_dump($count)}
                                        {/foreach}
                                      {/if}
                                    </select>
                            </div>
                        </div>
                        <!--Orden end -->
                        
                        
                    </div>
                    <!-- form group end -->
                </div>
                <!-- box end -->
                 <div class="box-footer col-sm-3 pull-right">
                  <button onclick="window.location='/operador.php?modulo=prioridades';return false;" class="btn btn-danger pull-left btn-lg">Cancelar</button>
                  {if $Permisos->verificarPermiso(array("prioridades_crear","prioridades_editar"))}
                      <button type="submit" class="btn btn-info pull-right btn-lg">Enviar</button>
                  {/if}
                </div>
            </div>
            <!-- box body end -->
             
           
        </form>
        <!-- form end -->
    </div>
    <!-- box info end-->
    </section>
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
<!-- bootstrap color picker -->
<script src="{$rutaJS}bootstrap-colorpicker.js"></script>
<!-- Bootstrap Color Picker -->
<link rel="stylesheet" href="{$rutaCSS}bootstrap-colorpicker.css">

<!-- Validaciones -->
<script src="{$rutaJS}jquery-validator-min.js"></script>
<script src="{$rutaJS}validacionNuevaPrioridad.js"></script>

<!-- No enter for submitting v1.0 -->
<script src="{$rutaJS}noEnter.js"></script>
{literal} <script>
  $(function () {
     $(".my-colorpicker1").colorpicker();
  });
</script>
{/literal}
  
 {include file="footer.tpl"}