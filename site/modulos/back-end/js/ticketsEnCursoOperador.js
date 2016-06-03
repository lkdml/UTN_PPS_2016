ticketsEnCursoOperadorActual();
function ticketsEnCursoOperadorActual(){
   $.ajax({
        url:'operador.php?modulo=widgets',
        type:'GET',
        datatype:'JSON',
        data:{datosAjax:'w-ticketsEnCursoOperadorActual'},
        success: function (response){
                    var datos=response;
                    $("#ticketsOperadorEnCurso").html(datos);
                        }
                    });
}


setInterval(function() {
  ticketsEnCursoOperadorActual();  
},150000);