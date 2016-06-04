<?php
require_once($_SERVER["DOCUMENT_ROOT"].'/configuracion.php'); 
require_once($_SERVER["DOCUMENT_ROOT"].'/bootstrap_orm.php');


use \Modelo\Operador as Operador;
/**
 * Valido que el operador esté con la session habilitadas
 */
use \CORE\Controlador\Aplicacion;
$app = Aplicacion::getInstancia();



$em = \CORE\Controlador\Entity_Manager::getInstancia()->getEntityManager();

if (validarRequisitos()){
   
    if (isset($_GET['Operador'])){
        if (($_GET['actualiza']=='clave')){
            $getOperador =  $em->getRepository('Modelo\Operador')->find($_GET["Operador"]);
            if (($getOperador->verificarClave($_POST["clave"])) && ($_POST["nuevaclave1"]==$_POST["nuevaclave2"])){
                $getOperador->setClave($getOperador->encriptarClave($_POST["nuevaclave1"]));
            }
            $em->persist($getOperador);
            $em->flush();
            $opActualizado=$em->getRepository('Modelo\Operador')->find($getOperador->getOperadorId());
            $app->setoperador($opActualizado);
            $app->guardarOperadorEnSession();
        } else {
            $getOperador =  $em->getRepository('Modelo\Operador')->find($_GET["Operador"]);
            $Operador = setearOperador($getOperador,$em);
            $em->persist($Operador);
            $em->flush();
            $opActualizado=$em->getRepository('Modelo\Operador')->find($getOperador->getOperadorId());
            $app->setoperador($opActualizado);
            $app->guardarOperadorEnSession();
        }
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
    $operador->setNombreUsuario($_POST["username"]);
    
    if (($_GET['Operador']==null)){
        var_dump($operador->encriptarClave($_POST["nuevaclave1"]));
        $operador->encriptarClave($_POST["nuevaclave1"]);
    }
    $operador->setEmail($_POST["email"]);
    $operador->setCelular($_POST["tel"]);
    $operador->setFirmaMensaje($_POST["Firma"]);

    $operador->setEliminado(false);
    //TODO faltan agregar al TPL
    $operador->setHashFoto("");
    $operador->setHabilitaNotificacionesMail(true);
    $operador->setActivo(true);
    $operador->setUltimaActualizacion(new \DateTime("now"));
    $operador->setUltimaActividad(new \DateTime("now"));
    return $operador;
}

header("location:/operador.php?modulo=dashboard");

?>