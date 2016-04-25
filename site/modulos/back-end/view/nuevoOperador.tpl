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
      <strong>Operador</strong>
     <small></small>
   </h1>
   <ol class="breadcrumb">
     <li><a href="/operador.php?modulo=dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
     <li class="active">Operador > Alta/Modificación Operador</li>
   </ol>
 </section>

 <section class="content">
    <div class="box box-body">
        <h3>Configuración de la Cuenta</h3>
        <br>
         <!-- form start -->
        <form action="{$rutaCSS}../controlador/nuevoOperadoAction.php" class="form-horizontal">
            <div class="col-md-4">
                  <!-- Profile Image -->
                <div class="box box-primary">
                    <div class="box-body box-profile">
                      <img class="profile-user-img img-responsive img-circle" src="{$rutaIMG}user4-128x128.jpg" alt="User profile picture">
                
                      <h3 class="profile-username text-center">Brian Ducca</h3>
                
                      <p class="text-muted text-center">Operador</p>
                
                      <div class="box-body">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Avatar</label>
                          <input id="avatar_img" type="file">
                          <p class="help-block">Para agregar un avatar, debe subir una imagen.</p>
                        </div>
                      </div>
                        <div class="pull-right">
                            <button type="submit" class="btn btn-warning">Modificar</button>
                        </div>

                    </div>
                    
                <!-- /.Profile Image -->
                </div>
                    
                  <!-- Cambio Clave -->
                <div class="box box-primary">
                    <div class="box-body box-profile">
                    
                      <h3 class="profile-username text-center">Contraseña</h3>
                    
                      <p class="text-muted text-center">Cambiar contraseña</p>
                    
                            <div class="form-group">
                                <label for="inputNombre" class="col-sm-4 control-label">Clave Actual</label>
                                <div class="col-sm-5">
                                  <input class="form-control" id="inputNombre" type="password">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputNombre" class="col-sm-4 control-label">Nueva Clave</label>
                                <div class="col-sm-5">
                                  <input class="form-control" id="inputNombre" type="password">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputNombre" class="col-sm-4 control-label">Re-Ingrese Clave</label>
                                <div class="col-sm-5">
                                  <input class="form-control" id="inputNombre" type="password">
                                </div>
                            </div>
                        <div class="pull-right">
                            <button type="submit" class="btn btn-warning">Cambiar</button>
                        </div>
                    </div>
                <!-- /.box-body -->
                </div>
  
            </div> 
            <div class="col-md-8">
                    <div class="box box-primary">
                        <br>
                          <div class="form-group">
                            <label for="inputNombre" class="col-sm-2 control-label">Nombre</label>
                            <div class="col-sm-9">
                              <input class="form-control" id="inputNombre" placeholder="Nombre">
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="inputNombre" class="col-sm-2 control-label">Apellido</label>
                            <div class="col-sm-9">
                              <input class="form-control" id="inputNombre" placeholder="Apellido">
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="inputNombre" class="col-sm-2 control-label">Usuario</label>
                            <div class="col-sm-9">
                              <input class="form-control" id="inputNombre" placeholder="Nombre de Usuario">
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="inputNombre" class="col-sm-2 control-label">Contraseña</label>
                            <div class="col-sm-9">
                              <input class="form-control" id="inputNombre" type="password" placeholder="Contraseña">
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="inputNombre" class="col-sm-2 control-label">Contraseña</label>
                            <div class="col-sm-9">
                              <input class="form-control" id="inputNombre" type="password" placeholder="Contraseña">
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="inputNombre" class="col-sm-2 control-label">Correo Electrónico</label>
                            <div class="col-sm-9">
                              <input class="form-control" id="inputNombre" type="mail" placeholder="Correo Electrónico">
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="inputNombre" class="col-sm-2 control-label">Telefono</label>
                            <div class="col-sm-9">
                              <input class="form-control" id="inputNombre" placeholder="Teléfono / Celulular">
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="inputNombre" class="col-sm-2 control-label">Firma de Operador</label>
                            <div class="col-sm-9 box-body pad">
                              <textarea id="editor1" name="editor1" rows="10" cols="80">
                                    Firma de operador 
                                </textarea>
                            </div>
                          </div>
                          <div class="form-group">
                              <label for="inputNombre" class="col-sm-2 control-label">Departamentos asociados</label>
                            <div class="row">
                                <div class="col-xs-4">
                                    <select name="from[]" id="multiselect" class="form-control" size="8" multiple="multiple">
                                        <option value="1">Soporte N1</option>
                                        <option value="2">Soporte N2</option>
                                        <option value="2">Ventas</option>
                                        <option value="2">Administración</option>
                                        <option value="3">Stock</option>
                                    </select>
                                </div>
                                
                                <div class="col-sm-1">
                                    <button type="button" id="multiselect_rightAll" class="btn btn-block"><i class="glyphicon glyphicon-forward"></i></button>
                                    <button type="button" id="multiselect_rightSelected" class="btn btn-block"><i class="glyphicon glyphicon-chevron-right"></i></button>
                                    <button type="button" id="multiselect_leftSelected" class="btn btn-block"><i class="glyphicon glyphicon-chevron-left"></i></button>
                                    <button type="button" id="multiselect_leftAll" class="btn btn-block"><i class="glyphicon glyphicon-backward"></i></button>
                                </div>
                                
                                <div class="col-xs-4">
                                    <select name="to[]" id="multiselect_to" class="form-control" size="8" multiple="multiple"></select>
                                </div>
                            </div>
                          </div>
                          <div class="pull-right">
                            <button type="submit" class="btn btn-warning">Enviar</button>
                          </div>
                        </div>

            </div>
           
                <!-- /.tab-content -->
        </form>
        <!-- form end -->
    </div>
    <!-- box info end-->
 </section>
</div>
  
  
<!-- jQuery 2.2.0 -->
<script src="{$rutaJS}jQuery-2.2.0.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="{$rutaJS}bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="{$rutaJS}jquery.slimscroll.js"></script>
<!-- FastClick -->
<script src="{$rutaJS}fastclick.js"></script>
<script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1');
  });
</script>
 <script src="{$rutaJS}multiselect.js"></script>
<script type="text/javascript">
jQuery(document).ready(function($) {
    $('#multiselect').multiselect();
});
</script>


<!-- AdminLTE App -->
<script src="{$rutaJS}app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{$rutaJS}demo.js"></script>
 {include file="footer.tpl"}