    var datosTMH;
$(document).ready(function(){
    //variables para la carga global de datos
    $.ajax({
        url:'operador.php?modulo=sla',
        type:'GET',
        datatype:'JSON',
        data:{datosAjax:'datosTMH'},
        success: function (response){
            datosTMH = $.parseJSON(response);
        }
    });
    
    //Inicio -->Eventos de precondiciones
    var IdPreCond = 0;
    var preCondCount = $('#nueva-preCond tr').length;
    $("#nueva-preCond").click(function(){
        var preCond = '' +
'                        <tr id="precond-'+IdPreCond+'">' +
'                            <td class="text-center" id="'+IdPreCond+'">' +
'                          <button class="btn bg-olive btn-flat quitar-preCond" type="button">-</button>' +
'                            </td>' +
'                            <td>' +
'                              <select class="form-control select2" id="pre-cond-'+IdPreCond+'" style="width: 100%;" id="ddDeptos" name="preCond['+IdPreCond+']" >' +
'                                <option value = "-1">Seleccione opcion</option>' +
                                    TMH.cargarComboCondicion("pre",datosTMH.condiciones) +
'                              </select>' +
'                            </td>' +
'                            <td class="pre-param-'+IdPreCond+'">' +
'                              <select class="form-control select2" style="width: 100%;" id="pre-param-'+IdPreCond+'"  name="preParam['+IdPreCond+']" disabled>' +
'                                <option value = "-1">Seleccione opcion</option>' +
'                              </select>' +
'                            </td>' +
'                            <td class="pre-valor-'+IdPreCond+'">' +
'                                <input type="text" class="form-control" id="pre-valor-'+IdPreCond+'" name ="condicionHora" required data-msg="(*)Por favor, ingrese el valor."  disabled >      '+
'                            </td>' +
'                       </tr>';
                          
        // coloco el renglon, antes del boton +.
        $('#preCond tr:last-child').eq(preCondCount-1).before(preCond); 
        // le seteo el handler de click a los botones nuevos.
        $('#preCond').on( "click", ".quitar-preCond" , function( event ) {
            
             $(this).closest('tr').remove();
          });
        $("#pre-cond-"+IdPreCond).on('change', function() {
            var renglonId = $(this).closest('tr').attr('id').substring(8); 
            var condicionID = $(this).val();
            $('#pre-param-'+$(this).attr('id').substring(9)).prop("disabled",false);
            $("#pre-cond-"+renglonId+" option[value='-1']").remove();
            $('#pre-param-'+$(this).attr('id').substring(9)).append(TMH.cargarComboParametro('pre-param-'+$(this).attr('id').substring(9),"pre",datosTMH.condiciones,condicionID));
            TMH.traerElementoHTML(condicionID,'td.pre-valor-', $(this).attr('id').substring(9),'pre-valor-');
            // cambio el attributo name del campo valor
            $('#pre-valor-'+renglonId).attr("name","pre-valor["+renglonId+"]");
        });
        IdPreCond ++;
    });
    //FIN --> Eventos de precondiciones
    //Inicio --> Eventos de vencimientos
    var IdVence = 0;
    var venceCount = $('#nueva-preCond tr').length;
    $("#nueva-vence").click(function(){
        var vence = '' +
'                        <tr id="precond-'+IdVence+'">' +
'                            <td class="text-center" id="'+IdVence+'">' +
'                          <button class="btn bg-olive btn-flat quitar-vence" type="button">-</button>' +
'                            </td>' +
'                            <td >' +
'                              <select class="form-control select2" id="vence-cond-'+IdVence+'" style="width: 100%;" id="ddDeptos" name="venceCond['+IdVence+']" >' +
'                                <option value = "-1">Seleccione opcion</option>' +
                                    TMH.cargarComboCondicion("vencimiento",datosTMH.condiciones) +
'                              </select>' +
'                            </td>' +
'                            <td class="vence-param-'+IdVence+'">' +
'                              <select class="form-control select2" style="width: 100%;" id="vence-param-'+IdVence+'"  name="venceParam['+IdVence+']" disabled>' +
'                                <option value = "-1">Seleccione una condicion</option>' +
'                              </select>' +
'                            </td>' +
'                            <td class="vence-valor-'+IdVence+'">' +
'                                <input type="text" class="form-control" id="vence-valor-'+IdVence+'" name ="condicionHora" required data-msg="(*)Por favor, ingrese el valor." disabled >      '+
'                            </td>' +
'                       </tr>';
                          
        // coloco el renglon, antes del boton +.
        $('#vence tr:last-child').eq(venceCount-1).before(vence);
        // le seteo el handler de click a los botones nuevos.
        $('#vence').on( "click", ".quitar-vence" , function( event ) {
             $(this).closest('tr').remove();
          });
        $("#vence-cond-"+IdVence).on('change', function() {
            var renglonId = $(this).closest('tr').attr('id').substring(8); 
            var condicionID = $(this).val();
            $('#vence-param-'+$(this).attr('id').substring(11)).prop("disabled",false);
            $("#vence-cond-"+renglonId+" option[value='-1']").remove();
            $('#vence-param-'+$(this).attr('id').substring(11)).append(TMH.cargarComboParametro('vence-param-'+$(this).attr('id').substring(11),"vencimiento",datosTMH.condiciones,condicionID));
            TMH.traerElementoHTML(condicionID,'td.vence-valor-', $(this).attr('id').substring(11),'vence-valor-');
            // cambio el attributo name del campo valor
            $('#vence-valor-'+renglonId).attr("name","vence-valor["+renglonId+"]");
        });
        IdVence ++;
    });
    //FIN --> Eventos de vencimientos
    //Inicio --> Eventos de postcondiciones
    var IdPostCond = 0;
    var postCondCount = $('#nueva-preCond tr').length;
    $("#nueva-postCond").click(function(){
        var postCond = '' +
'                        <tr id="precond-'+IdPostCond+'">' +
'                            <td class="text-center" id="'+IdPostCond+'">' +
'                          <button class="btn bg-olive btn-flat quitar-vence" type="button">-</button>' +
'                            </td>' +
'                            <td>' +
'                              <select class="form-control select2" id="post-cond-'+IdPostCond+'" style="width: 100%;" id="ddDeptos" name="postCond['+IdPostCond+']" >' +
'                                <option value = "-1">Seleccione opcion</option>' +
                                    TMH.cargarComboCondicion("post",datosTMH.condiciones) +
'                              </select>' +
'                            </td>' +
'                            <td class="post-param-'+IdPostCond+'">' +
'                              <select class="form-control select2" style="width: 100%;" id="post-param-'+IdPostCond+'"  name="postParam['+IdPostCond+']" disabled>' +
'                                <option value = "-1">Seleccione pre-Condicion</option>' +
'                              </select>' +
'                            </td>' +
'                            <td class="post-valor-'+IdPostCond+'">' +
'                                <input type="text" class="form-control" id="post-valor-'+IdPostCond+'" name ="condicionHora"  required data-msg="(*)Por favor, ingrese el valor." disabled >      '+
'                            </td>' +
'                       </tr>';
                          

        // coloco el renglon, antes del boton +.
        $('#postCond tr:last-child').eq(postCondCount-1).before(postCond);
        // le seteo el handler de click a los botones nuevos.
        $('#postCond').on( "click", ".quitar-postCond" , function( event ) {
             $(this).closest('tr').remove();
          });
        $("#post-cond-"+IdPostCond).on('change', function() {
            var renglonId = $(this).closest('tr').attr('id').substring(8); 
            var condicionID = $(this).val();
            $('#post-param-'+$(this).attr('id').substring(10)).prop("disabled",false);
            $("#post-cond-"+renglonId+" option[value='-1']").remove();
            $('#post-param-'+$(this).attr('id').substring(10)).append(TMH.cargarComboParametro('post-param-'+$(this).attr('id').substring(10),"post",datosTMH.condiciones,condicionID));
            TMH.traerElementoHTML(condicionID,'td.post-valor-', $(this).attr('id').substring(10),'post-valor-');
            
        }); 
        IdPostCond ++;
    });
    //FIN --> Eventos de postcondiciones



});
// Quitar renglones 
    $(function() {
        $(".quitar-preCond").click(function(){
             $(this).closest('tr').remove();
        });
    });
    $(function() {
        $(".quitar-postCond").click(function(){
             $(this).closest('tr').remove();
        });
    });
    $(function() {
        $(".quitar-vence").click(function(){
             $(this).closest('tr').remove();
        });
    });
    
