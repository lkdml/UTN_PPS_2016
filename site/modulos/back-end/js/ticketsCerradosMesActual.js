calcularTicketsCerradosMesActual();
function calcularTicketsCerradosMesActual(){
   $.ajax({
        url:'operador.php?modulo=widgets',
        type:'GET',
        datatype:'JSON',
        data:{datosAjax:'w-ticketsCerradosMesActual'},
        success: function (response){
                    var datos=response;
                    $("#ticketsCerradosMesActual").html(datos);
                        }
                    });
}


setInterval(function() {
  calcularTicketsCerradosMesActual();  
},120000);