$().ready(function() {
  
    // Setup form validation on the #register-form element
    $("#nuevoTipoTicketForm").validate({
    
        // Specify the validation rules
        rules: {
            
            nombre: {required:true,
                    minlength: 5
            },
            descripcion: {required:true,
                            minlength: 5
            },
        },
        
        // Specify the validation error messages
        messages: {
             nombre: {
                required: "(*)Por favor, ingrese el nombre.",
                 minlength: "(*)Ingrese un nombre mayor a 5 dígitos."
             },
                
            descripcion: {
                required: "(*)Por favor, ingrese una descripción.",
                minlength: "(*)Ingrese una descripcion mayor a 5 dígitos."
            },
           
        }
    })
    
  });
 