//fin quitar renglones.

TMH = {
    // funcion para procesar info en combo condiciones
    cargarComboCondicion: function(tipo,datosAjax){
        var opciones = '';
        var i = 0;
       // console.log(datosAjax);
        $.each(datosAjax, function(key, indice) {
           // console.log(indice);
            $.each(indice, function (clave,valor){
                if(tipo == valor.tipo) {
                    opciones += '                                <option value = "' + clave +'" data-param="'+ valor.slaParametro +'">'+valor.nombre+'</option>';
                    i++;
                } 
            });
        });
        return opciones;
    },
    
    // funcion para armado de combo Parametro
     cargarComboParametro: function(conboSeleccionado,tipo,datosAjax,condicionID){
        var opciones = '';
        var i = 0;
        $('#'+conboSeleccionado).find('option').remove()
       // console.log(datosAjax);
        $.each(datosAjax, function(key, indice) {
           //console.log(indice);
            $.each(indice, function (clave,valor){
                if(clave == condicionID) {
                    $.each(valor.slaParametro, function(claveArrayParametro,valorArrayParametro){
                        $.each(valorArrayParametro, function(claveParametro,valorParametro){
                            opciones += '                                <option value = "' + claveParametro +'">'+valorParametro.descripcion+'</option>';
                            i++;
                        });
                    }); 
                } 
            });
        });
        return opciones;
    },
    
    // funcion para armado de tipo de dato a ingresar  
    cargarElementoValor: function(tipo,datosAjax,condicionID){
        var opciones = '';
        var i = 0;
       // console.log(datosAjax);
        $.each(datosAjax, function(key, indice) {
           // console.log(indice);
            $.each(indice, function (clave,valor){
                if(tipo == valor.tipo) {
                    opciones += '                                <option value = "' + clave +'" data-param="'+ valor.slaParametro +'">'+valor.nombre+'</option>';
                    i++;
                } 
            });
        });
        return opciones;
    },
    traerElementoHTML: function (condicionID,elementoHTML,idElementoHtml,classElementoHTML){
            $.ajax({
                url:'operador.php?modulo=sla',
                type:'POST',
                dataType : 'html',
                data:{condicion:condicionID},
                beforeSend: function(){
                 $("#wait").show();
                },
                complete: function(){
                 $("#wait").hide();
                 // cambio el attributo name del campo valor
                $('#'+classElementoHTML+idElementoHtml).attr("name",classElementoHTML+"["+idElementoHtml+"][]");
                },
                success: function (response){
                    respuesta = '<td class="'+classElementoHTML+idElementoHtml+'">' +
    '                           '+[response.slice(0, response.indexOf(" ")), ' id="'+classElementoHTML+idElementoHtml+'"', response.slice(response.indexOf(" "))].join('') +
    '                           </td>';
                    $(elementoHTML+idElementoHtml).replaceWith(respuesta);
                }
            });
    },
    // funcion para actualizar combos según condicion.
        actualizarElementosSegunCondicion: function(renglonId,condicionID,tipo,datosAjax){
        var opciones = '';
        var i = 0;
       // console.log(datosAjax);
        $.each(datosAjax, function(key, indice) {
           // console.log(indice);
            $.each(indice, function (clave,valor){
                if(tipo == valor.tipo) {
                    opciones += '                                <option value = "' + clave +'" data-param="'+ valor.slaParametro +'">'+valor.nombre+'</option>';
                    i++;
                } 
            });
        });
        return opciones;
    }
}

