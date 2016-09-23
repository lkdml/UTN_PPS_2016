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
                    <h3 class="box-title">Informe Ticket por Prioridad</h3>
    
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body">
                    <div class="chart" id="chartContent">
                        <canvas id="polarChart" style="height:400px"></canvas>
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
                        data:{    tipoInforme:'ticketPorPrioridad'
                                ,Desde:drp.startDate.format('YYYY-MM-DD 00:00:00')
                                ,Hasta:drp.endDate.format('YYYY-MM-DD 23:59:59')
                        },
                        success: function (response){
                                     $("#chartContent").html("").html('<canvas id="polarChart" style="height:250px"></canvas>');
                                   
                                    var polarChartCanvas = $("#polarChart").get(0).getContext("2d");
                                    var polarChart = new Chart(polarChartCanvas);
                                    var polarData = $.parseJSON(response);
                                    var polarOptions = {
                                      //Boolean - Show a backdrop to the scale label
                                      scaleShowLabelBackdrop : true,
                                
                                      //String - The colour of the label backdrop
                                      scaleBackdropColor : "rgba(255,255,255,0.75)",
                                      //Boolean - Whether we should show a stroke on each segment
                                      segmentShowStroke: true,
                                      //String - The colour of each segment stroke
                                      segmentStrokeColor: "#fff",
                                      //Number - The width of each segment stroke
                                      segmentStrokeWidth: 2,
                                      //Number - The percentage of the chart that we cut out of the middle
                                      percentageInnerCutout: 50, // This is 0 for Pie charts
                                      //Number - Amount of animation steps
                                      animationSteps: 100,
                                      //String - Animation easing effect
                                      animationEasing: "easeOutBounce",
                                      //Boolean - Whether we animate the rotation of the Doughnut
                                      animateRotate: true,
                                      //Boolean - Whether we animate scaling the Doughnut from the centre
                                      animateScale: false,
                                      //Boolean - whether to make the chart responsive to window resizing
                                      responsive: true,
                                      // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
                                      maintainAspectRatio: true,
                                      //String - A legend template
                                      legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>"
                                    };
                                    //Create pie or douhnut chart
                                    // You can switch between pie and douhnut using the method below.
                                    polarChart.PolarArea(polarData, polarOptions);
                                    
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