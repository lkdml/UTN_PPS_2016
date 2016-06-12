 {include file="header.tpl"
css='<link rel="stylesheet" href="./modulos/front-end/css/validacion.css">'
 js=''
 }
 {include file="panelLateral.tpl"}
 
 <div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <section class="content-header">
       <h1>
          <strong>Ticket N°67890</strong>
         <small></small>
       </h1>
       <ol class="breadcrumb">
         <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
         <li class="active">Mis Tickets > Vista Ticket</li>
       </ol>
     </section>
     
     
     <section class="content">
       <div class="box box-info">
         <div class="box-header with-border">
           <h3 class="box-title">Detalle</h3>
         </div>
         <!-- /.box-header -->
         
         <!-- form start -->
         <form action="{$rutaCSS}../controlador/vistaTicketAction.php" class="form-horizontal" method="POST" enctype="multipart/form-data">
            <div class="box-body">
                <div class="box">
                    <div class="form-group">
                      <div class="box-body pad">
                        <label for="comboDepto" class="col-sm-2 control-label">Departamento</label>
                        <div class="col-sm-5">
                           <select class="form-control select2" id="ddDepartamentos" name="Departamento" style="width: 100%;" disabled>
                              <option value = "-1">Seleccione un Departamento...</option>
                              {if $Departamentos}
                                {foreach from=$Departamentos item=$departamento}
                                  <option value="{$departamento->getDepartamentoId()}" {if $Ticket->getDepartamento()->getDepartamentoId() == $departamento->getDepartamentoId()} selected {/if}>{$departamento->getNombre()}</option>
                                {/foreach}
                              {/if}
                            </select>
                        </div>
                        <label for="inputFechaAlta" class="col-sm-2 control-label">Fecha Alta</label>
                        <div class="col-sm-2">
                          <input type="text" class="form-control" id="inputFechaAlta" value='{$Ticket->getFechaCreacion()|date_format:"%d-%m-%Y %H:%m"}' disabled>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="box-body pad">
                         <label for="comboEstado" class="col-sm-2 control-label">Estado</label>
                              <div class="col-sm-5">
                               <select class="form-control select2" id="ddPrioridades" name="Estado" style="width: 100%;" disabled>
                                {if $TicketEstados}
                                  {foreach from=$TicketEstados item=$Estado}
                                    <option value="{$Estado->getEstadoId()}" {if $Ticket->getEstado()->getEstadoId() == $Estado->getEstadoId()} selected {/if}>{$Estado->getNombre()}</option>
                                  {/foreach}
                                {/if}
                                </select>
                              </div>
                        <label for="inputFechaModificacion" class="col-sm-2 control-label">Fecha Modificación</label>
                        <div class="col-sm-2">
                          <input type="text" class="form-control" id="inputFechaModificacion" value='{$Ticket->getUltimaActividad()|date_format:"%d-%m-%Y %H:%m"}' disabled>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                        <div class="box-body pad">
                            <label for="inputAsunto" class="col-sm-2 control-label">Asunto</label>
                            <div class="col-sm-5">
                              <input type="text" class="form-control" id="inputAsunto" value='{$Ticket->getAsunto()}' disabled>
                            </div>
                            <label for="inputTipoTicket" class="col-sm-2 control-label">Tipo de Ticket</label>
                            <div class="col-sm-2">
                              <input type="text" class="form-control" id="inputTipoTicket" value='{$Ticket->getTipoTicket()->getNombre()}' disabled>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="box-body pad">
                            <label for="comboPrioridad" class="col-sm-2 control-label">Prioridad</label>
                            <div class="col-sm-5">
                               <select class="form-control select2" id="ddPrioridades" name="Prioridad" style="width: 100%;" disabled >
                                {if $Prioridades}
                                  {foreach from=$Prioridades item=$Prioridad}
                                    <option value="{$Prioridad->getPrioridadId()}"  {if $Ticket->getPrioridad()->getPrioridadId() == $Prioridad->getPrioridadId()} selected {/if}>{$Prioridad->getNombre()}</option>
                                  {/foreach}
                                {/if}
                                </select>
                            </div>
                            <label for="comboSLA" class="col-sm-2 control-label">SLA</label>
                            <div class="col-sm-2">
                               <select class="form-control select2" style="width: 100%;" disabled>
                                  <option selected="selected">SLA1</option>
                                  <option>SLA2</option>
                                  <option>SLA3</option>
                                  <option>SLA4</option>
                                  
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="box-body pad">
                              <label for="comboPrioridad" class="col-sm-2 control-label">Operador Asignado:</label>
                              <div class="col-sm-5">
                               <select class="form-control select2" id="ddOperadorAsignado" name="OperadorAsignado" style="width: 100%;" disabled>
                                   <option value = "-1">Seleccione un Operador</option>
                                   {if $Operadores}
                                      {foreach from=$Operadores item=$operador}
                                        <option value="{$operador->getOperadorId()}"  {if $Ticket->getAsignadoAOperador() != null && $operador->getOperadorId() == $Ticket->getAsignadoAOperador()->getOperadorId()} selected {/if}>{$operador->getNombre()}</option>
                                      {/foreach}
                                    {/if}
                               </select>
                            </div>
                            <label for="comboSLA" class="col-sm-2 control-label">Vencimietno</label>
                            <div class="col-sm-2">
                              <input type="text" class="form-control" id="inputFechaModificacion" value='{$Ticket->getFechaVto()|date_format:"%d-%m-%Y %H:%m"}' disabled>
                            </div>
                        </div>
                    </div>
                </div><!-- fin box detalle-->
            </div><!-- fin box body detalle-->
                {if $CamposCustom} 
                    <div class="box-body"><!-- /.box-body Campos Custom -->
                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title">Campos Personalizados</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="form-group">
                                <label for="titulo" class="col-sm-2 control-label">Sistema Operativo</label>
                                <div class="col-md-4 radio">
                                    <label>
                                      <input type="radio" name="optionsRadios" id="optnWin" value="optnWindows" checked>
                                      Windows
                                    </label>
                                </div>
                                <div class="col-md-4 radio">
                                    <label>
                                      <input type="radio" name="optionsRadios" id="optnLinux" value="optnLinux" >
                                      Linux
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="comboTipo" class="col-sm-2 control-label">Tipo Evento</label>
                                <div class="col-sm-10">
                                 <select class="form-control select2" style="width: 100%;" >
                                    <option selected="selected">Evento1</option>
                                    <option>Evento1</option>
                                    <option>Evento3</option>
                                    <option>Evento4</option>
                                    <option>Evento5</option>
                                    <option>Evento6</option>
                                    <option>Evento7</option>
                                  </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="lblTelefono" class="col-sm-2 control-label">Teléfono</label>
                                <div class="col-sm-10">
                                    <div class="col-sm-4 input-group">
                                        <div class="input-group-addon">
                                          <i class="fa fa-phone"></i>
                                        </div>
                                        <input type="text" class="form-control" data-inputmask='"mask": "9-999-9999"' data-mask >
                                    </div>
                                </div>
                            </div>
                          <br>
                        </div>
                    </div><!-- /.box-body Campos Custom -->        
                {/if}
                   
                <!-- CUSTOM TABS-->
                <!--Boton Cerrar Ticket-->
                <div class="col-md-6 pull-right">
                    <div class="col-md-2 pull-right">
                        <button onclick="window.location='/index.php?modulo=misTickets';return false;" class="btn btn-danger pull-left ">Cancelar</button>
                    </div>
                    <div class="col-md-2 pull-right">
                        <button type="submit" class="btn btn-primary pull-left">Enviar</button>
                    </div>
                </div>
                <br>
                
                
                    <!--Fin Boton Cerrar Ticket-->
                <!--Body Tab-->
                <div class="box-body">
                <!-- Custom Tabs -->
                    <div class="nav-tabs-custom">
                     <ul class="nav nav-tabs">
                        <li class="active"><a href="#tab_1" data-toggle="tab">Evolución</a></li>
                        <li class=""><a href="#tab_2" data-toggle="tab">Agregar avance</a></li>
                      </ul>
                      <div class="tab-content">
                        <div class="tab-pane active" id="tab_1">
                         
                         <!--Contenido TAB -->
                         
                             
                             <!-- Construct the box with style you want. Here we are using box-danger -->
                                <!-- Then add the class direct-chat and choose the direct-chat-* contexual class -->
                                <!-- The contextual class should match the box, so we are using direct-chat-danger -->
                                <div class="box box-danger direct-chat direct-chat-danger">
                                  <div class="box-header with-border">
                                    <h3 class="box-title"></h3>
                                    <div class="box-tools pull-right">
                                      <!--<span data-toggle="tooltip" title="2 Nuevas actividades" class="badge bg-red">2</span>-->
                                      <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                    
                                    </div>
                                  </div><!-- /.box-header -->
                                  <div class="box-body">
                                    <!-- Conversations are loaded here -->
                                    <div class="">
                                        {if $Mensajes}
                                          {foreach from=$Mensajes item=$mensaje}
                                            <div class="direct-chat-msg">
                                                <div class="direct-chat-info clearfix">
                                                    {if $mensaje->getCreador() != null} {$Creador=$mensaje->getCreador()} {/if}
                                                  <span class="direct-chat-name pull-left"><font size = 5>{if $Creador != null}
                                                                                                                  {$Creador->getNombre()} {$Creador->getApellido()} 
                                                                                                        {/if}</font></span>
                                                  <span class="direct-chat-timestamp pull-right">{$mensaje->getFecha()|date_format:"%d-%m-%Y %H:%m"}</span>
                                                </div><!-- /.direct-chat-info -->
                                                <img class="direct-chat-img" src="{$RutaAvatars}{if (get_class($Creador) == 'Proxies\__CG__\Modelo\Usuario')}{if ($Creador->getFotoHash() != null)}{$Creador->getFotoHash()}{else}UserDefault.jpg{/if}{elseif get_class($Creador) == 'Modelo\Operador'}{if $Creador->getHashFoto() != null}{$Creador->getHashFoto()}{else}UserDefault.jpg{/if}{/if}" alt="message user image"><!-- /.direct-chat-img -->
                                                <div class="direct-chat-text">
                                                  {$mensaje->getTexto()}
                                                  {$archivos=$mensaje->getMisArchivos($mensaje->getMensajeId())}
                                                  {foreach from=$archivos item=$archivo}
                                                  
                                                  <p><a href="{$archivo->getDirectorio()}{$archivo->getHash()}" target="_blank"><font size = 3>{$archivo->getNombre()}</font></a></p>
                                                  {/foreach}
                                                </div><!-- /.direct-chat-text -->
                                            </div><!-- /.direct-chat-msg -->
                                          {/foreach}
                                        {/if}
                                      <!-- Message. Default to the left -->
                                	 </div>
                                    </div>
                                </div>
                         
                         
                         
                         <!--Fin Contenido TAB-->
                         
                         
                         </div>
                         <!-- /.tab-pane -->
                         <div class="tab-pane" id="tab_2">
                           <!--<div class="form-group">-->
                             <div class="box-body pad">
                               <label for="inputDescripcion" class="col-sm-2 control-label">Descripción</label>
                                 <div class="col-sm-10">
                                   <textarea class="textarea_msg" name="Respuesta" placeholder="Ingrese una Descripción" style="width: 521px; height: 203px; font-size: 14px; line-height: 18px; border: 1px solid rgb(221, 221, 221); padding: 10px; margin: 0px;"></textarea>
                                 </div>
                               <label for="archivo" class="col-sm-2 control-label">Adjuntar</label>
                               <input class="col-sm-10" type="file" id="Archivos" name="ArchivosRespuesta[]">
                             </div>
                           </div>
                         </div>
                       </div>
                       <!-- /.tab-content -->
             </div>
             <!-- nav-tabs-custom -->
           </div>
          <!-- fin box body tab--> 

        </form>
        <!-- form end -->
      </div>
    </section>  
</div>



<script src="{$rutaJS}jQuery-2.2.0.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="{$rutaJS}bootstrap.min.js"></script>
<!-- FastClick -->
<script src="{$rutaJS}fastclick.js"></script>
<!-- AdminLTE App -->
<script src="{$rutaJS}app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{$rutaJS}demo.js"></script>
<!-- Validaciones FrontEnd -->
<script src="{$rutaJS}jquery-validator-min.js"></script>
<script src="{$rutaJS}validacionVistaTicket.js"></script>
{include file="footer.tpl"}

