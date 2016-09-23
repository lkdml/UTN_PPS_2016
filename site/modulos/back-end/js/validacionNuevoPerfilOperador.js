 $().ready(function() {
  
    // Setup form validation on the #register-form element
    $("#nuevoPerfilOperadorForm").validate({
    
        // Specify the validation rules
        rules: {
            Nombre: {
              required:true,
              minlength:5
            },
            Descripcion: {
              required:true,
               minlength:5
            },
            
            
        },
        
        // Specify the validation error messages
        messages: {
             Nombre: {
                required: "(*)Por favor, ingrese un nombre.",
                minlength: "(*)El nombre debe tener más de 5 caractéres."
            },
            Descripcion: {
                required: "(*)Por favor, ingrese una Descripción.",
                minlength: "(*)La Descripción debe tener más de 5 caractéres."
                
            },
        
        }
    })
    
  });
  