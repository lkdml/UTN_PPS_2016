(function(){ 
  
  
//Agrego OnClick dinámicamente  
var checkboxes = document.getElementsByTagName('input');

 for (var i = 0; i < checkboxes.length; i++) {
    

    if ( checkboxes[i].type === 'checkbox' && checkboxes[i].id !== "checkAll") {
            checkboxes[i].onclick = function (){
                //TODO terminar de resolver lógica
                if (this.checked == true && this.id !== "checkAll")
                {
                   
                    document.getElementById("btnModificar").disabled = false;
                    document.getElementById("btnBorrar").disabled = false;
                    document.getElementById("btnNuevo").disabled = true;
                   
                }
                
                
                if(this.checked == false && this.id !== "checkAll")
                {
                    document.getElementById("btnModificar").disabled = true;
                    document.getElementById("btnBorrar").disabled = true;
                    document.getElementById("btnNuevo").disabled = false;
                }
                
                    
            }
        }
    }
})(window,document);

  
