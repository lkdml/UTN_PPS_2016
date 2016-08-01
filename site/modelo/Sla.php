<?php

namespace Modelo;

/**
 * Sla
 *
 * @Table(name="sla")
 * @Entity
 */
class Sla
{
    /**
     * @var integer
     *
     * @Column(name="sla_ID", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $slaId;

    /**
     * @var string
     *
     * @Column(name="Nombre", type="string", length=45, nullable=false)
     */
    private $nombre;

    /**
     * @var string
     *
     * @Column(name="Descripcion", type="string", length=45, nullable=false)
     */
    private $descripcion;

    /**
     * @var boolean
     *
     * @Column(name="Estado", type="boolean", nullable=false)
     */
    private $estado;


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
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Sla
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
     * @return Sla
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
     * Set estado
     *
     * @param boolean $estado
     *
     * @return Sla
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get estado
     *
     * @return boolean
     */
    public function getEstado()
    {
        return $this->estado;
    }
}

