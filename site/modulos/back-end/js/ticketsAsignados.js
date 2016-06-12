calcularCantidadAsignados();
function calcularCantidadAsignados(){
   $.ajax({
        url:'operador.php?modulo=widgets',
        type:'GET',
        datatype:'JSON',
        data:{datosAjax:'w-ticketsAsignados'},
        success: function (response){
                    var datos=response;
                    $("#cantidadAsignados").html(datos);
                        }
                    });
}


setInterval(function() {
  calcularCantidadAsignados();  
},120000);