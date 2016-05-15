$().ready(function() {
  
    // Setup form validation on the #register-form element
    $("#nuevaEmpresaForm").validate({
    
        // Specify the validation rules
        rules: {
            
            razonsocial: {required:true},
            pais: {required:true},
            direccion: {required:true}
        },
        
        // Specify the validation error messages
        messages: {
             razonsocial: {
                required: "Por favor, ingresa la Razón Social."},
            pais: {
                required: "Por favor, ingresa el país."},
            direccion: {
               required: "Por favor, ingresa la dirección.",
            },
            web:{
                url:"Por favor ingrese la web de forma correcta"
            }
           
        }
    })
    
  });
 
