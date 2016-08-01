$().ready(function() {
  
    // Setup form validation on the #register-form element
    $("#nuevaClaveForm").validate({
    
        // Specify the validation rules
        rules: {
            
            clave: {required:true,
                     minlength:8,
                     
            },
             nuevaclave1: {required:true,
                            minlength:8,
                            pwcheck: true,
            },
             nuevaclave2: {required:true,
                            minlength:8,
                            pwcheck: true,
            },
            
        },
        
        // Specify the validation error messages
        messages: {
             clave: {
                required: "(*)Por favor, ingresa la clave actual.",
                 minlength: "(*)La clave debe contener más de 7 caractéres.",
             },
              nuevaclave1: {
                required: "(*)Por favor, ingresa la clave nueva.",
                 minlength: "(*)La clave debe contener más de 7 caractéres.",
                 pwcheck:"(*)La clave debe contener una letra minúscula y un número."
             },
              nuevaclave2: {
                required: "(*)Por favor, ingresa la clave nueva.",
                 minlength: "(*)La clave debe contener más de 7 caractéres.",
                 pwcheck:"(*)La clave debe contener una letra minúscula y un número."
             }
           
           
           
           
        }
    })
    
  });
 
//VALIDACION DE LA PASSWORD
$.validator.addMethod("pwcheck", function(value) {
   return /^[A-Za-z0-9\d=!\-@._*]*$/.test(value) // consists of only these
       && /[a-z]/.test(value) // has a lowercase letter
       && /\d/.test(value) // has a digit
});