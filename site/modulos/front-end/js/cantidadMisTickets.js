$( document ).ready(function obtenerTicketsOperador() {
     $.ajax({
          url:'modulos/front-end/controlador/misTicketsDatos.php',
          type:'GET',
          datatype:'JSON',
          success: function (response){
                        var array = jQuery.parseJSON( response );
                        var totalEstado=0;
                        for(var i=0;i<array['Estado'].length;i++)
                        {
                            for (var k in array['Estado'][i])
                            {
                                $('#'+k).html(array['Estado'][i][k]);
                                totalEstado=totalEstado+array['Estado'][i][k];
                            }
                        }
                        $('#todosEstados').html(totalEstado);
                        for(var i=0;i<array['Departamento'].length;i++)
                        {
                            for (var k in array['Departamento'][i])
                            {
                                $('#'+k).html(array['Departamento'][i][k]);
                            }
                        }
                        for(var i=0;i<array['TipoTicket'].length;i++)
                        {
                            for (var k in array['TipoTicket'][i])
                            {
                                $('#'+k).html(array['TipoTicket'][i][k]);
                            }
                        } 
                     
                  }
        });
});