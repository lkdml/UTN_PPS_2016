{include file="header_login.tpl" error=$error
css=''
js=''
}
  <!-- =============================================== -->


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper ">

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Noticias
        <small>Ultimas novedades de T.H.M.</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Principal</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      
      <div class="row t">
        <div class="col-md-12">
        <!--<div class="">-->
        
        <ul class="timeline">
             {foreach from=$Anuncios item=$Anuncio}
              <!-- timeline time label -->
              <a ></a>

              {if strtotime($minFecha|date_format:"%d-%m-%Y")>strtotime($Anuncio->getFechaCreacion()|date_format:"%d-%m-%Y")}
              <li class="time-label">
                  <span class="bg-green">
                      {$minFecha=$Anuncio->getFechaCreacion()}
                      {$Anuncio->getFechaCreacion()|date_format:"%d/%m/%Y"}
                  </span>
              </li>
              {/if}
              <!-- /.timeline-label -->
          
              <!-- timeline item -->
              <li>
                  <!-- timeline icon -->
                  <i class="glyphicon {$Anuncio->getCategoria()->getIcono()}"></i>
                  <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i>{$Anuncio->getFechaCreacion()|date_format:"%H:%M"}</span>
                      <h3 class="timeline-header"><a href="#"></a>{$Anuncio->getTitulo()}</h3>
          
                      <div class="timeline-body">
                          {$Anuncio->getContenido()}
                      </div>
                  </div>
              </li>
              <!-- END timeline item -->
            {/foreach}  
          </ul>
        </div>
   
       
    </section>
    <!-- /.content -->
    
  </div>
<!-- The Right Sidebar -->
<aside class="control-sidebar control-sidebar-light">


    <div class="register-box-body">
      <i><h3>Bienvenido a TMH</span><br></h3> <br></i>
    <p class="login-box-msg"> Por favor, ingrese los siguientes datos para registrarse:</p>

    <form action="{$rutaCSS}../controlador/registroAction.php" method="post">
      <div class="form-group has-feedback">
        <input class="form-control" name="Nombre" placeholder="Nombre" type="text">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input class="form-control" name="Apellido" placeholder="Apellido" type="text">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input class="form-control" name="Email" placeholder="Email" type="email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input class="form-control" name="Clave1" placeholder="Clave" type="password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input class="form-control" name="Clave2" placeholder="Re-Ingrese la clave" type="password">
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label class="">
              Acepto los <a href="#">terminos y condiciones.</a>
            </label>
          </div>
        </div>
      </div>

          <button type="submit" class="btn btn-primary btn-block btn-flat">Registrar</button>
    </div>
  </form>
</aside>
<!-- The sidebar's background -->
<!-- This div must placed right after the sidebar for it to work-->
<div class="control-sidebar-bg"></div>


<!-- ./wrapper -->

<!-- jQuery 2.2.0 -->
<script src="{$rutaJS}jQuery-2.2.0.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="{$rutaJS}bootstrap.min.js"></script>
<!-- SlimScroll
<script src="{$rutaJS}jquery.slimscroll.min.js"></script> -->
<!-- FastClick -->
<script src="{$rutaJS}fastclick.js"></script>
<!-- AdminLTE App -->
<script src="{$rutaJS}app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{$rutaJS}demo.js"></script>

{include file='footer.tpl'}