 <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{$rutaIMG}avatars/{if $OperadorLogueado->getHashFoto()}{$OperadorLogueado->getHashFoto()}{else}UserDefault.jpg{/if}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{if $OperadorLogueado}{$OperadorLogueado->getNombre()} {$OperadorLogueado->getApellido()}{/if}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <br>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="treeview">
          <a href="/operador.php?modulo=dashboard">
            <i class="fa fa-dashboard"></i> <span>Dash-Board</span>
          </a>
        </li>
      </ul>
      
         <!-- Sidebar Menu -->
    <ul class="sidebar-menu">
      <li class="header">Tickets</li>
      <li class="treeview">
        <a href="#"><i class="fa fa-th" ></i><span>Tickets</span> <small class="label pull-right bg-blue">20</small></a>
        <ul class="treeview-menu">
          <li><a href="/operador.php?modulo=tickets&estado=1">Abiertos<small class="label pull-right bg-green">5</small></li></a>
          <li><a href="/operador.php?modulo=tickets&estado=2">En Curso<small class="label pull-right bg-red">8</small></li></a>
          <li><a href="/operador.php?modulo=tickets&estado=3">Respondidos<small class="label pull-right bg-yellow">7</small></li></a>
          <li><a href="/operador.php?modulo=tickets&estado=4">Cerrados<small class="label pull-right bg-black">15</small></li></a>
        </ul>
      </li>
      <li class="treeview">
        <a href="#"><i class="fa fa-th" ></i><span>Departamentos</span> <small class="label pull-right bg-blue">20</small></a>
        <ul class="treeview-menu">
          <li class="treeview">
            <a href="#"><i class="fa fa-th" ></i><span>Soporte N1</span> <small class="label pull-right bg-blue">10</small></a>
            <ul class="treeview-menu">
              <li><a href="/operador.php?modulo=tickets&departamento=1&estado=1">Abiertos<small class="label pull-right bg-green">2</small></li></a>
              <li><a href="/operador.php?modulo=tickets&departamento=1&estado=2">En Curso<small class="label pull-right bg-red">5</small></li></a>
              <li><a href="/operador.php?modulo=tickets&departamento=1&estado=3">Respondidos<small class="label pull-right bg-yellow">3</small></li></a>
              <li><a href="/operador.php?modulo=tickets&departamento=1&estado=4">Cerrados<small class="label pull-right bg-black">9</small></li></a>
            </ul>
          </li>
          <li class="treeview">
            <a href="#"><i class="fa fa-th" ></i><span>Soporte N2</span> <small class="label pull-right bg-blue">10</small></a>
            <ul class="treeview-menu">
              <li><a href="/operador.php?modulo=tickets&departamento=2&estado=1">Abiertos<small class="label pull-right bg-green">1</small></li></a>
              <li><a href="/operador.php?modulo=tickets&departamento=2&estado=2">En Curso<small class="label pull-right bg-red">8</small></li></a>
              <li><a href="/operador.php?modulo=tickets&departamento=2&estado=3">Respondidos<small class="label pull-right bg-yellow">1</small></li></a>
              <li><a href="/operador.php?modulo=tickets&departamento=2&estado=4">Cerrados<small class="label pull-right bg-black">6</small></li></a>
            </ul>
          </li>
        </ul>
      </li>
    </ul>
  
    <ul class="sidebar-menu">
      <li class="header">General</li>
      <li class="../forms/general.html">
        <a href="/operador.php?modulo=ticket">
          <i class="fa fa-edit"></i> <span>Nuevo Ticket</span>
        </a>
      </li>
      <li class="treeview">
        <a href="/operador.php?modulo=login&logOut=1">
          <i class="fa fa-share"></i> <span>Salir</span>
        </a>
      </li>
    </ul>
    
    <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- =============================================== -->