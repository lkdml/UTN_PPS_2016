$().ready(function() {
  
    // Setup form validation on the #register-form element
    $("#nuevoUsuarioForm").validate({
    
        // Specify the validation rules
        rules: {
            
            nombre: {required:true},
            apellido: {required:true},
            clave: {
                        required: true,
                        pwcheck: true,
                        minlength: 8
                        },
            confirmarclave: {
                        required: true,
                        pwcheck: true,
                        minlength: 8,
                        equalTo : "#clave"
                        },
            email: {
                required: true,
                emailcheck:true
            },
            ddEmpresas: {
              required:true,
            },
            
        },
        
        // Specify the validation error messages
        messages: {
             nombre: {
                required: "(*)Por favor, ingresa el nombre."},
            apellido: {
                required: "(*)Por favor, ingresa el apellido."},
            clave: {
               required: "(*)Por favor, ingresa una clave.",
                minlength: "(*)La clave debe tener mas de 7 caractéres.",
                pwcheck:"(*)La clave debe contener una letra minúscula y un número."
            },
            confirmarclave: {
               required: "(*)Por favor, ingresa re-ingresa la clave.",
                minlength: "(*)La clave debe tener mas de 7 caractéres.",
                pwcheck:"(*)La clave debe contener una letra minúscula y un número.",
                equalTo: "(*)La clave ingresada no coincide."
            },
            email:{
                required:"(*)Por favor, ingrese un email.",
                email:"(*)El email ingresado es inválido.",
                emailcheck:"El email ingresado es inválido."
            },
            emailadicional:{email:"(*)El email ingresado es inválido."},
             ddEmpresas: {
                required: "(*)Por favor, selecciona una Empresa"},
           
        }
    })
    
  });
 

//VALIDACION DE LA PASSWORD
$.validator.addMethod("pwcheck", function(value) {
   return /^[A-Za-z0-9\d=!\-@._*]*$/.test(value) // consists of only these
       && /[a-z]/.test(value) // has a lowercase letter
       && /\d/.test(value) // has a digit
});
//VALIDACION DEL MAIL
$.validator.addMethod("emailcheck",function(value) {
  return /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(value);
});

