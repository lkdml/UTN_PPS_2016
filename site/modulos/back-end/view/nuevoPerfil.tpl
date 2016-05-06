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
        <form action="{$rutaCSS}../controlador/nuevoPerfilAction.php{if $perfil}?perfil={$perfil}{/if}" class="form-horizontal" method="post">
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
                              <input class="form-control" id="inputNombre" name="Nombre" {if $Nombre}value={$Nombre}{/if} placeholder="Nombre del Perfíl">
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="inputNombre" class="col-sm-2 control-label">Descripcion</label>
                            <div class="col-sm-9">
                              <input class="form-control" id="inputNombre" name="Descripcion"  {if $Descripcion}value={$Descripcion}{/if} placeholder="Descripcion del perfíl">
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
                      <div class="form-group">
                        <div class="col-sm-11  checkbox">
                          <label class="checkbox-inline"><input type="checkbox" name="permisos[ticket_listar]"{if $ticket_listar} checked{/if}></input>Listar Ticket</label>
                          <label class="checkbox-inline"><input type="checkbox" name="permisos[ticket_ver]"{if $ticket_ver} checked{/if}></input>Ver Ticket</label>
                          <label class="checkbox-inline"><input type="checkbox" name="permisos[ticket_crear]"{if $ticket_crear} checked{/if}></input>Crear Ticket</label>
                          <label class="checkbox-inline"><input type="checkbox" name="permisos[ticket_editar]"{if $ticket_editar} checked{/if}></input>Editar Ticket</label>
                          <label class="checkbox-inline"><input type="checkbox" name="permisos[ticket_asignar]"{if $ticket_asignar} checked{/if}></input>Asignar Ticket</label>
                          <label class="checkbox-inline"><input type="checkbox" name="permisos[ticket_departamento]"{if $ticket_departamento} checked{/if}></input>Cambiar Departamento</label>
                          <label class="checkbox-inline"><input type="checkbox" name="permisos[ticket_sla]"{if $ticket_sla} checked{/if}></input>Cambiar SLA</label>
                        </div>
                      </div>
                </div>
                <h5>Permisos sobre Tipo de Tickets</h5>
                <div class="box box-primary">
                      <div class="form-group">
                          <div class="col-sm-11 checkbox">
                          <label class="checkbox-inline"><input type="checkbox" name="permisos[tipoTicket_ver]"{if $tipoTicket_ver} checked{/if}></input>Ver Tipos de Tickets</label>
                          <label class="checkbox-inline"><input type="checkbox" name="permisos[tipoTicket_crear]"{if $tipoTicket_crear} checked{/if}></input>Crear Tipos de Tickets</label>
                          <label class="checkbox-inline"><input type="checkbox" name="permisos[tipoTicket_editar]"{if $tipoTicket_editar} checked{/if}></input>Editar Tipos de Tickets</label>
                          <label class="checkbox-inline"><input type="checkbox" name="permisos[tipoTicket_eliminar]"{if $tipoTicket_eliminar} checked{/if}></input>Eliminar Tipos de Tickets</label>
                        </div>
                      </div>
                </div> <!-- Fin Permisos sobre Tickets -->
                <!-- Permisos sobre Informes -->
                <h5>Permisos sobre Informes</h5>
                <div class="box box-primary">
                      <div class="form-group">
                        <div class="col-sm-11 checkbox">
                          <label class="checkbox-inline"><input type="checkbox" name="permisos[informes_usuarios]"{if $informes_usuarios} checked{/if}></input>Ver Informes de usuarios</label>
                          <label class="checkbox-inline"><input type="checkbox" name="permisos[informes_operadores]"{if $informes_operadores} checked{/if}></input>Ver Informes de operador</label>
                          <label class="checkbox-inline"><input type="checkbox" name="permisos[informes_ampliados]"{if $informes_ampliados} checked{/if}></input>Ampliar a todos los departamentos</label>
                          <label class="checkbox-inline"><input type="checkbox" name="permisos[informes_widgets]"{if $informes_widgets} checked{/if}></input>Habilitar Widgets</label>
                        </div>
                      </div>
                </div>  
                <!-- Fin Permisos sobre Informes -->
                <!-- Permisos sobre Anuncios -->
                <h5>Permisos sobre Anuncios</h5>
                <div class="box box-primary">
                      <div class="form-group">
                        <div class="col-sm-11 checkbox">
                          <label class="checkbox-inline"><input type="checkbox" name="permisos[anuncios_ver]"{if $anuncios_ver} checked{/if}></input>Ver Anuncios</label>
                          <label class="checkbox-inline"><input type="checkbox" name="permisos[anuncios_listar]"{if $anuncios_listar} checked{/if}></input>Listar Anuncios</label>
                          <label class="checkbox-inline"><input type="checkbox" name="permisos[anuncios_crear]"{if $anuncios_crear} checked{/if}></input>Crear Anuncio</label>
                          <label class="checkbox-inline"><input type="checkbox" name="permisos[anuncios_editar]"{if $anuncios_editar} checked{/if}></input>Editar Anuncio</label>
                          <label class="checkbox-inline"><input type="checkbox" name="permisos[anuncios_eliminar]"{if $anuncios_eliminar} checked{/if}></input>Eliminar Anuncio</label>
                        </div>
                      </div>
                </div>  
                <!-- Fin Permisos sobre Informes -->
                <!-- Permisos sobre Anuncios -->
                <h5>Permisos sobre Categorías</h5>
                <div class="box box-primary">
                      <div class="form-group">
                        <div class="col-sm-11 checkbox">
                          <label class="checkbox-inline"><input type="checkbox" name="permisos[categorias_ver]"{if $categorias_ver} checked{/if}></input>Ver Categorias</label>
                          <label class="checkbox-inline"><input type="checkbox" name="permisos[categorias_crear]"{if $categorias_crear} checked{/if}></input>Crear Categoría </label>
                          <label class="checkbox-inline"><input type="checkbox" name="permisos[categorias_editar]"{if $categorias_editar} checked{/if}></input>Editar Categoría</label>
                          <label class="checkbox-inline"><input type="checkbox" name="permisos[categorias_eliminar]"{if $categorias_eliminar} checked{/if}></input>Eliminar Categoría</label>
                        </div>
                      </div>
                </div>
                <h5>Permisos sobre Perfiles</h5>
                <div class="box box-primary">
                      <div class="form-group">        
                        <div class="col-sm-11 checkbox">  
                          <label class="checkbox-inline"><input type="checkbox" name="permisos[perfiles_ver]" {if $} checked{/if}></input>Ver Perfiles</label>
                          <label class="checkbox-inline"><input type="checkbox" name="permisos[perfiles_crear]" {if $} checked{/if}></input>Crear Perfil</label>
                          <label class="checkbox-inline"><input type="checkbox" name="permisos[perfiles_editar]" {if $} checked{/if}></input>editar Perfil</label>
                          <label class="checkbox-inline"><input type="checkbox" name="permisos[perfiles_eliminar]" {if $} checked{/if}></input>Eliminar Perfil</label>
                        </div>
                      </div>
                      <br>
                </div><!-- Fin Permisos sobre Anuncios -->
            </div> 
            <!-- Fin Columna Izquierda -->
            <!-- Columna Derecha -->
            <div class="col-md-6">
              
                <!-- Permisos Generales del sistema -->
                <h5>Permisos Generales del sistema</h5>
                <div class="box box-primary">
                      <div class="form-group">
                        <div class="col-sm-11 checkbox">
                          <label class="checkbox-inline"><input type="checkbox" name="permisos[general_parametros]" {if $general_parametros} checked{/if}></input>Configurar Parametros generales</label>
                          <label class="checkbox-inline"><input type="checkbox" name="permisos[general_plantillas]" {if $general_plantillas} checked{/if}></input>Configurar Plantillas de mail</label>
                        </div>
                      </div>
                </div>
                <!-- Fin Permisos Generales del sistema -->
                  <!-- Permisos sobre Usuarios -->
                <h5>Permisos sobre Departamentos</h5>
                <div class="box box-primary">
                      <div class="form-group">
                        <div class="col-sm-11 checkbox">
                          
                          <label class="checkbox-inline"><input type="checkbox" name="permisos[departamentos_ver]" {if $departamentos_ver} checked{/if}></input>Ver Departamentos</label>
                          <label class="checkbox-inline"><input type="checkbox" name="permisos[departamentos_crear]" {if $departamentos_crear} checked{/if}></input>Crear Departamentos</label>
                          <label class="checkbox-inline"><input type="checkbox" name="permisos[departamentos_editar]" {if $departamentos_editar} checked{/if}></input>Editar Departamentos</label>
                          <label class="checkbox-inline"><input type="checkbox" name="permisos[departamentos_eliminar]" {if $departamentos_eliminar} checked{/if}></input>Eliminar Departamentos</label>
                        </div>
                      </div>
                </div>
                <h5>Permisos sobre SLAs</h5>
                <div class="box box-primary">
                      <div class="form-group">
                          <div class="col-sm-11 checkbox">
                          <label class="checkbox-inline"><input type="checkbox" name="permisos[sla_ver]" {if $sla_ver} checked{/if}></input>Ver SLA</label>
                          <label class="checkbox-inline"><input type="checkbox" name="permisos[sla_crear]" {if $sla_crear} checked{/if}></input>Crear SLA</label>
                          <label class="checkbox-inline"><input type="checkbox" name="permisos[sla_editar]" {if $sla_editar} checked{/if}></input>Editar SLA</label>
                          <label class="checkbox-inline"><input type="checkbox" name="permisos[sla_eliminar]" {if $sla_eliminar} checked{/if}></input>Eliminar SLA</label>
                        </div>
                      </div>
                </div>
                <h5>Permisos sobre Prioridades</h5>
                <div class="box box-primary">
                      <div class="form-group">
                        <div class="col-sm-11 checkbox">
                          <label class="checkbox-inline"><input type="checkbox" name="permisos[prioridades_ver]" {if $prioridades_ver} checked{/if}></input>Ver Prioridades</label>
                          <label class="checkbox-inline"><input type="checkbox" name="permisos[prioridades_crear]" {if $prioridades_crear} checked{/if}></input>Crear Prioridades</label>
                          <label class="checkbox-inline"><input type="checkbox" name="permisos[prioridades_editar]" {if $prioridades_editar} checked{/if}></input>Editar Prioridades</label>
                          <label class="checkbox-inline"><input type="checkbox" name="permisos[prioridades_eliminar]" {if $prioridades_eliminar} checked{/if}></input>Eliminar Prioridades</label>
                        </div>
                      </div>
                </div>
                <h5>Permisos sobre Estados</h5>
                <div class="box box-primary">
                      <div class="form-group">        
                        <div class="col-sm-11 checkbox">
                          <label class="checkbox-inline"><input type="checkbox" name="permisos[estados_ver]" {if $estados_ver} checked{/if}></input>Ver Estados</label>
                          <label class="checkbox-inline"><input type="checkbox" name="permisos[estados_crear]" {if $estados_crear} checked{/if}></input>Crear Estados</label>
                          <label class="checkbox-inline"><input type="checkbox" name="permisos[estados_editar]" {if $estados_editar} checked{/if}></input>Editar Estados</label>
                          <label class="checkbox-inline"><input type="checkbox" name="permisos[estados_eliminar]" {if $estados_eliminar} checked{/if}></input>Eliminar Estados</label>
                        </div>
                      </div>
                </div>
                <h5>Permisos sobre Usuarios</h5>
                <div class="box box-primary">
                      <div class="form-group">
                        <div class="col-sm-11 checkbox">
                          <label class="checkbox-inline"><input type="checkbox" name="permisos[usuarios_ver]" {if $usuarios_ver} checked{/if}></input>Ver Usuarios</label>
                          <label class="checkbox-inline"><input type="checkbox" name="permisos[usuarios_crear]" {if $usuarios_crear} checked{/if}></input>Crear Usuario</label>
                          <label class="checkbox-inline"><input type="checkbox" name="permisos[usuarios_editar]" {if $usuarios_editar} checked{/if}></input>Editar Usuarios</label>
                          <label class="checkbox-inline"><input type="checkbox" name="permisos[usuarios_eliminar]" {if $usuarios_eliminar} checked{/if}></input>Eliminar Usuarios</label>
                          <label class="checkbox-inline"><input type="checkbox" name="permisos[usuarios_asignar]" {if $usuarios_asignar} checked{/if}></input>Asignar Usuarios a Empresa</label>
                        </div>
                      </div>
                </div>
                <h5>Permisos sobre Empresas</h5>
                <div class="box box-primary">
                      <div class="form-group">        
                        <div class="col-sm-11 checkbox">
                          <label class="checkbox-inline"><input type="checkbox" name="permisos[empresas_ver]" {if $empresas_ver} checked{/if}></input>Ver Empresas</label>
                          <label class="checkbox-inline"><input type="checkbox" name="permisos[empresas_crear]" {if $empresas_crear} checked{/if}></input>Crear Empresa</label>
                          <label class="checkbox-inline"><input type="checkbox" name="permisos[empresas_editar]" {if $empresas_editar} checked{/if}></input>Editar Empresa</label>
                          <label class="checkbox-inline"><input type="checkbox" name="permisos[empresas_eliminar]" {if $empresas_eliminar} checked{/if}></input>Eliminar Empresas</label>
                        </div>
                      </div>
                </div>

                  <!-- Fin Permisos sobre Usuarios -->
                  <!-- Permisos sobre Operadores -->
                <h5>Permisos sobre Operadores</h5>
                <div class="box box-primary">
                      <div class="form-group">
                        <div class="col-sm-11 checkbox">
                          <label class="checkbox-inline"><input type="checkbox" name="permisos[operadores_ver]" {if $} checked{/if}></input>Ver Operadores</label>
                          <label class="checkbox-inline"><input type="checkbox" name="permisos[operadores_crear]" {if $} checked{/if}></input>Crear Operador</label>
                          <label class="checkbox-inline"><input type="checkbox" name="permisos[operadores_editar]" {if $} checked{/if}></input>Editar Operador</label>
                          <label class="checkbox-inline"><input type="checkbox" name="permisos[operadores_eliminar]" {if $} checked{/if}></input>Eliminar Operador</label>
                        </div>
                      </div>
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