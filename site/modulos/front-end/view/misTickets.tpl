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
        Mis Tickets <small>Lista de todos los tickets creados</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Mis Tickets</li><small>Listado de todos los tickets</small>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-3">
          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Estados</h3>
              <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="box-body no-padding">
              <ul class="nav nav-pills nav-stacked" id="Estados">
                <li class="active">
                  <a href="/index.php?modulo=misTickets">
                  <i class="glyphicon glyphicon-inbox"></i> Todos
                  <span class="label label-primary pull-right">1</span></a>
                </li> 
                {foreach from=$Estados item=$estado}
                  <li>
                    <a href="/index.php?modulo=misTickets&Estados={$estado->getEstadoId()}">
                      <i class="glyphicon {$estado->getIcono()}"></i> {$estado->getNombre()}
                    <span class="label label-primary pull-right" id="Estado-{$estado->getEstadoId()}">1</span></a>
                  </li>
                {/foreach}
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Departamentos</h3>
              <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="box-body no-padding">
              <ul class="nav nav-pills nav-stacked">
                {foreach from=$Departamentos item=$departamento}
                  <li>
                    <a href="/index.php?modulo=misTickets&Departamentos={$departamento->getDepartamentoId()}">
                      <i class="fa fa-circle-o"></i> {$departamento->getNombre()}
                    <span class="label label-primary pull-right" id="Estado-{$departamento->getDepartamentoId()}">1</span></a>
                  </li>
                {/foreach}
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /. box -->
          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Prioridades</h3>
              <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="box-body no-padding">
              <ul class="nav nav-pills nav-stacked">
                {foreach from=$TicketTipos item=$tTipo}
                  <li>
                    <a href="/index.php?modulo=misTickets&tipoTicket={$tTipo->getTipoTicketId()}">
                      <i class="glyphicon {$tTipo->getIcono()}"></i> {$tTipo->getNombre()}
                    <span class="label label-primary pull-right" id="Estado-{$tTipo->getTipoTicketId()}">1</span></a>
                  </li>
                {/foreach}
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Bandeja</h3>
            </div>
            
           
            <!-- /.box-header -->
            {if $Tickets}
              <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                  <tr>
                    <th>ID</th>
                    <th>Estado</th>
                    <th>Ult. Act.</th>
                    <th>Departamento</th>
                    <th>Reason</th>
                  </tr>
                  {foreach from=$Tickets item=$ticket} 
                  <tr>
                    <td><a href="/index.php?modulo=vistaTicket&ticket={$ticket->getTicketId()}&accion=ver">{$ticket->getNumeroTicket()}</a></td>
                    <td><small class="label " style='color:white; background-color:{$ticket->getEstado()->getColor()}'>{$ticket->getEstado()->getNombre()}</small></td>
                    <td>{$ticket->getUltimaActividad()|date_format:"%D, %H:%M"}</td>
                    <td>{$ticket->getDepartamento()->getNombre()}</td>
                    <td>{$ticket->getAsunto()}</td>
                  </tr>
                  {/foreach}
                </table>
              </div>
            {/if}
          </div>
          <!-- /. box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <!-- jQuery 2.2.0 -->
<script src="{$rutaJS}jQuery-2.2.0.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="{$rutaJS}bootstrap.min.js"></script>
<!-- FastClick -->
<script src="{$rutaJS}fastclick.js"></script>
<!-- AdminLTE App -->
<script src="{$rutaJS}app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{$rutaJS}demo.js"></script>
  
  
   {include file="footer.tpl"}