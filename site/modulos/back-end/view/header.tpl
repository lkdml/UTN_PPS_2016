<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="shortcut icon" href="{$rutaIMG}monkeyIco.ico">
  <title>T.M.H.</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="{$rutaCSS}/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{$rutaCSS}AdminLTE.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{$rutaCSS}_all-skins.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
        {$css|default:''}
        {$js|default:''}
</head>
<!-- ADD THE CLASS layout-boxed TO GET A BOXED LAYOUT -->
<body class="skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="/operador.php?modulo=dashboard" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini">TMH</span>
      <!-- logo for regular state and mobile devices -->
      <img src="{$rutaIMG}iconologo.png" alt="Logo"> 
      <!--<img src="{$rutaIMG}tipografia.png" alt="Logo">-->
    
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
      </button>
      
      <!-- Botonera top -->
        <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="/operador.php?modulo=dashboard">Dashboard <span class="sr-only">(current)</span></a></li>
            
             {if $Permisos->verificarPermiso(array("Ticket_crear","Ticket_listar"))}
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Tickets <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li>{if $Permisos->verificarPermiso("Ticket_listar")}<a href="/operador.php?modulo=tickets">Ver Tickets</a></li>{/if}
                <li>{if $Permisos->verificarPermiso("Ticket_crear")}<a href="/operador.php?modulo=ticket">Nuevo Ticket</a></li>{/if}
              </ul>
            </li>
              {/if}
            
            {if $Permisos->verificarPermiso(array("usuarios_listar","usuarios_crear","empresas_listar"))}
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Usuarios <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                  <li>{if $Permisos->verificarPermiso("usuarios_listar")}<a href="/operador.php?modulo=usuarios">Ver Usuarios</a></li>{/if}
                  <li>{if $Permisos->verificarPermiso("usuarios_crear")}<a href="/operador.php?modulo=usuario">Nuevo Usuario</a></li>{/if}
                  <li class="divider"></li>
                  <li>{if $Permisos->verificarPermiso("empresas_listar")}<a href="/operador.php?modulo=empresas">Empresas</a></li>{/if}
                </ul>
              </li>
            {/if}
            
            {if $Permisos->verificarPermiso(array("anuncios_crear","anuncios_listar","categorias_listar"))}
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Anuncios <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li>{if $Permisos->verificarPermiso("anuncios_crear")}<a href="/operador.php?modulo=anuncio">Nuevo Anuncio</a></li>{/if}
                <li>{if $Permisos->verificarPermiso("anuncios_listar")}<a href="/operador.php?modulo=anuncios">Ver Anuncios</a></li>{/if}
                <li class="divider"></li>
                <li>{if $Permisos->verificarPermiso("categorias_listar")}<a href="/operador.php?modulo=categorias">Categorias</a></li>{/if}
              </ul>
            </li>
            {/if}
            
          
            <li>{if $Permisos->verificarPermiso("informes_operadores")}<a href="/operador.php?modulo=informes">Informes </a></li>{/if}
            
           {if $Permisos->verificarPermiso(array("general_parametros","general_plantillas","departamentos_listar","estados_listar","prioridades_listar","tipoTicket_listar","operadores_listar","perfiles_listar","sla_listar"))}
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Administración <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li>{if $Permisos->verificarPermiso("general_parametros")}<a href="/operador.php?modulo=configuracionGeneral">Configuración General </a></li>{/if}
                <li>{if $Permisos->verificarPermiso("general_plantillas")}<a href="/operador.php?modulo=plantillas">Plantillas Mails </a></li>{/if}
                <li class="divider"></li>
                <li>{if $Permisos->verificarPermiso("departamentos_listar")}<a href="/operador.php?modulo=departamentos">Departamentos </a></li>{/if}
                <li>{if $Permisos->verificarPermiso("estados_listar")}<a href="/operador.php?modulo=estados">Estados </a></li>{/if}
                <li>{if $Permisos->verificarPermiso("prioridades_listar")}<a href="/operador.php?modulo=prioridades">Prioridades </a></li>{/if}
                <li>{if $Permisos->verificarPermiso("tipoTicket_listar")}<a href="/operador.php?modulo=tipoTickets">Tipo de Ticket </a></li>{/if}
                <li class="divider"></li>
                <li>{if $Permisos->verificarPermiso("operadores_listar")}<a href="/operador.php?modulo=operadores">Operadores </a></li>{/if}
                <li>{if $Permisos->verificarPermiso("perfiles_listar")}<a href="/operador.php?modulo=perfiles">Perfiles Operador </a></li>{/if}
                <li class="divider"></li>
                <li>{if $Permisos->verificarPermiso("sla_listar")}<a href="/operador.php?modulo=slas">SLAs </a></li>{/if}
               <!-- <li class="divider"></li>-->
                <!--<li><a href="/operador.php?modulo=camposPersonalizados">Campos Personalizados </a></li>-->
                <!--Comentado por Lucas: Ocultamos funcionalidad Campos personalizados-->
              </ul>
            </li>
            {/if}
            
          </ul>
        </div>
      <!--Fin Botonera top -->  
        
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Notifications: style can be found in dropdown.less -->
          <!--<li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">10</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">Tienes 10 notificaciones</li>
              <li>
                
                <ul class="menu">
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i> 2 Respuestas
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">Ver</a></li>
            </ul>
          </li> -->
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="{$rutaIMG}avatars/{if $OperadorLogueado->getHashFoto()}{$OperadorLogueado->getHashFoto()}{else}UserDefault.jpg{/if}" class="user-image" alt="User Image">
              <span class="hidden-xs">{if $OperadorLogueado}{$OperadorLogueado->getNombre()} {$OperadorLogueado->getApellido()}{/if}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="{$rutaIMG}avatars/{if $OperadorLogueado->getHashFoto()}{$OperadorLogueado->getHashFoto()}{else}UserDefault.jpg{/if}" class="img-circle" alt="User Image">

                <p>
                  {if $OperadorLogueado}{$OperadorLogueado->getNombreUsuario()} - {$OperadorLogueado->getEmail()}{/if}
                  <small>{if $OperadorLogueado}{$OperadorLogueado->getNombre()} {$OperadorLogueado->getApellido()}{/if}</small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="/operador.php?modulo=perfilOperador" class="btn btn-default btn-flat">Configuración</a>
                </div>
                <div class="pull-right">
                  <a href="/operador.php?modulo=login&logOut=1" class="btn btn-default btn-flat">Salir</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>