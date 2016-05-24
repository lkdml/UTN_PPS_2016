<?php

namespace Modelo;

/**
 * Archivo
 *
 * @Table(name="archivo")
 * @Entity
 */
class Archivo
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
     * @ManyToMany(targetEntity="Mensaje", mappedBy="archivo")
     */
    private $mensaje;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ManyToMany(targetEntity="Ticket", inversedBy="archivoTicket")
     * @JoinTable(name="ticket_archivo",
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
     * @return Archivo
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
     * @return Archivo
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
     * @return Archivo
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
     * @return Archivo
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
     * @param \Mensaje $mensaje
     *
     * @return Archivo
     */
    public function addMensaje(Mensaje $mensaje)
    {
        $this->mensaje[] = $mensaje;

        return $this;
    }

    /**
     * Remove mensaje
     *
     * @param \Mensaje $mensaje
     */
    public function removeMensaje(Mensaje $mensaje)
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
     * @param \Ticket $ticket
     *
     * @return Archivo
     */
    public function addTicket(Ticket $ticket)
    {
        $this->ticket[] = $ticket;

        return $this;
    }

    /**
     * Remove ticket
     *
     * @param \Ticket $ticket
     */
    public function removeTicket(Ticket $ticket)
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

