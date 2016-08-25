<?php

namespace Modelo;

/**
 * LogModificacionTicket
 *
 * @Table(name="log_modificacion_ticket", indexes={@Index(name="fk_ticket_log_idx", columns={"ticket_id"})})
 * @Entity
 */
class LogModificacionTicket
{
    /**
     * @var integer
     *
     * @Column(name="log_id", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $logId;

    /**
     * @var string
     *
     * @Column(name="responsable", type="string", length=245, nullable=false)
     */
    private $responsable;

    /**
     * @var integer
     *
     * @Column(name="usuario_id", type="integer", nullable=true)
     */
    private $usuarioId;

    /**
     * @var integer
     *
     * @Column(name="operador_id", type="integer", nullable=true)
     */
    private $operadorId;

    /**
     * @var integer
     *
     * @Column(name="sla_id", type="integer", nullable=true)
     */
    private $slaId;

    /**
     * @var string
     *
     * @Column(name="accion", type="string", length=245, nullable=true)
     */
    private $accion;

    /**
     * @var \DateTime
     *
     * @Column(name="fecha", type="datetime", nullable=false)
     */
    private $fecha;

    /**
     * @var \Ticket
     *
     * @ManyToOne(targetEntity="Ticket")
     * @JoinColumns({
     *  @JoinColumn(name="ticket_id", referencedColumnName="ticket_id")
     * })
     */
    private $ticket;


    /**
     * Get logId
     *
     * @return integer
     */
    public function getLogId()
    {
        return $this->logId;
    }

    /**
     * Set responsable
     *
     * @param string $responsable
     *
     * @return LogModificacionTicket
     */
    public function setResponsable($responsable)
    {
        $this->responsable = $responsable;

        return $this;
    }

    /**
     * Get responsable
     *
     * @return string
     */
    public function getResponsable()
    {
        return $this->responsable;
    }

    /**
     * Set usuarioId
     *
     * @param integer $usuarioId
     *
     * @return LogModificacionTicket
     */
    public function setUsuarioId($usuarioId)
    {
        $this->usuarioId = $usuarioId;

        return $this;
    }

    /**
     * Get usuarioId
     *
     * @return integer
     */
    public function getUsuarioId()
    {
        return $this->usuarioId;
    }

    /**
     * Set operadorId
     *
     * @param integer $operadorId
     *
     * @return LogModificacionTicket
     */
    public function setOperadorId($operadorId)
    {
        $this->operadorId = $operadorId;

        return $this;
    }

    /**
     * Get operadorId
     *
     * @return integer
     */
    public function getOperadorId()
    {
        return $this->operadorId;
    }

    /**
     * Set slaId
     *
     * @param integer $slaId
     *
     * @return LogModificacionTicket
     */
    public function setSlaId($slaId)
    {
        $this->slaId = $slaId;

        return $this;
    }

    /**
     * Get slaId
     *
     * @return integer
     */
    public function getSlaId()
    {
        return $this->slaId;
    }

    /**
     * Set accion
     *
     * @param string $accion
     *
     * @return LogModificacionTicket
     */
    public function setAccion($accion)
    {
        $this->accion = $accion;

        return $this;
    }

    /**
     * Get accion
     *
     * @return string
     */
    public function getAccion()
    {
        return $this->accion;
    }

    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     *
     * @return LogModificacionTicket
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
     * Set ticket
     *
     * @param Ticket $ticket
     *
     * @return LogModificacionTicket
     */
    public function setTicket(Ticket $ticket = null)
    {
        $this->ticket = $ticket;

        return $this;
    }

    /**
     * Get ticket
     *
     * @return Ticket
     */
    public function getTicket()
    {
        return $this->ticket;
    }
}

