{include file="header.tpl"
css='<link rel="stylesheet" type="text/css" href="./modulos/back-end/css/daterangepicker-bs3.css">'
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
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Filtros</h3>
                </div>
                <form method="get" class="form-horizontal">
                    <div class="box-body">
                        <div class="form-group">
                            <div class="col-md-6">
                                <label>Desde-Hasta:</label>
                                <div class="input-group">
                                  <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                  </div>
                                  <input type="text" class="form-control" id="desdehasta">
                                   
                                </div>
                                <!-- /.input group -->
                                 
                            </div>
                            <!-- /.form group -->
                            <div class="col-md-6">
                            <br>
                             <button class="btn btn-info pull-right">Procesar</button>  
                            </div>
                        </div>
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
                    <h3 class="box-title">Informe Tickets por Empresa</h3>
    
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <div class="chart">
                        <canvas id="barChart" style="height:400px"></canvas>
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

<!-- DATOS DE LOS CHART -->
<script src="{$rutaJS}w-primera-respuesta.js"></script>
<script src="{$rutaJS}moment.min.js"></script>
<script src="{$rutaJS}daterangepicker.js"></script>

{literal}
<script>
  $(function () {

    //Date range picker
    $('#desdehasta').daterangepicker();

  });
</script>
{/literal}


 {include file="footer.tpl"}