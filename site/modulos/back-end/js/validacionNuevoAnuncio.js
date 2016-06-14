$().ready(function() {
    
     $.validator.addMethod("valueNotEquals", function(value, element, arg){
      return arg != value;
     }, "(*)Por favor, seleccione un valor.");
    // Setup form validation on the #register-form element
    $("#nuevoAnuncioForm").validate({
    
        // Specify the validation rules
        rules: {
            
            titulo: {required:true},
            categoria: { valueNotEquals: "-1" },
            
        },
        
        // Specify the validation error messages
        messages: {
             titulo: {
                required: "(*)Por favor, ingresa un Titulo."},
            
         
        }
    })
    
  });
 
