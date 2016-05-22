<?php
require_once($_SERVER["DOCUMENT_ROOT"].'/configuracion.php'); 
require_once($_SERVER["DOCUMENT_ROOT"].'/bootstrap_orm.php');


use \Modelo\Operador as Operador;
/**
 * Valido que el operador esté con la session habilitadas
 */
use \CORE\Controlador\Aplicacion;
Aplicacion::startSession(true);

$em = \CORE\Controlador\Entity_Manager::getInstancia()->getEntityManager();

// TODO antes de generar el usuario, debo verificar que el username y el mail no existan previamente. (o bien manejar el error que devolverá el sql si eso pasara.)

//realizo el alta del usuario
//$Operador = new Modelo\Operador();


if (validarRequisitos()){
    if (isset($_GET['Operador'])){
        if (($_GET['actualiza']=='clave')){
            $getOperador =  $em->getRepository('Modelo\Operador')->find($_GET["Operador"]);
            if (($getOperador->verificarClave($_POST["clave"])) && ($_POST["nuevaclave1"]==$_POST["nuevaclave2"])){
                $getOperador->setClave($getOperador->encriptarClave($_POST["nuevaclave1"]));
            }
            $em->persist($getOperador);
            $em->flush();
        } else {
            $getOperador =  $em->getRepository('Modelo\Operador')->find($_GET["Operador"]);
            //$em->clear();
            //echo"el de la base <pre>";Doctrine\Common\Util\Debug::dump($getOperador->getPerfil());echo"</pre>";
            
            $Operador = setearOperador($getOperador,$em);
            //echo"el q genero <pre>";Doctrine\Common\Util\Debug::dump($Operador);echo"</pre>";
            $em->persist($Operador);
            $em->flush();
            //$em->clear();
            // echo"Aca a otro <pre>";Doctrine\Common\Util\Debug::dump($em->getRepository('Modelo\Operador')->find($_GET["Operador"]));echo"</pre>";die;
        }
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
    $operador->setNombreUsuario($_POST["username"]);
    
    if (($_GET['Operador']==null)){
        var_dump($operador->encriptarClave($_POST["nuevaclave1"]));
        $operador->encriptarClave($_POST["nuevaclave1"]);
    }
    $operador->setEmail($_POST["email"]);
    $operador->setCelular($_POST["tel"]);
    $operador->setFirmaMensaje($_POST["Firma"]);
    //Doctrine\Common\Util\Debug::dump($em->getRepository('Modelo\Perfil')->find(1));die;
    $operador->setPerfil($em->getRepository('Modelo\Perfil')->find($_POST["perfilOperador"]));

    foreach ($operador->getDepartamento() as $depto){
        $operador->removeDepartamento($depto);
    }
    if (isset($_POST['Departamentos_asignados'])){
        foreach ($_POST['Departamentos_asignados'] as $idDepto){
            $departamento = $em->find('Modelo\Departamento',$idDepto);
            if (!is_null($departamento)){
                $operador->addDepartamento($departamento);
            }
        }
    }
    $operador->setEliminado(false);
    //TODO faltan agregar al TPL
    $operador->setHashFoto("");
    $operador->setHabilitaNotificacionesMail(true);
    $operador->setActivo(true);
    $operador->setUltimaActualizacion(new \DateTime("now"));
    $operador->setUltimaActividad(new \DateTime("now"));
    return $operador;
}

header("location:/operador.php?modulo=operadores");

?>