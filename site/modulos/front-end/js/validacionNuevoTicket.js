$().ready(function() {
    
      $.validator.addMethod("valueNotEquals", function(value, element, arg){
      return arg != value;
     }, "(*)Por favor, seleccione un valor.");
     
    // Setup form validation on the #register-form element
    $("#nuevoTicketForm").validate({
    
        // Specify the validation rules
        rules: {
            Asunto: {
              required:true,
              minlength:5
            },
            Departamento: { valueNotEquals: "-1" },
            TicketTipo: { valueNotEquals: "-1"},
            Estado: { valueNotEquals: "-1" },
            Prioridad: { valueNotEquals: "-1" }
          
        },
        
        // Specify the validation error messages
        messages: {
             Asunto: {
                required: "(*)Por favor, ingresa un asunto.",
                minlength: "(*)El asunto debe tener más de 5 letras."
            },
          
        }
    })
    
  });
  

