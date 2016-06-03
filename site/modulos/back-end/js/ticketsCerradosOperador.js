ticketsCerradosOperadorActual();
function ticketsCerradosOperadorActual(){
   $.ajax({
        url:'operador.php?modulo=widgets',
        type:'GET',
        datatype:'JSON',
        data:{datosAjax:'w-ticketsCerradosOperadorActual'},
        success: function (response){
                    var datos=response;
                    $("#ticketsOperadorCerrados").html(datos);
                        }
                    });
}


setInterval(function() {
  ticketsCerradosOperadorActual();  
},170000);