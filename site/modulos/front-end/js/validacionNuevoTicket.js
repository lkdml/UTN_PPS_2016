$().ready(function() {
  
    // Setup form validation on the #register-form element
    $("#nuevoTicketForm").validate({
    
        // Specify the validation rules
        rules: {
            txtAsunto: {
              required:true,
              minlength:5
            },
            ddDepartamentos: {
              required:true,
            },
             ddTipos: {
              required:true,
            },
          
        },
        
        // Specify the validation error messages
        messages: {
             txtAsunto: {
                required: "(*)Por favor, ingresa un asunto.",
                minlength: "(*)El asunto debe tener más de 5 letras."
            },
              ddDepartamentos: {
                required: "(*)Por favor, seleccione un Departamento de la Lista.",
                
            },
                ddTipos: {
                required: "(*)Por favor, seleccione un Tipo de la Lista.",
                
            },
          
        }
    })
    
  });
  

