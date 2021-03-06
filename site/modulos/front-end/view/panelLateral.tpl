 <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{$RutaAvatars}{if $UsuarioLogueado->getFotoHash()}{$UsuarioLogueado->getFotoHash()}{else}UserDefault.jpg{/if}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{if $UsuarioLogueado}{$UsuarioLogueado->getNombre()}<br><small>{$UsuarioLogueado->getApellido()}</small>{/if}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <br>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">Navegación</li>
        <li class="treeview">
          <a href="/index.php?modulo=home">
            <i class="fa fa-dashboard"></i> <span>Home</span>
          </a>
        </li>
        <li class="../forms/general.html">
          <a href="/index.php?modulo=vistaTicket&accion=nuevo">
            <i class="fa fa-edit"></i> <span>Nuevo Ticket</span>
          </a>
        </li>
        <li>
          <a href="/index.php?modulo=misTickets">
            <i class="fa fa-th"></i> <span>Mis Tickets</span>
          </a>
        </li>
        <li class="treeview">
          <a href="/index.php?modulo=login&logOut=1">
            <i class="fa fa-share"></i> <span>Salir</span>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- =============================================== -->