<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="shortcut icon" href="{$rutaIMG}monkeyIco.ico">
  <title>TMH | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="{$rutaCSS}/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{$rutaCSS}AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="{$rutaCSS}blue.css">
        {$css|default:''}
        {$js|default:''}

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <img src="{$rutaIMG}tipografia-loginoperador.png" alt="Logo"> 
   <!-- <a href="index.php?module=home"><b>T.M.H.</b></a>-->
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Ingrese sus credeciales para comenzar</p>
    {if $error}<span class="help-block">{$error}</span>{/if}
    <form action="{$rutaCSS}../controlador/loginAction.php" method="post">
      <div class="form-group has-feedback">
        <input  class="form-control" placeholder="Nombre de operador" name="operador">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" name="clave">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Ingresar</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <a href="/operador.php?modulo=olvidePassword">Olvide mi clave</a><br>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->


<!-- jQuery 2.2.0 -->
<script src="{$rutaJS}jQuery-2.2.0.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="{$rutaJS}bootstrap.min.js"></script>
<!-- iCheck -->
<script src="{$rutaJS}icheck.min.js"></script>

{literal}
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
{/literal}
</body>
</html>


