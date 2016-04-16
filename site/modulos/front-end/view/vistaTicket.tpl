{include file="header.tpl"
css=''
js=''
}
{include file="panelLateral.tpl"}

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Vista Ticket N°1
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Mis Tickets->Vista Ticket</li>
      </ol>
    </section>
    
    
    <section class="content">
      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">Detalle</h3>
        </div>
        <!-- /.box-header -->
        
        <!-- form start -->
        <form action="{$rutaCSS}../controlador/vistaTicketAction.php" class="form-horizontal">
          <div class="box-body">
            <div class="box">
              
                <div class="form-group">
                  <div class="box-body pad">
                    <label for="inputDepartamento" class="col-sm-2 control-label">Departamento</label>
                    <div class="col-sm-2">
                      <input type="text" class="form-control" id="inputDepartamento" disabled>
                    </div>
                    
                    <label for="inputDepartamento" class="col-sm-2 control-label">Fecha Alta</label>
                    <div class="col-sm-2">
                      <input type="text" class="form-control" id="inputDepartamento" disabled>
                    </div>

                  </div>
                </div>
                
                <div class="form-group">
                  <div class="box-body pad">
                    <label for="inputDepartamento" class="col-sm-2 control-label">Estado</label>
                    <div class="col-sm-2">
                      <input type="text" class="form-control" id="inputDepartamento" disabled>
                    </div>
                    
                    <label for="inputDepartamento" class="col-sm-2 control-label">Fecha Modificación</label>
                    <div class="col-sm-2">
                      <input type="text" class="form-control" id="inputDepartamento" disabled>
                    </div>
                  </div>
                </div>
                
                
                
            </div><!-- fin box detalle-->
          </div><!-- fin box body detalle-->
          
          
          
          <!--Boton Cerrar Ticket-->
          <div class="col-md-2 pull-right">
              <a href="/index.php?modulo=nuevoTicket" class="btn btn-danger btn-block margin-right">Cerrar Ticket</a>
          </div>
          <!--Fin Boton Cerrar Ticket-->
          
          <!--Body Tab-->
          <div class="box-body">
            <!-- Custom Tabs -->
            <div class="nav-tabs-custom">
              <ul class="nav nav-tabs">
                <li class=""><a href="#tab_1" data-toggle="tab">Tab 1</a></li>
                <li class="active"><a href="#tab_2" data-toggle="tab">Agregar Comentario</a></li>
                
              </ul>
              <div class="tab-content">
                <div class="tab-pane" id="tab_1">
                  <b>How to use:</b>
  
                  <p>Exactly like the original bootstrap tabs except you should use
                    the custom wrapper <code>.nav-tabs-custom</code> to achieve this style.</p>
                  A wonderful serenity has taken possession of my entire soul,
                  like these sweet mornings of spring which I enjoy with my whole heart.
                  I am alone, and feel the charm of existence in this spot,
                  which was created for the bliss of souls like mine. I am so happy,
                  my dear friend, so absorbed in the exquisite sense of mere tranquil existence,
                  that I neglect my talents. I should be incapable of drawing a single stroke
                  at the present moment; and yet I feel that I never was a greater artist than now.
                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane active" id="tab_2">
                  <div class="form-group">
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




{include file="footer.tpl"}