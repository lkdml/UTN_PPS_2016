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
     <small>Perfiles de Operador</small>
   </h1>
   <ol class="breadcrumb">
     <li><a href="/operador.php?modulo=dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
     <li class="active">Operador > Alta/Modificación Perfil Operador</li>
   </ol>
 </section>

 <section class="content">
    <div class="box box-body">
        <h3>Alta / Modificación de Perfil</h3>
        <br>
         <!-- form start -->
        <form action="{$rutaCSS}../controlador/nuevoPerfilAction.php" class="form-horizontal">
              <!-- Columna Izquierda -->
              <div class="col-md-6">
                <!-- Nombre y Descripcion -->
                <div class="box box-primary">
                    <h5>Datos del Perfil</h5>
                    <div class="box box-primary">
                        <br>
                          <div class="form-group">
                            <label for="inputNombre" class="col-sm-2 control-label" >Nombre</label>
                            <div class="col-sm-9">
                              <input class="form-control" id="inputNombre" placeholder="Apellido">
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="inputNombre" class="col-sm-2 control-label">Descripcion</label>
                            <div class="col-sm-9">
                              <input class="form-control" id="inputNombre" placeholder="Nombre de Usuario">
                            </div>
                          </div>
                          <br>
                    </div>
                </div>
                  <!-- Fin Nombre y Descripcion -->
                  <!-- Permisos sobre Tickets -->

                 <!-- Estilos CheckBox inLine -->  
                <Style>                  
                .checkbox-inline,
                .checkbox-inline + .checkbox-inline,
                .checkbox-inline + .radio-inline,
                .radio-inline,
                .radio-inline + .radio-inline,
                .radio-inline + .checkbox-inline {
                    margin-left: 0;
                    margin-right: 10px;
                }
                
                .checkbox-inline:last-child,
                .radio-inline:last-child {
                    margin-right: 0;
                }
                </Style>
                   
                   
                <!-- Estilos CheckBox inLine -->
                
                
                <h5>Permisos sobre Tickets</h5>
                <div class="box box-primary">
                    <br>
                      <div class="form-group">
                        <div class="col-sm-11  checkbox">
                          <label class="checkbox-inline"><input type="checkbox"></input>Crear Ticket</label>
                          <label class="checkbox-inline"><input type="checkbox"></input>Ver Ticket</label>
                          <label class="checkbox-inline"><input type="checkbox"></input>Editar Ticket</label>
                          <label class="checkbox-inline"><input type="checkbox"></input>Asignar Ticket</label>
                          <label class="checkbox-inline"><input type="checkbox"></input>Cambiar Departamento</label>
                          <label class="checkbox-inline"><input type="checkbox"></input>Cambiar SLA</label>
                        </div>
                      </div>
                      <br>
                </div>
                 
                <!-- Fin Permisos sobre Tickets -->
                <!-- Permisos sobre Informes -->
                <h5>Permisos sobre Informes</h5>
                <div class="box box-primary">
                    <br>
                      <div class="form-group">
                        <div class="col-sm-11 checkbox">
                          <label class="checkbox-inline"><input type="checkbox"></input>Ver Informes de usuarios</label>
                          <label class="checkbox-inline"><input type="checkbox"></input>Ver Informes de operador</label>
                          <label class="checkbox-inline"><input type="checkbox"></input>Ampliar a todos los departamentos</label>
                          <label class="checkbox-inline"><input type="checkbox"></input>Habilitar Widgets</label>
                        </div>
                      </div>
                      <br>
                </div>  
                <!-- Fin Permisos sobre Informes -->
                <!-- Permisos sobre Anuncios -->
                <h5>Permisos sobre Anuncios</h5>
                <div class="box box-primary">
                    <br>
                      <div class="form-group">
                        <div class="col-sm-11 checkbox">
                          <label class="checkbox-inline"><input type="checkbox"></input>Ver Anuncios</label>
                          <label class="checkbox-inline"><input type="checkbox"></input>Crear Anuncio</label>
                          <label class="checkbox-inline"><input type="checkbox"></input>Editar Anuncio</label>
                          <label class="checkbox-inline"><input type="checkbox"></input>Eliminar Anuncio</label>
                        </div>
                        <div class="col-sm-11 checkbox">
                          <label class="checkbox-inline"><input type="checkbox"></input>Ver Categorias</label>
                          <label class="checkbox-inline"><input type="checkbox"></input>Crear Categoría </label>
                          <label class="checkbox-inline"><input type="checkbox"></input>Editar Categoría</label>
                          <label class="checkbox-inline"><input type="checkbox"></input>Eliminar Categoría</label>
                        </div>
                      </div>
                      <br>
                </div>
                <!-- Fin Permisos sobre Anuncios -->
            </div> 
            <!-- Fin Columna Izquierda -->
            <!-- Columna Derecha -->
            <div class="col-md-6">
              
                <!-- Permisos Generales del sistema -->
                <h5>Permisos Generales del sistema</h5>
                <div class="box box-primary">
                      <div class="form-group">
                        <div class="col-sm-11 checkbox">
                          <label class="checkbox-inline"><input type="checkbox"></input>Configurar Parametros generales</label>
                          <label class="checkbox-inline"><input type="checkbox"></input>Configurar Plantillas de mail</label>
                          <label class="checkbox-inline"><input type="checkbox"></input>Configurar Departamentos</label>
                        </div>
                        <div class="col-sm-11 checkbox">
                          <label class="checkbox-inline"><input type="checkbox"></input>Configurar Tipos de Ticktes</label>
                          <label class="checkbox-inline"><input type="checkbox"></input>Configurar Prioridades</label>
                          <label class="checkbox-inline"><input type="checkbox"></input>Configurar Estados</label>
                          <label class="checkbox-inline"><input type="checkbox"></input>Configurar SLA</label>
                        </div>
                        <div class="col-sm-11 checkbox">
                          <label class="checkbox-inline"><input type="checkbox"></input>Configurar Campos Custom</label>
                        </div>
                      </div>
                      <br>
                </div>
                <!-- Fin Permisos Generales del sistema -->
                  <!-- Permisos sobre Usuarios -->

                <h5>Permisos sobre Usuarios</h5>
                <div class="box box-primary">
                      <div class="form-group">
                        <div class="col-sm-11 checkbox">
                          <label class="checkbox-inline"><input type="checkbox"></input>Crear Usuario</label>
                          <label class="checkbox-inline"><input type="checkbox"></input>Ver Usuarios</label>
                          <label class="checkbox-inline"><input type="checkbox"></input>Editar Usuarios</label>
                          <label class="checkbox-inline"><input type="checkbox"></input>Asignar Usuarios a Empresa</label>
                        </div>
                        <div class="col-sm-11 checkbox">
                          <label class="checkbox-inline"><input type="checkbox"></input>Crear Empresa</label>
                          <label class="checkbox-inline"><input type="checkbox"></input>Editar Empresa</label>
                          <label class="checkbox-inline"><input type="checkbox"></input>Ver Empresas</label>
                        </div>
                      </div>
                </div>

                  <!-- Fin Permisos sobre Usuarios -->
                  <!-- Permisos sobre Operadores -->
                <h5>Permisos sobre Operadores</h5>
                <div class="box box-primary">
                      <div class="form-group">
                        <div class="col-sm-11 checkbox">
                          <label class="checkbox-inline"><input type="checkbox"></input>Ver Operadores</label>
                          <label class="checkbox-inline"><input type="checkbox"></input>Crear Operador</label>
                          <label class="checkbox-inline"><input type="checkbox"></input>Editar Operador</label>
                        </div>
                        <div class="col-sm-11 checkbox">  
                          <label class="checkbox-inline"><input type="checkbox"></input>Ver Perfiles</label>
                          <label class="checkbox-inline"><input type="checkbox"></input>Crear perfil</label>
                          <label class="checkbox-inline"><input type="checkbox"></input>editar Perfil</label>
                        </div>
                      </div>
                      <br>
                </div>
                <!-- Fin Permisos sobre Operadores -->
            </div>
            <!-- Fin Columna Derecha -->
 
            <div class="pull-right">
              <button type="submit" class="btn btn-warning">Enviar</button>
            </div>
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