<?php
namespace CORE\Controlador;

class Informes 
{
    private $em;
   
    public function __construct(){
        $this->em  = \CORE\Controlador\Entity_Manager::getInstancia()->getEntityManager();
    }
    
     /**
      * @param  el id del operador que tiene los tickets asignados  
      * 
      * @return JSON con la cantidad de tipo de ticket en el mes actual
     * */
    public function devolverTipoTicketMes($operadorId)
    {
        $departamentos= $this->em->getRepository('Modelo\Operador')->find($operadorId)->getDepartamento(); 
          foreach($departamentos as $depto)
          {
            $deptosDelOperador[]=$depto->getDepartamentoId();
          }
          $tipoTickets= $this->em->getRepository('Modelo\TicketTipo')->findAll();
          $fecha=new \DateTime("now");
          foreach ($tipoTickets as $ticket) {
            $labels[]=$ticket->getNombre();
            $qb= $this->em->createQueryBuilder();
                   $qb->select('t.ultimaActividad')
                   ->from('Modelo\Ticket','t')
                   ->where('t.asignadoAOperador = :id')
                   ->Andwhere('t.ultimaActividad LIKE :date')
                   ->Andwhere('t.tipoTicket = :tipoTicket')
                   ->Andwhere('t.departamento IN (:depto)')
                   ->setParameter('id',$operadorId)
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
            return json_encode($respuesta);
    }
    
    /**
     * @param  el id del operador que tiene los tickets asignados  
     * @return JSON con la cantidad de tickets por estado en el mes actual
     * */
    public function devolverEstadoTicketMes($operadorId)
    {
         $departamentos= $this->em->getRepository('Modelo\Operador')->find($operadorId)->getDepartamento(); 
            foreach($departamentos as $depto)
            {
              $deptosDelOperador[]=$depto->getDepartamentoId();
            }
            $estados = $ticket =  $this->em->getRepository('Modelo\TicketEstado')->findAll();
            $fecha=new \DateTime("now");
            foreach ($estados as $estado) {
              
              $qb= $this->em->createQueryBuilder();
                     $qb->select('t.ultimaActividad')
                     ->from('Modelo\Ticket','t')
                     ->where('t.asignadoAOperador = :id')
                     ->Andwhere('t.ultimaActividad LIKE :date')
                     ->Andwhere('t.estado = :estado')
                     ->Andwhere('t.departamento IN (:depto)')
                     ->setParameter('id',$operadorId)
                     ->setParameter('date', $fecha->format('Y-m').'%')
                     ->setParameter('estado',$estado)
                     ->setParameter('depto',$deptosDelOperador);
              $cantidad=count($qb->getQuery()->getResult());
              
              $datosChart[]=array('value'=>$cantidad,'color'=>$estado->getColor(),'highlight'=>$estado->getColor(),'label'=>$estado->getNombre());
            }
            return json_encode($datosChart);
    }
    
   /**
     * @param  el id del operador que tiene los tickets asignados  
     * @return JSON con la cantidad de tickets cerrados por cada mes en el año corriente
     * */
    public function devolverTicketsCerradosAnual($operadorId)
    {
         $estados=( $this->em->getRepository('Modelo\TicketEstado')->findByEstadofinal('1'));
            $fecha=new \DateTime("now");
            $qb= $this->em->createQueryBuilder();
             $qb->select('COUNT(t.ultimaActividad) AS Cantidad,substring(t.ultimaActividad,6,2) AS groupMes')
             ->from('Modelo\Ticket','t')
             ->where('t.asignadoAOperador = :id')
             ->Andwhere('t.estado IN (:estado)')
             ->Andwhere('t.ultimaActividad LIKE :date')
             ->setParameter('id',$operadorId)
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
            return json_encode($respuesta);
    }
    
  /**
     * @param  el id del operador que tiene los tickets asignados  
     * @return JSON con la cantidad de tickets por prioridad en el mes actual
     * */
    public function devolverTicketPrioridadMes($operadorId)
    {
        $departamentos= $this->em->getRepository('Modelo\Operador')->find($operadorId)->getDepartamento(); 
          foreach($departamentos as $depto)
          {
            $deptosDelOperador[]=$depto->getDepartamentoId();
          }      
                
          $prioridades = $ticket =  $this->em->getRepository('Modelo\Prioridad')->findAll();
          $fecha=new \DateTime("now");
          foreach ($prioridades as $prioridad) {
            $labels[]=$prioridad->getNombre();
            $qb= $this->em->createQueryBuilder();
                   $qb->select('t.ultimaActividad')
                   ->from('Modelo\Ticket','t')
                   ->where('t.asignadoAOperador = :id')
                   ->Andwhere('t.ultimaActividad LIKE :date')
                   ->Andwhere('t.prioridad = :prioridad')
                   ->Andwhere('t.departamento IN (:depto)')
                   ->setParameter('id',$operadorId)
                   ->setParameter('date', $fecha->format('Y-m').'%')
                   ->setParameter('prioridad',$prioridad)
                   ->setParameter('depto',$deptosDelOperador);
            $cantidadporPrioridad[]=count($qb->getQuery()->getResult());
          }
          
          $datasets=array("label"=>"Prioridad de ticket asignados por mes"
                           ,'fillColor' => "rgba(36, 168, 219, 0.9)"
                           , 'strokeColor' => "rgba(36, 168, 219, 0.9)"
                           , 'pointColor' => "rgba(36, 168, 219, 0.9)"
                           , 'pointStrokeColor' => "#fff"
                           , 'pointHighlightFill' => "#fff"
                           , 'pointHighlightStroke' => "rgba(220,220,220,1)"
                           , 'data'=>$cantidadporPrioridad);
                          
            $respuesta=array("labels"=>$labels,"datasets"=>array($datasets));

             
            return json_encode($respuesta);
    }
    
    /**
     * @return INT con la cantidad de tickets sin cerrar.
     * */
    public function devolverCantidadTicketsSinCerrar()
    {
        $estados=( $this->em->getRepository('Modelo\TicketEstado')->findByEstadofinal('0'));
        $cantidadSinCerrar=count( $this->em->getRepository('Modelo\Ticket')->findBy(array("estado"=>$estados)));
        return $cantidadSinCerrar;
    }
    
     /**
      * @param  el id del operador 
      * @return INT con la cantidad de tickets asignados al operador.
     * */
    public function devolverCantidadTicketsAsignados($operadorId)
    {
        $estados=( $this->em->getRepository('Modelo\TicketEstado')->findByEstadofinal('0'));
        $operador= $this->em->getRepository('Modelo\Operador')->find($operadorId);
        $cantidadAsignados=count( $this->em->getRepository('Modelo\Ticket')->findBy(array("asignadoAOperador"=>$operador,"estado"=>$estados)));
        return $cantidadAsignados;
    }
     /**
     * @return INT con la cantidad de usuarios
     * */
    public function devolverCantidadUsuarios()
    {
        $usuariosExistentes=count( $this->em->getRepository('Modelo\Usuario')->findAll());
        return $usuariosExistentes;
    }
    
     /**
      * @param  el id del operador 
      * @return INT con la cantidad de tickets cerrados en el mes corriente por el operador 
     * */
    public function devolverCantidadTicketCerradosMes($operadorId)
    {
        $fecha=new \DateTime("now");
              $estados=( $this->em->getRepository('Modelo\TicketEstado')->findByEstadofinal('1'));
              $qb= $this->em->createQueryBuilder();
                   $qb->select('t.ultimaActividad')
                   ->from('Modelo\Ticket','t')
                   ->where('t.asignadoAOperador = :id')
                   ->Andwhere('t.estado IN (:estado)')
                   ->Andwhere('t.ultimaActividad LIKE :date')
                   ->setParameter('id',$operadorId)
                   ->setParameter('estado',$estados)
                   ->setParameter('date', $fecha->format('Y-m').'%');
        $ticketCerrados = count($qb->getQuery()->getResult());
        return $ticketCerrados;
    }
    
     /**
      * @param  el id del operador 
      * @param  true/false si son los tickets asignados al operador del parametro 1, o son todos los tickets que tiene visibilidad el operador segun los deptos habilitados
      * @return JSON que contiene todos los estados con la cantidad de ticket por estado que tiene asignado el operador
     * */
    public function devolverCantidadTicketsPorEstado($operadorId,$ticketsAsignados)
    {
        $estados=( $this->em->getRepository('Modelo\TicketEstado')->findAll());
        $departamentos= $this->em->getRepository('Modelo\Operador')->find($operadorId)->getDepartamento(); 
        foreach($departamentos as $depto)
        {
            $deptosDelOperador[]=$depto->getDepartamentoId();
        }
          
        foreach($estados as $estado)
        {
            if ($ticketsAsignados== true)
            {
                $cantidad= count( $this->em->getRepository('Modelo\Ticket')->createQueryBuilder('t')
                                         ->where('t.asignadoAOperador = :id')
                                         ->Andwhere('t.estado = :estado')
                                         ->Andwhere('t.departamento IN (:depto)')
                                         ->setParameter('id',$operadorId)
                                         ->setParameter('estado',$estado->getEstadoId())
                                         ->setParameter('depto',$deptosDelOperador)
                                         ->getQuery()
                                         ->getResult());
            }
            else
            {
                $cantidad= count( $this->em->getRepository('Modelo\Ticket')->createQueryBuilder('t')
                                 ->Andwhere('t.estado = :estado')
                                 ->Andwhere('t.departamento IN (:depto)')
                                 ->setParameter('estado',$estado->getEstadoId())
                                 ->setParameter('depto',$deptosDelOperador)
                                 ->getQuery()
                                 ->getResult());
            }
            $data[]=array('nombre'=>$estado->getNombre(),'icono'=>$estado->getIcono(),'color'=>$estado->getColor(),'cantidad'=>$cantidad,'id'=>$estado->getEstadoId());
        }
         
          
        return json_encode($data);
       
    }
    
    /**
      * @param  el id del operador 
      * @return JSON que contiene la cantidad de ticket por departamento que tenga habilitado el operador
     * */
    public function devolverCantidadTicketsPorDepartamento($operadorId)
    {
        $departamentos= $this->em->getRepository('Modelo\Operador')->find($operadorId)->getDepartamento();

          $estados= $this->em->getRepository('Modelo\TicketEstado')->findAll();
          foreach($departamentos as $depto)
          {
              unset($dataDepto);
              foreach($estados as $estado)
              {
                 $cantidad= count( $this->em->getRepository('Modelo\Ticket')->createQueryBuilder('t')
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
          return json_encode($lateralDepto);
    }
    
    /**
      * @return JSON que contiene la cantidad de usuarios por empresa que existen en las fechas indicadas
     * */
    public function usuariosPorEmpresa()
    {
       $empresas=$this->em->getRepository('Modelo\Empresa')->findAll();
       foreach($empresas as $empresa)
       {
           $qb= $this->em->createQueryBuilder();
           $qb->select('t.usuarioId')
                ->from('Modelo\Usuario','t')
                ->where('t.empresa = :empresa')
                ->setParameter('empresa',$empresa->getEmpresaId());
            
            $cantidadUsuarios = count($qb->getQuery()->getResult());
            $color = $this->rand_color();
            
            $datosChart[]=array('value'=>$cantidadUsuarios,'color'=>$color,'highlight'=>$color,'label'=>$empresa->getRazonSocial());       
       }
       return json_encode($datosChart);
    }
    
    /**
      * @param  fecha desde
      * @param  fecha hasta
      * @return JSON que contiene la cantidad de tickets por empresa que existen en las fechas indicadas
     * */
    public function ticketsPorEmpresa($desde,$hasta)
    {
       $empresas=$this->em->getRepository('Modelo\Empresa')->findAll();
       
       foreach($empresas as $empresa)
       {
           $usuariosPorEmpresa=$this->em->getRepository('Modelo\Usuario')->findByempresa($empresa->getEmpresaId());
           $qb= $this->em->createQueryBuilder();
           $qb->select('t.ticketId')
                ->from('Modelo\Ticket','t')
                ->where('t.usuario IN (:usuariosEmpresa)')
                ->Andwhere('t.fechaCreacion >= :desde')
                ->Andwhere('t.fechaCreacion <= :hasta')
                ->setParameter('usuariosEmpresa',$usuariosPorEmpresa)
                ->setParameter('desde',$desde)
                ->setParameter('hasta',$hasta);
            
            $cantidad = count($qb->getQuery()->getResult());
            $color = $this->rand_color();
            
            $datosChart[]=array('value'=>$cantidad,'color'=>$color,'highlight'=>$color,'label'=>$empresa->getRazonSocial());       
       }
       return json_encode($datosChart);
    }
    
    /**
      * @param  fecha desde
      * @param  fecha hasta
      * @param  empresa elegida o -1 para todas las empresas
      * @param  estado elegido para el reporte
      * @return JSON que contiene la cantidad de tickets por empresa y por estado que existen en las fechas indicadas
     * */
    public function devolverTicketsPorEstadoPorEmpresa($desde,$hasta,$est,$emp)
    {
        $estado=$this->em->getRepository('Modelo\TicketEstado')->find($est);
        $empresa=$this->em->getRepository('Modelo\Empresa')->find($emp);
       
        $usuariosPorEmpresa=$this->em->getRepository('Modelo\Usuario')->findBy(array("empresa"=>$empresa));
        $qb= $this->em->createQueryBuilder();
         $qb->select('COUNT(t.fechaCreacion) AS Cantidad,substring(t.fechaCreacion,6,2) AS groupMes')
         ->from('Modelo\Ticket','t')
         ->where('t.estado = :estado')
         ->Andwhere('t.usuario IN (:usuariosEmpresa)')
         ->Andwhere('t.fechaCreacion >= :desde')
         ->Andwhere('t.fechaCreacion <= :hasta')
         ->setParameter('estado',$estado)
         ->setParameter('usuariosEmpresa',$usuariosPorEmpresa)
         ->setParameter('desde',$desde)
         ->setParameter('hasta',$hasta)
         ->groupBy('groupMes');
          
         $resultado=$qb->getQuery()->getResult();
          
         for ($i = 1; $i < 13; $i++) {
            $cantidadMes[$i]=0;
         }
         for ($i = 0; $i < count($resultado); $i++) {
            $cantidadMes[intval($resultado[$i][groupMes])]=intval($resultado[$i][Cantidad]);
         }
            
        $labels=array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
        
        $datasets=array("label"=>"Cantidad de Tickets",
                        "fillColor"=>"rgba(210, 214, 222, 1)",
                        "strokeColor"=>"rgba(210, 214, 222, 1)",
                        "pointColor"=>"rgba(210, 214, 222, 1)",
                        "pointStrokeColor"=>"#c1c7d1",
                        "pointHighlightFill"=>"#fff",
                        "pointHighlightStroke"=>"rgba(220,220,220,1)",
                        "data"=>array_values($cantidadMes));
                        
        $respuesta=array("labels"=>$labels,"datasets"=>array($datasets));
        return json_encode($respuesta);
    }
    
    public function devolverTicketsPorDepartamento($desde,$hasta,$deptos)
    {
        $departamentos=array();
        
        if (intval($deptos) < 0)
        {
            $departamentos=$this->em->getRepository('Modelo\Departamento')->findAll();
        }else
        {
            $departamentos=array($this->em->getRepository('Modelo\Departamento')->find($deptos));
        }
        
       
        foreach($departamentos as $depto)
        {
            $labels[]=$depto->getNombre();
            $qb= $this->em->createQueryBuilder();
                    $qb->select('t.ticketId')
                    ->from('Modelo\Ticket','t')
                    ->where('t.departamento = :depto')
                    ->Andwhere('t.fechaCreacion >= :desde')
                    ->Andwhere('t.fechaCreacion <= :hasta')
                    ->setParameter('depto',$depto)
                    ->setParameter('desde',$desde)
                    ->setParameter('hasta',$hasta);

            $cantidadporDepto[]=count($qb->getQuery()->getResult());
        }

          $datasets=array("label"=>"Cantidad de Tickets",
                          "fillColor"=>"rgba(60,141,188,0.9)",
                          "strokeColor"=>"rgba(60,141,188,0.8)",
                          "pointColor"=>"#3b8bba",
                          "pointStrokeColor"=>"rgba(60,141,188,1)",
                          "pointHighlightFill"=>"#fff",
                          "pointHighlightStroke"=>"rgba(60,141,188,1)",
                          "data"=>$cantidadporDepto);
                          
            $respuesta=array("labels"=>$labels,"datasets"=>array($datasets));
            return json_encode($respuesta);
    }
    
    public function devolverTicketsPorPrioridad($desde,$hasta)
    {
        $prioridades = $ticket =  $this->em->getRepository('Modelo\Prioridad')->findAll();
       
       foreach($prioridades as $prioridad)
       {
           $qb= $this->em->createQueryBuilder();
           $qb->select('t.ticketId')
                ->from('Modelo\Ticket','t')
                ->where('t.prioridad = :prioridad')
                ->Andwhere('t.fechaCreacion >= :desde')
                ->Andwhere('t.fechaCreacion <= :hasta')
                ->setParameter('prioridad',$prioridad)
                ->setParameter('desde',$desde)
                ->setParameter('hasta',$hasta);
            
            $cantidad = count($qb->getQuery()->getResult());

            $datosChart[]=array('value'=>$cantidad,'color'=>$prioridad->getColor(),'highlight'=>$prioridad->getColor(),'label'=>$prioridad->getNombre());       
       }
       return json_encode($datosChart);

    }
    
    /**
      * @return string con un color random en forma Hex
     * */
    private function rand_color() 
    {
        return sprintf('#%06X', mt_rand(0, 0xFFFFFF));
    }

    
    
    
    
}