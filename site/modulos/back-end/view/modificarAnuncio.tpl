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
      <strong>Modificar Anuncio</strong>
     <small></small>
   </h1>
   <ol class="breadcrumb">
     <li><a href="/operador.php?modulo=dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
     <li class="active">Anuncio > Modificar Anuncio</li>
   </ol>
 </section>

 <section class="content">
    <div class="box box-info">
         <!-- form start -->
        <form action="{$rutaCSS}../controlador/modificarAnuncioAction.php" class="form-horizontal">
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
                        <div class="box-body pad">
                            <label for="comboEmpresa" class="col-sm-2 control-label">Alcance</label>
                            <div class="col-sm-5">
                                <select class="form-control select2" style="width: 100%;">
                                    <option selected="selected">Todos</option>
                                    <option>Empresa1</option>
                                    <option>Empresa3</option>
                                    <option>Empresa4</option>
                                    <option>Empresa5</option>
                                    <option>Empresa6</option>
                                    <option>Empresa7</option>
                                </select>
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
<!-- CK Editor -->
<script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1');
  });
</script>
 {include file="footer.tpl"}