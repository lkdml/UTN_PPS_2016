<?php

namespace Modelo;

/**
 * LogModificacionTicket
 *
 * @Table(name="log_modificacion_ticket")
 * @Entity
 */
class LogModificacionTicket
{
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
     * @var string
     *
     * @Column(name="accion", type="string", length=245, nullable=true)
     */
    private $accion;

    /**
     * @var \DateTime
     *
     * @Column(name="fecha", type="datetime", nullable=true)
     */
    private $fecha;

    /**
     * @var \Ticket
     *
     * @Id
     * @GeneratedValue(strategy="NONE")
     * @OneToOne(targetEntity="Ticket")
     * @JoinColumns({
     *   @JoinColumn(name="ticket_id", referencedColumnName="ticket_id")
     * })
     */
    private $ticket;


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
     * @param \Ticket $ticket
     *
     * @return LogModificacionTicket
     */
    public function setTicket(Ticket $ticket)
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
}

