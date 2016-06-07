{include file="header.tpl"
css=''
js='' 
}
{include file="panelLateral.tpl"}

 
 <div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <section class="content-header">
       <h1>
          <strong>Ticket {$Ticket->getNumeroTicket()}</strong>
         <small></small>
       </h1>
       <ol class="breadcrumb">
         <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
         <li class="active">Tickets > Ver Ticket</li>
       </ol>
     </section>
     
     
     <section class="content">
       <div class="box box-info">
         <div class="box-header with-border">
           <h3 class="box-title">Detalle</h3>
         </div>
         <!-- /.box-header -->
         
         <!-- form start -->
         <form action="{$rutaCSS}../controlador/cerrarTicketAction.php" class="form-horizontal">
           <div class="box-body">
            <div class="box">
              
                <div class="form-group">
                  <div class="box-body pad">
          
                    
                        <label for="comboDepto" class="col-sm-2 control-label">Departamento</label>
                          <div class="col-sm-5">
                           <select class="form-control select2" id="ddDepartamentos" name="Departamento" style="width: 100%;">
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
                           <select class="form-control select2" id="ddPrioridades" name="Estado" style="width: 100%;">
                            {if $TicketEstados}
                              {foreach from=$TicketEstados item=$Estado}
                                <option value="{$Estado->getEstadoId()}" {if $Ticket->getEstado()->getEstadoId() == $Estado->getEstadoId()} selected {/if}>{$Estado->getNombre()}</option>
                              {/foreach}
                            {/if}
                        </select>
                          </div>
                    
                    
                    <label for="inputFechaModificacion" class="col-sm-2 control-label">Fecha Modificación</label>
                    <div class="col-sm-2">
                      <input type="text" class="form-control" id="inputFechaModificacion" value='{$Ticket->getFechaVto()|date_format:"%d-%m-%Y %H:%m"}' disabled>
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
                           <select class="form-control select2" id="ddPrioridades" name="Prioridad" style="width: 100%;">
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
                           <select class="form-control select2" id="ddOperadorAsignado" name="OperadorAsignado" style="width: 100%;">
                               <option value = "-1">Seleccione un Operador</option>
                               {if $Operadores}
                                  {foreach from=$Operadores item=$operador}
                                    <option value="{$operador->getOperadorId()}"  {if $operador->getOperadorId() == $Ticket->getOperador()->getOperadorId()} selected {/if}>{$operador->getNombre()}</option>
                                  {/foreach}
                                {/if}
                           </select>
                          </div>
                  </div>
                </div>
                
                
                
                
                
            </div><!-- fin box detalle-->
          </div><!-- fin box body detalle-->
                    {if $CamposCustom} 
                     <div class="box-body"><!-- /.box-body Campos Custom -->
                        <div class="box">
                          <div class="box-header">
                            <h3 class="box-title">Campos Personalizados
                            </h3>
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
                      </div><!-- /.box-body Campos Custom -->        
                    {/if}
                   <!--Boton Cerrar Ticket-->
                    <div class="col-md-2 pull-right">
                                  <button type="submit" class="btn btn-danger btn-block">Cerrar Ticket</button>
                              </div>
                    <!--Fin Boton Cerrar Ticket-->
                    
                    
            </form>
            
            
            <!-- CUSTOM TABS-->
          
          <!--Body Tab-->
          <div class="box-body">
            <!-- Custom Tabs -->
            <div class="nav-tabs-custom">
             <ul class="nav nav-tabs">
                <li class="active"><a href="#tab_1" data-toggle="tab">Evolución</a></li>
                <li class=""><a href="#tab_2" data-toggle="tab">Comentario General</a></li>
                <li class=""><a href="#tab_3" data-toggle="tab">Comentario Operador</a></li>
                
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
                              <span data-toggle="tooltip" title="2 Nuevas actividades" class="badge bg-red">2</span>
                              <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            
                            </div>
                          </div><!-- /.box-header -->
                          <div class="box-body">
                            <!-- Conversations are loaded here -->
                            <div class="direct-chat-messages">
                                {if $Mensajes}
                                  {foreach from=$Mensajes item=$mensaje}
                                    <div class="direct-chat-msg">
                                        <div class="direct-chat-info clearfix">
                                          <span class="direct-chat-name pull-left"><font size = 5>{if $mensaje->getCreadorOperador() != null}
                                                                                                          {$mensaje->getCreadorOperadorNombre()}
                                                                                                      
                                                                                                  {else}
                                                                                                      {$mensaje->getCreadorUsuarioNombre()}
                                                                                                {/if}</font></span>
                                          <span class="direct-chat-timestamp pull-right">{$mensaje->getFecha()|date_format:"%d-%m-%Y %H:%m"}</span>
                                        </div><!-- /.direct-chat-info -->
                                        <img class="direct-chat-img" src="{$rutaIMG}/avatars/{if $Operador}{$Operador->getHashFoto()}{else}UserDefault.jpg{/if}" alt="message user image"><!-- /.direct-chat-img -->
                                        <div class="direct-chat-text">
                                          {$mensaje->getTexto()}
                                          <p><a href="https://www.facebook.com/lukas77.25"><font size = 3>Adjunto 1</font></a></p>
                                        </div><!-- /.direct-chat-text -->
                                    </div><!-- /.direct-chat-msg -->
                                  {/foreach}
                                {/if}
                              <!-- Message. Default to the left -->
                              
                                 <!-- Message. Default to the left -->
                              <div class="direct-chat-msg">
                                <div class="direct-chat-info clearfix">
                                  <span class="direct-chat-name pull-left"><font size = 5>Elizabeth DeWitt</font></span>
                                  <span class="direct-chat-timestamp pull-right">19 Abril 1:30 pm</span>
                                </div><!-- /.direct-chat-info -->
                                <img class="direct-chat-img" src="{$rutaIMG}avatar2.png" alt="message user image"><!-- /.direct-chat-img -->
                                <div class="direct-chat-text">
                                  Is this template really for free? That's unbelievable!Lorem ipsum dolor sit amet, consectetur 
                                  adipiscing elit. Maecenas leo leo, congue vel quam sit amet, viverra auctor eros. Ut vulputate
                                  ac erat ac eleifend. Morbi malesuada pretium accumsan. Vestibulum tincidunt velit eget velit 
                                  sodales, in hendrerit purus hendrerit. Integer auctor quis felis sed consectetur. 
                                  Maecenas scelerisque orci lorem, nec vehicula diam tincidunt at. Sed ultrices dui eu 
                                  hendrerit congue. Morbi iaculis sit amet erat at finibus. Integer sollicitudin pulvinar dolor id pharetra. 
                                  Aenean eget elit dui.
                                  
                                  <p><a href="https://www.facebook.com/lukas77.25"><font size = 3>Adjunto 1</font></a></p>
                                
                                  
                                </div><!-- /.direct-chat-text -->
                              </div><!-- /.direct-chat-msg -->
                        	 </div>
                            </div>
                        </div>
                 
                 
                 
                 <!--Fin Contenido TAB-->
                 
                 
                 </div>
                 <!-- /.tab-pane -->
                 <div class="tab-pane" id="tab_2">
                   <!--<div class="form-group">-->
                    <form action="{$rutaCSS}../controlador/enviarComentarioGeneralAction.php" class="form-horizontal">
                     <div class="box-body pad">
                       <label for="inputDescripcion" class="col-sm-2 control-label">Descripción</label>
                         <div class="col-sm-10">
                           <textarea class="textarea" placeholder="Ingrese una Descripción" style="width: 521px; height: 203px; font-size: 14px; line-height: 18px; border: 1px solid rgb(221, 221, 221); padding: 10px; margin: 0px;"></textarea>
                         </div>
                       <label for="archivo" class="col-sm-2 control-label">Adjuntar</label>
                       <input class="col-sm-10" type="file" id="Archivos[]">
                     </div>
                     <div class="box-footer">
                       
                       <button type="submit" class="btn btn-info pull-right">Enviar</button>
                     </div>
                   </div>
                   
                   
                <div class="tab-pane" id="tab_3">
                   <!--<div class="form-group">-->
                    <form action="{$rutaCSS}../controlador/enviarComentarioOperadorAction.php" class="form-horizontal">
                     <div class="box-body pad">
                       <label for="inputDescripcion" class="col-sm-2 control-label">Descripción</label>
                         <div class="col-sm-10">
                           <textarea class="textarea" placeholder="Ingrese una Descripción" style="width: 521px; height: 203px; font-size: 14px; line-height: 18px; border: 1px solid rgb(221, 221, 221); padding: 10px; margin: 0px;"></textarea>
                         </div>
                       <label for="archivo" class="col-sm-2 control-label">Adjuntar</label>
                       <input class="col-sm-10" type="file" id="archivo">
                     </div>
                     <div class="box-footer">
                       
                       <button type="submit" class="btn btn-info pull-left">Enviar</button>
                        <button onclick="history.go(-1);" class="btn btn-danger pull-right">Cancelar</button>
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



           
 <link rel="stylesheet" href="{$rutaCSS}bootstrap3-wysihtml5.min.css">

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
<!-- No enter for submitting v1.0 -->
<script src="{$rutaJS}noEnter.js"></script>

<script src="{$rutaJS}bootstrap3-wysihtml5.all.js"></script>

{literal} <script>
  $(function () {
    //bootstrap WYSIHTML5 - text editor
    $(".textarea_msg").wysihtml5();
  });
</script>
{/literal}
  
  
  
{include file='footer.tpl'}