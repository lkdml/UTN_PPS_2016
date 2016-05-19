<?php



namespace Modelo;

/**
 * Archivos
 *
 * @Table(name="archivos")
 * @Entity
 */
class Archivos
{
    /**
     * @var integer
     *
     * @Column(name="archivo_id", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $archivoId;

    /**
     * @var string
     *
     * @Column(name="nombre", type="string", length=45, nullable=false)
     */
    private $nombre;

    /**
     * @var string
     *
     * @Column(name="Hash", type="string", length=45, nullable=false)
     */
    private $hash;

    /**
     * @var \DateTime
     *
     * @Column(name="fecha_creacion", type="datetime", nullable=false)
     */
    private $fechaCreacion;

    /**
     * @var string
     *
     * @Column(name="directorio", type="string", length=45, nullable=false)
     */
    private $directorio;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ManyToMany(targetEntity="Mensajes", mappedBy="archivo")
     */
    private $mensaje;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ManyToMany(targetEntity="Tickets", inversedBy="archivoTicket")
     * @JoinTable(name="ticket_archivos",
     *   joinColumns={
     *     @JoinColumn(name="archivo_ticket_id", referencedColumnName="archivo_id")
     *   },
     *   inverseJoinColumns={
     *     @JoinColumn(name="ticket_id", referencedColumnName="ticket_id")
     *   }
     * )
     */
    private $ticket;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->mensaje = new \Doctrine\Common\Collections\ArrayCollection();
        $this->ticket = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get archivoId
     *
     * @return integer
     */
    public function getArchivoId()
    {
        return $this->archivoId;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Archivos
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set hash
     *
     * @param string $hash
     *
     * @return Archivos
     */
    public function setHash($hash)
    {
        $this->hash = $hash;

        return $this;
    }

    /**
     * Get hash
     *
     * @return string
     */
    public function getHash()
    {
        return $this->hash;
    }

    /**
     * Set fechaCreacion
     *
     * @param \DateTime $fechaCreacion
     *
     * @return Archivos
     */
    public function setFechaCreacion($fechaCreacion)
    {
        $this->fechaCreacion = $fechaCreacion;

        return $this;
    }

    /**
     * Get fechaCreacion
     *
     * @return \DateTime
     */
    public function getFechaCreacion()
    {
        return $this->fechaCreacion;
    }

    /**
     * Set directorio
     *
     * @param string $directorio
     *
     * @return Archivos
     */
    public function setDirectorio($directorio)
    {
        $this->directorio = $directorio;

        return $this;
    }

    /**
     * Get directorio
     *
     * @return string
     */
    public function getDirectorio()
    {
        return $this->directorio;
    }

    /**
     * Add mensaje
     *
     * @param \Mensajes $mensaje
     *
     * @return Archivos
     */
    public function addMensaje(Mensajes $mensaje)
    {
        $this->mensaje[] = $mensaje;

        return $this;
    }

    /**
     * Remove mensaje
     *
     * @param \Mensajes $mensaje
     */
    public function removeMensaje(Mensajes $mensaje)
    {
        $this->mensaje->removeElement($mensaje);
    }

    /**
     * Get mensaje
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMensaje()
    {
        return $this->mensaje;
    }

    /**
     * Add ticket
     *
     * @param \Tickets $ticket
     *
     * @return Archivos
     */
    public function addTicket(Tickets $ticket)
    {
        $this->ticket[] = $ticket;

        return $this;
    }

    /**
     * Remove ticket
     *
     * @param \Tickets $ticket
     */
    public function removeTicket(Tickets $ticket)
    {
        $this->ticket->removeElement($ticket);
    }

    /**
     * Get ticket
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTicket()
    {
        return $this->ticket;
    }
}

