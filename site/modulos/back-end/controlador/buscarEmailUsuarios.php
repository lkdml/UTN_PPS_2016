<?php
require_once($_SERVER["DOCUMENT_ROOT"].'/configuracion.php'); 
$em = \CORE\Controlador\Entity_Manager::getInstancia()->getEntityManager();

if(!empty($_GET["term"])) 
{
    $result = $em->getRepository('Modelo\Usuario')->createQueryBuilder('o')
   ->where('o.email LIKE :email')
   ->setParameter('email','%'.$_GET["term"].'%')
   ->getQuery()
   ->getResult();
   if(!empty($result)) {
       foreach($result as $usuario) {
           $data[]=array("Tipo"=>"Usuario",
                        "Creador"=>$usuario->getEmail(),
                        "Nombre"=>$usuario->getNombre()." ".$usuario->getApellido());
       }
       
   }
   
   $resultOperadores= $em->getRepository('Modelo\Operador')->createQueryBuilder('op')
   ->where('op.email LIKE :email')
   ->setParameter('email','%'.$_GET["term"].'%')
   ->getQuery()
   ->getResult();
   if(!empty($resultOperadores)) {
       foreach($resultOperadores as $operador) {
           $data[]=array("Tipo"=>"Operador",
                        "Creador"=>$operador->getEmail(),
                        "Nombre"=>$operador->getNombre()." ".$operador->getApellido());
       }
       
   }
   echo json_encode($data);
}

?>