{include file="header.tpl"
css='<link rel="stylesheet" href="./modulos/back-end/css/validacion.css">'
js=''
}
{include file="panelLateral.tpl"}

  <!-- =============================================== -->
<div class="content-wrapper">
 <!-- Content Header (Page header) -->
 <section class="content-header">
   <h1>
      <strong>Alta Nuevo Usuario</strong>
     <small></small>
   </h1>
   <ol class="breadcrumb">
     <li><a href="/operador.php?modulo=dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
     <li class="active">Usuarios > Nuevo Usuario</li>
   </ol>
 </section>

 <section class="content">
    <div class="box box-info">
         <!-- form start -->
        <form action="{$rutaCSS}../controlador/nuevoUserAction.php" id="nuevoUsuarioForm" class="form-horizontal">
            <div class="box-body">
                <div class="box">
                    <div class="form-group">
                        <div class="box-body pad">
                            <label for="inputNombre" class="col-sm-2 control-label">Nombre</label>
                            <div class="col-sm-5">
                              <input type="text" class="form-control" id="nombre" name="nombre">
                            </div>
                        </div>
                        <!-- body pad end -->
                        <div class="box-body pad">
                            <label for="inputApellido" class="col-sm-2 control-label">Apellido</label>
                            <div class="col-sm-5">
                              <input type="text" class="form-control" id="apellido" name="apellido">
                            </div>
                        </div>
                        <!-- body pad end -->
                        <div class="box-body pad">
                            <label for="inputClave" class="col-sm-2 control-label">Clave</label>
                            <div class="col-sm-5">
                              <input type="password" class="form-control" id="clave" name="clave">
                            </div>
                        </div>
                        <!-- body pad end -->
                        <div class="box-body pad">
                            <label for="inputEmail" class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-5">
                              <input type="email" class="form-control" id="email" name="email">
                            </div>
                        </div>
                        <!-- body pad end -->
                       <div class="box-body pad">
                            <label for="inputDireccion" class="col-sm-2 control-label">Direccion</label>
                            <div class="col-sm-5">
                              <input type="text" class="form-control" id="direccion" name="direccion">
                            </div>
                        </div>
                        <!-- body pad end -->
                        <div class="box-body pad">
                            <label for="inputCodigoPostal" class="col-sm-2 control-label">Código Postal</label>
                            <div class="col-sm-5">
                              <input type="text" class="form-control" id="cp" name="cp">
                            </div>
                        </div>
                        <!-- body pad end -->
                        <div class="box-body pad">
                            <label for="inputCiudad" class="col-sm-2 control-label">Ciudad</label>
                            <div class="col-sm-5">
                              <input type="text" class="form-control" id="ciudad" name="ciudad">
                            </div>
                        </div>
                        <!-- body pad end -->
                        <div class="box-body pad">
                            <label for="lblTelefono" class="col-sm-2 control-label">Teléfono</label>
                            <div class="col-sm-10">
                                <div class="col-sm-4 input-group">
                                  <div class="input-group-addon">
                                    <i class="fa fa-phone"></i>
                                  </div>
                                  <input type="text" class="form-control" data-inputmask='"mask": "9-999-9999"' data-mask id="telefono" name="telefono">
                                </div>
                            </div>
                        </div>
                        <!-- body pad end -->
                        <div class="box-body pad">
                            <label for="inputEmailAdicional" class="col-sm-2 control-label">Email Adicional</label>
                            <div class="col-sm-5">
                              <input type="email" class="form-control" id="emailadicional" name="emailadicional">
                            </div>
                        </div>
                        <!-- body pad end -->
                        <div class="box-body pad">
                            <label for="ComboEmpresa" class="col-sm-2 control-label">Empresa</label>
                            <div class="col-sm-5">
                                <select class="form-control select2" style="width: 100%;">
                                    <option selected="selected">Empresa1</option>
                                    <option>Empresa2</option>
                                    <option>Empresa3</option>
                                    <option>Empresa4</option>
                                    <option>Empresa5</option>
                                    <option>Empresa6</option>
                                    <option>Empresa7</option>
                                </select>
                            </div>
                        </div>
                        <!-- body pad end -->
                        <div class="box-body pad">
                            <label for="archivo" class="col-sm-2 control-label">Subir Foto Perfil</label>
                            <input class="col-sm-10" type="file" id="archivo">
                        </div>
                        <!-- body pad end -->
                    </div>
                    <!-- form group end -->
                </div>
                <!-- box end -->
            </div>
            <!-- box body end -->
             
            <div class="box-footer">
                <button type="submit" class="btn btn-info pull-right">Enviar</button>
            </div>
            <!-- /.box-footer -->
        </form>
        <!-- form end -->
    </div>
    <!-- box info end-->
</div>
  
  
<!-- jQuery 2.2.0 -->
<script src="{$rutaJS}jQuery-2.2.0.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="{$rutaJS}bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="{$rutaJS}jquery.slimscroll.js"></script>
<!-- FastClick -->
<script src="{$rutaJS}fastclick.js"></script>
<!-- AdminLTE App -->
<script src="{$rutaJS}app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{$rutaJS}demo.js"></script>
<script src="{$rutaJS}jquery-validator-min.js"></script>

{literal}
<script>
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
            email: {
                required: true,
                emailcheck:true
            }
            
        },
        
        // Specify the validation error messages
        messages: {
             nombre: {
                required: "Por favor, ingresa el nombre"},
            apellido: {
                required: "Por favor, ingresa el apellido"},
            clave: {
               required: "Por favor, ingresa una clave",
                minlength: "La descripción debe tener mas de 8 caractéres",
                pwcheck:"La clave debe contener una letra minuscula y un número"
            },
            email:{
                required:"Por favor, ingrese un email",
                email:"El email ingresado es inválido",
                emailcheck:"El email ingresado es inválido"
            },
            emailadicional:{email:"El email ingresado es inválido"}
           
        }
    })
    
  });
 
</script>
<script>
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

</script>
{/literal}



 {include file="footer.tpl"}