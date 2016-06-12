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
        case strtolower('w-ticketsCerrados-Anual'):
            $estados=($em->getRepository('Modelo\TicketEstado')->findByEstadofinal('1'));
            $fecha=new \DateTime("now");
            
            //for ($i = 1; $i < 13; $i++) {
                 // $query = $em->createQuery("SELECT t.ultimaActividad FROM Modelo\Ticket t 
                  //                            WHERE t.ultimaActividad LIKE CONCAT(:date,'%') 
                  //                            AND t.asignadoAOperador = :id
                  //                            AND t.estado IN (:estado)
                  //                            GROUP BY t.ultimaActividad");
                  //$qb= $em->getRepository('Modelo\Ticket')->createQueryBuilder('t')
                  $qb=$em->createQueryBuilder();
                   $qb->select('COUNT(t.ultimaActividad) AS Cantidad,substring(t.ultimaActividad,6,2) AS groupMes')
                   ->from('Modelo\Ticket','t')
                   ->where('t.asignadoAOperador = :id')
                   ->Andwhere('t.estado IN (:estado)')
                   ->Andwhere('t.ultimaActividad LIKE :date')
                   ->setParameter('id',$app->getOperador()->getOperadorId())
                   ->setParameter('estado',$estados)
                   ->setParameter('date', $fecha->format('Y').'%')
                   ->groupBy('groupMes');
                  
                  $resultado=$qb->getQuery()->getResult();
                  
                  //$query->setParameter('date', $fecha->format('Y-m'));
                  //$query->setParameter('id',$app->getOperador()->getOperadorId());
                  //$query->setParameter('estado',$estados);
                  //$cantidadCerrados = count($query->getResult());
                  
                 for ($i = 1; $i < 13; $i++) {
                    $cantidadMes[$i]=0;
                 }
                 for ($i = 0; $i < count($resultado); $i++) {
                    $cantidadMes[intval($resultado[$i][groupMes])]=intval($resultado[$i][Cantidad]);
                 }
            
           // }
            $labels=array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
            
            $datasets=array("label"=>"Tickets Cerrados",
                            "fillColor"=>"rgba(210, 214, 222, 1)",
                            "strokeColor"=>"rgba(210, 214, 222, 1)",
                            "pointColor"=>"rgba(210, 214, 222, 1)",
                            "pointStrokeColor"=>"#c1c7d1",
                            "pointHighlightFill"=>"#fff",
                            "pointHighlightStroke"=>"rgba(220,220,220,1)",
                            "data"=>$cantidadMes);
                            
            $respuesta=array("labels"=>$labels,"datasets"=>$datasets);
            echo json_encode($respuesta);
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
        case strtolower('w-ticketsCerradosMesActual'):
              $fecha=new \DateTime("now");
              $estados=($em->getRepository('Modelo\TicketEstado')->findByEstadofinal('1'));
              $qb=$em->createQueryBuilder();
                   $qb->select('t.ultimaActividad')
                   ->from('Modelo\Ticket','t')
                   ->where('t.asignadoAOperador = :id')
                   ->Andwhere('t.estado IN (:estado)')
                   ->Andwhere('t.ultimaActividad LIKE :date')
                   ->setParameter('id',$app->getOperador()->getOperadorId())
                   ->setParameter('estado',$estados)
                   ->setParameter('date', $fecha->format('Y-m').'%');
              $ticketCerrados = count($qb->getQuery()->getResult());
              echo $ticketCerrados;
            break;
        case strtolower('widgetEstados'):
          $departamentos=$em->getRepository('Modelo\Operador')->find($app->getOperador()->getOperadorId())->getDepartamento();
          $estados=($em->getRepository('Modelo\TicketEstado')->findAll());
          
          foreach($departamentos as $depto)
          {
            $deptosDelOperador[]=$depto->getDepartamentoId();
          }
          
          foreach($estados as $estado)
          {
             $cantidad= count($em->getRepository('Modelo\Ticket')->createQueryBuilder('t')
                                 ->where('t.asignadoAOperador = :id')
                                 ->Andwhere('t.estado = :estado')
                                 ->Andwhere('t.departamento IN (:depto)')
                                 ->setParameter('id',$app->getOperador()->getOperadorId())
                                 ->setParameter('estado',$estado->getEstadoId())
                                 ->setParameter('depto',$deptosDelOperador)
                                 ->getQuery()
                                 ->getResult());
            $data[]=array('nombre'=>$estado->getNombre(),'icono'=>$estado->getIcono(),'color'=>$estado->getColor(),'cantidad'=>$cantidad,'id'=>$estado->getEstadoId());
          }
         
          
          echo json_encode($data);
          
          break;
          
        case strtolower('lateralTickets'):
          $departamentos=$em->getRepository('Modelo\Operador')->find($app->getOperador()->getOperadorId())->getDepartamento();
          $estados=($em->getRepository('Modelo\TicketEstado')->findAll());
          
          foreach($departamentos as $depto)
          {
            $deptosDelOperador[]=$depto->getDepartamentoId();
          }
          
          foreach($estados as $estado)
          {
             $cantidad= count($em->getRepository('Modelo\Ticket')->createQueryBuilder('t')
                                 ->Andwhere('t.estado = :estado')
                                 ->Andwhere('t.departamento IN (:depto)')
                                 ->setParameter('estado',$estado->getEstadoId())
                                 ->setParameter('depto',$deptosDelOperador)
                                 ->getQuery()
                                 ->getResult());
            $data[]=array('nombre'=>$estado->getNombre(),'icono'=>$estado->getIcono(),'color'=>$estado->getColor(),'cantidad'=>$cantidad,'id'=>$estado->getEstadoId());
          }
         
          
          echo json_encode($data);
          
          break;
          
        case strtolower('lateralDepartamentos'):
          
          $departamentos=$em->getRepository('Modelo\Operador')->find($app->getOperador()->getOperadorId())->getDepartamento();

          $estados=$em->getRepository('Modelo\TicketEstado')->findAll();
          foreach($departamentos as $depto)
          {
              unset($dataDepto);
              foreach($estados as $estado)
              {
                 $cantidad= count($em->getRepository('Modelo\Ticket')->createQueryBuilder('t')
                                     ->where('t.departamento = :id')
                                     ->Andwhere('t.estado = :estado')
                                     ->setParameter('id',$depto->getDepartamentoId())
                                     ->setParameter('estado',$estado->getEstadoId())
                                     ->getQuery()
                                     ->getResult());
                
                $dataDepto[]=array('nombre'=>$estado->getNombre(),'icono'=>$estado->getIcono(),'color'=>$estado->getColor(),'cantidad'=>$cantidad,'id'=>$estado->getEstadoId());
              }
              
              $lateralDepto[]=array('id'=>$depto->getDepartamentoId(),'nombre'=>$depto->getNombre(),'dataTickets'=>$dataDepto);
          }
          echo json_encode($lateralDepto);
          
          break;

    }



?>