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
                <form action="{$rutaCSS}../controlador/procesarInformeAction.php" class="form-horizontal">
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
                                            <input type="text" class="form-control" id="desdehasta">
                                        </div>
                                        <!-- /.input group -->
                                    </div>
                                </div>
                                <!-- /.div group -->
                            </div>
                            <!--form end -->
                        </div>
                        <!--Row Desde Hasta -->
                        
                        <!--Row Empresa -->
                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label for="comboEmpresa" class="col-md-4 control-label">Empresa</label>
                                    <div class="col-md-6">
                                        <select class="form-control select2"  id="cboEmpresas" name="Empresas" style="width: 100%;">
                                              {if $Empresas}
                                                {foreach from=$Empresas item=$Empresa}
                                                  <option value="{$Empresa->getEmpresaId()}">{$Empresa->getRazonSocial()}</option>
                                                {/foreach}
                                              {/if}
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Row Empresa -->
                        
                        
                        <!--Row Estado-->
                          <div class="row">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label for="comboEmpresa" class="col-md-4 control-label">Estado</label>
                                    <div class="col-md-6">
                                        <select class="form-control select2" id="cboEstados" name="Estados" style="width: 100%;">
                                            {if $Estados}
                                              {foreach from=$Estados item=$Estado}
                                                <option value="{$Estado->getEstadoId()}">{$Estado->getNombre()}</option>
                                              {/foreach}
                                            {/if}
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Row Estado -->
                        
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
                    <h3 class="box-title">Informe Ticket por Empresa/Estado</h3>
    
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body">
                    <div class="chart" id ="chartContent">
                        <canvas id="areaChart" style="height:250px"></canvas>
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
                        data:{    tipoInforme:'ticketsPorEmpresaPorEstado'
                                ,Desde:drp.startDate.format('YYYY-MM-DD 00:00:00')
                                ,Hasta:drp.endDate.format('YYYY-MM-DD 23:59:59')
                                ,Estado:$('#cboEstados').val()
                                ,Empresa:$('#cboEmpresas').val()
                        },
                        success: function (response){
                                    $("#chartContent").html("").html('<canvas id="areaChart" style="height:250px"></canvas>');
                                    //- AREA CHART -
                                    //--------------
                                    // Get context with jQuery - using jQuery's .get() method.
                                    var areaChartCanvas = $("#areaChart").get(0).getContext("2d");
                                    // This will get the first returned node in the jQuery collection.
                                    var areaChart = new Chart(areaChartCanvas);
                                    var areaChartData = $.parseJSON(response);
                                    var areaChartOptions = {
                                          //Boolean - If we should show the scale at all
                                          showScale: true,
                                          //Boolean - Whether grid lines are shown across the chart
                                          scaleShowGridLines: false,
                                          //String - Colour of the grid lines
                                          scaleGridLineColor: "rgba(0,0,0,.05)",
                                          //Number - Width of the grid lines
                                          scaleGridLineWidth: 1,
                                          //Boolean - Whether to show horizontal lines (except X axis)
                                          scaleShowHorizontalLines: true,
                                          //Boolean - Whether to show vertical lines (except Y axis)
                                          scaleShowVerticalLines: true,
                                          //Boolean - Whether the line is curved between points
                                          bezierCurve: true,
                                          //Number - Tension of the bezier curve between points
                                          bezierCurveTension: 0.3,
                                          //Boolean - Whether to show a dot for each point
                                          pointDot: false,
                                          //Number - Radius of each point dot in pixels
                                          pointDotRadius: 4,
                                          //Number - Pixel width of point dot stroke
                                          pointDotStrokeWidth: 1,
                                          //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
                                          pointHitDetectionRadius: 20,
                                          //Boolean - Whether to show a stroke for datasets
                                          datasetStroke: true,
                                          //Number - Pixel width of dataset stroke
                                          datasetStrokeWidth: 2,
                                          //Boolean - Whether to fill the dataset with a color
                                          datasetFill: true,
                                          //String - A legend template
                                          legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].lineColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
                                          //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
                                          maintainAspectRatio: true,
                                          //Boolean - whether to make the chart responsive to window resizing
                                          responsive: true
                                        };
                                    //Create the line chart
                                    areaChart.Line(areaChartData, areaChartOptions);
                                    
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