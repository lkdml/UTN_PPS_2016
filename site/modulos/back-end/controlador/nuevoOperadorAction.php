<?php
require_once($_SERVER["DOCUMENT_ROOT"].'/configuracion.php'); 
require_once($_SERVER["DOCUMENT_ROOT"].'/bootstrap_orm.php');

//use \Modelo\Perfil as Perfil;
//use \Modelo\Rol as Rol;
use \Modelo\Operador as Operador;
/**
 * Valido que el operador esté con la session habilitadas
 */
use \CORE\Controlador\Aplicacion;
Aplicacion::startSession(true);

var_dump($_POST);//die;

$em = \CORE\Controlador\Entity_Manager::getInstancia()->getEntityManager();

// TODO antes de generar el usuario, debo verificar que el username y el mail no existan previamente. (o bien manejar el error que devolverá el sql si eso pasara.)

//realizo el alta del usuario
$Operador = new Modelo\Operador();


if (validarRequisitos()){
    if (isset($_GET['OperadorId'])){
        $getOperador =  $em->getRepository('Modelo\Operador')->find($_GET["OperadorId"]);
            $Operador = setearOperador($getOperador,$em);
            $em->merge($Operador);
            $em->flush();
    } else {
       $Operador = setearOperador(new Operador(),$em);
       $em->persist($Operador);
       $em->flush();
    }
}

function validarRequisitos(){
    $rta=false;
    $countRequisitos=0;
    $maxRequisitosAValidar=1;
    //veriico igualdad de claves
    if ($_POST["nuevaclave1"]==$_POST["nuevaclave2"]){$countRequisitos++;}
    
    
    if ($countRequisitos==$maxRequisitosAValidar){$rta=true;}
    return $rta;
}

function setearOperador(Operador $operador,$em){
    $operador->setNombre($_POST["nombre"]);
    $operador->setApellido($_POST["apellido"]);
    $operador->setNombre_Usuario($_POST["username"]);
    $operador->setClave($_POST["nuevaclave1"]);
    $operador->setEmail($_POST["email"]);
    $operador->setCelular($_POST["tel"]);
    $operador->setFirma_Mensaje($_POST["firma"]);
    $operador->setPerfil($em->getRepository('Modelo\Perfil')->find($_POST["perfilOperador"]));
    if (isset($_POST['Departamentos_asignados'])){
        foreach ($_POST['Departamentos_asignados'] as $idDepto){
            $departamento = $em->find('Modelo\Departamento',$idDepto);
            if (!is_null($departamento)){
                $operador->asignarDepartamento($departamento);
            }
        }
    }
    $operador->setEliminado(false);
    //TODO faltan agregar al TPL
    $operador->setHashFoto("");
    $operador->setHabilita_Notificaciones_Mail(true);
    $operador->setActivo(true);
    $operador->setUltima_Actualizacion();
    $operador->setUltima_Actividad();
    return $operador;
}

header("location:/operador.php?modulo=operadores");

?>