{include file="header.tpl"
css='<link rel="stylesheet" href="./modulos/back-end/css/bootstrap-timepicker.min.css"> <link rel="stylesheet" href="./modulos/back-end/css/configuracionGeneral.css">'
js=''
}
{include file="panelLateral.tpl"}

<!-- =============================================== -->
<div class="content-wrapper">
 <!-- Content Header (Page header) -->
 <section class="content-header">
   <h1>
      <strong>Configuración General</strong>
     <small></small>
   </h1>
   <ol class="breadcrumb">
     <li><a href="/operador.php?modulo=dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
     <li class="active">Administración > Configuración General</li>
   </ol>
 </section>

 <section class="content">
    <div class="box box-info">
        
         <!-- form start -->
        <form action="{$rutaCSS}../controlador/configuracionGeneralAction.php" class="form-horizontal" method="POST" enctype="multipart/form-data">
            <div class="box-body">
                
                    <div class="form-group">
                        <div class="box-body">
                            
                            <!-- Custom Tabs -->
                            <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#tab_Web" data-toggle="tab">Web</a></li>
                                <li class=""><a href="#tab_Email" data-toggle="tab">Email</a></li>
                                <li class=""><a href="#tab_Ticket" data-toggle="tab">Tickets</a></li>
                                <li class=""><a href="#tab_Operador" data-toggle="tab">Operadores</a></li>
                                
                            </ul>
                            <div class="tab-content">
                                 <!--Contenido TAB WEB -->
                  
                                <div class="tab-pane active" id="tab_Web">
                                    <div class="box-body pad">
                                        <div class="row">
                                            <label for="inputNombre" class="col-md-2 control-label">Nombre de la Empresa</label>
                                            <div class="col-md-4">
                                              <input type="text" class="form-control" id="inputNombre" name="nombreEmpresa" {if $NombreEmpresa}value="{$NombreEmpresa}"{/if}>
                                            </div>
                                        </div>
                                         <div class="row">
                                            <span class="descripcion col-md-offset-2 col-md-10">Nombre de la companía como desees que se muestre a los usuarios.</span>
                                        </div>
                                    </div>
                                    <div class="box-body pad">
                                        <div class="row">
                                            <label for="inputNombre" class="col-md-2 control-label" >Imagen Front-End</label>
                                            <div class="col-md-2" >
                                                <div id="fondoImagenTransparente">
                                                <img src="{if $ImagenFront}{$rutaIMG}{$ImagenFront}{/if}" id="imgFrontEnd" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" id="rowFile">
                                            <div class="col-md-offset-2 col-md-4">
                                                <input type="file" class="filestyle" data-input="false" data-buttonText=" Seleccione una imagen" name="imagenFront" {if $ImagenFront}value="{$ImagenFront}"{/if}>
                                            </div>
                                         </div>
                                         <div class="row">
                                            <span class="descripcion col-md-offset-2 col-md-10">Imagen que se muestra a los usuarios.Recuerde que debe ser una imagen de extensión .png con fondo transparente.</span>
                                        </div>
                                    </div>
                                    
                                    <div class="box-body pad">
                                        <div class="row">
                                            <label for="inputURL" class="col-md-2 control-label" data-toggle="tooltip" title="Direccion web de base para la instalación">Direccion URL de Base</label>
                                            <div class="col-md-4">
                                              <input type="url" class="form-control" id="inputURL" name="urlBase" {if $UrlBaseEmpresa}value="{$UrlBaseEmpresa}"{/if}>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <span class="descripcion col-md-offset-2 col-md-10">Direccion web de base para la instalación.</span>
                                        </div>
                                    </div>
                                    <div class="box-body pad">
                                        <div class="row">
                                            <label for="inputNombre" class="col-md-2 control-label" data-toggle="tooltip" title="Si utiliza HTTPS o no">SSL</label>
                                            <div class="col-md-4">
                                                <label class="switch">
                                                    <input type="checkbox" id="inputSSL" name="ssl" {if $Ssl=="true"}checked{/if} >
                                                    <div class="slider round"></div>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <span class="descripcion col-md-offset-2 col-md-10">Conexiones seguras con el certificado SSL.</span>
                                        </div>
                                    </div>
                                    
                                    <div class="box-body pad">
                                        <div class="row">
                                            <label for="inputTextoPestaña" class="col-md-2 control-label">Texto de la pestaña</label>
                                            <div class="col-md-4">
                                              <input type="text" class="form-control" id="inputTextoPestaña" name="textoPestana" {if $TituloEmpresa}value="{$TituloEmpresa}"{/if}>
                                            </div>
                                        </div>
                                         <div class="row">
                                            <span class="descripcion col-md-offset-2 col-md-10">Texto que se va a mostrar en la pestaña del navegador.</span>
                                        </div>
                                    </div>
                                    
                                    <div class="box-body pad">
                                        <div class="row">
                                            <label for="inputFavIcon" class="col-md-2 control-label" >Icono de la pestaña</label>
                                            <div class="col-md-2">
                                                <img src="{if $IconoPestana}{$rutaIMG}{$IconoPestana}{/if}" id="imgIcono" >
                                            </div>
                                        </div>
                                        <div class="row" id="rowFile">
                                            <div class="col-md-offset-2 col-md-4">
                                                <input type="file" class="filestyle" data-input="false" data-buttonText=" Seleccione un icono" name="iconoPestana">
                                            </div>
                                        </div>
                                         <div class="row">
                                            <span class="descripcion col-md-offset-2 col-md-10">Icono que se va a mostrar en la pestaña del navegador, debe ser un archivo .ico para que funcione.</span>
                                        </div>
                                    </div>
                                    
                                    <div class="box-body pad">
                                        <div class="row">
                                            <label for="inputMantenimiento" class="col-md-2 control-label">Modo de Mantenimiento</label>
                                            <div class="col-md-6">
                                                <label class="switch">
                                                    <input type="checkbox" id="inputMantenimiento" name="modoMantenimiento" {if $Mantenimiento=="true"}checked{/if} >
                                                    <div class="slider round"></div>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <span class="descripcion col-md-offset-2 col-md-10">Cuando se habilita este modo, el Front End público estará deshabilitado y se mostrará una pantalla de mantenimiento.</span>
                                        </div>
                                    </div>
                                    
                                    
                                    
                                    <!--
                                    <div class="box-body pad">
                                        <div class="bootstrap-timepicker">
                                            <div class="form-group">
                                                <label class="col-md-2 control-label" data-toggle="tooltip" title="El horario en cual opera la mesa de ayuda">Desde/Hasta</label>
                                                
                                                <div class="col-md-4">
                                                       <div class="inline-group">
                                                        
                                                        <div class="input-group">
                                                            <div class="input-group-addon">
                                                                <i class="fa fa-clock-o"></i>
                                                            </div>
                                                            
                                                            <input type="text" class="form-control timepicker">
                                                        
                                                            <div class="input-group-addon">
                                                                <i class="fa fa-clock-o"></i>
                                                            </div>
                                                            <input type="text" class="form-control timepicker">
                                                        </div>
                                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    -->
                                 
                                 
                                </div>
                                <!--Fin Contenido TAB WEB-->  
                                
                                <!--Contenido TAB EMAIL-->
                                <div class="tab-pane" id="tab_Email">
                                    <div class="box-body pad">
                                        <div class="row">
                                            <label class="col-md-2 control-label">Email Default</label>
                                            <div class="col-md-4">
                                              <input type="text" class="form-control" name="emailDefault" {if $DefaultEmailSMTP}value="{$DefaultEmailSMTP}"{/if}>
                                            </div>
                                        </div>
                                         <div class="row">
                                            <span class="descripcion col-md-offset-2 col-md-10">La dirección de email por la cual se va a mandar los emails del sistema.</span>
                                        </div>
                                    </div>
                                    <div class="box-body pad">
                                        <div class="row">
                                            <label class="col-md-2 control-label">Usuario</label>
                                            <div class="col-md-4">
                                              <input type="text" class="form-control" name="emailUsuario" {if $UsuarioSMTP}value="{$UsuarioSMTP}"{/if}>
                                            </div>
                                        </div>
                                         <div class="row">
                                            <span class="descripcion col-md-offset-2 col-md-10">El usuario para autenticarse.</span>
                                        </div>
                                    </div>
                                    
                                    <div class="box-body pad">
                                        <div class="row">
                                            <label class="col-md-2 control-label">Contraseña</label>
                                            <div class="col-md-4">
                                              <input type="password" class="form-control" name="emailPassword" {if $PasswordSMTP}value="{$PasswordSMTP}"{/if}>
                                            </div>
                                        </div>
                                         <div class="row">
                                            <span class="descripcion col-md-offset-2 col-md-10">La contraseña para autenticarse.</span>
                                        </div>
                                    </div>
                                    
                                    <div class="box-body pad">
                                        <div class="row">
                                            <label class="col-md-2 control-label">Host SMTP</label>
                                            <div class="col-md-2">
                                              <input type="text" class="form-control" name="hostSMTP" {if $HostSMTP}value="{$HostSMTP}"{/if}>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="box-body pad">
                                        <div class="row">
                                            <label class="col-md-2 control-label">Puerto SMTP</label>
                                            <div class="col-md-2">
                                              <input type="text" class="form-control"name="puertoSMTP" {if $PuertoSMTP}value="{$PuertoSMTP}"{/if}>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="box-body pad">
                                        <div class="row">
                                            <label class="col-md-2 control-label">Encripción SMTP</label>
                                            <div class="col-md-2">
                                                <select class="form-control" name="encripcionSMTP">
                                                  <option value="-1" {if $EncripcionSMTP=="-1"}selected{/if}>Ninguna</option>
                                                  <option value="1" {if $EncripcionSMTP=="1"}selected{/if}>SSL</option>
                                                  <option value="2" {if $EncripcionSMTP=="2"}selected{/if}>TLS</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="box-body pad">
                                        <div class="row">
                                            <label class="col-md-2 control-label">Requiere Autenticación</label>
                                            <div class="col-md-2">
                                                <label class="switch">
                                                    <input type="checkbox" name="autenticacionSMTP" {if $AuthSMTP=="true"}checked{/if} >
                                                    <div class="slider round"></div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                                <!--Fin Contenido TAB EMAIL--> 
                                 
                                <!--Contenido TAB 2 -->
                                <div class="tab-pane" id="tab_Ticket">
                                    <div class="box-body pad">
                                        <div class="row">
                                            <label for="inputNombre" class="col-md-2 control-label" data-toggle="tooltip" title="El número de dias después de lo cual se cierra automaticamente los tickets inactivos">Cerrar tickes inactivos</label>
                                            <div class="col-md-4">
                                              <input type="text" class="form-control" id="inputNombre" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="box-body pad">
                                        <div class="row">
                                            <label for="inputArchivosPermitidos" class="col-md-2 control-label" data-toggle="tooltip" title="Archivos que se permitirán subir. Ej: doc|docx|png|gif|jpg|jpeg|zip|pdf|txt">Tipos de Adjuntos Permitidos</label>
                                            <div class="col-md-4">
                                                <select class="form-control select2" style="width: 100%;" id="inputArchivosPermitidos" name="archivosPermitidos[]" multiple="multiple"></select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="box-body pad">
                                        <div class="row">
                                            <label for="inputPurgaCierre" class="col-md-2 control-label">Permitir tickets sólo de usuarios identificados</label>
                                            <div class="col-md-4">
                                                <label class="radio-inline ">
                                                  <input type="radio" name="opTicketUIdentificado" id="UIdentificado" value="Si" checked> Si
                                                </label>
                                                <label class="radio-inline">
                                                  <input type="radio" name="opTicketUIdentificado" id="DeUIdentificado2" value="No" > No
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="box-body pad">
                                        <div class="row">
                                            <label class="col-md-2 control-label">Ordenamiento de los mensajes</label>
                                            <div class="col-md-2">
                                                <select class="form-control" name="ordenamientoMensajes">
                                                  <option value="ASC" {if $OrdenamientoMSJ=="ASC"}selected{/if}>Ascendente</option>
                                                  <option value="DESC" {if $OrdenamientoMSJ=="DESC"}selected{/if}>Descendente</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                 
                                </div>
                                <!--Fin Contenido TAB 2--> 
                                 
                                  <!--Contenido TAB 3 -->
                                <div class="tab-pane" id="tab_Operador">
                                    <div class="box-body pad">
                                        <label for="inputLongitudPW" class="col-md-2 control-label" data-toggle="tooltip" title="La longitud mínima que tiene que tener la contraseña">Longitud de Contraseña</label>
                                        <div class="col-md-4">
                                          <input type="text" class="form-control" id="inputLongitudPW">
                                        </div>
                                    </div>
                                    <div class="box-body pad">
                                        <label for="inputArchivosPermitidos" class="col-md-2 control-label" data-toggle="tooltip" title="La fuerza mínima de la contraseña de un operador">Contraseña del operador</label>
                                        <div class="col-md-4">
                                           <select class="form-control select2" style="width: 100%;">
                                              <option selected="selected">Alta</option>
                                              <option>Débil</option>
                                            </select>
                                        </div>
                                   
                                 
                                    </div>
                                    
                                    
                                <!--Fin Contenido TAB 3--> 
                                 
                                 
                                 
                                 
                                 
                                 
                                 
                                 
                                 
                                 
                                 
                                 
                                 
                            </div>
                            <!-- /.tab-content -->
                            </div>
                            <!-- nav-tabs-custom -->

                        </div>
                <div class="box-footer col-sm-3 pull-right">
                  <button onclick="window.location='/operador.php?modulo=dashboard';return false;" class="btn btn-danger pull-left btn-lg" >Cancelar</button>
                  {if $Permisos->verificarPermiso("general_parametros")}
                      <button type="submit" class="btn btn-info pull-right btn-lg" >Enviar</button>
                  {/if}
                </div>
                    </div>
                    <!-- form group end -->
                
            </div>
            <!-- box body end -->
             
            
        </form>
        <!-- form end -->
    </div>
    <!-- box info end-->
