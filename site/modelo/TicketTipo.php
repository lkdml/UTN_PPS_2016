<?php


namespace Modelo;

/**
 * TicketTipo
 *
 * @Table(name="ticket_tipo", indexes={@Index(name="fk_ticket_tipo_ticket_estado_aperturaidx", columns={"estado_apertura"}), @Index(name="fk_ticket_tipo_ticket_estado_cierreidx", columns={"estado_cierre"})})
 * @Entity
 */
class TicketTipo
{
    /**
     * @var integer
     *
     * @Column(name="tipo_ticket_id", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $tipoTicketId;

    /**
     * @var string
     *
     * @Column(name="nombre", type="string", length=45, nullable=false)
     */
    private $nombre;

    /**
     * @var string
     *
     * @Column(name="descripcion", type="string", length=45, nullable=true)
     */
    private $descripcion;

    /**
     * @var string
     *
     * @Column(name="icono", type="string", length=60, nullable=true)
     */
    private $icono;

    /**
     * @var \TicketEstado
     *
     * @ManyToOne(targetEntity="TicketEstado")
     * @JoinColumns({
     *   @JoinColumn(name="estado_apertura", referencedColumnName="estado_id")
     * })
     */
    private $estadoApertura;

    /**
     * @var \TicketEstado
     *
     * @ManyToOne(targetEntity="TicketEstado")
     * @JoinColumns({
     *   @JoinColumn(name="estado_cierre", referencedColumnName="estado_id")
     * })
     */
    private $estadoCierre;


    /**
     * Get tipoTicketId
     *
     * @return integer
     */
    public function getTipoTicketId()
    {
        return $this->tipoTicketId;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return TicketTipo
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
     * Set descripcion
     *
     * @param string $descripcion
     *
     * @return TicketTipo
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set icono
     *
     * @param string $icono
     *
     * @return TicketTipo
     */
    public function setIcono($icono)
    {
        $this->icono = $icono;

        return $this;
    }

    /**
     * Get icono
     *
     * @return string
     */
    public function getIcono()
    {
        return $this->icono;
    }

    /**
     * Set estadoApertura
     *
     * @param \TicketEstado $estadoApertura
     *
     * @return TicketTipo
     */
    public function setEstadoApertura(TicketEstado $estadoApertura = null)
    {
        $this->estadoApertura = $estadoApertura;

        return $this;
    }

    /**
     * Get estadoApertura
     *
     * @return \TicketEstado
     */
    public function getEstadoApertura()
    {
        return $this->estadoApertura;
    }

    /**
     * Set estadoCierre
     *
     * @param \TicketEstado $estadoCierre
     *
     * @return TicketTipo
     */
    public function setEstadoCierre(TicketEstado $estadoCierre = null)
    {
        $this->estadoCierre = $estadoCierre;

        return $this;
    }

    /**
     * Get estadoCierre
     *
     * @return \TicketEstado
     */
    public function getEstadoCierre()
    {
        return $this->estadoCierre;
    }
}

