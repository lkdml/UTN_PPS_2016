{include file="header.tpl"
css=''
js=''
}
{include file="panelLateral.tpl"}


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
        <li><a href="#"><i class="fa fa-dashboard"></i>Home</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
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
          
          <!-- /.box -->
        </div>
        
        
       
    </section>
    <!-- /.content -->
    
  </div>
 
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.0 -->
<script src="{$rutaJS}jQuery-2.2.0.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="{$rutaJS}bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="{$rutaJS}jquery.slimscroll.js"></script>
<!-- FastClick -->
<script src="{$rutaJS}fastclick.js"></script>
<!-- AdminLTE App -->
<script src="{$rutaJS}app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{$rutaJS}demo.js"></script>


{include file='footer.tpl'}