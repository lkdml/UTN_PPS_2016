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
        Operadores
        <small>Altas - Modificaciones - Bajas</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/operador.php?modulo=dashboard"><i class="fa fa-dashboard"></i> Administración</a></li>
        <li class="active">Lista Operadores</li>
      </ol>
    </section>
   <!-- /Content Header (Page header) -->  
   
   <!-- CONTENIDO -->
    <section class="content">
      <!-- 1 box Largo --> 
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Acciones:</h3>
          <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div><!-- /.box-tools -->
        </div><!-- /.box-header -->
        <div class="box-body">
              <a class="btn btn-app ">
                <i class="fa fa-plus"></i> Nuevo
              </a>
              <a class="btn btn-app disabled">
                <i class="fa fa-edit"></i> Editar
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
                <th>Usuario</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Correo</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><input type="checkbox"></input></td>
                <td>Br1ann</td>
                <td>Brian</td>
                <td>Ducca</td>
                <td>Brian.ducca@gmail.com</td>
            </tr>
            <tr>
                <td><input type="checkbox"></input></td>
                <td>lbockor</td>
                <td>Lucas Daniel</td>
                <td>Bockor</td>
                <td>Lbockor@gmail.com</td>
            </tr>
            <tr>
                <td><input type="checkbox"></input></td>
                <td>lkdml</td>
                <td>Mariano</td>
                <td>López Senés</td>
                <td>marianolopezsenes@gmail.com</td>
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
    { "width": "5px", "targets": 0 }
  ]
});
} );
</script>
{/literal}

<!-- AdminLTE for demo purposes -->
<script src="{$rutaJS}demo.js"></script>

{include file='footer.tpl'}