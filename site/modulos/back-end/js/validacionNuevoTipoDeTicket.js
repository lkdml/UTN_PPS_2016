$().ready(function() {
  
    $.validator.addMethod("valueNotEquals", function(value, element, arg){
      return arg != value;
     }, "(*)Por favor, seleccione un valor.");
     
    // Setup form validation on the #register-form element
    $("#nuevoTipoTicketForm").validate({
    
        // Specify the validation rules
        rules: {
            
            nombre: {required:true
            },
            descripcion: {required:true,
                            minlength: 5
            },
            EstadoApertura: { valueNotEquals: "-1" },
            EstadoCierre: { valueNotEquals: "-1" },
        },
        
        // Specify the validation error messages
        messages: {
             nombre: {
                required: "(*)Por favor, ingrese el nombre."
             },
                
            descripcion: {
                required: "(*)Por favor, ingrese una descripción.",
                minlength: "(*)Ingrese una descripcion mayor a 5 caractéres."
            },
           
        }
    })
    
  });
 
