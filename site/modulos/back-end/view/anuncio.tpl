{include file="header.tpl"
css='<link rel="stylesheet" href="./modulos/back-end/css/validacion.css"> <link rel="stylesheet" href="./modulos/back-end/css/datepicker3.css">'
js=''
}
{include file="panelLateral.tpl"}


  <!-- =============================================== -->
<div class="content-wrapper">
 <!-- Content Header (Page header) -->
 <section class="content-header">
   <h1>
      <strong>Alta/Modificación de Anuncio</strong>
     <small></small>
   </h1>
   <ol class="breadcrumb">
     <li><a href="/operador.php?modulo=dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
     <li class="active">Anuncio > Nuevo Anuncio</li>
   </ol>
 </section>

 <section class="content">
    <div class="box box-info">
         <!-- form start -->
        <form action="{$rutaCSS}../controlador/anuncioAction.php{if $Anuncio}?anuncioId={$Anuncio->getAnuncioId()}{/if}" class="form-horizontal"  method="post">
            <div class="box-body">
                <div class="box">
                    <div class="form-group">
                        <div class="box-body pad">
                            <label for="inputTitulo" class="col-sm-2 control-label">Título</label>
                            <div class="col-sm-5">
                              <input type="text" class="form-control" id="txtTitulo" name="titulo" {if $Anuncio}value="{$Anuncio->getTitulo()}"{/if}>
                            </div>
                        </div>
                        <!-- body pad end -->

                        <div class="box-body pad">
                            <label for="comboCategorias" class="col-sm-2 control-label">Categoria</label>
                            <div class="col-sm-5">
                                 <select class="form-control select2" id="comboCategorias" name="categoria" style="width: 100%;">
                                    <option value = "">Seleccione una Categoria...</option>
                                    {if $Categorias}
                                        {foreach from=$Categorias item=categoria}
                                          <option value ="{$categoria->getCategoriaId()}"
                                          {if $Anuncio}
                                            {if $Anuncio->getCategoria()->getCategoriaId() == $categoria->getCategoriaId()}selected{/if}
                                          {/if}
                                          >{$categoria->getNombre()}</option>
                                        {/foreach}
                                    {/if}
                                </select>
                            </div>
                        </div>
                        <!-- body pad end -->
                        
                         <div class="box-body pad">
                            <label for="comboCategorias" class="col-sm-2 control-label">Fecha Fin Publicación</label>
                            <div class="col-sm-5">
                                 <div class="input-group date">
                                  <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                  </div>
                                  <input type="text" class="form-control" id="datepicker" name="fechaFinPublicacion" {if $Anuncio}value={$Anuncio->getFechaFinPublicacion()|date_format:"%m/%d/%Y "}{/if}>
                                </div>
                                <!-- /.input group -->
                            </div>
                        </div>
                        <!-- body pad end -->
                        <div class="box-body pad">
                            <label for="inputEmpresas" class="col-sm-2 control-label">Empresas asociadas al anuncio</label>
                            <div class="row">
                                <div class="col-xs-4">
                                    <select name="empresas_Disponibles[]" id="multiselect" class="form-control" size="8" multiple="multiple">
                                      {if $EmpresasPorHabilitar}
                                        {foreach from=$EmpresasPorHabilitar item=$em}
                                          <option value="{$em->getEmpresaId()}">{$em->getRazonSocial()}</option>
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
                                    <select name="empresas_Asignadas[]" id="multiselect_to" class="form-control" size="8" multiple="multiple">
                                      {if $EmpresasAsignadas}
                                        {foreach from=$EmpresasAsignadas item=$empresaAsignada}
                                          <option value="{$empresaAsignada->getEmpresaId()}">{$empresaAsignada->getRazonSocial()}</option>
                                        {/foreach}
                                      {/if}
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- body pad end -->
                        
                         <div class="box-body pad">
                            <label for="inputDescripcion" class="col-sm-2 control-label">Activo</label>
                            <div class="col-sm-5">
                                <input type="checkbox" id="Activo" name="estado" 
                                {if $Anuncio}
                                    {if $Anuncio->getEstado()==1}
                                        checked
                                    {/if}
                                {/if}
                                >
                                </input>
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
                                    <textarea id="editor1" name="contenido" rows="10" cols="80">
                                         {if $Anuncio}{$Anuncio->getContenido()}{/if}
                                    </textarea>
                                </div>
                            </div>
                          </div>
                    </div>
                    <!--End box body -->
                    
                </div>
                <!-- box end -->
            <div class="box-footer col-sm-3 pull-right">
                <button onclick="history.go(-1);" class="btn btn-danger pull-left btn-lg">Cancelar</button>
                <button type="submit" class="btn btn-info pull-right btn-lg">Enviar</button>
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

<!-- Date Picker -->
<script src="{$rutaJS}bootstrap-datepicker.js"></script>
<script src="{$rutaJS}bootstrap-datepicker.es.js"></script>

<!-- CK Editor -->
<script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1');
  });
  
   //Date picker
    $('#datepicker').datepicker({
        autoclose:true,
        language: 'es'
    });
</script>

<script src="{$rutaJS}multiselect.js"></script>
<script type="text/javascript">
jQuery(document).ready(function($) {
    $('#multiselect').multiselect();
});
</script>
<!-- Validaciones -->
<script src="{$rutaJS}jquery-validator-min.js"></script>
<script src="{$rutaJS}validacionNuevoAnuncio.js"></script>
 {include file="footer.tpl"}