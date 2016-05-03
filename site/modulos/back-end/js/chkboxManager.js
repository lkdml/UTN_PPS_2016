(function(){ 
  
  
//Agrego OnClick dinámicamente  
var checkboxes = document.getElementsByTagName('input');


 for (var i = 0; i < checkboxes.length; i++) {
    

    if ( checkboxes[i].type === 'checkbox' && checkboxes[i].id !== "checkAll") {
            checkboxes[i].onclick = function (){
                //TODO terminar de resolver lógica
             
             
                  var selchbox = [];// Array que va a guardar los selected checkbox
                 
                  var inpfields = document.getElementsByTagName('input');
                  var nr_inpfields = inpfields.length;
                  // traverse the inpfields elements, and adds the value of selected (checked) checkbox in selchbox
                  for(var i=0; i<nr_inpfields; i++) {
                    if(inpfields[i].type == 'checkbox' && inpfields[i].checked == true && inpfields[i].id !== "checkAll" ) selchbox.push(inpfields[i].value);
                  }
                 
                 
                 if (selchbox.length == 0){
                     
                    document.getElementById("btnModificar").disabled = true;
                    document.getElementById("btnBorrar").disabled = true;
                    document.getElementById("btnNuevo").disabled = false;
                     
                     
                 }
                      if (selchbox.length == 1){
                     
                    document.getElementById("btnModificar").disabled = false;
                    document.getElementById("btnBorrar").disabled = false;
                    document.getElementById("btnNuevo").disabled = true;
                     
                    
                      }
                      
                     if (selchbox.length > 1){
                     
                    document.getElementById("btnModificar").disabled = true;
                    document.getElementById("btnBorrar").disabled = false;
                    document.getElementById("btnNuevo").disabled = true;
                     
                     
                 }
                 
                             
             
            }
        }
    }
})(window,document);

  
