$().ready(function() {
  
    // Setup form validation on the #register-form element
    $("#nuevoAnuncioForm").validate({
    
        // Specify the validation rules
        rules: {
            
            txtTitulo: {required:true},
            ddEmpresas: {required:true},
            
        },
        
        // Specify the validation error messages
        messages: {
             txtTitulo: {
                required: "(*)Por favor, ingresa un Titulo."},
            ddEmpresas: {
                required: "(*)Por favor, seleccione una Empresa."},
         
        }
    })
    
  });
 
