{include file="header.tpl"
css='<link rel="stylesheet" href="./modulos/back-end/css/bootstrap-iconpicker.css">'
css='<link rel="stylesheet" href="./modulos/back-end/css/validacion.css">'
js=''
}
{include file="panelLateral.tpl"}


  <!-- =============================================== -->
<div class="content-wrapper">
 <!-- Content Header (Page header) -->
 <section class="content-header">
   <h1>
      <strong>Alta/Modificación de Categoría Anuncio</strong>
     <small></small>
   </h1>
   <ol class="breadcrumb">
     <li><a href="/operador.php?modulo=dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
     <li class="active">Anuncios > Categorías</li>
   </ol>
 </section>

 <section class="content">
    <div class="box box-info">
         <!-- form start -->
        <form action="{$rutaCSS}../controlador/categoriaAction.php{if $Categoria}?categoriaId={$Categoria->getCategoriaId()}{/if}" class="form-horizontal" id = "nuevaCategoriaForm" method="post">
            <div class="box-body">
                <div class="box">
                    <div class="form-group">
                        <div class="box-body pad">
                            <label for="inputNombre" class="col-sm-2 control-label">Nombre</label>
                            <div class="col-sm-5">
                              <input type="text" class="form-control" id="inputNombre" name="nombre" {if $Categoria}value='{$Categoria->getNombre()}'{/if}>
                            </div>
                        </div>
                        <!-- body pad end -->
                         <div class="box-body pad">
                            <label for="inputDescripcion" class="col-sm-2 control-label">Icono</label>
                            <div class="col-sm-5">
                                <button role="iconpicker" data-search="false" data-placement="bottom" data-rows="5" data-cols="6" id="icono" name="icono" {if $Categoria}data-icon='{$Categoria->getIcono()}'{/if} ></button>
                            </div>
                        </div>
                        <!-- body pad end -->
                    </div>
                    <!-- form group end -->
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
<!--Iconpicker -->
<script src="{$rutaJS}bootstrap-iconpicker.js"></script>
<script src="{$rutaJS}jquery-validator-min.js"></script>
<script src="{$rutaJS}validacionNuevaCategoria.js"></script>
{literal}
<script>
    $("#icono").click(function(e){
    e.preventDefault();
    });
</script>
{/literal}

 {include file="footer.tpl"}