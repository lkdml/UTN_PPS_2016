 <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{$rutaIMG}user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Mariano López Senés</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <br>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="treeview"><a href="/operador.php?modulo=dashboard"><i class="fa fa-dashboard"></i> <span>Dash-Board</span></a></li>
        <li class="header">Informes - Total de:</li>
        <li class="treeview"><a href="/operador.php?modulo=informeUsuariosPorEmpresa"><i class="fa fa-file-text-o"></i> <span>Usuarios por Empresas</span></a></li>
        <li class="treeview"><a href="/operador.php?modulo=informeTicketPorEmpresa"><i class="fa fa-file-text-o"></i> <span>Tickets por Empresa</span></a></li>
        <li class="treeview"><a href="/operador.php?modulo=informeTicketPorEstadoEmpresa"><i class="fa fa-file-text-o"></i> <span>Ticket por Estados/Empresas</span></a></li>

        <li class="treeview"><a href="/operador.php?modulo=informeTicketDepartamento"><i class="fa fa-file-text-o"></i> <span>Ticket en departamentos</span></a></li>
        <li class="treeview"><a href="/operador.php?modulo=informeTicketPorEstado"><i class="fa fa-file-text-o"></i> <span>Tickets según estados</span></a></li>
        <li class="treeview"><a href="/operador.php?modulo=informeTicketPorPrioridades"><i class="fa fa-file-text-o"></i> <span>Tickets según prioridades</span></a></li>
        <li class="treeview"><a href="/operador.php?modulo=informeTiempoRespuestaPromedio"><i class="fa fa-file-text-o"></i> <span>Tiempo de respuesta promedios</span></a></li>
        <li class="treeview"><a href="/operador.php?modulo=informeTiempoResolucionPromedio"><i class="fa fa-file-text-o"></i> <span>Tiempo de resolución promedio</span></a></li>
      </ul>
      
 <!--         Informar sin restricciones:
        Cantidad de:
            Usuarios total por Empresas.
            Tickets por empresa.
            Tickets por estados y Empresa.
    Informar con resticciones: (de visibilidad)
        Cantidades de:
            Tickets atendidos por Departamento. (En período de tiempo | Asignados a Operadores determinados | Departamentos determinados)
            Tickets según estados. (En período de tiempo | asignados a Operadores determinados | Departamentos determinados)
            Tickets según Prioridades. (En período de tiempo | Departamentos determinados)
            Tiempos de respuesta promedios. (En período de tiempo | de Operadores determinados | Departamentos determinados)
            Tiempos de resolución promedios. (En período de tiempo | de Operadores determinados | Departamentos determinados)
     --> 
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
        <a href="/operador.php?modulo=nuevoTicket">
          <i class="fa fa-edit"></i> <span>Nuevo Ticket</span>
        </a>
      </li>
      <li class="treeview">
        <a href="/operador.php">
          <i class="fa fa-share"></i> <span>Salir</span>
        </a>
      </li>
    </ul>
    
    <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- =============================================== -->