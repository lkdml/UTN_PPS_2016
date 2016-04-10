$(document).ready(function(){
   $.ajax({
        url:'datosAjax.php',
        type:'GET',
        datatype:'JSON',
        data:{datosAjax:'ticket_totales'},
        success: function (response){
            $("#totales").empty();
            $("#cerrados").empty();
            var jsonResponse = $.parseJSON(response);
            var texto1 = "Hay ";
            var texto2 = jsonResponse.cerrados ;
            var texto3 = " solicitudes cerradas.";
            var texto4 = "En este momento estamos trabajando en " + jsonResponse.pendientes + " solicitudes.";
            //console.log(texto + texto2);
            $('#texto_hay').text(texto1);
            $('#texto_cerradas').text(texto2);
            $('#texto_solicitudes').text(texto3);
            $('#texto_pendientes').text(texto4);
            
        }
    });   
});