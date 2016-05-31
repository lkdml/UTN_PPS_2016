{include file="header.tpl"
css='<link rel="stylesheet" href="./modulos/back-end/css/bootstrap-timepicker.min.css">'
js=''
}
{include file="panelLateral.tpl"}


  <!-- =============================================== -->
<div class="content-wrapper">
 <!-- Content Header (Page header) -->
 <section class="content-header">
   <h1>
      <strong>Configuracion General</strong>
     <small></small>
   </h1>
   <ol class="breadcrumb">
     <li><a href="/operador.php?modulo=dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
     <li class="active">Administración > Configuracion General</li>
   </ol>
 </section>

 <section class="content">
    <div class="box box-info">
         <!-- form start -->
        <form action="{$rutaCSS}../controlador/configuracionGeneralAction.php" class="form-horizontal">
            <div class="box-body">
                
                    <div class="form-group">
                        <div class="box-body">
                            
                            <!-- Custom Tabs -->
                            <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#tab_1" data-toggle="tab">Empresa</a></li>
                                <li class=""><a href="#tab_2" data-toggle="tab">Tickets</a></li>
                                <li class=""><a href="#tab_3" data-toggle="tab">Operadores</a></li>
                                
                            </ul>
                            <div class="tab-content">
                                 <!--Contenido TAB -->
                                <div class="tab-pane active" id="tab_1">
                                    <div class="box-body pad">
                                        <label for="inputNombre" class="col-md-2 control-label" data-toggle="tooltip" title="Nombre de la companía como desees que se muestre a los usuarios">Nombre de la Empresa</label>
                                        <div class="col-md-4">
                                          <input type="text" class="form-control" id="inputNombre">
                                        </div>
                                    </div>
                                    <div class="box-body pad">
                                        <label for="inputURL" class="col-md-2 control-label" data-toggle="tooltip" title="Direccion web de base para la instalación">Direccion URL de Base</label>
                                        <div class="col-md-4">
                                          <input type="url" class="form-control" id="inputURL">
                                        </div>
                                    </div>
                                    

                                    <div class="box-body pad">
                                        <div class="bootstrap-timepicker">
                                            <div class="form-group">
                                                <label class="col-md-2 control-label" data-toggle="tooltip" title="El horario en cual opera la mesa de ayuda">Desde/Hasta</label>
                                                
                                                <div class="col-md-4">
                                                       <div class="inline-group">
                                                        
                                                        <div class="input-group">
                                                            <div class="input-group-addon">
                                                                <i class="fa fa-clock-o"></i>
                                                            </div>
                                                            
                                                            <input type="text" class="form-control timepicker">
                                                        
                                                            <div class="input-group-addon">
                                                                <i class="fa fa-clock-o"></i>
                                                            </div>
                                                            <input type="text" class="form-control timepicker">
                                                        </div>
                                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                 
                                 
                                </div>
                                <!--Fin Contenido TAB-->  
                            
                                 
                                 <!--Contenido TAB 2 -->
                                <div class="tab-pane" id="tab_2">
                                    <div class="box-body pad">
                                        <label for="inputNombre" class="col-md-2 control-label" data-toggle="tooltip" title="El número de dias después de lo cual se cierra automaticamente los tickets inactivos">Cerrar tickes inactivos</label>
                                        <div class="col-md-4">
                                          <input type="text" class="form-control" id="inputNombre">
                                        </div>
                                    </div>
                                    <div class="box-body pad">
                                        <label for="inputArchivosPermitidos" class="col-md-2 control-label" data-toggle="tooltip" title="Archivos que se permitirán subir. Ej: doc|docx|png|gif|jpg|jpeg|zip|pdf|txt">Tipos de Adjuntos Permitidos</label>
                                        <div class="col-md-4">
                                          <input type="text" class="form-control" id="inputArchivosPermitidos">
                                        </div>
                                    </div>
                                   <div class="box-body pad">
                                       <label for="inputPurgaCierre" class="col-md-2 control-label">Permitir tickets sólo de usuarios identificados</label>
                                        <div class="col-md-4">
                                            <label class="radio-inline ">
                                              <input type="radio" name="opTicketUIdentificado" id="UIdentificado" value="Si" checked> Si
                                            </label>
                                            <label class="radio-inline">
                                              <input type="radio" name="opTicketUIdentificado" id="DeUIdentificado2" value="No" > No
                                            </label>
                                        </div>
                                   </div>
                                 
                                </div>
                                <!--Fin Contenido TAB 2--> 
                                 
                                  <!--Contenido TAB 3 -->
                                <div class="tab-pane" id="tab_3">
                                    <div class="box-body pad">
                                        <label for="inputLongitudPW" class="col-md-2 control-label" data-toggle="tooltip" title="La longitud mínima que tiene que tener la contraseña">Longitud de Contraseña</label>
                                        <div class="col-md-4">
                                          <input type="text" class="form-control" id="inputLongitudPW">
                                        </div>
                                    </div>
                                    <div class="box-body pad">
                                        <label for="inputArchivosPermitidos" class="col-md-2 control-label" data-toggle="tooltip" title="La fuerza mínima de la contraseña de un operador">Contraseña del operador</label>
                                        <div class="col-md-4">
                                           <select class="form-control select2" style="width: 100%;">
                                              <option selected="selected">Alta</option>
                                              <option>Débil</option>
                                            </select>
                                        </div>
                                   
                                 
                                    </div>
                                <!--Fin Contenido TAB 3--> 
                                 
                                 
                                 
                                 
                                 
                                 
                                 
                                 
                                 
                                 
                                 
                                 
                                 
                            </div>
                            <!-- /.tab-content -->
                            </div>
                            <!-- nav-tabs-custom -->

                        </div>
                <div class="box-footer col-md-2 pull-right">
                  <button onclick="history.go(-1);" class="btn btn-danger pull-left btn-lg">Cancelar</button>
                  <button type="submit" class="btn btn-info pull-right btn-lg">Enviar</button>
                </div>
                    </div>
                    <!-- form group end -->
                
            </div>
            <!-- box body end -->
             
            
        </form>
        <!-- form end -->
    </div>
    <!-- box info end-->
</div>

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
<!-- TimePicker -->
<script src="{$rutaJS}bootstrap-timepicker.min.js"></script>

{literal} <script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip(); 
});
</script>
{/literal}
{literal} <script>
 //Timepicker
    $(".timepicker").timepicker({
      showInputs: false
    });
</script>
{/literal}


{include file="footer.tpl"}