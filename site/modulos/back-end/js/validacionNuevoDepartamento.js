 $().ready(function() {
  
    // Setup form validation on the #register-form element
    $("#nuevoDepartamentoForm").validate({
    
        // Specify the validation rules
        rules: {
            nombre: {
              required:true
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
                required: "(*)Por favor, ingrese un nombre."
            },
            descripcion: {
                required: "(*)Por favor, ingrese una Descripción.",
                minlength: "(*)La Descripción debe tener más de 5 caractéres."
                
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
  
  
