{include file="header.tpl"
css='<link rel="stylesheet" href="./modulos/back-end/css/validacion.css">'
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

            <div class="col-md-4">
                  <!-- Profile Image -->
                <div class="box box-primary">
                  <form action="{$rutaCSS}../controlador/operadorAction.php?actualiza=foto{if $Operador}&Operador={$Operador->getOperadorId()}{/if}" class="form-horizontal" method="post" enctype="multipart/form-data">
                    <div class="box-body box-profile">
                      <img class="profile-user-img img-responsive img-circle" src="{$RutaAvatars}{if $OperadorLogueado->getHashFoto()}{$OperadorLogueado->getHashFoto()}{else}UserDefault.jpg{/if}" alt="User profile picture">
                
                      <h3 class="profile-username text-center">{if $Operador}{$Operador->getNombre()}{/if} {if $Operador}{$Operador->getApellido()}{/if}</h3>
                
                      <p class="text-muted text-center">Operador</p>
                
                      <div class="box-body">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Avatar</label>
                          <input id="avatar_img" name="fotoOperador[]" type="file">
                          <p class="help-block">Para agregar un avatar, debe subir una imagen.</p>
                        </div>
                      </div>
                        <div class="pull-right">
                            <button type="submit" class="btn btn-warning" onclick="window.location.href='/operador.php?modulo=operadores'"{if !$Operador}disabled{/if}>Modificar</button>
                        </div>

                    </div>
                  </form>  
                <!-- /.Profile Image -->
                </div>
                    
                <!-- Cambio Clave -->
                {if $Operador}
                  <div class="box box-primary">
                    <form action="{$rutaCSS}../controlador/operadorAction.php?actualiza=clave{if $Operador}&Operador={$Operador->getOperadorId()}{/if}" class="form-horizontal" id="nuevaClaveForm" method="post">  
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
                              <button type="submit" class="btn btn-warning" onclick="window.location.href='/operador.php?modulo=nuevaCategoria'">Cambiar</button>
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
                        <form action="{$rutaCSS}../controlador/operadorAction.php{if $Operador}?Operador={$Operador->getOperadorId()}{/if}" class="form-horizontal" id = "nuevoOperadorForm"method="post">
                          <div class="form-group">
                            <label for="inputNombre" class="col-sm-2 control-label">Nombre</label>
                            <div class="col-sm-9">
                              <input class="form-control" id="inputNombre" placeholder="Nombre" name="nombre" {if $Operador}value='{$Operador->getNombre()}'{/if}>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="inputNombre" class="col-sm-2 control-label">Apellido</label>
                            <div class="col-sm-9">
                              <input class="form-control" id="inputApellido" placeholder="Apellido" name="apellido" {if $Operador}value='{$Operador->getApellido()}'{/if}>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="inputNombre" class="col-sm-2 control-label">Usuario</label>
                            <div class="col-sm-9">
                              <input class="form-control" id="inputUsuario" placeholder="Nombre de Usuario" name="username" {if $Operador}value='{$Operador->getNombreUsuario()}'{/if}>
                            </div>
                          </div>
                          {if !$Operador}
                            <div class="form-group">
                              <label for="inputNombre" class="col-sm-2 control-label">Contraseña</label>
                              <div class="col-sm-9">
                                <input class="form-control" id="inputContraseña" type="password" placeholder="Contraseña" name="nuevaclave1">
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="inputNombre" class="col-sm-2 control-label">Reingrese Contraseña</label>
                              <div class="col-sm-9">
                                <input class="form-control" id="inputContraseña2" type="password" placeholder="Contraseña" name="nuevaclave2">
                              </div>
                            </div>
                          {/if}
                          <div class="form-group">
                            <label for="inputNombre" class="col-sm-2 control-label">Correo Electrónico</label>
                            <div class="col-sm-9">
                              <input class="form-control" id="inputMail" type="mail" placeholder="Correo Electrónico" name="email" {if $Operador}value='{$Operador->getEmail()}'{/if}>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="inputNombre" class="col-sm-2 control-label">Telefono</label>
                            <div class="col-sm-9">
                              <input class="form-control" id="inputNombre" placeholder="Teléfono / Celular" name="tel" {if $Operador}value='{$Operador->getCelular()}'{/if}>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="inputNombre" class="col-sm-2 control-label">Firma de Operador</label>
                            <div class="col-sm-9 box-body pad">
                              <textarea id="editor1" name="Firma" rows="10" cols="80">
                                    {if $Operador}{$Operador->getFirmaMensaje()}{/if}
                                </textarea>
                            </div>
                          </div>
                          <div class="form-group">
                              <label for="inputNombre" class="col-sm-2 control-label">Perfil de Operador:</label>
                            <div class="row">
                                <div class="col-sm-9 box-body pad">
                                    <select name="perfilOperador" class="form-control"  name="perfiles">
                                      {if $Perfiles}
                                        {foreach from=$Perfiles item=perfil}
                                          <option value="{$perfil->getPerfilId()}"
                                          {if $Operador}
                                            {if $Operador->getPerfil() == $perfil}selected{/if}
                                          {/if}
                                          >{$perfil->getNombre()}</option>
                                        {/foreach}
                                      {/if}
                                    </select>
                                </div>
                            </div>
                          </div>
                          <div class="form-group">
                              <label for="inputNombre" class="col-sm-2 control-label">Departamentos asociados</label>
                            <div class="row">
                                <div class="col-xs-4">
                                    <select name="departamentos_disponibles[]" id="multiselect" class="form-control" size="8" multiple="multiple">
                                      {if $Departamentos}
                                        {foreach from=$Departamentos item=$depto}
                                          <option value="{$depto->getDepartamentoId()}">{$depto->getNombre()}</option>
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
                                    <select name="Departamentos_asignados[]" id="multiselect_to" class="form-control" size="8" multiple="multiple">
                                      {if $DepartamentosHabilitados}
                                        {foreach from=$DepartamentosHabilitados item=$deptoH}
                                          <option value="{$deptoH->getDepartamentoId()}">{$deptoH->getNombre()}</option>
                                        {/foreach}
                                      {/if}
                                    </select>
                                </div>
                            </div>
                          </div>
                <div class="box-footer col-sm-5 pull-right">
                  <button onclick="window.location='/operador.php?modulo=operadores';return false;" class="btn btn-danger pull-left btn-lg">Cancelar</button>
                  {if $Permisos->verificarPermiso(array("operadores_crear","operadores_editar"))}
                      <button type="submit" class="btn btn-info pull-right btn-lg">Enviar</button>
                  {/if}
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
<script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
<!-- No enter for submitting v1.0 -->
<script src="{$rutaJS}noEnter.js"></script>
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
<script src="{$rutaJS}jquery-validator-min.js"></script>
<script src="{$rutaJS}validacionNuevoOperador.js"></script>
<script src="{$rutaJS}validacionNuevaClave.js"></script>

 {include file="footer.tpl"}