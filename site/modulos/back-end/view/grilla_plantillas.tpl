{include file="header.tpl"
css='
<link rel="stylesheet" href="./modulos/back-end/css/validacion.css">'
js='' 
}
{include file="panelLateral.tpl"}
  <!-- =============================================== -->

<style>
li.template{
  display: block;
  padding: 10px 15px;
  position: relative;
}
i.fa-pencil{
    cursor: pointer;
}
i.fa-trash-o{
    cursor: pointer;
}
</style>
 

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
                        {foreach from=$EmailTemplates item=$plantilla}
                          {if $plantilla->getTipo() eq 'operador'}
                            <li class="template">{$plantilla->getNombre()}<span class="pull-right"><i class="fa fa-pencil"  id="{$plantilla->getEmailId()}"></i></span></li>
                          {/if}
                        {/foreach}
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
                        {foreach from=$EmailTemplates item=$plantilla}
                          {if $plantilla->getTipo() eq 'usuario'}
                            <li class="template">{$plantilla->getNombre()}<span class="pull-right"><i class="fa fa-pencil" id="{$plantilla->getEmailId()}"></i></span></li>
                          {/if}
                        {/foreach}
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
                      
                      
                              <span class="pull-right"><button type="button" class="btn btn-info btn-flat" id="nuevoTemplate"><i class="fa fa-plus"></i></button></span>
                      
                    </div>
                    <div class="box-footer no-padding">
                      <ul class="nav nav-stacked">
                        {foreach from=$EmailTemplates item=$plantilla}
                          {if $plantilla->getTipo() eq 'custom'}
                            <li class="template" >
                              {$plantilla->getNombre()}
                              <span class="pull-right">
                                <i class="fa fa-pencil" id="{$plantilla->getEmailId()}"></i>
                                <i class="fa fa-trash-o" id="{$plantilla->getEmailId()}" style="padding-left: 10px;" data-toggle="modal" data-target="#myModal"></i>
                              </span>
                              
                            </li>
                          {/if}
                        {/foreach}
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
          <div class="box box-default box-solid" id="edicion">
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
              <form action="{$rutaCSS}../controlador/plantillaAction.php" class="form-horizontal" id="plantillasForm" method="post"> <!-- //TODO Poner vinculo jquery-->
                  <div class="box-body">
                      <div class="box">
                          <div class="form-group">
                             <div class="box-body pad">
                                <label for="inputTitulo" class="col-sm-2 control-label">Nombre del Template</label>
                                <div class="col-sm-5">
                                  <input type="text" name="nombre" class="form-control" id="inputNombre">
                                </div>
                              </div>
                              <!-- body pad end -->
                              <div class="box-body pad">
                                  <label for="inputTitulo" class="col-sm-2 control-label">Título</label>
                                  <div class="col-sm-5">
                                    <input type="text" name="asunto" class="form-control" id="inputTitulo">
                                    <input type="hidden" name="idTemplate" id="inputId" >
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
                      <button type="submit" class="btn btn-info pull-right btn-lg">Guardar</button> 
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
    {if $Error}{$Error->getHtmlModal()}{/if}
  </div>
 
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>

  <!-- Modal para Borrar-->
  <div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Eliminar Plantilla </h4></h4>
          </div>
          <div class="modal-body">
            <p>Esta acción eliminará la plantilla seleccionada. ¿Está seguro que desea continuar?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn btn-danger" id="confirmaBorrado" data-dismiss="modal" type= submit name="accion" value="borrar">Si, estoy seguro.</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">No, llévame a donde estaba.</button>
          </div>
      </div>
    </div>
  </div> <!-- End Modal Content -->

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
<!-- Validaciones -->
<script src="{$rutaJS}jquery-validator-min.js"></script>
<script src="{$rutaJS}tmh-error.js"></script>

<!-- JS funciones TPL -->
<script src="{$rutaJS}plantillas.js"></script>

<!-- AdminLTE for demo purposes -->
<script src="{$rutaJS}demo.js"></script>

{include file='footer.tpl'}