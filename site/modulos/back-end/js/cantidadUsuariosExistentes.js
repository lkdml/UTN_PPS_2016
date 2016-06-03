calcularUsuariosExistentes();
function calcularUsuariosExistentes(){
   $.ajax({
        url:'operador.php?modulo=widgets',
        type:'GET',
        datatype:'JSON',
        data:{datosAjax:'w-usuariosExistentes'},
        success: function (response){
                    var datos=response;
                    $("#usuariosExistentes").html(datos);
                        }
                    });
}


setInterval(function() {
  calcularUsuariosExistentes();  
},120000);