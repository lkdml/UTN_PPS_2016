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
    <section class="content">
    <div class="box box-body">
        <h3>Configuración de la Cuenta</h3>
        <br>
         <!-- form start -->

            <div class="col-md-4">
                  <!-- Profile Image -->
                <div class="box box-primary">
                  
                  <form action="{$rutaCSS}../controlador/perfilUserAction.php?actualiza=foto{if $UsuarioLogueado}&Usuario={$UsuarioLogueado->getUsuarioId()}{/if}" class="form-horizontal" method="post" enctype="multipart/form-data">
                    <div class="box-body box-profile">
                      <img class="profile-user-img img-responsive img-circle" src="{$rutaIMG}avatars/{if $UsuarioLogueado}{$OperadorLogueado->getFotoHash()}{else}UserDefault.jpg{/if}" alt="User profile picture">
                
                      <h3 class="profile-username text-center">{if $UsuarioLogueado}{$UsuarioLogueado->getNombre()}{/if} {if $UsuarioLogueado}{$UsuarioLogueado->getApellido()}{/if}</h3>
                
                      <p class="text-muted text-center">Usuario</p>
                
                      <div class="box-body">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Avatar</label>
                          <input id="avatar_img" name="fotoUsuario[]" type="file">
                          <p class="help-block">Para agregar un avatar, debe subir una imagen.</p>
                        </div>
                      </div>
                        <div class="pull-right">
                            <button type="submit" class="btn btn-warning" onclick="window.location.href='/index.php?modulo=home'">Modificar</button>
                        </div>

                    </div>
                  </form>  
                <!-- /.Profile Image -->
                </div>
                    
                <!-- Cambio Clave -->
                {if $UsuarioLogueado}
                  <div class="box box-primary">
                    <form action="{$rutaCSS}../controlador/perfilUserAction.php?actualiza=clave{if $UsuarioLogueado}&Usuario={$UsuarioLogueado->getUsuarioId()}{/if}" class="form-horizontal" id="nuevaClaveForm" method="post">  
                      <div class="box-body box-profile">
                      
                        <h3 class="profile-username text-center">Contraseña</h3>
                      
                        <p class="text-muted text-center">Cambiar contraseña</p>
                      
                              <div class="form-group">
                                  <label for="inputContraseñaOriginal" class="col-sm-4 control-label">Clave Actual</label>
                                  <div class="col-sm-5">
                                    <input class="form-control" id="inputNombre" type="password" name="clave">
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label for="inputNombre" class="col-sm-4 control-label">Nueva Clave</label>
                                  <div class="col-sm-5">
                                    <input class="form-control" id="inputContraseñaNueva" type="password" name="nuevaclave1">
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label for="inputNombre" class="col-sm-4 control-label">Re-Ingrese Clave</label>
                                  <div class="col-sm-5">
                                    <input class="form-control" id="inputContraseñaNueva2" type="password" name="nuevaclave2">
                                  </div>
                              </div>
                          <div class="pull-right">
                              <button type="submit" class="btn btn-warning" onclick="window.location.href='/index.php?modulo=home'">Cambiar</button>
                          </div>
                      </div>
                    <!-- /.box-body -->
                    </form>
                  </div>
                {/if}
  
            </div> 
            <div class="col-md-8">
                    <div class="box box-primary">
                        <br>
                        <form action="{$rutaCSS}../controlador/perfilUserAction.php{if $UsuarioLogueado}?Usuario={$UsuarioLogueado->getUsuarioId()}{/if}" class="form-horizontal" id = "nuevoUsuarioForm" method="post">
                          <div class="form-group">
                            <label for="inputNombre" class="col-sm-2 control-label">Nombre</label>
                            <div class="col-sm-9">
                              <input class="form-control" id="inputNombre" placeholder="Nombre" name="nombre" {if $UsuarioLogueado}value={$UsuarioLogueado->getNombre()}{/if}>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="inputApellido" class="col-sm-2 control-label">Apellido</label>
                            <div class="col-sm-9">
                              <input class="form-control" id="inputApellido" placeholder="Apellido" name="apellido" {if $UsuarioLogueado}value={$UsuarioLogueado->getApellido()}{/if}>
                            </div>
                          </div>
                         
                          <div class="form-group">
                            <label for="inputDireccion" class="col-sm-2 control-label">Direccion</label>
                            <div class="col-sm-9">
                              <input class="form-control" id="inputDireccion" placeholder="Dirección" name="direccion" {if $UsuarioLogueado}value={$UsuarioLogueado->getDireccion()}{/if}>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="inputCodigoPostal" class="col-sm-2 control-label">Código Postal</label>
                            <div class="col-sm-9">
                              <input class="form-control" id="inputCodigoPostal" placeholder="Código Postal" name="codigoPostal" {if $UsuarioLogueado}value={$UsuarioLogueado->getCodigoPostal()}{/if}>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="inputCiudad" class="col-sm-2 control-label">Ciudad</label>
                            <div class="col-sm-9">
                              <input class="form-control" id="inputCiudad" placeholder="Ciudad" name="ciudad" {if $UsuarioLogueado}value={$UsuarioLogueado->getCiudad()}{/if}>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="inputTelefono" class="col-sm-2 control-label">Telefono</label>
                            <div class="col-sm-9">
                              <input class="form-control" id="inputTelefono" placeholder="Teléfono / Celular" name="telefono" {if $UsuarioLogueado}value={$UsuarioLogueado->getTelefono()}{/if}>
                            </div>
                          </div>
                         <div class="form-group">
                            <label for="inputMailAdicional" class="col-sm-2 control-label">Email Adicional</label>
                            <div class="col-sm-9">
                              <input class="form-control" id="inputMailAdicional" type="mail" placeholder="Correo Electrónico Adicional" name="mailAdicional" {if $UsuarioLogueado}value={$UsuarioLogueado->getMailAdicional()}{/if}>
                            </div>
                         </div>
                         
                         
                <div class="box-footer col-sm-5 pull-right">
                  <button onclick="history.go(-1);" class="btn btn-danger pull-left btn-lg">Cancelar</button>
                  <button type="submit" class="btn btn-info pull-right btn-lg">Enviar</button>
                </div>
                            
                </form>
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
<!-- AdminLTE App -->
<script src="{$rutaJS}app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{$rutaJS}demo.js"></script>
{include file="footer.tpl"}