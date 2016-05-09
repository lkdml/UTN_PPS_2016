<?php
  namespace Modelo;
/**
 * @Entity @Table(name="Email_Queue")
 **/
class Email_Queue {
    /** 
      * @Id @Column(type="integer") @GeneratedValue 
      * @var int
      */
    protected $Queue_ID;
    
    /**
     * @Column(type="string")
     * @var string
     */
    protected $Destinatario;
    
    /**
     * @Column(type="string")
     * @var string
     */
    protected $Remitente;
    
    /**
     * @Column(type="string")
     * @var string
     */
    protected $Contenido;
    
    /**
     * @Column(type="string")
     * @var string
     */
    protected $Asunto;
    
    /**
     * @Column(type="boolean")
     * @var boolean
     */
    protected $Estado;
    
     /**
     * @Column(type="datetime")
     * @var datetime
     */
    protected $Fecha_Envio;
    
    
    public function getQueue_ID(){return $this->Queue_ID;}
    public function getDestinatario(){return $this->Destinatario;}
    public function getRemitente(){return $this->Remitente;}
    public function getTexto(){return $this->Texto;}
    public function getAsunto(){return $this->Asunto;}
    public function getEstado(){return $this->Estado;}
    public function getFechaEnvio(){return $this->Fecha_Envio;}

    public function setDestinatario($destinatario){$this->Destinatario = $destinatario;}
    public function setRemitente($remitente){$this->Remitente =$remitente;}
    public function setContenido($texto){$this->Contenido =$texto;}
    public function setAsunto($asunto){$this->Asunto =$asunto;}
    public function setEstado($estado){$this->Estado =$estado;} 
    public function setFechaEnvio($fecha_envio){$this->Fecha_Envio =$fecha_envio;}
    
}

?>