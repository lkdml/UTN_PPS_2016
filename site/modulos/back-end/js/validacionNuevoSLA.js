$().ready(function() {
  
    // Setup form validation on the #register-form element
    $("#nuevoSLAForm").validate({
    
        // Specify the validation rules
        rules: {
            
            nombre: {required:true,
                    minlength: 5
            },
            descripcion: {required:true,
                            minlength: 5
            },
             condicionHora: {
                        required: true,
                        horacheck: false,
                        range:[1,72]
                        },
            ddDeptos: {required:true},
            ddEstados: {required:true},
            ddPrioridades: {required:true},
            ddDeptoOrigen: {required:true},
            ddEstadosOrigen: {required:true},
            ddPrioridadOrigen: {required:true},
            ddOperadores: {required:true},
             
        },
        
        // Specify the validation error messages
        messages: {
             nombre: {
                required: "(*)Por favor, ingrese el nombre.",
                 minlength: "(*)Ingrese un nombre mayor a 4 dígitos."
             },
                
            descripcion: {
                required: "(*)Por favor, ingrese una descripción.",
                minlength: "(*)Ingrese una descripcion mayor a 4 dígitos."
            },
             ddDeptos: {
                required: "(*)Por favor, seleccione un Departamento.",
            },
             ddEstados: {
                required: "(*)Por favor, seleccione un Estado.",
            },
             ddPrioridades: {
                required: "(*)Por favor, seleccione una Prioridad.",
            },
             ddDeptoOrigen: {
                required: "(*)Por favor, seleccione un Departamento.",
            },
             ddEstadosOrigen: {
                required: "(*)Por favor, seleccione un Estado.",
            },
             ddPrioridadOrigen: {
                required: "(*)Por favor, seleccione una Prioridad.",
            },
             ddOperadores: {
                required: "(*)Por favor, seleccione un Operador.",
            },
             condicionHora: {
                required: "(*)Por favor, ingrese horas de Condición (HH:MM:SS)",
                horacheck: "(*)El formato correcto para la Hora es (HH:MM:SS)",
                range:"(*)Por favor, ingrese un valor entre 1 y 72 (horas)"
            },
           
           
        }
    })
    
  });
 
//VALIDACION DE LA hora
$.validator.addMethod("horacheck", function(value, element) {
    return /^([01]?[0-9]|2[0-3])(:[0-5][0-9]){2}$/.test(value);
    
    
   });


