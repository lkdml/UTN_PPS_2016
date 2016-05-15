$().ready(function() {
  
    // Setup form validation on the #register-form element
    $("#vistaTicketForm").validate({
    
        // Specify the validation rules
        rules: {
            txtDescripcion:{
              required:true,
              minlength:5
            },
          
        },
        
        // Specify the validation error messages
        messages: {
             txtDescripcion: {
                required: "(*)Por favor, ingresa una Descripción.",
                minlength: "(*)la Descripción debe tener más de 5 letras."
            },
              
          
        }
    })
    
  });
  

