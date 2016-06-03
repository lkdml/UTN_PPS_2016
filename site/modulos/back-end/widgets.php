<?php
require_once($_SERVER["DOCUMENT_ROOT"].'/configuracion.php'); 

use \CORE\Controlador\Aplicacion;
$app = Aplicacion::getInstancia();
$app->startSession(true);
$em = \CORE\Controlador\Entity_Manager::getInstancia()->getEntityManager();


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
                  unset($respuesta);
                  $i=0;
                  foreach($estados as $estado)
                  {
                    $respuesta[$i]['value'] =$arraydatos[$estado->getNombre()];
                    $respuesta[$i]['color']= $arrayEstadoColor[$estado->getNombre()];
                    $respuesta[$i]['highlight'] =$arrayEstadoColor[$estado->getNombre()];
                    $respuesta[$i]['label'] = $estado->getNombre();
                    $i++;
                  }
                  echo json_encode($respuesta); die;
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

                $prioridades = $ticket = $em->getRepository('Modelo\Prioridad')->findAll();
                foreach ($prioridades as $prioridad) {
                  $arraydatos[$prioridad->getNombre()] = count($em->getRepository('Modelo\Ticket')->findBy(array("prioridad"=>$prioridad->getPrioridadId())));
                  //$arrayPrioridadColor[$prioridad->getNombre()] =$prioridad->getColor();
                }
                unset($labels);
                unset($datos);
                $i=0;
                foreach($prioridades as $prioridad)
                {
                  $labels[]=  iconv('UTF-8', 'UTF-8//IGNORE', utf8_encode($prioridad->getNombre()));
                  $datos['data'][$i]=$arraydatos[$prioridad->getNombre()];
                  $i++;
                }
                
                $arrDatasets = array('label' => "Tickets segun prioridad"
                 ,'fillColor' => "rgba(220,220,220,0.2)"
                 , 'strokeColor' => "rgba(220,220,220,1)"
                 , 'pointColor' => "rgba(220,220,220,1)"
                 , 'pointStrokeColor' => "#fff"
                 , 'pointHighlightFill' => "#fff"
                 , 'pointHighlightStroke' => "rgba(220,220,220,1)"
                 , 'data' => $datos['data']);
                   
                $arrReturn = array('labels' => $labels, 'datasets' => array($arrDatasets));

                echo json_encode($arrReturn);die;
            break;
        case strtolower('w-ticketsPendientesAccion'):
              $pendientesAccion=count($em->getRepository('Modelo\Ticket')->findBy(array("estado"=>1)));
              echo $pendientesAccion;
            break;
        case strtolower('w-usuariosExistentes'):
              $usuariosExistentes=count($em->getRepository('Modelo\Usuario')->findAll());
              echo $usuariosExistentes;
            break;
        case strtolower('w-ticketsAbiertosOperadorActual'):
         
              $resultOperadores= $em->getRepository('Modelo\Ticket')->createQueryBuilder('t')
                                 ->where('t.operador = :id')
                                 ->Andwhere('t.estado = :estado')
                                 ->setParameter('id',$app->getOperador()->getOperadorId())
                                 ->setParameter('estado',1)
                                 ->getQuery()
                                 ->getResult();
              echo count($resultOperadores);
            break;
        case strtolower('w-ticketsEnCursoOperadorActual'):
         
              $resultOperadores= $em->getRepository('Modelo\Ticket')->createQueryBuilder('t')
                                   ->where('t.operador = :id')
                                   ->Andwhere('t.estado = :estado')
                                   ->setParameter('id',$app->getOperador()->getOperadorId())
                                   ->setParameter('estado',2)
                                   ->getQuery()
                                   ->getResult();
              echo count($resultOperadores);
            break;
        case strtolower('w-ticketsCerradosOperadorActual'):
         
              $resultOperadores= $em->getRepository('Modelo\Ticket')->createQueryBuilder('t')
                                   ->where('t.operador = :id')
                                   ->Andwhere('t.estado = :estado')
                                   ->setParameter('id',$app->getOperador()->getOperadorId())
                                   ->setParameter('estado',3)
                                   ->getQuery()
                                   ->getResult();
              echo count($resultOperadores);
            break;

    }



?>