 {include file="header.tpl"
 css=''
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
         <form action="{$rutaCSS}../controlador/cerrarTicketAction.php" class="form-horizontal">
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
                <li class=""><a href="#tab_1" data-toggle="tab">Evolución</a></li>
                <li class="active"><a href="#tab_2" data-toggle="tab">Agregar Comentario</a></li>
                
              </ul>
              <div class="tab-content">
                <div class="tab-pane" id="tab_1">
                 
                 <!--Contenido TAB INCOMPLETO-->
                 
                   <div class="box-body pad">
                       
                        <div class="pull-left image">
                         <img src="{$rutaIMG}user2-160x160.jpg" class="img-circle" alt="User Image" height="60" width="60">
                        </div>
                        
                      
                     </div>
                 
                 
                 
                 <!--Fin Contenido TAB-->
                 
                 
                 </div>
                 <!-- /.tab-pane -->
                 <div class="tab-pane active" id="tab_2">
                   <!--<div class="form-group">-->
                    <form action="{$rutaCSS}../controlador/enviarComentarioAction.php" class="form-horizontal">
                     <div class="box-body pad">
                       <label for="inputDescripcion" class="col-sm-2 control-label">Descripción</label>
                         <div class="col-sm-10">
                           <textarea class="textarea" placeholder="Ingrese una Descripción" style="width: 521px; height: 203px; font-size: 14px; line-height: 18px; border: 1px solid rgb(221, 221, 221); padding: 10px; margin: 0px;"></textarea>
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
{include file="footer.tpl"}

