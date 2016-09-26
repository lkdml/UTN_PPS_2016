<?php
namespace CORE\Controlador;
use \CORE\Controlador\Entity_Repository as Entity_Repository;
use \Modelo\SlaCondicion as SlaCondicion;
use \Modelo\SlaParametro as SlaParametro;
use \Modelo\SlaSlasCondiciones as SlaSlasCondiciones;
use \Modelo\Sla as Sla;
  /**
  * @author lkdml
  * @version Core 1.0
  * 
  * 
  */
  
class Sla {
    private $modeloSla;
    private $modeloSlaCondiciones;
    
    public function getModeloSla(){return $this->modeloSla;}
    public function getModeloSlaCondiciones(){return $this->modeloSlaCondiciones;}
    
    public function setModeloSla($modeloSla){ $this->modeloSla = $modeloSla;}
    public function setModeloSlaCondiciones($modeloSlaCondiciones){ $this->modeloSlaCondiciones = $modeloSlaCondiciones;}
    
    public function __construct(){
        $this->modeloSlaCondiciones = array();
    }
    
    public function __construct($id){
        $er = Entity_Repository::getInstancia();
        $this->modeloSla = $er->findById($id,'Modelo\Sla');
    }
    public function setearSlaConPOST($nombre,$descripcion,$boolean){
        $sla->setNombre($nombre);
        $sla->setDescripcion($descripcion); 
         if ($boolean)
        {
            $sla->setEstado(1);
        } else {
            $sla->setEstado(0);
        }
    }
    
    public function setearSlaCondicionesConPOST($idCondicion,$idParametro,$valor){
        if (isset($this->modeloSla)){
            $SlaSlaCondicion = new SlaSlasCondiciones();
            $er = Entity_Repository::getInstancia();
            $SlaSlaCondicion->setSla($this->getModeloSla());
            $SlaSlaCondicion->setSlaCondicion($er->findById($idCondicion,'Modelo\SlaCondicion'));
            $SlaSlaCondicion->setSlaParametro($er->findById($idParametro,'Modelo\SlaParametro'));
            $SlaSlaCondicion->setValor(json_encode($valor));
            array_push($this->modeloSlaCondiciones,$SlaSlaCondicion);
        } else {
            throw new Exception("Core\SLA: No se encuentra SLA");
        }
    }
    
    public function persistir(){
        $em = Entity_Manager::getInstancia()->getEntityManager();
        if (isset($this->modeloSla->getSlaId())){
          $em->persist($this->modeloSla);
          foreach ($this->modeloSlaCondiciones as $condicionSLA) {
              $em->persist($condicionSLA);
          }
          $em->flush();
        } else {
          //TODO: probar si funciona lo anterior
          var_dump($this);die;
        }
    }
    
    
    
    /*
  private $id;
  private $nombre;
  private $activo;
  private $descripcion;
  private $arrayPreCondiciones;
  private $arrayVenceCondiciones;
  private $arrayPostCondiciones;
  
  public function __construct(){
    $this->arrayPreCondiciones = array();
    $this->arrayVenceCondiciones=array();
    $this->arrayPostCondiciones = array();
  }
  
  public function getId(){return $this->id;}
  public function getNombre(){return $this->nombre;}
  public function getActivo(){return $this->activo;}
  public function getDescripcion(){return $this->descripcion;}
  public function getArrayPreCondciones(){return $this->arrayVenceCondiciones;}
  public function getArrayVenceCondciones(){return $this->arrayVenceCondiciones;}
  public function getArrayPostCondciones(){return $this->arrayPostCondiciones;}
  
  private function setId($id){ $this->id = $id;}
  public function setNombre($nombre){ $this->nombre = $nombre;}
  public function setActivo($boolean){ $this->activo = $boolean;}
  public function setDescripcion($desc){ $this->descripcion = $desc;}
  public function setArrayPreCondciones($arraPre){ $this->arrayPreCondiciones = $arrayPre;}
  public function setArrayVenceCondciones($arrayVence){ $this->arrayVenceCondiciones = $arrayVence;}
  public function setArrayPostCondciones($arrayPost){ $this->arrayPostCondiciones = $arrayPost;}
  public function addPreCondciones($pre){ $this->preCondiciones[] = $pre;}
  public function addVenceCondciones($vence){ $this->venceCondiciones[] = $vence;}
  public function addPostCondciones($post){ $this->postCondiciones[] = $post;}
  
  
  public function persistir(){
    if (isset($this->id)){
      
    } else {
      $Modelo_Sla = setear(new \Modelo\Sla());
      $condicionesDelSLA = procesarSLA($Modelo_Sla);
      $em->persist($Sla);
      foreach ($condicionesDelSLA as $condicionSLA) {
          $em->persist($condicionSLA);
      }
      $em->flush();
    }
  }
  
  
  private function procesarSLA(\Modelo\Sla $Modelo_Sla){
   $arraySlaSlasCondiciones = array();
   $eb = Entity_Repository::getInstancia();
    foreach ($this->arrayPreCondiciones as $precond) {
       if ($precondId != '-1') {
           $SlaCondicion =  $eb->getRepository('Modelo\SlaCondicion')->find($_POST['preCond'][$key]);
           $SlaParametro =  $eb->getRepository('Modelo\SlaParametro')->find($_POST['preParam'][$key]);
           $valor = json_encode($_POST['pre-valor-'][$key]);
           $nuevaCondicionSLA = setearSlaSlasCondiciones($sla,$SlaCondicion,$SlaParametro,$valor,$em);
           array_push($arraySlaSlasCondiciones,$nuevaCondicionSLA);    
       }
    }
    foreach ($_POST['venceCond'] as $key=>$venceCond) {
       if ($venceCond != '-1') {
           $SlaCondicion =  $em->getRepository('Modelo\SlaCondicion')->find($_POST['venceCond'][$key]);
           $SlaParametro =  $em->getRepository('Modelo\SlaParametro')->find($_POST['venceParam'][$key]);
           $valor = json_encode($_POST['vence-valor-'][$key]);
           $nuevaCondicionSLA = setearSlaSlasCondiciones($sla,$SlaCondicion,$SlaParametro,$valor,$em);
           array_push($arraySlaSlasCondiciones,$nuevaCondicionSLA);   
       }
    }
    foreach ($_POST['postCond'] as $key=>$venceCond) {
       if ($venceCond != '-1') {
            $SlaCondicion =  $em->getRepository('Modelo\SlaCondicion')->find($_POST['postCond'][$key]);
            $SlaParametro =  $em->getRepository('Modelo\SlaParametro')->find($_POST['postParam'][$key]);;
            $valor = json_encode($_POST['vence-valor-'][$key]);
            $nuevaCondicionSLA = setearSlaSlasCondiciones($sla,$SlaCondicion,$SlaParametro,$valor,$em);
            array_push($arraySlaSlasCondiciones,$nuevaCondicionSLA);   
       }
    }
    return $arraySlaSlasCondiciones;
  }
  */
}
?>