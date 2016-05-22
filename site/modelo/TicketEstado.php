<?php

namespace Modelo;

/**
 * TicketEstado
 *
 * @Table(name="ticket_estado")
 * @Entity
 */
class TicketEstado
{
    /**
     * @var integer
     *
     * @Column(name="estado_id", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $estadoId;

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
     * @Column(name="color", type="string", length=45, nullable=false)
     */
    private $color;

    /**
     * @var boolean
     *
     * @Column(name="autocierre", type="boolean", nullable=false)
     */
    private $autocierre;

    /**
     * @var integer
     *
     * @Column(name="orden", type="integer", nullable=true)
     */
    private $orden;


    /**
     * Get estadoId
     *
     * @return integer
     */
    public function getEstadoId()
    {
        return $this->estadoId;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return TicketEstado
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
     * @return TicketEstado
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
     * Set color
     *
     * @param string $color
     *
     * @return TicketEstado
     */
    public function setColor($color)
    {
        $this->color = $color;

        return $this;
    }

    /**
     * Get color
     *
     * @return string
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * Set autocierre
     *
     * @param boolean $autocierre
     *
     * @return TicketEstado
     */
    public function setAutocierre($autocierre)
    {
        $this->autocierre = $autocierre;

        return $this;
    }

    /**
     * Get autocierre
     *
     * @return boolean
     */
    public function getAutocierre()
    {
        return $this->autocierre;
    }

    /**
     * Set orden
     *
     * @param integer $orden
     *
     * @return TicketEstado
     */
    public function setOrden($orden)
    {
        $this->orden = $orden;

        return $this;
    }

    /**
     * Get orden
     *
     * @return integer
     */
    public function getOrden()
    {
        return $this->orden;
    }
}

