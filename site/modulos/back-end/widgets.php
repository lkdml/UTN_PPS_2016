<?php
require_once($_SERVER["DOCUMENT_ROOT"].'/configuracion.php'); 

use \CORE\Controlador\Aplicacion;
Aplicacion::startSession(true);
$em = \CORE\Controlador\Entity_Manager::getInstancia()->getEntityManager();
use Doctrine\ORM\Query\ResultSetMapping;

use \Modelo\Ticket as Ticket;
//      \CORE\Controlador\Aplicacion::starSession();
    //require_once(CORE\Config::getPublic('CORE').'singleton.class.php');
    //require(\CORE\Config::getPublic('CORE').'aplicacion.class.php');
    //session_start();
 /**       if (!($_SESSION["autenticado"]==true)) {
            $ejecutandoAPP = false;
            session_destroy();
            header("location:login.php");
        }*/

    switch  (strtolower($_GET['datosAjax'])){
        case strtolower('W-TiempoEstimadoVs'):
          
          
            $result = '{
                          "labels": ["<1 Hora", "1-3 Horas", "3-6 Horas", "6-12 Horas", "12-24 Horas", "+24 Horas"],
                          "datasets": [
                            {
                              "label": "Respuesta Mes Actual",
                              "fillColor": "rgba(60,141,188,0.9)",
                              "strokeColor": "rgba(60,141,188,0.8)",
                              "pointColor": "#3b8bba",
                              "pointStrokeColor": "rgba(60,141,188,1)",
                              "pointHighlightFill": "#fff",
                              "pointHighlightStroke": "rgba(60,141,188,1)",
                              "data": [40, 20, 30, 20, 20, 20]
                            }
                          ]
                        }';
            die(($result));
            break;
        case strtolower('W-estdosTicket'):

                  $estados = $ticket = $em->getRepository('Modelo\TicketEstado')->findAll();
                  foreach ($estados as $estado) {
                    $arraydatos[$estado->getNombre()] = count($em->getRepository('Modelo\Ticket')->findBy(array("estado"=>$estado->getEstadoId())));
                    $arrayEstadoColor[$estado->getNombre()] =$estado->getColor();
                  }
                  
                  $resultado="'[";
                  foreach($estados as $estado)
                  {
                    $resultado=$resultado."{'value':".$arraydatos[$estado->getNombre()].",'color':"."'".$arrayEstadoColor[$estado->getNombre()]."'".",'highlight':"."'".$arrayEstadoColor[$estado->getNombre()]."'".",'label':"."'".$estado->getNombre()."'"."},";
                  }
                  $resultado=substr($resultado,0,$resultado.lenght-1)."]'";
                  //var_dump($resultado);die;

                    $result = '[
                              {
                                "value": 700,
                                "color": "#f56954",
                                "highlight": "#f56954",
                                "label": "Abierto"
                              },
                              {
                                "value": 200,
                                "color": "#00c0ef",
                                "highlight": "#00c0ef",
                                "label": "En curso"
                              },
                              {
                                "value": 100,
                                "color": "#00a65a",
                                "highlight": "#00a65a",
                                "label": "Cerrado"
                              }
                            ]';
            die(($resultado));
            break;
        case strtolower('w-tiempo-vs-tiempo'):
            $result = '{
                  "labels": ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio"],
                  "datasets": [
                    {
                      "label": "Tiempo Estimado",
                      "fillColor": "rgba(210, 214, 222, 1)",
                      "strokeColor": "rgba(210, 214, 222, 1)",
                      "pointColor": "rgba(210, 214, 222, 1)",
                      "pointStrokeColor": "#c1c7d1",
                      "pointHighlightFill": "#fff",
                      "pointHighlightStroke": "rgba(220,220,220,1)",
                      "data": [65, 59, 80, 81, 56, 55, 40]
                    },
                    {
                      "label": "Tiempo Real",
                      "fillColor": "rgba(60,141,188,0.9)",
                      "strokeColor": "rgba(60,141,188,0.8)",
                      "pointColor": "#3b8bba",
                      "pointStrokeColor": "rgba(60,141,188,1)",
                      "pointHighlightFill": "#fff",
                      "pointHighlightStroke": "rgba(60,141,188,1)",
                      "data": [28, 48, 40, 19, 86, 27, 90]
                    }
                  ]
                }';
            die(($result));
            break;
        case strtolower('w-TicketXPrioridad'):
          
            /*
                 $prioridades = $ticket = $em->getRepository('Modelo\Prioridad')->findAll();
                  foreach ($prioridades as $prioridad) {
                    $arraydatos[$estado->getNombre()] = count($em->getRepository('Modelo\Ticket')->findBy(array("prioridad"=>$prioridad->getPrioridadId())));
                    $arrayEstadoColor[$estado->getNombre()] =$estado->getColor();
                  }
                  
                  $resultado="'[";
                  foreach($estados as $estado)
                  {
                    $resultado=$resultado."{'value':".$arraydatos[$estado->getNombre()].",'color':"."'".$arrayEstadoColor[$estado->getNombre()]."'".",'highlight':"."'".$arrayEstadoColor[$estado->getNombre()]."'".",'label':"."'".$estado->getNombre()."'"."},";
                  }
                  $resultado=substr($resultado,0,$resultado.lenght-1)."]'";
          */
          
                $result = '{
                            "labels": ["Baja", "Media", "Alta", "Crítica", "Urgente"],
                            "datasets": [
                                {
                                    "label": "Tickets segun prioridad",
                                    "fillColor": "rgba(220,220,220,0.2)",
                                    "strokeColor": "rgba(220,220,220,1)",
                                    "pointColor": "rgba(220,220,220,1)",
                                    "pointStrokeColor": "#fff",
                                    "pointHighlightFill": "#fff",
                                    "pointHighlightStroke": "rgba(220,220,220,1)",
                                    "data": [40,20,10,30,15]
                                }
                                    ]
                                    }';
            die(($result));
            break;

    }



?>