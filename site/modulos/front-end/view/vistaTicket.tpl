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
         <form action="{$rutaCSS}../controlador/cerrarTicketAction.php" id = "vistaTicketForm" class="form-horizontal">
           <div class="box-body">
            <div class="box">
              
                <div class="form-group">
                  <div class="box-body pad">
                    <label for="inputDepartamento" class="col-sm-2 control-label">Departamento</label>
                    <div class="col-sm-5">
                      <input type="text" class="form-control" id="inputDepartamento" disabled>
                    </div>
                    
                    <label for="inputFechaAlta" class="col-sm-2 control-label">Fecha Alta</label>
                    <div class="col-sm-2">
                      <input type="text" class="form-control" id="inputFechaAlta" disabled>
                    </div>

                  </div>
                </div>
                
                <div class="form-group">
                  <div class="box-body pad">
                    <label for="inputEstado" class="col-sm-2 control-label">Estado</label>
                    <div class="col-sm-5">
                      <input type="text" class="form-control" id="inputEstado" disabled>
                    </div>
                    
                    <label for="inputFechaModificacion" class="col-sm-2 control-label">Fecha Modificación</label>
                    <div class="col-sm-2">
                      <input type="text" class="form-control" id="inputFechaModificacion" disabled>
                    </div>
                  </div>
                </div>
                
                   <div class="form-group">
                  <div class="box-body pad">
                    <label for="inputAsunto" class="col-sm-2 control-label">Asunto</label>
                    <div class="col-sm-5">
                      <input type="text" class="form-control" id="inputAsunto" disabled>
                    </div>
                    
                    <label for="inputTipoTicket" class="col-sm-2 control-label">Tipo de Ticket</label>
                    <div class="col-sm-2">
                      <input type="text" class="form-control" id="inputTipoTicket" disabled>
                    </div>
                  </div>
                </div>
            </div><!-- fin box detalle-->
          </div><!-- fin box body detalle-->
          
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
                                  <input type="radio" name="optionsRadios" id="optnLinux" value="optnLinux" disabled>
                                  Linux
                                </label>
                            </div>
                          </div>
        
                      
                          <div class="form-group">
                            <label for="comboTipo" class="col-sm-2 control-label">Tipo Evento</label>
                            <div class="col-sm-10">
                             <select class="form-control select2" style="width: 100%;" disabled>
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
                                <input type="text" class="form-control" data-inputmask='"mask": "9-999-9999"' data-mask disabled>
                                </div>
                            </div>
                          </div>
                          <br>
                      </div><!-- /.box-body Campos Custom -->        
                   
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
                <li class=""><a href="#tab_2" data-toggle="tab">Agregar Comentario</a></li>
                
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
                              <!-- Message. Default to the left -->
                              <div class="direct-chat-msg">
                                <div class="direct-chat-info clearfix">
                                  <span class="direct-chat-name pull-left"><font size = 5>Lucas Bockor</font></span>
                                  <span class="direct-chat-timestamp pull-right">19 Abril 2:00 pm</span>
                                </div><!-- /.direct-chat-info -->
                                <img class="direct-chat-img" src="{$rutaIMG}avatar.png" alt="message user image"><!-- /.direct-chat-img -->
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
                    <form action="{$rutaCSS}../controlador/enviarComentarioAction.php" class="form-horizontal">
                     <div class="box-body pad">
                       <label for="inputDescripcion" class="col-sm-2 control-label">Descripción</label>
                         <div class="col-sm-10">
                           <textarea class="textarea" placeholder="Ingrese una Descripción" id="txtDescripcion" name="txtDescripcion" style="width: 521px; height: 203px; font-size: 14px; line-height: 18px; border: 1px solid rgb(221, 221, 221); padding: 10px; margin: 0px;"></textarea>
                         </div>
                       <label for="archivo" class="col-sm-2 control-label">Adjuntar</label>
                       <input class="col-sm-10" type="file" id="archivo">
                     </div>
                     <div class="box-footer">
                       <button type="submit" class="btn btn-info pull-right">Enviar</button>
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

