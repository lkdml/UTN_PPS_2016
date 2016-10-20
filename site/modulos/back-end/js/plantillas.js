$(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1');
  });
  
$(document).ready( function () {

   $("i.fa-pencil").click(function() { 
    var idTemplate=this.id;
    $.ajax({
            url:'operador.php?modulo=plantillas',
            type:'GET',
            datatype:'JSON',
            data:{plantillaId:idTemplate},
            success: function (response){
                  var rta= $.parseJSON(response);
                  $('#inputNombre').val(rta.nombre);
                  $('#inputTitulo').val(rta.titulo);
                  $('#inputId').val(idTemplate);
                  CKEDITOR.instances.editor1.setData(rta.body); 
                  $('html, body').animate({
                    scrollTop: $('#edicion').offset().top
                }, 500);
                }
            })
  });
  var idTemplateBorrar;
  var elementBorrar;
   $("i.fa-trash-o").click(function() {
      idTemplateBorrar=this.id;
      elementBorrar=$(this);
   });
   
   $("#confirmaBorrado").click(function(){
      $.ajax({
            url:'operador.php?modulo=plantillas',
            type:'GET',
            datatype:'JSON',
            data:{plantillaId:idTemplateBorrar,delete:true},
            success: function (response){
                elementBorrar.parents('li.template').hide();
                }
            })
   });
  
  $("#nuevoTemplate").click(function() {
    $('#inputNombre').val('');
    $('#inputTitulo').val('');
    $('#inputId').val(null);
    CKEDITOR.instances.editor1.setData(''); 
    $('html, body').animate({
                    scrollTop: $('#edicion').offset().top
                }, 500);
  });     
  
  $.validator.addMethod("cke_required", function(value, element) {
    var idname = $(element).attr('id');
    var editor = CKEDITOR.instances[idname];
    $(element).val(editor.getData());
    return $(element).val().length > 0;
    }, "(*)Por favor, ingrese un mensaje.");
  
  $("#plantillasForm").validate({
         ignore: [], 
        // Specify the validation rules
        rules: {
            
            nombre: {required:true
            },
            asunto: {required:true
            },
            editor1: {cke_required: true}

        },
        // Specify the validation error messages
        messages: {
             nombre: {
                required: "(*)Por favor, ingrese el nombre."
             },
                
            asunto: {
                required: "(*)Por favor, ingrese un asunto."
            }
           
        },
        errorPlacement: function(error, element) 
                {
                    if (element.attr("name") == "editor1") 
                   {
                    error.insertBefore("textarea#editor1");
                    } else {
                    error.insertBefore(element);
                    }
                }
    })
  
  
} );

