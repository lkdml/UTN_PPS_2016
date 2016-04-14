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

     <!-- <div class="row">-->
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="{$rutaIMG}user4-128x128.jpg" alt="User profile picture">

              <h3 class="profile-username text-center">Brian Ducca</h3>

              <p class="text-muted text-center">Operador</p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Perfil</b> <a class="pull-right">Administrador</a>
                </li>
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
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#settings" data-toggle="tab">Configuración de la Cuenta</a></li>
            </ul>
            
              <div class="tab-pane" id="#settings">
                <form class="form-horizontal">
                  <div class="form-group">
                    <label for="inputNombre" class="col-sm-2 control-label">Nombre</label>

                    <div class="col-sm-10">
                      <input class="form-control" id="inputNombre" placeholder="Brian">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputApellido" class="col-sm-2 control-label">Apellido</label>

                    <div class="col-sm-10">
                      <input class="form-control" id="inputApellido" placeholder="Ducca">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputClave" class="col-sm-2 control-label">Clave</label>

                    <div class="col-sm-10">
                      <input type="password" class="form-control" id="inputClave" placeholder="">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputDireccion" class="col-sm-2 control-label">Direccion</label>
                    <div class="col-sm-10">
                      <input class="form-control" id="inputDireccion" placeholder="Av.Mitre 380"></input>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputCodigoPostal" class="col-sm-2 control-label">Codigo Postal</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputCodigoPostal" placeholder="1870">
                    </div>
                  </div>
                   <div class="form-group">
                    <label for="inputCiudad" class="col-sm-2 control-label">Ciudad</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputCiudad" placeholder="Buenos Aires">
                    </div>
                  </div>
                   <div class="form-group">
                    <label for="inputTelefono" class="col-sm-2 control-label">Telefono</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputTelefono" placeholder="42060483">
                    </div>
                  </div>
                   <div class="form-group">
                    <label for="inputEmailAdicional" class="col-sm-2 control-label">Email Adicional</label>

                    <div class="col-sm-10">
                      <input type="Email" class="form-control" id="inputEmailAdicional" placeholder="prueba@prueba.com">
                    </div>
                  </div>
                  
                  <br>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-warning">Modificar</button>
                    </div>
                  </div>
            
                </form>
                <br>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
       <!-- </div>-->
      <!-- /.row -->

    </section>
    <!-- /.content -->
 {include file="footer.tpl"}