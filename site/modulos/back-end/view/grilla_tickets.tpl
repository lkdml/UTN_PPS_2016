{include file="header.tpl"
css='<link rel="stylesheet" href="./modulos/back-end/css/dataTables.bootstrap.css">
<link rel="stylesheet" type="text/css" href="./modulos/back-end/css/jquery.dataTables.css">'
js='' 
}
{include file="panelLateral.tpl"}
  <!-- =============================================== -->

 

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
        <!-- Content Header (Page header) -->
        <section class="content-header">
      <h1>
        Tickets
        <small>Departamento: Soporte N1</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Tickets</a></li>
        <li class="active">Lista Tickets</li>
      </ol>
    </section>
   <!-- /Content Header (Page header) -->  
   
   <!-- CONTENIDO -->
    <section class="content">
      <!-- 1 box Largo --> 
      <div class="box box-primary">
        <div class="box-body">
              <a class="btn btn-app ">
                <i class="fa fa-plus"></i> Nuevo
              </a>
              <a class="btn btn-app ">
                <i class="fa fa-edit"></i> Ver
              </a>
              <a class="btn btn-app disabled">
                <i class="fa fa-chain"></i> Unir
              </a>
              <a class="btn btn-app disabled">
                <i class="fa fa-unlink"></i> Separar
              </a>
              <a class="btn btn-app disabled">
                <i class="fa fa-trash"></i> Borrar
              </a>
        </div><!-- /.box-body -->
      </div>
      <!-- /1 box --> 

      
    <table id="grilla" class="display">
        <thead>
            <tr>
                <th><input type="checkbox"></input></th>
                <th><small class="label glyphicon glyphicon-flag bg-navy"> </small></th>
                <th>#</th>
                <th>Asunto</th>
                <th>Estado</th>
                <th>Usuario</th>
                <th>Asignado</th>
                <th>Departamento</th>
                <th>SLA</th>
                <th>Vencimiento</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><input type="checkbox"></input></td>
                <td><small class="label glyphicon glyphicon-flag bg-blue"> </small></td>
                <td>TKP-234</td>
                <td>Error al imprimir</td>
                <td><small class="label bg-olive">Abierto</small></td>
                <td>Vtolosa <br>vtolosa@nestle.com.ar<br> <Small>Victor Tolosa</Small></td>
                <td>Br1ann <br> <Small>Brian Ducca</Small><br><small>Brian.ducca@gmail.com</small></td>
                <td>Soporte N1</td>
                <td>Por Defecto</td>
                <td>18:35 hs</td>
            </tr>
            <tr>
                <td><input type="checkbox"></input></td>
                <td><small class="label glyphicon glyphicon-flag bg-blue"> </small></td>
                <td>TKP-234</td>
                <td>Error al imprimir</td>
                <td><small class="label bg-olive">Abierto</small></td>
                <td>Vtolosa <br>vtolosa@nestle.com.ar<br> <Small>Victor Tolosa</Small></td>
                <td>Br1ann <br> <Small>Brian Ducca</Small><br><small>Brian.ducca@gmail.com</small></td>
                <td>Soporte N1</td>
                <td>Por Defecto</td>
                <td>18:35 hs</td>
            </tr>
            <tr>
                <td><input type="checkbox"></input></td>
                <td><small class="label glyphicon glyphicon-flag bg-blue"> </small></td>
                <td>TKP-234</td>
                <td>Error al imprimir</td>
                <td><small class="label bg-olive">Abierto</small></td>
                <td>Vtolosa <br>vtolosa@nestle.com.ar<br> <Small>Victor Tolosa</Small></td>
                <td>Br1ann <br> <Small>Brian Ducca</Small><br><small>Brian.ducca@gmail.com</small></td>
                <td>Soporte N1</td>
                <td>Por Defecto</td>
                <td>18:35 hs</td>
            </tr>
            <tr>
                <td><input type="checkbox"></input></td>
                <td><small class="label glyphicon glyphicon-flag bg-yellow"> </small></td>
                <td>TKP-234</td>
                <td>Error al imprimir</td>
                <td><small class="label bg-red">En Curso</small></td>
                <td>Vtolosa <br>vtolosa@nestle.com.ar<br> <Small>Victor Tolosa</Small></td>
                <td>Br1ann <br> <Small>Brian Ducca</Small><br><small>Brian.ducca@gmail.com</small></td>
                <td>Soporte N1</td>
                <td>Por Defecto</td>
                <td>18:35 hs</td>
            </tr>
            <tr>
                <td><input type="checkbox"></input></td>
                <td><small class="label glyphicon glyphicon-flag bg-orange"> </small></td>
                <td>TKP-234</td>
                <td>Error al imprimir</td>
                <td><small class="label bg-blue">Respondido</small></td>
                <td>Vtolosa <br>vtolosa@nestle.com.ar<br> <Small>Victor Tolosa</Small></td>
                <td>Br1ann <br> <Small>Brian Ducca</Small><br><small>Brian.ducca@gmail.com</small></td>
                <td>Soporte N1</td>
                <td>Por Defecto</td>
                <td>18:35 hs</td>
            </tr>
        </tbody>
    </table>

 
    </section>
    <!-- /.content -->
    
  </div>
 
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.0 -->
<script type="text/javascript" charset="utf8" src="{$rutaJS}jQuery-2.2.0.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script type="text/javascript" charset="utf8" src="{$rutaJS}bootstrap.min.js"></script>
<!-- SlimScroll -->
<script type="text/javascript" charset="utf8" src="{$rutaJS}jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script type="text/javascript" charset="utf8" src="{$rutaJS}fastclick.js"></script>
<!-- AdminLTE App -->
<script type="text/javascript" charset="utf8" src="{$rutaJS}app.min.js"></script>

<!-- DataTables -->

<script type="text/javascript" charset="utf8" src="{$rutaJS}jquery.dataTables.js"></script>
{literal}

<script>
$(document).ready( function () {
    $('#grilla').DataTable({
  "columnDefs": [
    { "width": "5px", "targets": 0 },
    { "width": "5px", "targets": 1 },
    { "width": "7px", "targets": 2 },
    { "width": "7px", "targets": 4 }
  ]
});
} );
</script>
{/literal}

<!-- AdminLTE for demo purposes -->
<script src="{$rutaJS}demo.js"></script>

{include file='footer.tpl'}