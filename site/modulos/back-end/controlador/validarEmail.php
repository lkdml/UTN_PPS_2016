<?php
require_once($_SERVER["DOCUMENT_ROOT"].'/configuracion.php'); 
$em = \CORE\Controlador\Entity_Manager::getInstancia()->getEntityManager();

if (!empty($_POST['Creador']))
{

    $emailUsuario = $em->getRepository('Modelo\Usuario')->createQueryBuilder('o')
                   ->where('o.email = :email')
                   ->setParameter('email',$_POST['Creador'])
                   ->getQuery()
                   ->getResult();
                   
    $emailOperador= $em->getRepository('Modelo\Operador')->createQueryBuilder('op')
                   ->where('op.email  = :email')
                   ->setParameter('email',$_POST['Creador'])
                   ->getQuery()
                   ->getResult();
                   
    if(!empty($emailUsuario)|| !empty($emailOperador)) {
        echo "true";
    }
    else{
      echo "false";  
    }
    
}
else
{
    echo "false"; //invalido
}

?>