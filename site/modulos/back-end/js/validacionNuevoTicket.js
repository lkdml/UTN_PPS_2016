 $().ready(function() {
  
    $.validator.addMethod("valueNotEquals", function(value, element, arg){
      return arg != value;
     }, "(*)Por favor, seleccione un valor.");
  
   
  
    // Setup form validation on the #register-form element
    $("#nuevoticketForm").validate({
        ignore: ":hidden:not(textarea)", 
        // Specify the validation rules
        rules: {
            WysiHtmlField: "required",
            Asunto: {
              required:true,
              minlength:5
            },
            Descripcion:{
              required:true
            },
            Departamento: {
              valueNotEquals: "-1" ,
            },
             TicketTipo: {
              valueNotEquals: "-1" ,
            },
            Prioridad: {
               valueNotEquals: "-1" ,
            },
             Estado: {
               valueNotEquals: "-1" ,
            },
            OperadorAsignado: {
               valueNotEquals: "-1" ,
            },
            SLA: {
               valueNotEquals: "-1" ,
            },
            Creador:{
                    required:true,
                    remote: {
                        url: "modulos/back-end/controlador/validarEmail.php",
                        type: "post",
                        data: {
                            email: function() {
                                return $( "#Creador" ).val();
                            }
                        }
                      }
            }
            
        },

        highlight: function(element) {
            $(element).closest('.form-group').addClass('has-error');
            $(element).nextAll('.glyphicon').removeClass('hidden');
            $(element).nextAll('.glyphicon').removeClass('glyphicon-ok').addClass('glyphicon-remove');
        },
        unhighlight: function(element) {
            $(element).closest('.form-group').removeClass('has-error');
            $(element).nextAll('.glyphicon').removeClass('hidden');
            $(element).nextAll('.glyphicon').removeClass('glyphicon-remove').addClass('glyphicon-ok');
        },
        errorElement: 'span',
        errorClass: 'help-block',
        errorPlacement: function(error, element) {
            if(element.parent('.input-group').length) {
                error.insertAfter(element.parent());
            } else {
                error.insertAfter(element);
            }
        },

        // Specify the validation error messages
        messages: {
             Asunto: {
                required: "(*)Por favor, ingresa un asunto.",
                minlength: "(*)El asunto debe tener más de 4 caractéres."
            },
            Descripcion: {
                required: "(*)Por favor, ingresa una descripción."
            },
            Creador:{
                required:"(*)Por favor, ingrese un email de usuario o operador.",
                remote: jQuery.validator.format("(*)El email {0} no existe.")
            }
          
        }
    })
    
  });
  
  
