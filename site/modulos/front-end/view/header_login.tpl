<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
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
<body class="hold-transition skin-green-light sidebar-collapse ">
<!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="/index.php?modulo=home" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini">TMH</span>
      <!-- logo for regular state and mobile devices -->
       <img src="{$rutaIMG}tipografia.png" alt="Logo">
       <!--<img src="{$rutaIMG}iconologo.png" alt="Logo">-->
      <!-- <span class="logo-lg">Sistema<b>T.H.M.</b></span>-->
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->


      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu">
            
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <button type="button" class="btn btn-block btn-primary btn-xs">Ingresar</button>
            </a>
            <ul class="dropdown-menu">
              <li class="header">Ingrese sus dados:</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li>
                    <input class="form-control input-sm" id="exampleInputEmail1" placeholder="Email" type="email">
                    <input class="form-control input-sm" id="exampleInputPassword1" placeholder="Clave" type="password">            
                  </li>
                </ul>
              </li>
              <form action="{$rutaCSS}../controlador/loginAction.php" method="post">
                <button type="submit" class="btn btn-block btn-primary btn-sm">Ingresar</button>
              </form>
            </ul>
          </li>
                    <li class="dropdown notifications-menu">
            
            <a href="#" class="dropdown-toggle" >
              <button type="button" class="btn btn-block btn-primary btn-xs" data-toggle="control-sidebar">Registrarse</button>
            </a>

            
          </li>
          <li>
          </li>
        </ul>
      </div>
    </nav>
  </header>