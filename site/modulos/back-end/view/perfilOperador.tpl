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
                  <form  class="form-horizontal" method="post" id="nuevaFotoForm" enctype="multipart/form-data">
                    <div class="box-body box-profile">
                      <img class="profile-user-img img-responsive img-circle" src="{$RutaAvatars}{if $OperadorLogueado->getHashFoto()}{$OperadorLogueado->getHashFoto()}{else}UserDefault.jpg{/if}" alt="User profile picture">
                
                      <h3 class="profile-username text-center">{if $OperadorLogueado}{$OperadorLogueado->getNombre()} {$OperadorLogueado->getApellido()}{/if}</h3>
                
                      <p class="text-muted text-center">Operador</p>
                
                      <div class="box-body">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Avatar</label>
                          <input id="avatar_img" name="fotoOperador[]" type="file">
                          <p class="help-block">Para agregar un avatar, debe subir una imagen.</p>
                        </div>
                      </div>
                        <div class="pull-right">
                            <button type="submit" class="btn btn-warning" id="btnCambioFoto">Modificar</button>
                        </div>

                    </div>
                  </form>  
                <!-- /.Profile Image -->
                </div>
                    
                <!-- Cambio Clave -->
                {if $OperadorLogueado}
                  <div class="box box-primary">
                    <form class="form-horizontal" id="nuevaClaveForm" method="post">  
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
                              <button type="submit" class="btn btn-warning"  id="btnCambioClave">Cambiar</button>
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
                        <form action="{$rutaCSS}../controlador/perfilOperadorAction.php{if $OperadorLogueado}?Operador={$OperadorLogueado->getOperadorId()}{/if}" class="form-horizontal" id = "nuevoOperadorForm"method="post">
                          <div class="form-group">
                            <label for="inputNombre" class="col-sm-2 control-label">Nombre</label>
                            <div class="col-sm-9">
                              <input class="form-control" id="inputNombre" placeholder="Nombre" name="nombre" {if $OperadorLogueado}value='{$OperadorLogueado->getNombre()}'{/if}>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="inputNombre" class="col-sm-2 control-label">Apellido</label>
                            <div class="col-sm-9">
                              <input class="form-control" id="inputApellido" placeholder="Apellido" name="apellido" {if $OperadorLogueado}value='{$OperadorLogueado->getApellido()}'{/if}>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="inputNombre" class="col-sm-2 control-label">Usuario</label>
                            <div class="col-sm-9">
                              <input class="form-control" id="inputUsuario" placeholder="Nombre de Usuario" name="username" {if $OperadorLogueado}value='{$OperadorLogueado->getNombreUsuario()}'{/if}>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="inputNombre" class="col-sm-2 control-label">Correo Electrónico</label>
                            <div class="col-sm-9">
                              <input class="form-control" id="inputMail" type="mail" placeholder="Correo Electrónico" name="email" {if $OperadorLogueado}value='{$OperadorLogueado->getEmail()}'{/if}>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="inputNombre" class="col-sm-2 control-label">Telefono</label>
                            <div class="col-sm-9">
                              <input class="form-control" id="inputNombre" placeholder="Teléfono / Celular" name="tel" {if $OperadorLogueado}value='{$OperadorLogueado->getCelular()}'{/if}>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="inputNombre" class="col-sm-2 control-label">Firma</label>
                            <div class="col-sm-9 box-body pad">
                              <textarea id="editor1" name="Firma" rows="10" cols="80">
                                    {if $OperadorLogueado}{$OperadorLogueado->getFirmaMensaje()}{/if}
                                </textarea>
                            </div>
                          </div>
                         
                         
                <div class="box-footer col-md-4 pull-right">
                  <button onclick="history.go(-1);" class="btn btn-danger pull-right btn-lg">Cancelar</button>
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


<div class="modal fade" role="dialog" id="getCodeModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="tituloModal"></h4>
      </div>
      <div class="modal-body" id="getCode" >
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline pull-right" data-dismiss="modal">Cerrar</button>
      </div>
    <!-- /.modal-content -->
    </div>
  <!-- /.modal-dialog -->
  </div>
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
<!-- No enter for submitting v1.0 -->
<script src="{$rutaJS}noEnter.js"></script>
{literal}
<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1');
  });

$(document).ready(function(e){
  $("#btnCambioClave").click(function(e){
    e.preventDefault();
     $.ajax({
         type: "POST",
         url: "{/literal}{$rutaCSS}{literal}../controlador/perfilOperadorAction.php?actualiza=clave&Operador={/literal}{$OperadorLogueado->getOperadorId()}{literal}",
         data: $('#nuevaClaveForm').serialize(),
           success: function(){
                  $("#getCode").html("Se actualizo la foto con éxito");
                  $("#tituloModal").html("Actualización exitosa");
                  $("#getCodeModal").addClass('modal-info');
                  $("#getCodeModal").modal('show');
                                 },
           error: function(msg){
           $("#getCodeModal").addClass('modal-warning');
           $("#getCode").html(msg);
           $("#tituloModal").html("Ups! Hubo un error");
           }  
           });
   });
});


$(document).ready(function(e){
  $("#btnCambioFoto").click(function(e){
    e.preventDefault();
    var file_data = $('#avatar_img').prop('files')[0];   
    var form_data = new FormData(); 
    form_data.append('file', file_data);
    console.log(form_data);
     $.ajax({
         type: "POST",
         url: "{/literal}{$rutaCSS}{literal}../controlador/perfilOperadorAction.php?actualiza=foto&Operador={/literal}{$OperadorLogueado->getOperadorId()}{literal}",
         cache: false,
        contentType: false,
        processData: false,
         data: form_data,
           success: function(msg){
               if(msg=="Ok")
               {
                  $("#getCode").html("Se actualizo la foto con éxito");
                  $("#tituloModal").html("Actualización exitosa");
                  $("#getCodeModal").addClass('modal-info');
                  $("#getCodeModal").modal('show');
                  location.reload();
                }
                else{
                  $("#getCode").html(msg);
                  $("#tituloModal").html("Ups! Hubo un error");
                  $("#getCodeModal").addClass('modal-danger');
                  $("#getCodeModal").modal('show');
                }
           },
           error: function(msg){
           $("#getCodeModal").addClass('modal-warning');
           $("#getCode").html(msg);
           $("#tituloModal").html("Ups! Hubo un error");
           }  
           });
   });
});

</script>
{/literal}

 {include file="footer.tpl"}