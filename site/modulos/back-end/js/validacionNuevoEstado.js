 $().ready(function() {
  
    // Setup form validation on the #register-form element
    $("#nuevoEstadoForm").validate({
    
        // Specify the validation rules
        rules: {
            nombre: {
              required:true,
              minlength:5
            },
            descripcion: {
              required:true,
               minlength:5
            },
             color: {
              required:true,
            },
            
        },
        
        // Specify the validation error messages
        messages: {
             nombre: {
                required: "(*)Por favor, ingrese un nombre.",
                minlength: "(*)El nombre debe tener más de 4 letras."
            },
            descripcion: {
                required: "(*)Por favor, ingrese una Descripción",
                minlength: "(*)La Descripción debe tener más de 4 letras."
                
            },
                color: {
                required: "(*)Por favor, seleccione un Color",
                
            },
          
        }
    })
    
  });
  
  
