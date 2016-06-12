<?php
require_once($_SERVER["DOCUMENT_ROOT"].'/configuracion.php'); 

use \CORE\Controlador\Aplicacion;
$app = Aplicacion::getInstancia();
$app->startSession(true);
$em = \CORE\Controlador\Entity_Manager::getInstancia()->getEntityManager();
use \Modelo\Ticket as Ticket;


    switch  (strtolower($_GET['datosAjax'])){
        case strtolower('W-tipoTicketMes'):
          $departamentos=$em->getRepository('Modelo\Operador')->find($app->getOperador()->getOperadorId())->getDepartamento(); 
          foreach($departamentos as $depto)
          {
            $deptosDelOperador[]=$depto->getDepartamentoId();
          }
          $tipoTickets=$em->getRepository('Modelo\TicketTipo')->findAll();
          $fecha=new \DateTime("now");
          foreach ($tipoTickets as $ticket) {
            $labels[]=$ticket->getNombre();
            $qb=$em->createQueryBuilder();
                   $qb->select('t.ultimaActividad')
                   ->from('Modelo\Ticket','t')
                   ->where('t.asignadoAOperador = :id')
                   ->Andwhere('t.ultimaActividad LIKE :date')
                   ->Andwhere('t.tipoTicket = :tipoTicket')
                   ->Andwhere('t.departamento IN (:depto)')
                   ->setParameter('id',$app->getOperador()->getOperadorId())
                   ->setParameter('date', $fecha->format('Y-m').'%')
                   ->setParameter('tipoTicket',$ticket)
                   ->setParameter('depto',$deptosDelOperador);
            $cantidadporTipo[]=count($qb->getQuery()->getResult());
          }
          
          $datasets=array("label"=>"Tipo de tickets asignados por mes",
                          "fillColor"=>"rgba(60,141,188,0.9)",
                          "strokeColor"=>"rgba(60,141,188,0.8)",
                          "pointColor"=>"#3b8bba",
                          "pointStrokeColor"=>"rgba(60,141,188,1)",
                          "pointHighlightFill"=>"#fff",
                          "pointHighlightStroke"=>"rgba(60,141,188,1)",
                          "data"=>$cantidadporTipo);
                          
            $respuesta=array("labels"=>$labels,"datasets"=>array($datasets));
            echo json_encode($respuesta);
            break;
        case strtolower('W-estadosTicket-Mes'):
            $departamentos=$em->getRepository('Modelo\Operador')->find($app->getOperador()->getOperadorId())->getDepartamento(); 
            foreach($departamentos as $depto)
            {
              $deptosDelOperador[]=$depto->getDepartamentoId();
            }
            $estados = $ticket = $em->getRepository('Modelo\TicketEstado')->findAll();
            $fecha=new \DateTime("now");
            foreach ($estados as $estado) {
              
              $qb=$em->createQueryBuilder();
                     $qb->select('t.ultimaActividad')
                     ->from('Modelo\Ticket','t')
                     ->where('t.asignadoAOperador = :id')
                     ->Andwhere('t.ultimaActividad LIKE :date')
                     ->Andwhere('t.estado = :estado')
                     ->Andwhere('t.departamento IN (:depto)')
                     ->setParameter('id',$app->getOperador()->getOperadorId())
                     ->setParameter('date', $fecha->format('Y-m').'%')
                     ->setParameter('estado',$estado)
                     ->setParameter('depto',$deptosDelOperador);
              $cantidad=count($qb->getQuery()->getResult());
              
              $datosChart[]=array('value'=>$cantidad,'color'=>$estado->getColor(),'highlight'=>$estado->getColor(),'label'=>$estado->getNombre());
            }
            echo json_encode($datosChart);
            break;
        case strtolower('w-ticketsCerrados-Anual'):
            $estados=($em->getRepository('Modelo\TicketEstado')->findByEstadofinal('1'));
            $fecha=new \DateTime("now");
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
              
             for ($i = 1; $i < 13; $i++) {
                $cantidadMes[$i]=0;
             }
             for ($i = 0; $i < count($resultado); $i++) {
                $cantidadMes[intval($resultado[$i][groupMes])]=intval($resultado[$i][Cantidad]);
             }
                
            $labels=array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
            
            $datasets=array("label"=>"Tickets Cerrados",
                            "fillColor"=>"rgba(210, 214, 222, 1)",
                            "strokeColor"=>"rgba(210, 214, 222, 1)",
                            "pointColor"=>"rgba(210, 214, 222, 1)",
                            "pointStrokeColor"=>"#c1c7d1",
                            "pointHighlightFill"=>"#fff",
                            "pointHighlightStroke"=>"rgba(220,220,220,1)",
                            "data"=>array_values($cantidadMes));
                            
            $respuesta=array("labels"=>$labels,"datasets"=>array($datasets));
            echo json_encode($respuesta);
            break;
        case strtolower('w-TicketXPrioridad-Mes'):
          $departamentos=$em->getRepository('Modelo\Operador')->find($app->getOperador()->getOperadorId())->getDepartamento(); 
          foreach($departamentos as $depto)
          {
            $deptosDelOperador[]=$depto->getDepartamentoId();
          }      
                
          $prioridades = $ticket = $em->getRepository('Modelo\Prioridad')->findAll();
          $fecha=new \DateTime("now");
          foreach ($prioridades as $prioridad) {
            $labels[]=$prioridad->getNombre();
            $qb=$em->createQueryBuilder();
                   $qb->select('t.ultimaActividad')
                   ->from('Modelo\Ticket','t')
                   ->where('t.asignadoAOperador = :id')
                   ->Andwhere('t.ultimaActividad LIKE :date')
                   ->Andwhere('t.prioridad = :prioridad')
                   ->Andwhere('t.departamento IN (:depto)')
                   ->setParameter('id',$app->getOperador()->getOperadorId())
                   ->setParameter('date', $fecha->format('Y-m').'%')
                   ->setParameter('prioridad',$prioridad)
                   ->setParameter('depto',$deptosDelOperador);
            $cantidadporPrioridad[]=count($qb->getQuery()->getResult());
          }
          
          $datasets=array("label"=>"Prioridad de ticket asignados por mes"
                           ,'fillColor' => "rgba(220,220,220,0.2)"
                           , 'strokeColor' => "rgba(220,220,220,1)"
                           , 'pointColor' => "rgba(220,220,220,1)"
                           , 'pointStrokeColor' => "#fff"
                           , 'pointHighlightFill' => "#fff"
                           , 'pointHighlightStroke' => "rgba(220,220,220,1)"
                           , 'data'=>$cantidadporPrioridad);
                          
            $respuesta=array("labels"=>$labels,"datasets"=>array($datasets));

             
            echo json_encode($respuesta);
            break;
        case strtolower('w-ticketsSinCerrar'):
              $estados=($em->getRepository('Modelo\TicketEstado')->findByEstadofinal('0'));
              $cantidadSinCerrar=count($em->getRepository('Modelo\Ticket')->findBy(array("estado"=>$estados)));
              echo $cantidadSinCerrar;
            break;
        case strtolower('w-ticketsAsignados'):
              $estados=($em->getRepository('Modelo\TicketEstado')->findByEstadofinal('0'));
              $operador=$app->getOperador();
              $cantidadAsignados=count($em->getRepository('Modelo\Ticket')->findBy(array("asignadoAOperador"=>$operador,"estado"=>$estados)));
              echo $cantidadAsignados;
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
          $estados=($em->getRepository('Modelo\TicketEstado')->findAll());
          $departamentos=$em->getRepository('Modelo\Operador')->find($app->getOperador()->getOperadorId())->getDepartamento(); 
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