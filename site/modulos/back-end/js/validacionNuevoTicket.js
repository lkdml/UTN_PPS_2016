 $().ready(function() {
  
    // Setup form validation on the #register-form element
    $("#nuevoticketForm").validate({
    
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
            ddPrioridades: {
              required:true,
            },
             ddSLAS: {
              required:true,
            },
            
        },
        
        // Specify the validation error messages
        messages: {
             txtAsunto: {
                required: "(*)Por favor, ingresa un asunto.",
                minlength: "(*)El asunto debe tener más de 4 letras."
            },
            ddDepartamentos: {
                required: "(*)Por favor, seleccione un Departamento de la Lista.",
                
            },
                ddTipos: {
                required: "(*)Por favor, seleccione un Tipo de la Lista.",
                
            },
                 ddPrioridades: {
                required: "(*)Por favor, seleccione una Prioridad de la Lista.",
                
            },
                ddSLAS: {
                required: "(*)Por favor, seleccione un SLA de la Lista.",
                
            },
          
        }
    })
    
  });
  
  
