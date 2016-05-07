<?php
  namespace Modelo;
/**
 * @Entity @Table(name="Archivos")
 **/
class Archivos {
    /** 
      * @Id @Column(type="integer") @GeneratedValue 
      * @var int
      */
    protected $Archivo_ID;
    
    /**
     * @Column(type="string")
     * @var string
     */
    protected $Nombre;
    
     /**
     * @Column(type="string")
     * @var string
     */
 	protected $Hash;
    
    /**
     * @Column(type="datetime")
     * @var datetime
     */
    protected $Fecha_Creacion;
    
    /**
     * @Column(type="string")
     * @var string
     */
    protected $Directorio;
    
    
    public function getArchivo_ID(){return $this->Archivo_ID;}
    public function getHash(){return $this->Hash;}
    public function getNombre(){return $this->Nombre;}
    public function getFecha_Creacion(){return $this->Fecha_Creacion;}
    public function getDirectorio(){return $this->Directorio;}

    public function setHash($hash){$this->Tipo = $hash;}
    public function setNombre($nombre){$this->Nombre =$nombre;}
    public function setFecha_Creacion($fecha){$this->Fecha_Creacion =$fecha;}
    public function setDirectorio($path){$this->Directorio =$path;}
    
}

?>