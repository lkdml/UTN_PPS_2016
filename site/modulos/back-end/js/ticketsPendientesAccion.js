calcularCantidadTicketsPendientesAccion();
function calcularCantidadTicketsPendientesAccion(){
   $.ajax({
        url:'operador.php?modulo=widgets',
        type:'GET',
        datatype:'JSON',
        data:{datosAjax:'w-ticketsPendientesAccion'},
        success: function (response){
                    var datos=response;
                    $("#pendientesAccion").html(datos);
                        }
                    });
}


setInterval(function() {
  calcularCantidadTicketsPendientesAccion();  
},120000);