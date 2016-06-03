{include file="header.tpl"
css=''
js=''
}
{include file="panelLateral.tpl"}
  <!-- =============================================== -->

 

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content">
      
      <!-- Datos de interes -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3 id="pendientesAccion"></h3>
              <p>Tickets <small>Pendientes de acción</small></p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3 id="usuariosExistentes"></h3>
              <p>Usuarios <small>Existentes</small></p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>!</h3>
              <p>Soporte N1<small>El más activo</small></p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>53<sup style="font-size: 20px">%</sup></h3>

              <p>Tu tiempo <small>de respuesta promedio.</small></p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
          </div>
        </div>
      </div>
        
      

      
      
     <div class="row">
        <!--INICIO COLUMNA IZQUIERDA -->
            <div class="col-md-6">
              <div class="row">
                <div class="col-md-4 col-sm-8 col-xs-12">
                  <div class="info-box">
                    <span class="info-box-icon bg-acua"><i class="fa fa-envelope-o"></i></span>
                    <div class="info-box-content">
                      <span class="info-box-text">Abiertos </span>
                      <span class="info-box-number" id="ticketsOperadorAbiertos"></span>
                    </div><!-- /.info-box-content -->
                  </div><!-- /.info-box -->
                </div><!-- /.col -->

                <div class="col-md-4 col-sm-8 col-xs-12">
                  <div class="info-box">
                    <span class="info-box-icon bg-red"><i class="fa fa-files-o"></i></span>
                    <div class="info-box-content">
                      <span class="info-box-text">En Curso</span>
                      <span class="info-box-number" id="ticketsOperadorEnCurso"></span>
                    </div><!-- /.info-box-content -->
                  </div><!-- /.info-box -->
                </div><!-- /.col -->

                <div class="col-md-4 col-sm-8 col-xs-12">
                  <div class="info-box">
                    <span class="info-box-icon bg-black"><i class="fa fa-star-o"></i></span>
                    <div class="info-box-content">
                      <span class="info-box-text">Cerrados</span>
                      <span class="info-box-number" id="ticketsOperadorCerrados"></span>
                    </div><!-- /.info-box-content -->
                  </div><!-- /.info-box -->
                </div><!-- /.col -->
              </div>
            <!-- AREA CHART -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Informe Tiempo Estimado vs Tiempo Real de Resolución</h3>
    
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <div class="chart">
                        <canvas id="areaChart" style="height:250px"></canvas>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
            
            
            
            <!-- BAR  Chart Tiempo Primera Respuesta  -->
            <div class="box box-success">
                <div class="box-header with-border">
                  <h3 class="box-title">Informe Tiempo de Primera Respuesta</h3>
        
                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <div class="box-body">
                  <div class="chart">
                    <canvas id="barChart" style="height:250px"></canvas>
                  </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box Chart Tiempo Primera Respuesta -->
        </div>
        <!-- columna Izquierda-->
        
        
        <!--INICIO COLUMNA Derecha -->
        <div class="col-md-6">
            
            <!-- DONUT CHART -->
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">Informe Estado de Tickets</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body pieChart">
                  <canvas id="pieChart" style="height:250px"></canvas>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
          
            <!-- Radar CHART -->
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Informe Tickets por Prioridad</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                  <canvas id="radarChart" style="height:250px"></canvas>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->          
          

        </div>
        <!-- columna Derecha-->
        
        
        
        
        
    </div>
    <!-- fin row -->
 
    </section>
    <!-- /.content -->
    
  </div>
 
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.0 -->
<script src="{$rutaJS}jQuery-2.2.0.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="{$rutaJS}bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="{$rutaJS}jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="{$rutaJS}fastclick.js"></script>
<!-- AdminLTE App -->
<script src="{$rutaJS}app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{$rutaJS}demo.js"></script>
<!-- ChartJS 1.0.1 -->
<script src="{$rutaJS}Chart.min.js"></script>
<script src="{$rutaJS}w-primera-respuesta.js"></script>
<script src="{$rutaJS}w-ticket-prioridad.js"></script>
<script src="{$rutaJS}w-ticket-estados.js"></script>
<script src="{$rutaJS}w-tiempo-vs-tiempo.js"></script>
<script src="{$rutaJS}ticketsPendientesAccion.js"></script>
<script src="{$rutaJS}cantidadUsuariosExistentes.js"></script>
<script src="{$rutaJS}ticketsAbiertosOperador.js"></script>
<script src="{$rutaJS}ticketsEnCursoOperador.js"></script>
<script src="{$rutaJS}ticketsCerradosOperador.js"></script>

{include file='footer.tpl'}