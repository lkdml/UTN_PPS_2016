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
      <strong>Alta Nuevo SLA</strong>
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
        <form action="{$rutaCSS}../controlador/slaAction.php" id = "nuevoSLAForm" class="form-horizontal">
            <div class="box-body">
                <div class="box">
                    <div class="box-header">
                      <h3 class="box-title">Datos Generales
                      </h3>
                    </div>
                    <div class="form-group">
                        <div class="box-body pad">
                            <label for="inputNombre" class="col-sm-2 control-label">Nombre</label>
                            <div class="col-sm-5">
                              <input type="text" class="form-control" id="inputNombre" name="nombre">
                            </div>
                        </div>
                        <!-- body pad end -->
                         <div class="box-body pad">
                            <label for="inputDescripcion" class="col-sm-2 control-label">Descripción</label>
                            <div class="col-sm-5">
                              <input type="text" class="form-control" id="inputDescripcion" name="descripcion">
                            </div>
                        </div>
                        <!-- body pad end -->
                        <div class="box-body pad">
                            <label for="comboDeptoOrigen" class="col-sm-2 control-label">Departamento</label>
                            <div class="col-sm-5">
                                <select class="form-control select2" style="width: 100%;" id="ddDeptos" name="ddDeptos">
                                  <option value = "">Seleccione un Departamento...</option>
                                  <option>Todos</option>
                                  <option>Depto2</option>
                                  <option>Depto3</option>
                                  <option>Depto4</option>
                                  <option>Depto5</option>
                                  <option>Depto6</option>
                                  <option>Depto7</option>
                                </select>
                            </div> 
                            <!-- select  end -->
                        </div>
                        <!-- body pad end -->
                        <div class="box-body pad">
                            <label for="comboEstadoOrigen" class="col-sm-2 control-label">Estado</label>
                            <div class="col-sm-5">
                                <select class="form-control select2" style="width: 100%;" id = "ddEstados" name = "ddEstados">
                                  <option value = "">Seleccione un Estado...</option>
                                  <option>Todos</option>
                                  <option>Estado1</option>
                                  <option>Estado2</option>
                                </select>
                            </div> 
                            <!-- select  end -->
                        </div>
                        <!-- body pad end -->
                        <div class="box-body pad">
                            <label for="comboPrioridadOrigen" class="col-sm-2 control-label">Prioridad</label>
                            <div class="col-sm-5">
                                <select class="form-control select2" style="width: 100%;" id = "ddPrioridades" name="ddPrioridades">
                                  <option value = "">Seleccione una Prioridad...</option>
                                  <option>Todas</option>
                                  <option>Prioridad1</option>
                                  <option>Prioridad2</option>
                                  <option>Prioridad3</option>
                                </select>
                            </div> 
                            <!-- select  end -->
                        </div>
                        <!-- body pad end -->
                    </div>
                    <!-- form group end -->
                </div>
                <!-- box end -->
                
                <!-- box Precondicion begin -->
                <div class="box">
                    <div class="box-header">
                      <h3 class="box-title">Condición
                      </h3>
                    </div>
                    <div class="form-group">
                        <div class="box-body pad">
                            <label for="inputCondicionHoras" class="col-sm-2 control-label">Horas</label>
                            <div class="col-sm-5">
                              <input type="text" class="form-control" id="inputCondicionHoras" name = "horas">
                            </div>
                        </div>
                        <!-- body pad end -->
                    </div>
                    <!-- form group end -->
                </div>
                 <!-- box Precondicion end -->
                
                
                <!-- box Accion begin -->
                <div class="box">
                    <div class="box-header">
                      <h3 class="box-title">Acción
                      </h3>
                    </div>
                    <div class="form-group">
                         <div class="box-body pad">
                            <label for="comboDeptoOrigen" class="col-sm-2 control-label">Departamento</label>
                            <div class="col-sm-5">
                                <select class="form-control select2" style="width: 100%;" id = "ddDeptoOrigen" name="ddDeptoOrigen">
                                  <option value = "">Seleccione un Departamento...</option>
                                  <option>Todas</option>
                                  <option>Depto3</option>
                                  <option>Depto4</option>
                                  <option>Depto5</option>
                                  <option>Depto6</option>
                                  <option>Depto7</option>
                                </select>
                            </div> 
                            <!-- select  end -->
                        </div>
                        <!-- body pad end -->
                        <div class="box-body pad">
                            <label for="comboEstadoOrigen" class="col-sm-2 control-label">Estado</label>
                            <div class="col-sm-5">
                                <select class="form-control select2" style="width: 100%;" id="ddEstadosOrigen" name="ddEstadosOrigen">
                                  <option value = "">Seleccione un Estado...</option>
                                  <option>Todos</option>
                                  <option>Estado1</option>
                                  <option>Estado2</option>
                                </select>
                            </div> 
                            <!-- select  end -->
                        </div>
                        <!-- body pad end -->
                        <div class="box-body pad">
                            <label for="comboPrioridadOrigen" class="col-sm-2 control-label">Prioridad</label>
                            <div class="col-sm-5">
                                <select class="form-control select2" style="width: 100%;" id= "ddPrioridadOrigen" name= "ddPrioridadOrigen">
                                  <option value = "">Seleccione una Prioridad...</option>
                                  <option>Todas</option>
                                  <option>Prioridad1</option>
                                  <option>Prioridad2</option>
                                  <option>Prioridad3</option>
                                </select>
                            </div> 
                            <!-- select  end -->
                        </div>
                        <!-- body pad end -->
                         <div class="box-body pad">
                            <label for="comboPrioridadOrigen" class="col-sm-2 control-label">Operador</label>
                            <div class="col-sm-5">
                                <select class="form-control select2" style="width: 100%;" id="ddOperadores" name="ddOperadores">
                                  <option value = "">Seleccione un Operador...</option>
                                  <option>Operador2</option>
                                  <option>Operador3</option>
                                  <option>Operador4</option>
                                </select>
                            </div> 
                            <!-- select  end -->
                        </div>
                        <!-- body pad end -->
                    </div>
                    <!-- form group end -->
                </div>
                 <!-- box Accion end -->
                
                
                
                
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
<!-- Validaciones -->
<script src="{$rutaJS}jquery-validator-min.js"></script>
<script src="{$rutaJS}validacionNuevoSLA.js"></script>

 {include file="footer.tpl"}