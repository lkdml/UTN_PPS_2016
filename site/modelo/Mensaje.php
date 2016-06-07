<?php

namespace Modelo;

/**
 * Mensaje
 *
 * @Table(name="mensaje", indexes={@Index(name="FK_mensaje_ticket_idx", columns={"ticket_id"})})
 * @Entity
 */
class Mensaje
{
    /**
     * @var integer
     *
     * @Column(name="mensaje_id", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $mensajeId;

    /**
     * @var string
     *
     * @Column(name="Texto", type="string", length=245, nullable=true)
     */
    private $texto;

    /**
     * @var \DateTime
     *
     * @Column(name="fecha", type="datetime", nullable=false)
     */
    private $fecha;

    /**
     * @var integer
     *
     * @Column(name="tipo_mensaje", type="integer", nullable=false)
     */
    private $tipoMensaje;

    /**
     * @var integer
     *
     * @Column(name="creador_operador", type="integer", nullable=true)
     */
    private $creadorOperador;

    /**
     * @var integer
     *
     * @Column(name="creador_usuario", type="integer", nullable=true)
     */
    private $creadorUsuario;

    /**
     * @var \Ticket
     *
     * @ManyToOne(targetEntity="Ticket")
     * @JoinColumns({
     *   @JoinColumn(name="ticket_id", referencedColumnName="ticket_id")
     * })
     */
    private $ticket;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ManyToMany(targetEntity="Archivo", inversedBy="mensaje")
     * @JoinTable(name="mensaje_archivo",
     *   joinColumns={
     *     @JoinColumn(name="mensaje_id", referencedColumnName="mensaje_id")
     *   },
     *   inverseJoinColumns={
     *     @JoinColumn(name="archivo_id", referencedColumnName="archivo_id")
     *   }
     * )
     */
    private $archivo;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->archivo = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get mensajeId
     *
     * @return integer
     */
    public function getMensajeId()
    {
        return $this->mensajeId;
    }

    /**
     * Set texto
     *
     * @param string $texto
     *
     * @return Mensaje
     */
    public function setTexto($texto)
    {
        $this->texto = $texto;

        return $this;
    }

    /**
     * Get texto
     *
     * @return string
     */
    public function getTexto()
    {
        return $this->texto;
    }

    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     *
     * @return Mensaje
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get fecha
     *
     * @return \DateTime
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set tipoMensaje
     *
     * @param integer $tipoMensaje
     *
     * @return Mensaje
     */
    public function setTipoMensaje($tipoMensaje)
    {
        $this->tipoMensaje = $tipoMensaje;

        return $this;
    }

    /**
     * Get tipoMensaje
     *
     * @return integer
     */
    public function getTipoMensaje()
    {
        return $this->tipoMensaje;
    }

    /**
     * Set creadorOperador
     *
     * @param integer $creadorOperador
     *
     * @return Mensaje
     */
    public function setCreadorOperador($creadorOperador)
    {
        $this->creadorOperador = $creadorOperador;

        return $this;
    }

    /**
     * Get creadorOperador
     *
     * @return integer
     */
    public function getCreadorOperador()
    {
        return $this->creadorOperador;
    }

    /**
     * Set creadorUsuario
     *
     * @param integer $creadorUsuario
     *
     * @return Mensaje
     */
    public function setCreadorUsuario($creadorUsuario)
    {
        $this->creadorUsuario = $creadorUsuario;

        return $this;
    }

    /**
     * Get creadorUsuario
     *
     * @return integer
     */
    public function getCreadorUsuario()
    {
        return $this->creadorUsuario;
    }

    /**
     * Set ticket
     *
     * @param \Ticket $ticket
     *
     * @return Mensaje
     */
    public function setTicket(Ticket $ticket = null)
    {
        $this->ticket = $ticket;

        return $this;
    }

    /**
     * Get ticket
     *
     * @return \Ticket
     */
    public function getTicket()
    {
        return $this->ticket;
    }

    /**
     * Add archivo
     *
     * @param \Archivo $archivo
     *
     * @return Mensaje
     */
    public function addArchivo(Archivo $archivo)
    {
        $this->archivo[] = $archivo;

        return $this;
    }

    /**
     * Remove archivo
     *
     * @param \Archivo $archivo
     */
    public function removeArchivo(Archivo $archivo)
    {
        $this->archivo->removeElement($archivo);
    }

    /**
     * Get archivo
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getArchivo()
    {
        return $this->archivo;
    }
    
    public function getCreadorOperadorNombre() {
        $em = \CORE\Controlador\Entity_Manager::getInstancia()->getEntityManager();
        $oper = $em->getRepository('Modelo\Operador')->find($this->creadorOperador);
        $nombreCompleto = $oper->getNombre() ." " .$oper->getApellido(); 
        return $nombreCompleto;
    }
    
    public function getCreadorUsuarioNombre() {
        $em = \CORE\Controlador\Entity_Manager::getInstancia()->getEntityManager();
        $usr = $em->getRepository('Modelo\Usuario')->find($this->creadorUsuario);
        $nombreCompleto = $usr->getNombre() ." " .$usr->getApellido(); 
        return $nombreCompleto;
    }
}

