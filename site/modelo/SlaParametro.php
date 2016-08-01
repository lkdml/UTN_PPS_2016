<?php

namespace Modelo;

/**
 * SlaParametro
 *
 * @Table(name="sla_parametro")
 * @Entity
 */
class SlaParametro
{
    /**
     * @var integer
     *
     * @Column(name="sla_parametro_ID", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $slaParametroId;

    /**
     * @var string
     *
     * @Column(name="Descripcion", type="string", length=50, nullable=false)
     */
    private $descripcion;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ManyToMany(targetEntity="SlaCondicion", mappedBy="slaParametro")
     */
    private $slaCondicion;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->slaCondicion = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get slaParametroId
     *
     * @return integer
     */
    public function getSlaParametroId()
    {
        return $this->slaParametroId;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     *
     * @return SlaParametro
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
     * Add slaCondicion
     *
     * @param \SlaCondicion $slaCondicion
     *
     * @return SlaParametro
     */
    public function addSlaCondicion(SlaCondicion $slaCondicion)
    {
        $this->slaCondicion[] = $slaCondicion;

        return $this;
    }

    /**
     * Remove slaCondicion
     *
     * @param \SlaCondicion $slaCondicion
     */
    public function removeSlaCondicion(SlaCondicion $slaCondicion)
    {
        $this->slaCondicion->removeElement($slaCondicion);
    }

    /**
     * Get slaCondicion
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSlaCondicion()
    {
        return $this->slaCondicion;
    }
}

