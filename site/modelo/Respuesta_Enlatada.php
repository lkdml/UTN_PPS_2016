<?php
  namespace Modelo;
/**
 * @Entity @Table(name="Respuesta_Enlatada")
 **/
class Respuesta_Enlatada {
    /** 
      * @Id @Column(type="integer") @GeneratedValue 
      * @var int
      */
    protected $Enlatado_ID;
    
    /**
     * @Column(type="string")
     * @var string
     */
    protected $Respuesta;
    /**
     * @ManyToOne(targetEntity="Departamento")
     * @JoinColumn(name="Departamento_ID", referencedColumnName="Departamento_ID")
     */
    protected $Departamento_ID;
    
    
    public function getEnlatado_ID(){return $this->Enlatado_ID;}
    public function getRespuesta(){return $this->Respuesta;}
    public function getDepartamento_ID(){return $this->Departamento_ID;}
    
    public function setRespuesta($rta){$this->Respuesta = $rta;}
    public function setDepartamento_ID($depto_id){$this->Departamento_ID =$depto_id;}
    
}

?>
