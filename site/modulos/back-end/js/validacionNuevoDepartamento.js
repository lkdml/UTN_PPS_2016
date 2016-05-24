 $().ready(function() {
  
    // Setup form validation on the #register-form element
    $("#nuevoDepartamentoForm").validate({
    
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
             idDeptoPadre: {
              required:true,
            },
              orden: {
              required:true,
            },
              operadorDefault: {
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
                required: "(*)Por favor, ingrese una Descripción.",
                minlength: "(*)La Descripción debe tener más de 4 letras."
                
            },
                idDeptoPadre: {
                required: "(*)Por favor, seleccione un Departamento Padre.",
                
            },
                 orden: {
                required: "(*)Por favor, seleccione un Orden.",
                
            },
                operadorDefault: {
                required: "(*)Por favor, seleccione un Operador.",
                
            },
          
          
        }
    })
    
  });
  
  
