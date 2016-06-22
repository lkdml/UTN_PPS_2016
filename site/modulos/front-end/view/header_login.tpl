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

  <link rel="stylesheet" href="{$rutaCSS}loginNavBar.css">
  
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
        {$css|default:''}
        {$js|default:''}
</head>
{literal}
<style>
  .main-header > .navbar {
    margin-left: 0px;
  }
  .navbar-default .navbar-nav > li > a:hover, .navbar-default .navbar-nav > li > a:focus
  ,.navbar-default .navbar-header .navbar-toggle:hover
  ,.navbar-default .navbar-header .navbar-toggle:active
  ,.navbar-default .navbar-header .navbar-toggle:focus{
    background: rgba(0, 0, 0, 0.1);
    color: #f6f6f6;
}

</style>
{/literal}
<!-- ADD THE CLASS layout-boxed TO GET A BOXED LAYOUT -->
<body class="hold-transition skin-green-light sidebar-collapse ">

<header class="main-header">
  <nav class="navbar navbar-default navbar-inverse " role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <!-- logo for regular state and mobile devices -->
       <img src="{$rutaIMG}tipografia.png" alt="Logo">
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li {if $error}class="dropdown open" {else} class="dropdown"{/if}class="dropdown" >
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" {if $error}aria-expanded="true"{/if}><i class="glyphicon glyphicon-log-in"></i> Ingresar<span class="caret"></span></a>
    			<ul id="login-dp" class="dropdown-menu">
    				<li>
    					 <div class="row">
    							<div class="col-md-12">
    								 <form class="form" role="form" method="post" action="{$rutaCSS}../controlador/loginAction.php" id="login-nav">
    										Ingrese sus datos
    										<div class="form-group">
    										  <div class="input-group">
                          	<span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                            <!--EMAIL ADDRESS-->
                            <input id="emailInput" name="email" placeholder="Ingrese su email" class="form-control" type="email">
                          </div>
												</div>
    										<div class="form-group">
    										    <div class="input-group">
                            	<span class="input-group-addon"><i class="glyphicon glyphicon-lock color-blue"></i></span>
                              <!--PASSWORD--> 
                            	<input id="passwordInput" name="clave" placeholder="Ingrese su contraseña" class="form-control" type="password">
                            </div>
                           <div class="help-block text-right"><a href="/index.php?modulo=perfil">Olvidé mi contraseña</a></div>
    										</div>
    										{if $error}<div class="help-block-error"><span class="glyphicon glyphicon-remove"></span>{$error}</div>{/if}
    										<div class="form-group">
    											 <button type="submit" class="btn btn-primary btn-block">Ingresar</button>
    										</div>
    								 </form>
    							</div>
    					 </div>
    				</li>
    			</ul>
        </li>
        <li><a href="#" data-toggle="control-sidebar">Registrarse</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
</header>

