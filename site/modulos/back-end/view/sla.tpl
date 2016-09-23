{include file="header.tpl"
css='<link rel="stylesheet" href="./modulos/back-end/css/validacion.css">'
css='<link rel="stylesheet" href="./modulos/back-end/css/jquery-duration-picker.css">'
js=''
}
{include file="panelLateral.tpl"}

  <!-- =============================================== -->
<div class="content-wrapper">
 <!-- Content Header (Page header) -->
 <section class="content-header">
   <h1>
      <strong>Alta/Modificación SLA</strong>
     <small></small>
   </h1>
   <ol class="breadcrumb">
     <li><a href="/operador.php?modulo=dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
     <li class="active">Administración > SLAs > Nuevo SLA</li>
   </ol>
 </section>

 <section class="content">
    <div class="box box-info">
         <!-- form start -->
        <form action="{$rutaCSS}../controlador/slaAction.php{if $Sla}?slaId={$Sla->getSlaId()}{/if}" id = "nuevoSLAForm" class="form-horizontal" method="post">
            <div class="box-body">
                
                <!--DATOS GENERALES -->
                <div class="box">
                    <div class="box-header">
                      <h3 class="box-title">Datos Generales
                      </h3>
                    </div>
                    <div class="form-group">
                        <div class="box-body pad">
                            <label for="inputNombre" class="col-sm-1 control-label">Nombre</label>
                            <div class="col-sm-3">
                              <input type="text" class="form-control" id="inputNombre" name="nombre" required data-msg="(*)Por favor, ingrese el nombre." {if $Sla}value="{$Sla->getNombre()}"{/if}>
                            </div>
                            <label for="inputDescripcion" class="col-sm-1 control-label">Descripción</label>
                            <div class="col-sm-5">
                              <input type="text" class="form-control" id="inputDescripcion" name="descripcion" required data-msg="(*)Por favor, ingrese la descripción." {if $Sla}value="{$Sla->getDescripcion()}"{/if}>
                            </div>
                            <div class="col-sm-2 text-center">
                                <input type="checkbox" id="Activo" name="estado" 
                                {if $Sla}
                                    {if $Sla->getEstado()==1}
                                        checked
                                    {/if}
                                {/if}
                                > Activar
                                </input>
                            </div>
                        </div>
                        <!-- body pad end -->
                        
                        <div class="box-body pad">
                            
                        </div>
                        <!-- body pad end -->
                        
                    </div>   
                </div>
                <!--DATOS GENERALES -->
                
                <!--DATOS Pre-Condiciones TICKET -->
                <div class="box">
                    <div class="box-header">
                      <h3 class="box-title">Pre-Condiciones
                      </h3><br>
                      <span>(Las Pre-Condiciones son las condiciones en la cual deberá encontrarse un Ticket, para que apliquen las acciones indicadas en las post-condiciones).</span>
                    </div>
                    <div class="form-group">
                        <div class="box-body padtable-responsive">
                          <table class="table table-condensed" id="preCond">
                            <tbody >
                              <tr class="info">
                                <th class="text-center">+/-</th>
                                <th>Condición</th>
                                <th>Parámetro</th>
                                <th>Valor</th>
                              </tr>
                            </tbody>
                              <tr>
                                {if $slaValores}
                                  {foreach key=$idPreCond from=$slaValores.pre item=$slaValor}
                                    <tr id="precond-{$idPreCond}">
                                        <td class="text-center" id="{$idPreCond}">
                                      <button class="btn bg-olive btn-flat quitar-preCond" type="button">-</button>
                                        </td>
                                        <td>
                                          <select class="form-control select2 lkdml" id="pre-cond-{$idPreCond}" style="width: 100%;" id="ddDeptos" name="preCond[{$idPreCond}]" onchange="TMH.setDataFromSelect(this)">
                                            <option value = "-1">Seleccione opcioan</option>
                                            {foreach key=$keyCond from=$slaCondiciones item=$preCond}
                                              {if $preCond->getTipo() == 'pre'}
                                              {$data=null}
                                                {foreach from=$preCond->getSlaParametro() item=$parametro}
                                                  {$data[] = [$parametro->getSlaParametroId()=>['descripcion'=>$parametro->getDescripcion()]]}
                                                {/foreach}
                                                <option value="{$preCond->getSlaCondicionId()}" data-param='{$data|@json_encode}' {if $preCond->getSlaCondicionId() == $slaValor['condicionId'] } selected {/if}>{$preCond->getNombre()}</option>
                                              {/if}
                                            {/foreach}
                                          </select>
                                        </td>
                                        <td class="pre-param-{$idPreCond}">
                                          {$slaParametros.0|@var_dump}
                                          <select class="form-control select2" style="width: 100%;" id="pre-param-{$idPreCond}"  name="preParam[{$idPreCond}]" >
                                            {foreach key=$keyParam from=$slaParametros item=$preParam}
                                                <option value ='{$preParam->getSlaParametroId()}' {if $preParam->getSlaParametroId() == $slaValor['parametroId'] } selected {/if} >{$preCond->getNombre()}</option>
                                            {/foreach}
                                          </select>
                                        </td>
                                        <td class="pre-valor-{$idPreCond}">
                                          {foreach key=$keyValor from=$slaValor item=$slaValorHTML}
                                            {if $keyValor=='html'}
                                              {$slaValorHTML}
                                            {/if}
                                          {/foreach}
                                            <!-- <input type="text" class="form-control" id="pre-valor-{$idPreCond}" name ="condicionHora" required data-msg="(*)Por favor, ingrese el valor."  disabled >    -->
                                        </td>
                                    </tr>
                                  {/foreach}
                                {/if}
                                <td class="text-center">
                                  <button class="btn bg-olive btn-flat" id="nueva-preCond" type="button">+</button>
                                </td>
                              </tr>
                            
                          </table>
                        </div>
                        <!-- body pad end -->
                    </div>
                    <!-- form group end -->
                </div>
                <!-- box end -->
                <!--DATOS Pre-Condiciones TICKET -->
                
                <!--DATOS VENCIMIENTO -->
                <!-- box begin -->
                <div class="box">
                    <div class="box-header">
                      <h3 class="box-title">Vencimiento en
                      </h3><br>
                      <span>(El tiempo que transcurre sin modificaciones, desde la Pre-Condicion).</span>
                    </div>
                    <div class="form-group">
                        <div class="box-body pad">
                          <table class="table table-condensed" id="vence">
                            <tbody>
                              <tr class="info">
                                <th class="text-center">+/-</th>
                                <th>Predesesora</th>
                                <th>Condición</th>
                                <th>Tiempo (horas)</th>
                              </tr>
                              <tr>
                                {if $slaValores}
                                  {foreach key=$key from=$slaValores.vencimiento item=$vencimiento}
                                    {$vencimiento}
                                    
                                  {/foreach}
                                {/if}
                                <td class="text-center">
                                  <button class="btn bg-olive btn-flat" id="nueva-vence" type="button">+</button>
                                </td>
                              </tr>
                            </table>
                        </div>
                        <!-- body pad end -->
                    </div>
                    <!-- form group end -->
                </div>
                 <!-- box  end -->
                 <!--DATOS VENCIMIENTO -->
                
                <!--DATOS POST-Condiciones TICKET -->
                <div class="box">
                    <div class="box-header">
                      <h3 class="box-title">Post-Condiciones
                      </h3><br>
                      <span>(Las post-condiciones son los cambios que se realizarán en el ticket si se cumplen las reglas definidas en las pre-condiciones).</span>
                    </div>
                    <div class="form-group">
                        <div class="box-body padtable-responsive">
                          <table class="table table-condensed" id="postCond">
                            <tbody>
                              <tr class="info">
                                <th class="text-center">+/-</th>
                                <th>Condición</th>
                                <th>Parámetro</th>
                                <th>Valor</th>
                              </tr>
                              <tr>
                                {if $slaValores}
                                  {foreach key=$key from=$slaValores.post item=$postCond}
                                    {$postCond}
                                    
                                  {/foreach}
                                {/if}
                                <td class="text-center">
                                  <button class="btn bg-olive btn-flat" id="nueva-postCond" type="button">+</button>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                        <!-- body pad end -->
                    </div>
                    <!-- form group end -->
                </div>
                <!-- box end -->
                <!--DATOS POST-Condiciones TICKET -->
                
            <div class="box-footer col-sm-3 pull-right">
                <button onclick="window.location='/operador.php?modulo=slas';return false;" class="btn btn-danger pull-left btn-lg">Cancelar</button>
                  {if $Permisos->verificarPermiso(array("sla_crear","sla_editar"))}
                      <button type="submit" class="btn btn-info pull-right btn-lg">Enviar</button>
                  {/if}
            </div>
                
            </div>
            <!-- box body end -->
            
            <div class="modal fade" role="dialog" id="getCodeModal">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="tituloModal"></h4>
                  </div>
                  <div class="modal-body" id="getCode" >
                    
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-outline pull-right" data-dismiss="modal">Cerrar</button>
                </div>
                <!-- /.modal-content -->
              </div>
              <!-- /.modal-dialog -->
            </div>
            
            
             
          
            <!-- /.box-footer -->
        </form>
        <!-- form end -->
    </div>
    <!-- box info end-->
</div>
  <div class="wait">
              <i class="fa fa-refresh fa-spin"></i>
            </div>
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
<!-- Validaciones -->
<script src="{$rutaJS}jquery-validator-min.js"></script>

<!--PreventDefault Enter -->
<script src="{$rutaJS}noEnter.js"></script>
<script src="{$rutaJS}sla-nuevo.js"></script>

<!-- DurationPicker -->
<!-- <script src="{$rutaJS}jquery-duration-picker.js"></script> -->

<!-- {literal} <script>
   $(function () {
            $('#inputCondicionHoras').durationPicker({lang:'es'});
            $('#').durationPicker({showSeconds: true });
        });
</script>
{/literal} -->
{literal}
<script>
   $(document).ready(function() {
     $('#nuevoSLAForm').submit(function() {
      $.validator.addMethod("valueNotEquals", function(value, element, arg){
          return arg != value;
         }, "(*)Por favor, seleccione un valor.");
     
    
     
    $("#nuevoSLAForm").validate();
    $( "select2" ).each(function() {
       $(element).rules('add', {
        valueNotEquals: "-1"
        });
    });
    
});
    
   });
</script>
{/literal}


 {include file="footer.tpl"}