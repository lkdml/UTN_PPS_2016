<?php
  /*
    * @Descripcion:    login Action
    *
    * @Package:        CORE
    * @Autor:          lkdml
    * @Version:        1.0
    * 
    */
require_once($_SERVER["DOCUMENT_ROOT"].'/configuracion.php'); 

use \CORE\Controlador\Aplicacion;
Aplicacion::startSession(true,true);

header("location:/operador.php?modulo=dashboard");

/*    \CORE\Aplicacion::starSession(true);

    //session_start();   
           
    $miUsuario = new CORE\Usuario();
    $miUsuario->setMiLdap(new CORE\Ldap());
    $userName = \CORE\Aplicacion::obtenerUserFromEmail($_POST['email']);
    
    $miUsuario->cargarUsuarioDesdeLdap($userName,$_POST['password']);
    if ($miUsuario->validarMembresia(\CORE\Config::getPublic('ldap_membresia_squid'))) {  
//aca hago algo feo, pero por pedido se quiere autenticar con y sin @agn.gov.ar   
$fuerzoEmail = $userName."@agn.gov.ar";
     //A este punto verifiqué que el usuario LDAP existe y tiene permisos de navegacion.
//       $arrayUsuario = array('email'=>$_POST['email']);
       $arrayUsuario = array('email'=>$fuerzoEmail);

       //$arrayUsuario = array('email'=>'lazaro2002@hotmail.com');
                   
        //Ahora verifico que el email del usuarioLdap exista en los usuarios de sur, caso contrario lo creo.
        $surUser = \model\sur\Usuario::traerUsuarios($arrayUsuario);
        if (is_null($surUser)){
            $surUser = \model\sur\Usuario::agregarUsuario($miUsuario->getNombre()." ".$miUsuario->getApellido(),$_POST['password'],$miUsuario->getMail());
        }
        $_SESSION['Prioridades'] = \model\sur\Prioridad::traerPrioridades();
        $_SESSION['Estados'] = \model\sur\Estado::traerEstados();
        $_SESSION['Operadores'] = \model\sur\Operador::traerOperadores();
        $_SESSION['Departamentos'] =\model\sur\Departamento::ordenarDepartamentos(\model\sur\Departamento::traerDepartamentos());
                  //  \CORE\degub::vdump($_SESSION['Departamentos']); die;

        $_SESSION['CamposPersonalizados'] = \model\sur\CampoPersonalizado::traerCamposPersonalizados();
        
        $_SESSION['Usuario']['id']=$surUser[0]->getId();
        $_SESSION['Usuario']['full_name']=$surUser[0]->getFull_name();
        $_SESSION['Usuario']['email']=$surUser[0]->getEmail();
	$_SESSION['Usuario']['avatar']=$surUser[0]->getFile();
	$ejecutandoAPP = true;                     
        $_SESSION["autenticado"]=true;

        header("location:../home.php");
    } else {
        header("location:../login.php");
    }

    */
?>
