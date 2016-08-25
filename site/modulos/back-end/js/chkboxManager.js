(function(){ 
  
  
//Agrego OnClick dinámicamente  
var checkboxes = document.getElementsByTagName('input');


 for (var i = 0; i < checkboxes.length; i++) {
    

    if ( checkboxes[i].type === 'checkbox' && checkboxes[i].id !== "checkAll") {
            checkboxes[i].onclick = function (){
                
                  var selchbox = [];// Array que va a guardar los selected checkbox
                 
                  var inpfields = document.getElementsByTagName('input');
                  var nr_inpfields = inpfields.length;
                  // Segùn condición almaceno los valores (como referencia)
                  for(var i=0; i<nr_inpfields; i++) {
                    if(inpfields[i].type == 'checkbox' && inpfields[i].checked == true && inpfields[i].id !== "checkAll" ) selchbox.push(inpfields[i].value);
                  }
                 
                 
                 if (selchbox.length == 0){
                     
                    $("#btnModificar").prop('disabled', true);
                    $("#btnBorrar").prop('disabled', true);
                    $("#btnNuevo").prop('disabled', false);
                    $("#btnUnir").prop('disabled', true);
                    $("#btnSeparar").prop('disabled', true);
                    $("#btnVer").prop('disabled', true);
                    $("#btnActividad").prop('disabled', true);
                    
                     
                     
                 }
                      if (selchbox.length == 1){
                     
                    $("#btnModificar").prop('disabled', false);
                    $("#btnBorrar").prop('disabled', false);
                    $("#btnNuevo").prop('disabled', true);
                    $("#btnUnir").prop('disabled', true);;
                    $("#btnSeparar").prop('disabled', true); // TODO: falta verificar si es un ticket unido
                    $("#btnVer").prop('disabled', false);
                    $("#btnActividad").prop('disabled', false);
                    
                      }
                      
                     if (selchbox.length > 1){
                     
                    $("#btnModificar").prop('disabled', true);
                    $("#btnBorrar").prop('disabled', false);
                    $("#btnNuevo").prop('disabled', true);
                    $("#btnUnir").prop('disabled', false);
                    $("#btnSeparar").prop('disabled', true);
                    $("#btnVer").prop('disabled', true);
                    $("#btnActividad").prop('disabled', true);
                     
                     
                 }
                 
                             
             
            }
        }
    }
})(window,document);

  
