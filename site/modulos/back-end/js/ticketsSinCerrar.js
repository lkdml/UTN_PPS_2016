calcularCantidadTicketsSinCerrar();
function calcularCantidadTicketsSinCerrar(){
   $.ajax({
        url:'operador.php?modulo=widgets',
        type:'GET',
        datatype:'JSON',
        data:{datosAjax:'w-ticketsSinCerrar'},
        success: function (response){
                    var datos=response;
                    $("#cantidadSinCerrar").html(datos);
                        }
                    });
}


setInterval(function() {
  calcularCantidadTicketsSinCerrar();  
},120000);