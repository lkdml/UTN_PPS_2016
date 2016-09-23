$().ready(function() {
    
     $.validator.addMethod("valueNotEquals", function(value, element, arg){
      return arg != value;
     }, "(*)Por favor, seleccione un valor.");
     
     $.validator.addMethod("cke_required", function(value, element) {
    var idname = $(element).attr('id');
    var editor = CKEDITOR.instances[idname];
    $(element).val(editor.getData());
    return $(element).val().length > 0;
    }, "(*)Por favor, ingrese un mensaje.");
     
    // Setup form validation on the #register-form element
    $("#nuevoAnuncioForm").validate({
        ignore: [], 
        // Specify the validation rules
        rules: {
            
            titulo: {required:true},
            categoria: { valueNotEquals: "-1" },
            contenido: {cke_required: true}
            
        },
        
        // Specify the validation error messages
        messages: {
             titulo: {
                required: "(*)Por favor, ingresa un Titulo."},
            
         
        },
       errorPlacement: function(error, element) {
                if (element.attr("name") == "contenido")
                {
                    error.insertBefore("#editor1");
                }
                else
                {
                    error.insertAfter(element);
                }
            }
    })
    
  });
 
