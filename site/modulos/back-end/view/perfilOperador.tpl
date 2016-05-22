{include file="header.tpl"
css=''
js=''
}
{include file="panelLateral.tpl"}


  <!-- =============================================== -->
 
   <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      
    </section>

  <div class="box-body">
       
            <div class="col-md-3">
    
              <!-- Profile Image -->
              <div class="box box-primary">
                <div class="box-body box-profile">
                  <img class="profile-user-img img-responsive img-circle" src="{$rutaIMG}user2-160x160.jpg" alt="User profile picture">
    
                  <h3 class="profile-username text-center">Brian Ducca</h3>
    
                  <p class="text-muted text-center">Operador</p>
    
                  <ul class="list-group list-group-unbordered">
                    <li class="list-group-item">
                      <b>Empresa</b> <a class="pull-right">TMH S.A</a>
                    </li>
                    <li class="list-group-item">
                      <b>Ultima Modificación</b> <a class="pull-right">14/04/2016</a>
                    </li>
                  </ul>
                </div>
            <!-- /.box-body -->
                </div>
                
            </div>
        
       
      <!-- /.col -->
       <form action="{$rutaCSS}../controlador/modifOperadorAction.php" class="form-horizontal">
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#configuracion" data-toggle="tab">Configuración de la Cuenta</a></li>
              <li class=""><a href="#plantillaMail" data-toggle="tab">Plantilla Mail</a></li>
            </ul>
          <div class="box-body">
            <div class="tab-content">
              <div class="tab-pane active" id="configuracion">
                <div class="box-body pad">
                  <div class="form-group">
                    <label for="inputNombre" class="col-sm-2 control-label">Nombre</label>
    
                    <div class="col-sm-5">
                      <input class="form-control" id="inputNombre" placeholder="Brian">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputApellido" class="col-sm-2 control-label">Apellido</label>
    
                    <div class="col-sm-5">
                      <input class="form-control" id="inputApellido" placeholder="Ducca">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputClave" class="col-sm-2 control-label">Clave</label>
    
                    <div class="col-sm-5">
                      <input type="password" class="form-control" id="inputClave" placeholder="">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputDireccion" class="col-sm-2 control-label">Direccion</label>
                    <div class="col-sm-5">
                      <input class="form-control" id="inputDireccion" placeholder="Av.Mitre 380"></input>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputCodigoPostal" class="col-sm-2 control-label">Codigo Postal</label>
    
                    <div class="col-sm-5">
                      <input type="text" class="form-control" id="inputCodigoPostal" placeholder="1870">
                    </div>
                  </div>
                   <div class="form-group">
                    <label for="inputCiudad" class="col-sm-2 control-label">Ciudad</label>
    
                    <div class="col-sm-5">
                      <input type="text" class="form-control" id="inputCiudad" placeholder="Buenos Aires">
                    </div>
                  </div>
                   <div class="form-group">
                    <label for="inputTelefono" class="col-sm-2 control-label">Telefono</label>
    
                    <div class="col-sm-5">
                      <input type="text" class="form-control" id="inputTelefono" placeholder="42060483">
                    </div>
                  </div>
                   <div class="form-group">
                    <label for="inputEmailAdicional" class="col-sm-2 control-label">Email Adicional</label>
    
                    <div class="col-sm-5">
                      <input type="Email" class="form-control" id="inputEmailAdicional" placeholder="prueba@prueba.com">
                    </div>
                  </div>
                </div>
              </div>

              
        
                <div class="tab-pane" id="plantillaMail">
                    <div class="box-body pad">
                        <textarea id="editor1" name="editor1" rows="10" cols="80">
                            Plantilla de mail 
                        </textarea>
                    </div>
                    
               </div> 
              <!-- /.tab-pane -->
                </div>
                <div class="box-body pad">
                    <div class="form-group">
                            <div class="pull-left">
                                <button type="submit" class="btn btn-warning">Modificar</button>
                            </div>
                            <div class="pull-right">
                              <button onclick="history.go(-1);" class="btn btn-danger pull-right">Cancelar</button>
                            </div>
                    </div>
                </div>
            </div> 
          </div>

          <!-- /.tab-content -->
         </div>
          <!-- /.nav-tabs-custom -->
          </form>   
      </div>

<!-- /.content -->
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