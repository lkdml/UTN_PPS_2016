{include file="header.tpl"
css=''
js=''
}
{include file="panelLateral.tpl"}


  <!-- =============================================== -->
<div class="content-wrapper">
 <!-- Content Header (Page header) -->
 <section class="content-header">
   <h1>
      <strong>Alta Nuevo Departamento</strong>
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
        <form action="{$rutaCSS}../controlador/departamentoAction.php{if $Departamento}?Departamento={$Departamento->getDepartamentoId()}{/if}" class="form-horizontal"  method="post">
            <div class="box-body">
                <div class="box">
                    <div class="form-group">
                        <div class="box-body pad">
                            <label for="inputNombre" class="col-sm-2 control-label">Nombre</label>
                            <div class="col-sm-5">
                              <input type="text" class="form-control" id="inputNombre" name="nombre" {if $Departamento}value={$Departamento->getNombre()}{/if}>
                            </div>
                        </div>
                        <!-- body pad end -->
                         <div class="box-body pad">
                            <label for="inputDescripcion" class="col-sm-2 control-label">Descripción</label>
                            <div class="col-sm-5">
                              <input type="text" class="form-control" id="inputDescripcion" name="descripcion" {if $Departamento}value={$Departamento->getDescripcion()}{/if} >
                            </div>
                        </div>
                        <!-- body pad end -->
                         <div class="box-body pad">
                            <label for="inputDescripcion" class="col-sm-2 control-label">Departamento Padre</label>
                            <div class="col-sm-5">
                                <select class="form-control select2" id="DepartamentoPadre" name="idDeptoPadre" style="width: 100%;">
                                    <option value = "">Ninguno</option>
                                    {if $Departamentos}
                                        {foreach from=$Departamentos item=departamento}
                                          <option value ="{$departamento->getDepartamentoId()}"{if $Departamentos->getDepartamento() == $departamento}selected{/if}>{$departamento->getNombre()}</option>
                                        {/foreach}
                                    {/if}
                                </select>
                            </div>
                        </div>
                        <!-- body pad end -->
                        
                        <div class="box-body pad">
                            <label for="inputDescripcion" class="col-sm-2 control-label">Visibilidad Usuario</label>
                            <div class="col-sm-5">
                                <select class="form-control select2" id="Visibilidad" name="visibilidadUsuario" style="width: 100%;">
                                    <option value = "1">Front-End</option>
                                    <option value = "2">Back-End</option>
                                </select>
                            </div>
                        </div>
                        <!-- body pad end -->
                        
                         <div class="box-body pad">
                            <label for="inputDescripcion" class="col-sm-2 control-label">Orden</label>
                            <div class="col-sm-5">
                                <select class="form-control select2" id="DeptoOrden" name="orden" style="width: 100%;">
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
                                    <option value = "">Ninguno</option>
                                    {if $Operadores}
                                        {foreach from=$Operadores item=operador}
                                          <option value ="{$operador->getOperadorId()}"{if $Operadores->getOperador() == $operador}selected{/if}>{$operador->getNombre()}</option>
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
            </div>
            <!-- box body end -->
             
            <div class="box-footer">
                <button type="submit" class="btn btn-info pull-right">Enviar</button>
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
 {include file="footer.tpl"}