</div>

</div>
  
<link rel="stylesheet" href="./modulos/back-end/css/switch.css">
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
<!-- TimePicker -->
<script src="{$rutaJS}bootstrap-timepicker.min.js"></script>
<!-- No enter for submitting v1.0 -->
<script src="{$rutaJS}noEnter.js"></script>
<!-- FileStyle -->
<script type="text/javascript" src="{$rutaJS}bootstrap-filestyle.min.js"> </script>

<link rel="stylesheet" href="./modulos/back-end/css/select2.min.css" type="text/css">
<script src="{$rutaJS}select2.min.js" type="text/javascript" charset="utf-8"></script>


{literal} <script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip(); 
    
    function readURL(input,idImg) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $(idImg).attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }
    
    $("#filestyle-0").change(function(){
        readURL(this,'#imgFrontEnd');
    });
    
    $("#filestyle-1").change(function(){
        readURL(this,'#imgIcono');
    });
    

    //ayuda para valores que quieran ingresar
    var data=['jpg','png','gif','ico','TIF','doc','pdf','docx','csv','xls','XLSX','rar','ZIP','bz','gz'];
    $("#inputArchivosPermitidos").select2({
      allowClear: true,
      data: data,
      tags: true
    });
    
    
    //Me traigo los valores guardados en la configuracion y los selecciono.
    var valoresGuardadosDB={/literal}{$ExtensionesArchivos}{literal};
    
    valoresGuardadosDB.forEach(function(item){
        //me fijo si lo que guardo en la base fue un valor "custom" y lo agrego a la data
        if (data.indexOf(item) <= -1)
        {
            var option = new Option(item, item);
            $("#inputArchivosPermitidos").append(option);
        }
    })

    $("#inputArchivosPermitidos").val(valoresGuardadosDB);
    $('#inputArchivosPermitidos').trigger('change')
  });
</script>
{/literal}


{include file="footer.tpl"}