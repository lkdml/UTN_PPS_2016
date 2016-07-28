{include file="header.tpl"
css='<link rel="stylesheet" type="text/css" media="screen" href="./modulos/back-end/css/dashboard/smartadmin-production-plugins.min.css">'
js=''
}
{include file="panelLateral.tpl"}
  <!-- =============================================== -->


        


		<!-- MAIN PANEL -->
		<div id="main" role="main" class="content-wrapper">
        <section class="content">
            <!-- Datos de interes -->
                <div class="row">
                    <div class="col-lg-3 col-xs-6">
                      <!-- small box -->
                      <div class="small-box bg-aqua">
                        <div class="inner">
                          <h3 id="cantidadSinCerrar"></h3>
                          <p>Tickets <small>sin cerrar</small></p>
                        </div>
                        <div class="icon">
                          <i class="ion ion-bag"></i>
                        </div>
                      </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                      <!-- small box -->
                      <div class="small-box bg-green">
                        <div class="inner">
                           <h3 id="cantidadAsignados"></h3>
            
                          <p>Tus tickets<small>asignados.</small></p>
                        </div>
                        <div class="icon">
                          <i class="ion ion-stats-bars"></i>
                        </div>
                      </div>
                    </div>
                
                    <!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                      <!-- small box -->
                      <div class="small-box bg-red">
                        <div class="inner">
                          <h3 id="ticketsCerradosMesActual"></h3>
                          <p>Tus tickets<small>cerrados en el mes</small></p>
                        </div>
                        <div class="icon">
                          <i class="ion ion-pie-graph"></i>
                        </div>
                      </div>
                    </div>
                    <!-- ./col -->
                    <!-- ./col -->
                
                    <div class="col-lg-3 col-xs-6">
                      <!-- small box -->
                      <div class="small-box bg-yellow">
                        <div class="inner">
                          <h3 id="usuariosExistentes"></h3>
                          <p>Usuarios <small>Existentes</small></p>
                        </div>
                        <div class="icon">
                          <i class="ion ion-person-add"></i>
                        </div>
                      </div>
                    </div>
                </div>
                <div class="row">
                    <div id="widgetEstados">
    
                    </div>
                </div>
				<!-- widget grid -->
				{if $Permisos->verificarPermiso("informes_widgets")}
				<section id="widget-grid" class="">
                    
					<!-- row -->
					<div class="row">
					
						<!-- NEW WIDGET START -->
						<article class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
							<!-- Widget ID (each widget will need unique ID)-->
							<div class="jarviswidget" id="wid-id-1" data-widget-editbutton="false" data-widget-colorbutton="false" data-widget-deletebutton="false" data-widget-fullscreenbutton="false" data-widget-load="{$rutaCSS}../controlador/dashboard/wTicketsCerradosAnual.php" data-widget-refresh=1000>
								<header>
									<h2><strong>Informe tickets cerrados en el año actual</strong></h2>				
									
								</header>

								<!-- widget div-->
								<div>
									<!-- widget content -->
									<div class="widget-body">
									    
									</div>
									<!-- end widget content -->
								</div>
								<!-- end widget div -->
								
							</div>
							<!-- end widget -->

                            <!-- Widget ID (each widget will need unique ID)-->
							<div class="jarviswidget" id="wid-id-2" data-widget-editbutton="false" data-widget-colorbutton="false" data-widget-deletebutton="false" data-widget-fullscreenbutton="false" data-widget-load="{$rutaCSS}../controlador/dashboard/wTipoTicketMes.php" data-widget-refresh=1000>
								<header>
									<h2><strong>Informe tipo de ticket en el mes</strong></h2>				
								</header>

								<!-- widget div-->
								<div>
									<!-- widget content -->
									<div class="widget-body">
									    
									</div>
									<!-- end widget content -->
								</div>
								<!-- end widget div -->
							</div>
							<!-- end widget -->
						</article>
						<!-- WIDGET END -->	
                         
						

						<!-- NEW WIDGET START -->
						<article class="col-xs-12 col-sm-6 col-md-6 col-lg-6">

							<!-- Widget ID (each widget will need unique ID)-->
							<div class="jarviswidget" id="wid-id-3" data-widget-editbutton="false" data-widget-colorbutton="false" data-widget-deletebutton="false" data-widget-fullscreenbutton="false" data-widget-load="{$rutaCSS}../controlador/dashboard/wTicketEstadoMes.php" data-widget-refresh=1000>
								<header>
									<h2><strong>Informe estado de tickets por mes</strong></h2>				
								</header>

								<!-- widget div-->
								<div>
									<!-- widget content -->
									<div class="widget-body">
									    
									</div>
									<!-- end widget content -->
								</div>
								<!-- end widget div -->
								
							</div>
							<!-- end widget -->
							
							<!-- Widget ID (each widget will need unique ID)-->
							<div class="jarviswidget" id="wid-id-4" data-widget-editbutton="false" data-widget-colorbutton="false" data-widget-deletebutton="false" data-widget-fullscreenbutton="false" data-widget-load="{$rutaCSS}../controlador/dashboard/wTicketPrioridadMes.php" data-widget-refresh=1000>
								<header>
									<h2><strong>Informe tickets por prioridad en el mes</strong></h2>				
								</header>

								<!-- widget div-->
								<div>
									<!-- widget content -->
									<div class="widget-body">
									   
									</div>
									<!-- end widget content -->
								</div>
								<!-- end widget div -->
								
							</div>
							<!-- end widget -->

							
						</article>
						<!-- WIDGET END -->

						
					</div>

					<!-- end row -->

				</section>
				<!-- end widget grid -->
				{/if}

			</div>
			<!-- END MAIN CONTENT -->

		</div>
		<!-- END MAIN PANEL -->
        </section>
	

		<!--================================================== -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
		<!-- jQuery 2.2.0 -->
        
       	<!-- AdminLTE App -->
        <script src="{$rutaJS}app.min.js"></script>
        <!-- jQuery UI -->
		<script src="{$rutaJS}/dashboard/jquery-ui-1.10.3.min.js"></script>
		
		<!-- IMPORTANT: APP CONFIG -->
		<script src="{$rutaJS}/dashboard/app.config.js"></script>

		<!-- JS TOUCH : include this plugin for mobile drag / drop touch events-->
		<script src="{$rutaJS}/dashboard/jquery.ui.touch-punch.min.js"></script> 

		<!-- BOOTSTRAP JS -->
		<script src="{$rutaJS}bootstrap.min.js"></script>
	
		<!-- ChartJS 1.0.1 -->
        <script src="{$rutaJS}Chart.min.js"></script>
        
		<!-- JARVIS WIDGETS -->
		<script src="{$rutaJS}/dashboard/jarvis.widget.min.js"></script>

		<!-- JQUERY UI + Bootstrap Slider -->
		<script src="{$rutaJS}/dashboard/bootstrap-slider.min.js"></script>

		<!-- browser msie issue fix -->
		<script src="{$rutaJS}/dashboard/jquery.mb.browser.min.js"></script>

        <!-- FastClick -->
        <script src="{$rutaJS}fastclick.js"></script>

		<!--[if IE 8]>

		<h1>Your browser is out of date, please update your browser by going to www.microsoft.com/download</h1>

		<![endif]-->

		<!-- MAIN APP JS FILE -->
		<script src="{$rutaJS}/dashboard/app.min.js"></script>
 		

        <!-- WIDGET DATA -->
        <script src="{$rutaJS}ticketsSinCerrar.js"></script>
        <script src="{$rutaJS}ticketsAsignados.js"></script>
        <script src="{$rutaJS}cantidadUsuariosExistentes.js"></script>
        <script src="{$rutaJS}ticketsCerradosMesActual.js"></script>
        <script src="{$rutaJS}tmh-error.js"></script>
        
        
		{literal}
        <script>
        $( document ).ready(function() {
             $.ajax({
                  url:'operador.php?modulo=widgets',
                  type:'GET',
                  datatype:'JSON',
                  data:{datosAjax:'widgetEstados'},
                  success: function (response){
                              var array = jQuery.parseJSON( response );
                              var encabezado;
                              if ((array.length % 2) == 1){
                                encabezado = '<div class="col-md-4 col-sm-8 col-xs-12">';
                              } else {
                                encabezado ='<div class="col-md-3 col-sm-6 col-xs-9">';
                              }
                          
                              for(var i=0;i<array.length;i++)
                              {
                              
                                 $('#widgetEstados').append(encabezado+'\
                                    <a class="w-estados" href="/operador.php?modulo=tickets&Asignados=1&Estados='+array[i].id+'"  >\
                                    <div class="info-box">\
                                      <span class="info-box-icon bg-acua" style=background-color:'+array[i].color+';color:white><i class="glyphicon '+array[i].icono+'"></i></span>\
                                      <div class="info-box-content">\
                                        <span class="info-box-text">'+array[i].nombre+'</span>\
                                        <span class="info-box-number" >'+array[i].cantidad+'</span>\
                                      </div>\
                                    </div>\
                                    </a>\
                                  </div>'); 
        
                              }
                    
                          }
                });
        });
        
    	$(document).ready(function() {
    			pageSetUp();
    		});
        </script>
        {/literal}





{include file='footer.tpl'}