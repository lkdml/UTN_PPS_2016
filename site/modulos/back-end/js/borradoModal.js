
$("#confirmaBorrado").click(function(e){

   var accion=$('<input />').attr('type', 'hidden')
          .attr('name', "accion")
          .attr('value', "borrar")
          .appendTo('#myForm');
        $("#myForm").submit();
    
});

$("#btnBorrar").click(function(e){
    e.preventDefault();

});
