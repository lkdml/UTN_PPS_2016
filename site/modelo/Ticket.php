<?php
  namespace Modelo;
  
use Doctrine\Common\Collections\ArrayCollection;  
  
/**
 * @Entity @Table(name="Ticket")
 **/
class Ticket {
    /** 
      * @Id @Column(type="integer") @GeneratedValue 
      * @var string
      */
    protected $Ticket_ID;
    
   
   
    public function getTicket_ID(){return $this->Ticket_ID;}
    
    
    
    
}

?>
