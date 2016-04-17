{include file="header_login.tpl"
css=''
js=''
}
  <!-- =============================================== -->

 

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

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
      
      <div class="row">
        <div class="col-md-12">
        <!--<div class="">-->
          <ul class="timeline">
              <!-- timeline time label -->
              <a ></a>

              
              <li class="time-label">
                  <span class="bg-red">
                      10 Feb. 2016
                  </span>
              </li>
              
              <!-- /.timeline-label -->
          
              <!-- timeline item -->
              <li>
                  <!-- timeline icon -->
                  <i class="fa fa-envelope bg-blue"></i>
                  <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>
          
                      <h3 class="timeline-header"><a href="#">Support Team</a> ...</h3>
          
                      <div class="timeline-body">
                          Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
                          Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
                          when an unknown printer took a galley of type and scrambled it to make a type 
                          specimen book. It has survived not only five centuries, but also the leap into 
                          electronic typesetting, remaining essentially unchanged. It was popularised in the 
                          1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more 
                          recently with desktop publishing software like Aldus PageMaker including versions 
                          of Lorem Ipsum.
                      </div>
          
                      <div class="timeline-footer">
                          <a class="btn btn-primary btn-xs">...</a>
                      </div>
                  </div>
              </li>
              <!-- END timeline item -->
              <li>
                  <!-- timeline icon -->
                  <i class="fa fa-envelope bg-blue"></i>
                  <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>
          
                      <h3 class="timeline-header"><a href="#">Support Team</a> ...</h3>
          
                      <div class="timeline-body">
                          It is a long established fact that a reader will be distracted 
                          by the readable content of a page when looking at its layout. 
                          The point of using Lorem Ipsum is that it has a more-or-less normal 
                          distribution of letters, as opposed to using 'Content here, content 
                          here', making it look like readable English. Many desktop publishing 
                          packages and web page editors now use Lorem Ipsum as their default 
                          model text, and a search for 'lorem ipsum' will uncover many web sites 
                          still in their infancy. Various versions have evolved over the years, 
                          sometimes by accident, sometimes on purpose (injected humour and the like).
                      </div>
          
                      <div class="timeline-footer">
                          <a class="btn btn-primary btn-xs">...</a>
                      </div>
                  </div>
              </li>
              <li>
                  <!-- timeline icon -->
                  <i class="fa fa-envelope bg-blue"></i>
                  <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>
          
                      <h3 class="timeline-header"><a href="#">Support Team</a> ...</h3>
          
                      <div class="timeline-body">
                          Contrary to popular belief, Lorem Ipsum is not simply random text. 
                          It has roots in a piece of classical Latin literature from 45 BC, 
                          making it over 2000 years old. Richard McClintock, a Latin professor 
                          at Hampden-Sydney College in Virginia, looked up one of the more obscure 
                          Latin words, consectetur, from a Lorem Ipsum passage, and going through 
                          the cites of the word in classical literature, discovered the undoubtable 
                          source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of 
                          "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) 
                          by Cicero, written in 45 BC. This book is a treatise on the theory of ethics,
                          very popular during the Renaissance. The first line of Lorem Ipsum, 
                          "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.
                      </div>
          
                      <div class="timeline-footer">
                          <a class="btn btn-primary btn-xs">...</a>
                      </div>
                  </div>
              </li>
              <li class="time-label">
                  <span class="bg-red">
                      2 Feb. 2016
                  </span>
              </li>
              <!-- /.timeline-label -->
          
              <!-- timeline item -->
              <li>
                  <!-- timeline icon -->
                  <i class="fa fa-envelope bg-blue"></i>
                  <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>
          
                      <h3 class="timeline-header"><a href="#">Support Team</a> ...</h3>
          
                      <div class="timeline-body">
                          Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
                          Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
                          when an unknown printer took a galley of type and scrambled it to make a type 
                          specimen book. It has survived not only five centuries, but also the leap into 
                          electronic typesetting, remaining essentially unchanged. It was popularised in the 
                          1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more 
                          recently with desktop publishing software like Aldus PageMaker including versions 
                          of Lorem Ipsum.
                      </div>
          
                      <div class="timeline-footer">
                          <a class="btn btn-primary btn-xs">...</a>
                      </div>
                  </div>
              </li>
          
          </ul>
          <!-- /.box -->
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