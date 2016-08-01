$().ready(function() {
  
    // Setup form validation on the #register-form element
    $("#nuevoOperadorForm").validate({
    
        // Specify the validation rules
        rules: {
            
            nombre: {required:true
            },
             apellido: {required:true
            },
             username: {required:true,
                     minlength:5
            },
            email: {
                required: true,
                emailcheck:true
            },
             nuevaclave1: {
                required: true,
                minlength:8,
                pwcheck:true,
                
            },
              nuevaclave2: {
                required: true,
                minlength:8,
                pwcheck:true,
                
            },
            
        },
        
        // Specify the validation error messages
        messages: {
            
             nombre: {required: "(*)Por favor, ingresa el Nombre."},
                 
                 apellido: {required: "(*)Por favor, ingresa el Apellido."},
                 
                 username: {
                required: "(*)Por favor, ingresa el Nombre de Usuario.",
                 minlength: "(*)El Nombre de usuario debe contener más de 5 caractéres.",},
                 
                 email: {
                required: "(*)Por favor, ingresa el email.",
                 emailcheck: "(*)El email ingresado no es válido.",},
                 
                   nuevaclave1: {
                required: "(*)Por favor, ingresa la clave.",
                 pwcheck: "(*)La clave debe contener una letra minúscula y un número.",
                 minlength: "(*)La clave debe contener una letra minúscula y un número.",},
                 
                   nuevaclave2: {
                required: "(*)Por favor, reingresa la clave.",
                 pwcheck: "(*)La clave debe contener una letra minúscula y un número.",
                 minlength: "(*)La clave debe contener una letra minúscula y un número.",},
}
    })
    
  });
 
//VALIDACION DEL MAIL
$.validator.addMethod("emailcheck",function(value) {
  return /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(value);
});
//VALIDACION DE LA PASSWORD
$.validator.addMethod("pwcheck", function(value) {
   return /^[A-Za-z0-9\d=!\-@._*]*$/.test(value) // consists of only these
       && /[a-z]/.test(value) // has a lowercase letter
       && /\d/.test(value) // has a digit
});