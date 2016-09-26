<?php

require_once($_SERVER["DOCUMENT_ROOT"].'/configuracion.php');  
require_once (\CORE\Controlador\Config::getPublic('Ruta_Core_Controlador')."ViewManager.php");

use \CORE\Controlador\Aplicacion;
$app = Aplicacion::getInstancia();
$app->startSession($modoOP);
$permisos =$app->getPermisos();
$em = \CORE\Controlador\Entity_Manager::getInstancia()->getEntityManager();


$vm = new ViewManager(\CORE\Controlador\Config::getPublic('Back_SMARTY_TemplateDir'),null);
$vm->configPath(\CORE\Controlador\Config::getPublic('Ruta_Back').'css/',
                  \CORE\Controlador\Config::getPublic('Ruta_Back').'js/',
                  \CORE\Controlador\Config::getPublic('Ruta_Back').'imagenes/');
$vm->assign("RutaAvatars", \CORE\Controlador\Config::getPublic('Ruta_Avatars'));
$vm->assign('OperadorLogueado',$app->getOperador());
$vm->assign('Permisos',$permisos);
if ($app->ifHayError()){
    $error =$app->recuperarErrorDeSession();
    $vm->assign('Error',$error);
}

$Estados = $em->getRepository('Modelo\TicketEstado')->findAll();
$vm->assign('Estados',$Estados);   


use \CORE\Controlador\CustomField as CustomField;
$cf[] = new CustomField("select",
                        array("class"=>"Asignado_A","multiple"=>null),
                        null,
                        array(array("atributos"=>array("value"=>"-1"),"texto"=>"Seleccione un Operador")
                             ));
$cf[] = new CustomField("select",
                        array("class"=>"Origen_del_Ticket"),
                        null,
                        array(array("atributos"=>array("value"=>"-1"),"texto"=>"Seleccione el Criterio.."),
                            array("atributos"=>array("value"=>"0"),"texto"=>"Usuario"),
                            array("atributos"=>array("value"=>"1"),"texto"=>"Operador"),
                             ));
$cf[] = new CustomField("select",
                        array("class"=>"Departamento","multiple"=>null),
                        null,
                        array(array("atributos"=>array("value"=>"-1"),"texto"=>"Seleccione un Departamento")
                             ));
$cf[] = new CustomField("select",
                        array("class"=>"Estado","multiple"=>null),
                        null,
                        array(array("atributos"=>array("value"=>"-1"),"texto"=>"Seleccione un Estado")
                             ));
$cf[] = new CustomField("select",
                        array("class"=>"Prioridad","multiple"=>null),
                        null,
                        array(array("atributos"=>array("value"=>"-1"),"texto"=>"Seleccione una Prioridad")
                             ));
$cf[] = new CustomField("select",
                        array("class"=>"Tipo_de_Ticket","multiple"=>null),
                        null,
                        array(array("atributos"=>array("value"=>"-1"),"texto"=>"Seleccione un Tipo de Ticket")
                             ));
$cf[] = new CustomField("textarea",
                        array("class"=>"El_mensaje_contiene","maxlength"=>"45","rows"=>"2", "cols"=>"50"),
                        null,
                        array());
$cf[] = new CustomField("textarea",
                        array("class"=>"El_asunto_contiene","maxlength"=>"45","rows"=>"2", "cols"=>"50"),
                        null,
                        array());
$cf[] = new CustomField("input",
                        array("class"=>"Mail_de_usuario","list"=>"usuarios","name"=>"Maiil_usuarios"),
                        null,
                        array(array("atributos"=>array("value"=>"Valor de prueba"),"texto"=>null),
                            array("atributos"=>array("value"=>"marcoo"),"texto"=>null)
                             ));
$cf[] = new CustomField("select",
                        array("class"=>"Empresa","multiple"=>null),
                        null,
                        array(array("atributos"=>array("value"=>"-1"),"texto"=>"Seleccione una Empresa")
                             ));
$cf[] = new CustomField("input",
                        array("class"=>"Y","type"=>"number"),
                        null,
                        array(array("atributos"=>array("value"=>"-1"),"texto"=>"Seleccione un Operador")
                             ));
$cf[] = new CustomField("select",
                        array("class"=>"O","type"=>"number"),
                        null,
                        array(array("atributos"=>array("value"=>"-1"),"texto"=>"Seleccione un Operador")
                             ));
$cf[] = new CustomField("select",
                        array("class"=>"Asignar_a"),
                        null,
                        array(array("atributos"=>array("value"=>"-1"),"texto"=>"Seleccione un Operador")
                             ));
$cf[] = new CustomField("textarea",
                        array("class"=>"Agregar_nota","maxlength"=>"45","rows"=>"2", "cols"=>"50"),
                        null,
                        array());
$cf[] = new CustomField("select",
                        array("class"=>"Agregar_respuesta","maxlength"=>"45","rows"=>"2", "cols"=>"50"),
                        null,
                        array());
$cf[] = new CustomField("select",
                        array("class"=>"Cambiar_Departamento"),
                        null,
                        array(array("atributos"=>array("value"=>"-1"),"texto"=>"Seleccione un Departamento")
                             ));
$cf[] = new CustomField("select",
                        array("class"=>"Cambiar_Prioridad"),
                        null,
                        array(array("atributos"=>array("value"=>"-1"),"texto"=>"Seleccione una Prioridad")
                             ));
$cf[] = new CustomField("select",
                        array("class"=>"Cambiar_Tipo_de_Ticket"),
                        null,
                        array(array("atributos"=>array("value"=>"-1"),"texto"=>"Seleccione un Tipo de Ticket")
                             ));
$cf[] = new CustomField("select",
                        array("class"=>"Cambiar_Estado"),
                        null,
                        array(array("atributos"=>array("value"=>"-1"),"texto"=>"Seleccione un Estado")
                             ));
$cf[] = new CustomField("select",
                        array("class"=>"Enviar_mail_a_Usuario"),
                        null,
                        array(array("atributos"=>array("value"=>"-1"),"texto"=>"Seleccione un Template")
                             ));
$cf[] = new CustomField("select",
                        array("class"=>"Enviar_mail_a_Operador"),
                        null,
                        array(array("atributos"=>array("value"=>"-1"),"texto"=>"Seleccione un Template")
                             ));       
 echo "<pre>";  
 
foreach ($cf as $value) {
    echo "<br>";
    print_r(json_encode($value));
    echo "<br>";

CustomField::createFromJson(json_encode($value))->crearElementoHTML();
echo "<br>";

}   

echo "</pre>";


die;
$vm->display('dashboard.tpl');
