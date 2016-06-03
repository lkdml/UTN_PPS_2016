ticketsPendientesOperadorActual();
function ticketsPendientesOperadorActual(){
   $.ajax({
        url:'operador.php?modulo=widgets',
        type:'GET',
        datatype:'JSON',
        data:{datosAjax:'w-ticketsAbiertosOperadorActual'},
        success: function (response){
                    var datos=response;
                    $("#ticketsOperadorAbiertos").html(datos);
                        }
                    });
}


setInterval(function() {
  ticketsPendientesOperadorActual();  
},120000);