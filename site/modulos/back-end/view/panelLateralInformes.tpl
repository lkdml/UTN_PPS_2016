 <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{$RutaAvatars}{if $OperadorLogueado->getHashFoto()}{$OperadorLogueado->getHashFoto()}{else}UserDefault.jpg{/if}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{if $OperadorLogueado}{$OperadorLogueado->getNombre()}<br><small>{$OperadorLogueado->getApellido()}</small>{/if}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <br>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="treeview"><a href="/operador.php?modulo=dashboard"><i class="fa fa-dashboard"></i> <span>Dash-Board</span></a></li>
        <li class="header">Informes - Total de:</li>
        <li class="treeview"><a href="/operador.php?modulo=informeUsuariosPorEmpresa"><i class="fa fa-pie-chart"></i> <span>Usuarios por Empresas</span></a></li>
        <li class="treeview"><a href="/operador.php?modulo=informeTicketPorEmpresa"><i class="fa fa-pie-chart"></i> <span>Tickets por Empresa</span></a></li>
        <li class="treeview"><a href="/operador.php?modulo=informeTicketPorEstadoEmpresa"><i class="fa fa-area-chart"></i> <span>Ticket por Estados/Empresas</span></a></li>

        <li class="treeview"><a href="/operador.php?modulo=informeTicketDepartamento"><i class="fa fa-bar-chart"></i> <span>Ticket en departamentos</span></a></li>
        <li class="treeview"><a href="/operador.php?modulo=informeTicketPorPrioridades"><i class="fa fa-pie-chart"></i> <span>Tickets según prioridades</span></a></li>
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

     --> 
      <ul class="sidebar-menu">
      <li class="header">Tickets</li>
      <li class="treeview">
        <a href="#"><i class="fa fa-th" ></i><span>Tickets</span> <small class="label pull-right bg-blue" id="totalticketOperador"></small></a>
        <ul class="treeview-menu" id="dinamicTicketMenuOperador">
        </ul>
      </li>
      <li class="treeview">
        <a href="#"><i class="fa fa-th" ></i><span>Departamentos</span> <small class="label pull-right bg-blue" id="totalDeptosTickets"></small></a>
        <ul class="treeview-menu" id="dinamicDeptos">
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
  
    
  <!-- jQuery 2.2.0 -->
<script src="{$rutaJS}jQuery-2.2.0.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<!--<script src="{$rutaJS}bootstrap.min.js"></script>-->
  {literal}
<script>

function obtenerTicketsOperador() {
     $('#dinamicTicketMenuOperador').empty();
     $.ajax({
          url:'operador.php?modulo=widgets',
          type:'GET',
          datatype:'JSON',
          data:{datosAjax:'lateralTickets'},
          success: function (response){
                      var array = jQuery.parseJSON( response );
                      var total=0;
                      for(var i=0;i<array.length;i++)
                      {
                      
                         $('#dinamicTicketMenuOperador').append('<li><a href="/operador.php?modulo=tickets&Estados='+array[i].id+'">'+array[i].nombre+'<small class="label pull-right" style=background-color:'+array[i].color+'>'+array[i].cantidad+'</small></a></li>'); 
                        total=total+array[i].cantidad;
                      }
                      $('#totalticketOperador').html(total);
            
                  }
        })};

function obtenerLateralDepartamentos() {
     $('#dinamicDeptos').empty();
     $.ajax({
          url:'operador.php?modulo=widgets',
          type:'GET',
          datatype:'JSON',
          data:{datosAjax:'lateralDepartamentos'},
          success: function (response){
                      var array = jQuery.parseJSON( response );
                      var totalGeneral=0;
                      var totalDepto=0;
               
                      for(var i=0;i<array.length;i++)
                      {
                        //INICIO DEL TREE DE DEPTO
                         $('#dinamicDeptos').append('<li class="treeview">\
                                                    <a href="#"><i class="fa fa-th" ></i><span>'+array[i].nombre+'</span>\
                                                    <small class="label pull-right bg-blue" id="'+array[i].id+'"></small></a>\
                                                    <ul class="treeview-menu" id="'+(array[i].nombre).replace(" ", "_")+array[i].id+'">'); 
                        
                        //INICIO DE TICKETS DEL DEPTO
                        for(var j=0;j<array[i].dataTickets.length;j++)
                        {
                          $('#'+(array[i].nombre).replace(" ", "_")+array[i].id+'').append('<li><a href="/operador.php?modulo=tickets&Deptos='+array[i].id+'&Estados='+array[i].dataTickets[j].id+'">'+array[i].dataTickets[j].nombre+'<small class="label pull-right" style=background-color:'+array[i].dataTickets[j].color+'>'+array[i].dataTickets[j].cantidad+'</small></li></a>');

                          totalDepto=totalDepto+array[i].dataTickets[j].cantidad;
                        }
                        //FIN DE TICKETS DEL DEPTO
                        
                        //PONGO EL SUBTOTAL DEL DEPTO
                        $('#'+array[i].id+'').html(totalDepto);
                        
                        totalGeneral=totalGeneral+totalDepto;
                        
                        //RESETEO EL SUBTOTAL DE DEPTO
                        totalDepto=0;
                        
                        //APPEND DEL FIN DEL TREE DE DEPTO
                         $('#dinamicDeptos').append('</ul></li>');
                         
                        
                      }
                      $('#totalDeptosTickets').html(totalGeneral);
        
                  }
        })};

$( document ).ready(function() {
  obtenerTicketsOperador();
  obtenerLateralDepartamentos();
 });

setInterval(function() {
  obtenerTicketsOperador();
  obtenerLateralDepartamentos();
},120000);

</script>
{/literal}