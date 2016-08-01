 $().ready(function() {
  
    // Setup form validation on the #register-form element
    $("#nuevoEstadoForm").validate({
    
        // Specify the validation rules
        rules: {
            nombre: {
              required:true
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
                required: "(*)Por favor, ingrese un nombre."
            },
            descripcion: {
                required: "(*)Por favor, ingrese una Descripción",
                minlength: "(*)La Descripción debe tener más de 5 caractéres."
                
            },
                color: {
                required: "(*)Por favor, seleccione un Color",
                
            },
          
        }
    })
    
  });
  
  
