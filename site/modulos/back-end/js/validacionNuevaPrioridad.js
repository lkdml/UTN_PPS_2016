$().ready(function() {
  
    // Setup form validation on the #register-form element
    $("#nuevaPrioridadForm").validate({
    
        // Specify the validation rules
        rules: {
            
            nombre: {required:true,
                    minlength: 5
            },
            descripcion: {required:true,
                            minlength: 5
            },
            color:  {required:true},
        },
        
        // Specify the validation error messages
        messages: {
             nombre: {
                required: "(*)Por favor, ingrese el nombre.",
                 minlength: "(*)Ingrese un nombre mayor a 4 dígitos."
             },
                
            descripcion: {
                required: "(*)Por favor, ingrese una descripción.",
                minlength: "(*)Ingrese una descripcion mayor a 4 dígitos."
            },
           color: {
                required: "(*)Por favor, ingrese un color."},
        }
    })
    
  });
 
