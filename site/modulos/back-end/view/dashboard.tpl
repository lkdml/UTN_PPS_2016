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
              <h3 id="cantidadSinCerrar"></h3>
              <p>Tickets <small>sin cerrar</small></p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
               <h3 id="cantidadAsignados"></h3>

              <p>Tus tickets<small>asignados.</small></p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
          </div>
        </div>
        
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3 id="ticketsCerradosMesActual"></h3>
              <p>Tus tickets<small>cerrados en el mes</small></p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
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
        
        
      </div>
        
      

      
    
      <div class="row">
        <div class="col-md-12">
              <div class="row" id="widgetEstados">

              </div>
        </div
          <!--INICIO COLUMNA IZQUIERDA -->
            <div class="col-md-6">
              {if $Permisos->verificarPermiso("informes_widgets")}
                <!-- AREA CHART -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Informe tickets cerrados en el año actual</h3>
        
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="chart">
                            <canvas id="lineChart" style="height:250px"></canvas>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
                
                
                
                <!-- BAR  Chart Tiempo Primera Respuesta  -->
                <div class="box box-success">
                    <div class="box-header with-border">
                      <h3 class="box-title">Informe tipo de ticket en el mes</h3>
            
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
              {/if}
          </div>
          <!-- columna Izquierda-->
          
          
          <!--INICIO COLUMNA Derecha -->
          <div class="col-md-6">
              
              {if $Permisos->verificarPermiso("informes_widgets")}
                <!-- DONUT CHART -->
                <div class="box box-danger">
                    <div class="box-header with-border">
                        <h3 class="box-title">Informe estado de tickets por mes</h3>
    
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
                        <h3 class="box-title">Informe tickets por prioridad en el mes</h3>
    
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
  
    {if $Error}{$Error->getHtmlModal()}{/if}
    
                             
    {/if}
 
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
<script src="{$rutaJS}w-tipoTicket-mes.js"></script>
<script src="{$rutaJS}w-ticket-prioridad-mes.js"></script>
<script src="{$rutaJS}w-ticket-estados-mes.js"></script>
<script src="{$rutaJS}w-ticketsCerrados-Anual.js"></script>
<script src="{$rutaJS}ticketsSinCerrar.js"></script>
<script src="{$rutaJS}ticketsAsignados.js"></script>
<script src="{$rutaJS}cantidadUsuariosExistentes.js"></script>
<script src="{$rutaJS}ticketsCerradosMesActual.js"></script>
<script src="{$rutaJS}tmh-error.js"></script>

{literal}
<script>

$( document ).ready(function() {
     $.ajax({
          url:'operador.php?modulo=widgets',
          type:'GET',
          datatype:'JSON',
          data:{datosAjax:'widgetEstados'},
          success: function (response){
                      var array = jQuery.parseJSON( response );
                      var encabezado;
                      if ((array.length % 2) == 1){
                        encabezado = '<div class="col-md-4 col-sm-8 col-xs-12">';
                      } else {
                        encabezado ='<div class="col-md-3 col-sm-6 col-xs-9">';
                      }
                  
                      for(var i=0;i<array.length;i++)
                      {
                      
                         $('#widgetEstados').append(encabezado+'\
                            <a class="w-estados" href="/operador.php?modulo=tickets&Asignados=1&Estados='+array[i].id+'"  >\
                            <div class="info-box">\
                              <span class="info-box-icon bg-acua" style=background-color:'+array[i].color+';color:white><i class="glyphicon '+array[i].icono+'"></i></span>\
                              <div class="info-box-content">\
                                <span class="info-box-text">'+array[i].nombre+'</span>\
                                <span class="info-box-number" >'+array[i].cantidad+'</span>\
                              </div>\
                            </div>\
                            </a>\
                          </div>'); 

                      }
            
                  }
        });
});


</script>
{/literal}


{include file='footer.tpl'}