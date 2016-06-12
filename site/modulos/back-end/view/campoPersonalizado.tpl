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
      <strong>Campos Personalizados</strong>
     <small></small>
   </h1>
   <ol class="breadcrumb">
     <li><a href="/operador.php?modulo=dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
     <li class="active">Administración > Campos Personalizados > Alta/Modificación Campos Personalizados</li>
   </ol>
 </section>

 <section class="content">
    <div class="box box-info">
         <!-- form start -->
        <form action="{$rutaCSS}../controlador/campoPersonalizadoAction.php" class="form-horizontal">
            <div class="box-body">
                <h3>Alta / Modificación de Campos Personalizados</h3>
                <div class="box">
                    <div class="form-group">
                        <div class="box-body pad">
                            <label for="inputNombre" class="col-md-2 control-label">Nombre</label>
                            <div class="col-md-5">
                              <input type="text" class="form-control" id="inputNombre">
                            </div>
                        </div>
                        <!-- body pad end -->
                        <div class="box-body pad">
                            <label for="inputTipoCampo" class="col-md-2 control-label">Tipo de Campo</label>
                            <div class="col-md-5">
                               <select class="form-control select2" style="width: 100%;">
                                  <option selected="selected">Seleccionar</option>
                                  <option>campo1</option>
                                  <option>campo2</option>
                                </select>
                            </div>
                        </div>
                        <!-- body pad end -->
                        
                        <div class="box-body pad">
                            <label for="inputObligatorio" class="col-md-2 control-label" data-toggle="tooltip" title="Si se pedirá a los usuarios que ingresen el valor">Obligatorio</label>
                            <div class="col-md-5">
                                <label class="radio-inline ">
                                  <input type="radio" name="opObligatorio" id="obligatorio1" value="Si"> Si
                                </label>
                                <label class="radio-inline">
                                  <input type="radio" name="opObligatorio" id="obligatorio2" value="No" checked> No
                                </label>
                            </div>
                        </div>
                        <!-- body pad end -->
                        
                        <div class="box-body pad">
                            <label for="inputMostrarFrontEnd" class="col-md-2 control-label" data-toggle="tooltip" title="Si el campo aparecerá en la página de presentación de pasaje público">Mostrar en el Frontend</label>
                            <div class="col-md-5">
                                <label class="radio-inline ">
                                  <input type="radio" name="opFrontEnd" id="mostrarFE1" value="Si" checked> Si
                                </label>
                                <label class="radio-inline">
                                  <input type="radio" name="opFrontEnd" id="mostrarFE2" value="No"> No
                                </label>
                            </div>
                        </div>
                        <!-- body pad end -->
                        
                        <div class="box-body pad">
                            <label for="inputEncriptado" class="col-md-2 control-label" data-toggle="tooltip" title="Si el valor de este campo se almacena en la base de datos de manera cifrada.Útil para datos confidenciales del usuario">Encriptado</label>
                            <div class="col-md-5">
                                <label class="radio-inline ">
                                  <input type="radio" name="opEncriptado" id="Encriptado1" value="Si"> Si
                                </label>
                                <label class="radio-inline">
                                  <input type="radio" name="opEncriptado" id="Encriptado2" value="No" checked> No
                                </label>
                            </div>
                        </div>
                        <!-- body pad end -->
                        
                        <div class="box-body pad">
                            <label for="inputPurgaCierre" class="col-md-2 control-label" data-toggle="tooltip" title="Si el valor de este campo se elimina luego de cerrarse el ticket.">Purga en Cierre</label>
                            <div class="col-md-5">
                                <label class="radio-inline ">
                                  <input type="radio" name="opPurgCierre" id="PurgaCierre1" value="Si"> Si
                                </label>
                                <label class="radio-inline">
                                  <input type="radio" name="opPurgCierre" id="PurgaCierre2" value="No" checked> No
                                </label>
                            </div>
                        </div>
                        <!-- body pad end -->
                        
                        
                        <div class="box-body pad">
                            <label for="inputPurgaCierre" class="col-md-2 control-label">Departamentos</label>
                            <div class="col-md-10">
                                <label class="checkbox-inline ">
                                  <input type="checkbox" name="opDepartamentos" id="Depto1" value="Si"> Departamento1
                                </label>
                                <label class="checkbox-inline">
                                  <input type="checkbox" name="opDepartamentos" id="Depto1" value="No" checked> Departamento2
                                </label>
                           
                                <label class="checkbox-inline ">
                                  <input type="checkbox" name="opDepartamentos" id="Depto1" value="Si"> Departamento3
                                </label>
                                <label class="checkbox-inline">
                                  <input type="checkbox" name="opDepartamentos" id="Depto1" value="No" checked> Departamento4
                                </label>
                            </div>
                        </div>
                        <!-- body pad end -->
                         <div class="box-body pad">
                                <div class="col-md-10 col-md-offset-2">
                                    <label class="checkbox-inline ">
                                      <input type="checkbox" name="opDepartamentos" id="Depto1" value="Si" checked> Departamento5
                                    </label>
                                    <label class="checkbox-inline">
                                      <input type="checkbox" name="opDepartamentos" id="Depto1" value="No" > Departamento6
                                    </label>
                               
                                    <label class="checkbox-inline ">
                                      <input type="checkbox" name="opDepartamentos" id="Depto1" value="Si" checked> Departamento7
                                    </label>
                                    <label class="checkbox-inline">
                                      <input type="checkbox" name="opDepartamentos" id="Depto1" value="No" checked> Departamento8
                                    </label>
                                </div>
                            </div>
                        
                    </div>
                    <!-- form group end -->
                </div>
                <!-- box end -->
            </div>
            <!-- box body end -->
             
            <div class="box-footer">
                <button onclick="window.location='/operador.php?modulo=camposCustom';return false;" class="btn btn-danger pull-left btn-lg">Cancelar</button>
                {if $Permisos->verificarPermiso(array("",""))} //TODO No hay permisos para campos custom
                    <button type="submit" class="btn btn-info pull-right btn-lg">Enviar</button>
                {/if}
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
<!-- No enter for submitting v1.0 -->
<script src="{$rutaJS}noEnter.js"></script>

{literal} <script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip(); 
});
</script>
{/literal}

 {include file="footer.tpl"}