$( document ).ready(function cargarCarpetas() {
     $.ajax({
          url:'index.php?modulo=widgets',
          type:'GET',
          datatype:'JSON',
          data:{datos:'estados'},
          success: function (response){
                      var array = jQuery.parseJSON( response );
                      var total=0;
                      for(var i=0;i<array.length;i++)
                      {
                      
                         $('#estados').append('<li><a href="/operador.php?modulo=tickets&Estados='+array[i].id+'">'+array[i].nombre+'<small class="label pull-right" style=background-color:'+array[i].color+'>'+array[i].cantidad+'</small></a></li>'); 
                        total=total+array[i].cantidad;
                      }
                      $('#totalticketOperador').html(total);
            
                  }
        });
});

function cargarGrilla(get) {
    $.ajax({
          url:'index.php?modulo=widgets',
          type:'GET',
          datatype:'JSON',
          data:{datosAjax:'lateralTickets'},
          success: function (response){
                      var array = jQuery.parseJSON( response );
                      var total=0;
                      for(var i=0;i<array.length;i++)
                      {
                      
                         $('#dinamicTicketMenuOperador').append('<li><a href="/operador.php?modulo=tickets&Estados='+array[i].id+'">'+array[i].nombre+'<small class="label pull-right" style=background-color:'+array[i].color+'>'+array[i].cantidad+'</small></a></li>'); 
                        total=total+array[i].cantidad;
                      }
                      $('#totalticketOperador').html(total);
            
                  }
        });
}


