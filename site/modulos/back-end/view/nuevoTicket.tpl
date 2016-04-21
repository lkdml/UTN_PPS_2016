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
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/operador.php?modulo=dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Nuevo Ticket</li>
      </ol>
    </section>
 
 <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Nuevo Ticket</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="{$rutaCSS}../controlador/nuevoTicketAction.php" class="form-horizontal">
              <div class="box-body">
                <div class="box">
                    <div class="form-group">
                      <div class="box-body pad">
                        <label for="comboDepto" class="col-sm-2 control-label">Departamento</label>
                          <div class="col-sm-10">
                           <select class="form-control select2" style="width: 100%;">
                              <option selected="selected">Sistemas</option>
                              <option>Depto2</option>
                              <option>Depto3</option>
                              <option>Depto4</option>
                              <option>Depto5</option>
                              <option>Depto6</option>
                              <option>Depto7</option>
                            </select>
                          </div>
                        </div>  
                   </div>
                  <div class="form-group">
                    <div class="box-body pad">
                      <label for="comboTipo" class="col-sm-2 control-label">Tipo</label>
                      <div class="col-sm-10">
                       <select class="form-control select2" style="width: 100%;">
                          <option selected="selected">Soporte</option>
                          <option>Tipo2</option>
                          <option>Tipo3</option>
                          <option>Tipo4</option>
                          <option>Tipo5</option>
                          <option>Tipo6</option>
                          <option>Tipo7</option>
                        </select>
                      </div>
                    </div>
                   </div>
                   <div class="form-group">
                      <div class="box-body pad">
                        <label for="comboPrioridad" class="col-sm-2 control-label">Prioridad</label>
                        <div class="col-sm-10">
                         <select class="form-control select2" style="width: 100%;">
                            <option selected="selected">Baja</option>
                            <option>Media</option>
                            <option>Alta</option>
                            <option>Crítica</option>
                            <option>Urgente</option>
                          </select>
                        </div>
                      </div>
                     </div>
                     <div class="form-group">
                      <div class="box-body pad">
                        <label for="comboPrioridad" class="col-sm-2 control-label">SLA</label>
                        <div class="col-sm-10">
                         <select class="form-control select2" style="width: 100%;">
                            <option selected="selected">Por Defecto</option>
                            <option>24 hs</option>
                            <option>6 hs</option>
                            <option>Auto-Cierre</option>
                          </select>
                        </div>
                      </div>
                     </div>
                  </div>
                </div><!-- /.box-body Datos Principales -->
                
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
                            <input type="radio" name="optionsRadios" id="optnLinux" value="optnLinux">
                            Linux
                          </label>
                      </div>
                    </div>
  
                
                    <div class="form-group">
                      <label for="comboTipo" class="col-sm-2 control-label">Tipo Evento</label>
                      <div class="col-sm-10">
                       <select class="form-control select2" style="width: 100%;">
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
                          <input type="text" class="form-control" data-inputmask='"mask": "9-999-9999"' data-mask>
                          </div>
                      </div>
                    </div>
                    <br>
                </div><!-- /.box-body Campos Custom -->
              </div>
                <div class="box-body"><!-- /.box-body Asunto Descripcion y Adjuntos -->
                    <div class="box">
                      <div class="box-header">
                        <h3 class="box-title">Descripción
                        </h3>
                      </div>
                        <!-- /.box-header -->

                      <div class="form-group">
                        <div class="box-body pad">
                          <label for="inputAsunto" class="col-sm-2 control-label">Asunto</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputAsunto">
                          </div>
                        </div>  
                        <div class="box-body pad">
                            <label for="inputDescripcion" class="col-sm-2 control-label">Descripción</label>
                            
                                <div class="col-sm-10">
                                  <textarea class="textarea_msg" placeholder="Ingrese una Descripción" style="width: 521px; height: 203px; font-size: 14px; line-height: 18px; border: 1px solid rgb(221, 221, 221); padding: 10px; margin: 0px;"></textarea>
                                <!--  -->
                                </div>
                            
                            <label for="archivo" class="col-sm-2 control-label">Adjuntar</label>
                            <input class="col-sm-10" type="file" id="archivo">
                         </div> 
                      </div>
                    </div>
                    
                  </div><!-- /.box-body Asunto Descripcion y Adjuntos -->
                 
              </div>
              
              <div class="box-footer">
                <button type="submit" class="btn btn-info pull-right">Enviar</button>
              </div>
              <!-- /.box-footer -->
            </form>
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

<script src="{$rutaJS}bootstrap3-wysihtml5.all.js"></script>

{literal} <script>
  $(function () {
    //bootstrap WYSIHTML5 - text editor
    $(".textarea_msg").wysihtml5();
  });
</script>
{/literal}
  
  
  
{include file='footer.tpl'}