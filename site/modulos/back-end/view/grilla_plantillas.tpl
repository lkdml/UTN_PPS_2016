{include file="header.tpl"
css='<link rel="stylesheet" href="./modulos/back-end/css/dataTables.bootstrap.css">
<link rel="stylesheet" type="text/css" href="./modulos/back-end/css/jquery.dataTables.css">'
js='' 
}
{include file="panelLateral.tpl"}
  <!-- =============================================== -->

 

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
        <!-- Content Header (Page header) -->
        <section class="content-header">
      <h1>
        Plantillas
        <small>Modificaciones de las plantillas de mail</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Administración</a></li>
        <li class="active">Plantillas</li>
      </ol>
    </section>
   <!-- /Content Header (Page header) -->  
   
   <!-- CONTENIDO -->
    <section class="content">

          <!-- /.widget-user -->
          
    <div class="row">
      <div class="col-md-12">
          <div class="box box-default box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Plantillas</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div style="display: block;" class="box-body">
              <div class="row">
                <div class="col-md-4">
                  <!-- Widget: user widget style 1 -->
                  <div class="box box-widget widget-user-2">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="widget-user-header bg-yellow">
                      <i class="widget-user-username">de Operador</i>
                    </div>
                    <div class="box-footer no-padding">
                      <ul class="nav nav-stacked">
                        <li><a href="#">Nuevo Ticket Abierto <span class="pull-right"><i class="fa fa-pencil"></i></span></a></li>
                        <li><a href="#">Ticket asignado a operador <span class="pull-right"><i class="fa fa-pencil"></i></span></a></li>
                        <li><a href="#">Nueva respuesta en ticket <span class="pull-right"><i class="fa fa-pencil"></i></span></a></li>
                        <li><a href="#">Recupero de clave <span class="pull-right"><i class="fa fa-pencil"></i></span></a></li>
                        <li><a href="#">Nuevo Ticket Abierto y asignado a operador <span class="pull-right"><i class="fa fa-pencil"></i></span></a></li>
                        <li><a href="#">Cambio de departamento en Ticket <span class="pull-right"><i class="fa fa-pencil"></i></span></a></li>
                        <li><a href="#">Cambios en el ticket <span class="pull-right"><i class="fa fa-pencil"></i></span></a></li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <!-- Widget: user widget style 1 -->
                  <div class="box box-widget widget-user-2">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="widget-user-header bg-olive">
                      <i class="widget-user-username">de Usuario</i>
                    </div>
                    <div class="box-footer no-padding">
                      <ul class="nav nav-stacked">
                        <li><a href="#">Nuevo Ticket Abierto <span class="pull-right"><i class="fa fa-pencil"></i></span></a></li>
                        <li><a href="#">Nueva Respuesta a Ticket<span class="pull-right"><i class="fa fa-pencil"></i></span></a></li>
                        <li><a href="#">Recupero de clave <span class="pull-right"><i class="fa fa-pencil"></i></span></a></li>
                        <li><a href="#">Nuevo usuario registrado<span class="pull-right"><i class="fa fa-pencil"></i></span></a></li>
                        <li><a href="#">Ticket escalado por SLA <span class="pull-right"><i class="fa fa-pencil"></i></span></a></li>
                        <li><a href="#">Ticket cerrado por inactividad <span class="pull-right"><i class="fa fa-pencil"></i></span></a></li>
                        <li><a href="#">Ticket cerrado por Operador <span class="pull-right"><i class="fa fa-pencil"></i></span></a></li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <!-- Widget: user widget style 1 -->
                  <div class="box box-widget widget-user-2">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="widget-user-header bg-navy">
                      
                      <i class="widget-user-username">Custom</i>
                      
                      
                              <span class="pull-right"><button type="button" class="btn btn-info btn-flat"><i class="fa fa-plus"></i></button></span>
                      
                    </div>
                    <div class="box-footer no-padding">
                      <ul class="nav nav-stacked">
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
      
    <div class="row">  
      <div class="col-md-12">
          <div class="box box-default box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Edición</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div style="display: block;" class="box-body">
              <form action="{$rutaCSS}../controlador/guardarPlantillaAction.php" class="form-horizontal"> <!-- //TODO Poner vinculo jquery-->
                  <div class="box-body">
                      <div class="box">
                          <div class="form-group">
                              <div class="box-body pad">
                                  <label for="inputTitulo" class="col-sm-2 control-label">Título</label>
                                  <div class="col-sm-5">
                                    <input type="text" class="form-control" id="inputTitulo">
                                  </div>
                              </div>
                              <!-- body pad end -->
                          </div>
                          <!-- form group end -->
                              
                          <div class="box-body">
                              <div class="box">
                                  <div class="box-header">
                                      <h3 class="box-title">Descripción
                                      </h3>
                                  </div>     
                                  <div class="box-body pad">
                                      <div class="tab-pane" id="#descripcionAnuncio">
                                          <textarea id="editor1" name="editor1" rows="10" cols="80">
                                              Descripción del Anuncio 
                                          </textarea>
                                      </div>
                                  </div>
                                </div>
                          </div>
                          <!--End box body -->
                          
                      </div>
                      <!-- box end -->
                  </div>
                  <!-- box body end -->
                   
                  <div class="box-footer">
                      <button type="submit" class="btn btn-info pull-right">Guardar</button> 
                  </div>
                  <!-- /.box-footer -->
              </form>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
      </div>
    </div>


    </section>
    <!-- /.content -->
    
  </div>
 
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.0 -->
<script type="text/javascript" charset="utf8" src="{$rutaJS}jQuery-2.2.0.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script type="text/javascript" charset="utf8" src="{$rutaJS}bootstrap.min.js"></script>
<!-- SlimScroll -->
<script type="text/javascript" charset="utf8" src="{$rutaJS}jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script type="text/javascript" charset="utf8" src="{$rutaJS}fastclick.js"></script>
<!-- AdminLTE App -->
<script type="text/javascript" charset="utf8" src="{$rutaJS}app.min.js"></script>
<script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1');
  });
</script>


{literal}

<script>
$(document).ready( function () {
    $('#grilla').DataTable({
  "columnDefs": [
    { "width": "5px", "targets": 0 }
  ]
});
} );
</script>
{/literal}

<!-- AdminLTE for demo purposes -->
<script src="{$rutaJS}demo.js"></script>

{include file='footer.tpl'}