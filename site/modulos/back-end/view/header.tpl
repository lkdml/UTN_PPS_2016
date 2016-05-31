<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" /> 
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

      
      <!-- Botonera top -->
        <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="/operador.php?modulo=dashboard">Dashboard <span class="sr-only">(current)</span></a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Tickets <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="/operador.php?modulo=tickets">Ver Tickets</a></li>
                <li><a href="/operador.php?modulo=ticket">Nuevo Ticket</a></li>
              </ul>
            </li>
            {if $Permisos->verificarPermiso(array("usuarios_ver","usuarios_crear","empresas_ver"))}
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Usuarios <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                  <li>{if $Permisos->verificarPermiso("usuarios_ver")}<a href="/operador.php?modulo=usuarios">Ver Usuarios</a></li>{/if}
                  <li>{if $Permisos->verificarPermiso("usuarios_crear")}<a href="/operador.php?modulo=usuario">Nuevo Usuario</a></li>{/if}
                  <li class="divider"></li>
                  <li>{if $Permisos->verificarPermiso("empresas_ver")}<a href="/operador.php?modulo=empresas">Empresas</a></li>{/if}
                </ul>
              </li>
            {/if}
            {if $Permisos->verificarPermiso(array("anuncios_crear","anuncios_listar","categorias_ver"))}
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Anuncios <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li>{if $Permisos->verificarPermiso("anuncios_crear")}<a href="/operador.php?modulo=anuncio">Nuevo Anuncio</a></li>{/if}
                <li>{if $Permisos->verificarPermiso("anuncios_listar")}<a href="/operador.php?modulo=anuncios">Ver Anuncios</a></li>{/if}
                <li class="divider"></li>
                <li>{if $Permisos->verificarPermiso("categorias_ver")}<a href="/operador.php?modulo=categorias">Categorias</a></li>{/if}
              </ul>
            </li>
            {/if}
            <li ><a href="/operador.php?modulo=informes">Informes </a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Administración <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="/operador.php?modulo=configuracionGeneral">Configuración General </a></li>
                <li><a href="/operador.php?modulo=plantillas">Plantillas Mails </a></li>
                <li class="divider"></li>
                <li><a href="/operador.php?modulo=departamentos">Departamentos </a></li>
                <li><a href="/operador.php?modulo=estados">Estados </a></li>
                <li><a href="/operador.php?modulo=prioridades">Prioridades </a></li>
                <li><a href="/operador.php?modulo=tipoTickets">Tipo de Ticket </a></li>
                <li class="divider"></li>
                <li><a href="/operador.php?modulo=operadores">Operadores </a></li>
                <li><a href="/operador.php?modulo=perfiles">Perfiles Operador </a></li>
                <li class="divider"></li>
                <li><a href="/operador.php?modulo=slas">SLAs </a></li>
                <li class="divider"></li>
                <li><a href="/operador.php?modulo=camposPersonalizados">Campos Personalizados </a></li>
              </ul>
            </li>
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
              <img src="{$rutaIMG}user2-160x160.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs">{if $OperadorLogueado}{$OperadorLogueado->getNombre()} {$OperadorLogueado->getApellido()}{/if}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="{$rutaIMG}user2-160x160.jpg" class="img-circle" alt="User Image">

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