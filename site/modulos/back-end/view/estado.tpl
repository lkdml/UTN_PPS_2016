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
      <strong>Alta Nuevo Estado</strong>
     <small></small>
   </h1>
   <ol class="breadcrumb">
     <li><a href="/operador.php?modulo=dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
     <li class="active">Administración > Estados > Nuevo Estado</li>
   </ol>
 </section>

 <section class="content">
    <div class="box box-info">
         <!-- form start -->
        <form action="{$rutaCSS}../controlador/estadoAction.php{if $Estado}?estadoId={$Estado->getEstadoId()}{/if}" class="form-horizontal" method="post">
            <div class="box-body">
                <div class="box">
                    <div class="form-group">
                        <div class="box-body pad">
                            <label for="inputNombre" class="col-sm-2 control-label">Nombre</label>
                            <div class="col-sm-5">
                              <input type="text" class="form-control" name="nombre"
                                {if $Estado}
                                    value='{$Estado->getNombre()}'
                                {/if}
                                >
                                </input>
                            </div>
                        </div>
                        <!-- body pad end -->
                         <div class="box-body pad">
                            <label for="inputDescripcion" class="col-sm-2 control-label">Descripción</label>
                            <div class="col-sm-5">
                              <input type="text" class="form-control" name="descripcion"
                                {if $Estado}
                                    value='{$Estado->getDescripcion()}'
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
                                <input type="text" class="form-control my-colorpicker1" name="color"
                                {if $Estado}
                                    value='{$Estado->getColor()}'
                                {/if}
                                >
                                </input>
                            </div>
                        </div>
                        <!--color end -->
                        <div class="box-body pad">
                            <label for="inputDescripcion" class="col-sm-2 control-label">Auto-Cierre</label>
                            <div class="col-sm-5">
                                <input type="checkbox" id="acierre" name="autocierre" 
                                {if $Estado}
                                    {if $Estado->getAutocierre()==1}
                                        checked
                                    {/if}
                                {/if}
                                >
                                </input>
                            </div>
                        </div>
                        <!-- body pad end -->
                         <!-- Orden Picker -->
                       <!-- <div class="box-body pad">
                            <label for="inputOrden" class="col-sm-2 control-label">Orden</label>
                            <div class="col-sm-5">
                                <select name="orden" class="form-control" {if $Estado}value='{$Estado->getOrden()}'{/if}>
                                    <option value = "1">1</option>
                                    <option value = "2">2</option>
                                    <option value = "3">3</option>
                                    <option value = "4">4</option>
                                    <option value = "5">5</option>
                                </select>
                            </div>
                        </div>-->
                        <!--Orden end -->
                        
                        
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
<!-- bootstrap color picker -->
<script src="{$rutaJS}bootstrap-colorpicker.js"></script>
<!-- Bootstrap Color Picker -->
<link rel="stylesheet" href="{$rutaCSS}bootstrap-colorpicker.css">
{literal} <script>
  $(function () {
     $(".my-colorpicker1").colorpicker();
  });
</script>
{/literal}
  
 {include file="footer.tpl"}