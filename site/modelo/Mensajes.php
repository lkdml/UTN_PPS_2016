<?php



namespace Modelo;

/**
 * Mensajes
 *
 * @Table(name="mensajes", indexes={@Index(name="FK_mensajes_ticket_idx", columns={"ticket_id"})})
 * @Entity
 */
class Mensajes
{
    /**
     * @var integer
     *
     * @Column(name="mensaje_id", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="NONE")
     */
    private $mensajeId;

    /**
     * @var string
     *
     * @Column(name="Texto", type="string", length=245, nullable=false)
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
     * @var \Tickets
     *
     * @Id
     * @GeneratedValue(strategy="NONE")
     * @OneToOne(targetEntity="Tickets")
     * @JoinColumns({
     *   @JoinColumn(name="ticket_id", referencedColumnName="ticket_id")
     * })
     */
    private $ticket;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ManyToMany(targetEntity="Archivos", inversedBy="mensaje")
     * @JoinTable(name="mensajes_archivos",
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
     * Set mensajeId
     *
     * @param integer $mensajeId
     *
     * @return Mensajes
     */
    public function setMensajeId($mensajeId)
    {
        $this->mensajeId = $mensajeId;

        return $this;
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
     * @return Mensajes
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
     * @return Mensajes
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
     * @return Mensajes
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
     * @return Mensajes
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
     * @return Mensajes
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
     * @param \Tickets $ticket
     *
     * @return Mensajes
     */
    public function setTicket(Tickets $ticket)
    {
        $this->ticket = $ticket;

        return $this;
    }

    /**
     * Get ticket
     *
     * @return \Tickets
     */
    public function getTicket()
    {
        return $this->ticket;
    }

    /**
     * Add archivo
     *
     * @param \Archivos $archivo
     *
     * @return Mensajes
     */
    public function addArchivo(Archivos $archivo)
    {
        $this->archivo[] = $archivo;

        return $this;
    }

    /**
     * Remove archivo
     *
     * @param \Archivos $archivo
     */
    public function removeArchivo(Archivos $archivo)
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
}

