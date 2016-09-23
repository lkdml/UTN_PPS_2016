{include file="header.tpl"
css='<link rel="stylesheet" type="text/css" href="./modulos/back-end/css/daterangepicker.css">'
js=''
}
{include file="panelLateralInformes.tpl"}

  <!-- =============================================== -->
<div class="content-wrapper">
 <!-- Content Header (Page header) -->
 <section class="content-header">
   <h1>
      <strong>Informes</strong>
     <small></small>
   </h1>
   <ol class="breadcrumb">
     <li><a href="/operador.php?modulo=dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
     <li class="active">Informes</li>
   </ol>
 </section>


<section class="content">
    <div class="row">
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Filtros</h3>
                </div>
                <form action="{$rutaCSS}../controlador/procesarInformeAction.php" class="form-horizontal" id = "nuevoInformeForm">
                    <div class="box-body">
                        
                        <!--Row Desde Hasta -->
                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label for="desdehasta" class="col-md-4 control-label">Desde-Hasta</label>
                                    <div class="col-md-6">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" class="form-control" id="desdehasta" name="desdehasta">
                                        </div>
                                        <!-- /.input group -->
                                    </div>
                                </div>
                                <!-- /.div group -->
                            </div>
                            <!--form end -->
                        </div>
                        <!--Row Desde Hasta -->
                        
                        <!--Row Departamento -->
                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label for="comboEmpresa" class="col-md-4 control-label">Departamento</label>
                                    <div class="col-md-6">
                                        <select class="form-control select2" style="width: 100%;" name ="Departamentos" id="cboDepartamento">
                                            <option value = "-1" >Todos</option>
                                            {if $Departamentos}
                                              {foreach from=$Departamentos item=$Departamento}
                                                <option value="{$Departamento->getDepartamentoId()}">{$Departamento->getNombre()}</option>
                                              {/foreach}
                                            {/if}
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Row Departamento -->
                        
                        
                       
                        
                        <!-- Row Procesar -->
                        <div class="row">
                           <div class="col-md-12">                           
                                <button class="btn btn-info pull-right" id="btnProcesar" data-loading-text="Procesando...">Procesar</button>  
                            </div>
                        </div>
                       <!-- Row Procesar -->
                       
                    </div>
                    <!-- /.box-body -->
                </form>
                 
                
            </div>
        </div>
    </div>
    
    <div class="row">
        <!--INICIO COLUMNA IZQUIERDA -->
        <div class="col-md-12">
            
            <!-- AREA CHART -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Informe Ticket por Departamento</h3>
    
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body">
                    <div class="chart" id="chartContent">
                        <canvas id="barChart" style="height:250px"></canvas>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- columna -->
    
    </div>
    <!-- fin row -->
</section>
<!-- /.content -->

</div>
  
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
<!-- ChartJS 1.0.1 -->
<script src="{$rutaJS}Chart.min.js"></script>

<script src="{$rutaJS}moment.min.js"></script>
<script src="{$rutaJS}daterangepicker.js"></script>

{literal}
<script>
  $(function () {
        //Date range picker
        $('#desdehasta').daterangepicker({
             locale: {
                  format: 'DD-MM-YYYY'
                },
        });
  });
  
  //cambio el cursor del mouse para cargando mientras ejecuto el ajax
      $(document).ajaxStart(function() {
        $(document.body).css({'cursor' : 'wait'});
    }).ajaxStop(function() {
        $(document.body).css({'cursor' : 'default'});
    });
    
    
    $( document ).ready(function() {
        $("#btnProcesar").click(function(e) {
                var $btn = $(this);
                $btn.button('loading');
                e.preventDefault();
                var drp = $('#desdehasta').data('daterangepicker');
                $.ajax({
                        url:'operador.php?modulo=dataInformes',
                        type:'GET',
                        datatype:'JSON',
                        data:{    tipoInforme:'ticketsPorDepartamento'
                                ,Desde:drp.startDate.format('YYYY-MM-DD 00:00:00')
                                ,Hasta:drp.endDate.format('YYYY-MM-DD 23:59:59')
                                ,Departamentos:$('#cboDepartamento').val()
                                
                        },
                        success: function (response){
                            $("#chartContent").html("").html('<canvas id="barChart" style="height:250px"></canvas>');
                            var barChartCanvas = $("#barChart").get(0).getContext("2d");
                            var barChart = new Chart(barChartCanvas);

                            var barChartData =  $.parseJSON(response);
                            barChartData.datasets[0].fillColor = "#00a65a";
                            barChartData.datasets[0].strokeColor = "#00a65a";
                            barChartData.datasets[0].pointColor = "#00a65a";
                            var barChartOptions = {
                           
                              //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
                              scaleBeginAtZero: true,
                              //Boolean - Whether grid lines are shown across the chart
                              scaleShowGridLines: true,
                              //String - Colour of the grid lines
                              scaleGridLineColor: "rgba(0,0,0,.05)",
                              //Number - Width of the grid lines
                              scaleGridLineWidth: 1,
                              //Boolean - Whether to show horizontal lines (except X axis)
                              scaleShowHorizontalLines: true,
                              //Boolean - Whether to show vertical lines (except Y axis)
                              scaleShowVerticalLines: true,
                              //Boolean - If there is a stroke on each bar
                              barShowStroke: true,
                              //Number - Pixel width of the bar stroke
                              barStrokeWidth: 2,
                              //Number - Spacing between each of the X value sets
                              barValueSpacing: 5,
                              //Number - Spacing between data sets within X values
                              barDatasetSpacing: 1,
                              //String - A legend template
                              legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].fillColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
                              //Boolean - whether to make the chart responsive
                              responsive: true,
                              maintainAspectRatio: true
                            };    
                            barChartOptions.datasetFill = false;
                            barChart.Bar(barChartData, barChartOptions);
                
                            }
                        })
                        //desactivo el loading
                        setTimeout(function () {
                                $btn.button('reset')
                        }, 1000)
        });
    });
  
  
</script>
{/literal}

 {include file="footer.tpl"}