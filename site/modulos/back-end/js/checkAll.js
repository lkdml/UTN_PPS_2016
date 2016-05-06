function checkAll(ele) {
    
    var checkboxes = document.getElementsByTagName('input');
     
     if (ele.checked) {
         
         for (var i = 0; i < checkboxes.length; i++) {
             if (checkboxes[i].type == 'checkbox' && checkboxes[i].id !== "checkAll") {
                 checkboxes[i].checked = true;
                 document.getElementById("btnModificar").disabled = true;
                 document.getElementById("btnBorrar").disabled = false;
                 document.getElementById("btnNuevo").disabled = true;
                 
             }
         }
     } else {
        
         for (var i = 0; i < checkboxes.length; i++) {
             if (checkboxes[i].type == 'checkbox' && checkboxes[i].id !== "checkAll") {
                 checkboxes[i].checked = false;
                 document.getElementById("btnModificar").disabled = true;
                 document.getElementById("btnBorrar").disabled = true;
                 document.getElementById("btnNuevo").disabled = false;
                 
             }
         }
     }
     
     
     
 }
    
    
