<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="shortcut icon" href="{$rutaIMG}monkeyIco.ico">
  <title>TMH | Olvidé contraseña</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="{$rutaCSS}bootstrap.min.css">
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
  <div class="panel-body">
    <div class="text-center">
      <h3><i class="fa fa-lock fa-4x"></i></h3>
      <h2 class="text-center">Olvidaste tu Contraseña?</h2>
      <p>No hay problema, nosotros te ayudaremos!.</p>
        <div class="panel-body">
          
          <form class="form" action="{$rutaCSS}../controlador/olvidePasswordAction.php" method="post">
            <fieldset>
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                  
                  <input id="emailInput" name="email" placeholder="Ingresa tu Email" class="form-control" type="email">
                </div>
              </div>
              <div class="form-group">
                <input class="btn btn-lg btn-primary btn-block" value="Enviame la contraseña" type="submit">
              </div>
            </fieldset>
          </form>
          
        </div>
    </div>
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


