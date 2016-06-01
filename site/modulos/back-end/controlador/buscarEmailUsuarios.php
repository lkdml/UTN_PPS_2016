<?php
require_once($_SERVER["DOCUMENT_ROOT"].'/configuracion.php'); 
$em = \CORE\Controlador\Entity_Manager::getInstancia()->getEntityManager();

if(!empty($_GET["q"])) 
{
    $result = $em->getRepository('Modelo\Usuario')->createQueryBuilder('o')
   ->where('o.email LIKE :email')
   ->setParameter('email','%'.$_GET["q"].'%')
   ->getQuery()
   ->getResult();
   if(!empty($result)) {
       foreach($result as $usuario) {
           $data[]=$usuario->getEmail();
       }
       echo json_encode($data);
   }
}

?>