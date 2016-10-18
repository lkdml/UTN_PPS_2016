var countIdPre = 0;
var countIdVencimiento = 0 ;
var countIdPost = 0;
$(document).ready(function(){
    countIdPre = $('#preCond tr').length -2;
    countIdVencimiento = $('#vencimientoCond tr').length -2;
    countIdPost = $('#postCond tr').length -2;
    
    $("#nueva-preCond").click(function(){
        var tipo = 'pre';
        TMH.traerCondiciones(countIdPre,tipo);
    });
          
    $("#nueva-vencimientoCond").click(function(){
        var tipo = 'vencimiento';
        TMH.traerCondiciones(countIdVencimiento,tipo);
    });
          
    $("#nueva-postCond").click(function(){
        var tipo = 'post';
        TMH.traerCondiciones(countIdPost,tipo);
    });

});
// Quitar renglones 
    $(function() {
        $(".quitar-pre").click(function(){
             $(this).closest('tr').remove();
        });
    });
    $(function() {
        $(".quitar-post").click(function(){
             $(this).closest('tr').remove();
        });
    });
    $(function() {
        $(".quitar-vencimiento").click(function(){
             $(this).closest('tr').remove();
        });
    });
    
    
//fin quitar renglones.

TMH = {
    // Manejo de modal para cara de contenido
    loadingModal: function(type = "show", titulo = "Mensaje", msg = "", btnClose= false) {
            if(type == "show")
            {
                $("#getCodeModal").addClass('modal-info');
                $("#getCode").html(msg);
                $("#tituloModal").html(titulo); 
                if (btnClose == false){
                    $('.modal-footer').remove();
                }
                $("#getCodeModal").modal('show');
            }
            else
               $("#getCodeModal").modal('hide');
        },
    // funcion para procesar info en combo condiciones

    traerCondiciones: function (iteracionId,tipo){
            $.ajax({
                url:'operador.php?modulo=sla',
                type:'POST',
                dataType : 'html',
                data:   {datosAjax:true,
                        datos:'condiciones',
                        iteracion:iteracionId,
                        tipo:tipo},
            beforeSend : function () {
                TMH.loadingModal('show','Cargando información','Aguarde unos instantes');
            },
            success: function (response){
                $('#'+tipo+'Cond tr:last-child').eq(-1).before(response);
                //configuro el evento click del boton.
                $('#'+tipo+'Cond').on( "click", ".quitar-"+tipo , function( event ) {
                     $(this).closest('tr').remove();
                  });
                  
                //configuro el onchange de las condiciones.
                $("#"+tipo+"-"+iteracionId).on('change', function(e) {
                    TMH.traerRestantes($('#condicion-'+tipo+'-'+iteracionId));
                }); 
                TMH.incrementarIdDelTipo(tipo);
               TMH.loadingModal('hide');
            },
            error: function(msg){
                TMH.loadingModal('hide');
               $("#getCodeModal").addClass('modal-warning');
               $("#getCode").html(msg);
               $("#tituloModal").html("Ups! Hubo un error");
               }  
            });
    },
    traerRestantes: function (elemento){
            var iteracionId = TMH.obtenerNroIdDesdeElemento(elemento);
            var tipo = TMH.obtenerTipoDesdeElemento(elemento);
            var condicionId = TMH.obtenerCondicionId($('#condicion-'+tipo+'-'+iteracionId));
            $.ajax({
                url:'operador.php?modulo=sla',
                type:'POST',
                dataType : 'html',
                data:   {datosAjax:true,
                        datos:'valoresCondiciones',
                        iteracion:iteracionId,
                        tipo:tipo,
                        condicionId:condicionId },
            beforeSend : function () {
                TMH.loadingModal('show','Cargando información','Aguarde unos instantes');
            },
            success: function (response){
                var cantidadTR = $('#nueva-'+tipo+'Cond tr').length;
                //reemplazo renglon
                $('#'+tipo+'-'+iteracionId).replaceWith(response);
                
                //configuro el evento click del boton.
                $('#'+tipo+'Cond').on( "click", ".quitar-"+tipo , function( event ) {
                    $(this).closest('tr').remove();
                });
                
                TMH.incrementarIdDelTipo(tipo);
                TMH.loadingModal('hide');
            },
            error: function(msg){
                TMH.loadingModal('hide');
               $("#getCodeModal").addClass('modal-warning');
               $("#getCode").html(msg);
               $("#tituloModal").html("Ups! Hubo un error");
               }  
            });
    },
     obtenerNroIdDesdeElemento: function (elemento){
         var suffix = $(elemento).attr('id').match(/\d+/);
            return suffix[0];
    },
    obtenerTipoDesdeElemento: function (elemento){
        var start_pos = $(elemento).attr('id').indexOf('-') + 1;
        var end_pos = $(elemento).attr('id').indexOf('-',start_pos);
        var tipo = $(elemento).attr('id').substring(start_pos,end_pos)
        return tipo;
    },
    obtenerCondicionId: function (elemento) {
        var valor = $(elemento).val();
            return valor;
    },
    incrementarIdDelTipo: function(tipo){
        switch (tipo) {
            case 'pre':
                countIdPre ++;
                break;
            case 'vencimiento':
                countIdVencimiento ++;
                break;
            case 'post':
                countIdPost ++;
                break;
            
            default:
                // code
        }
    }
}


