$().ready(function() {
  
    // Setup form validation on the #register-form element
    $("#nuevaCategoriaForm").validate({
    
        // Specify the validation rules
        rules: {
            
            nombre: {required:true,
                     minlength:5
            },
            
        },
        
        // Specify the validation error messages
        messages: {
             nombre: {
                required: "(*)Por favor, ingresa el Nombre.",
                 minlength: "(*)El nombre debe contener más de 4 dígitos.",}
           
           
        }
    })
    
  });
 
