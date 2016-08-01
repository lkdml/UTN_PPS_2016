<?php

namespace Modelo;

/**
 * SlaCondicion
 *
 * @Table(name="sla_condicion")
 * @Entity
 */
class SlaCondicion
{
    /**
     * @var integer
     *
     * @Column(name="sla_condicion_ID", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $slaCondicionId;

    /**
     * @var string
     *
     * @Column(name="Nombre", type="string", length=45, nullable=false)
     */
    private $nombre;

    /**
     * @var string
     *
     * @Column(name="Descripcion", type="string", length=45, nullable=true)
     */
    private $descripcion;

    /**
     * @var string
     *
     * @Column(name="tipo", type="string", nullable=false)
     */
    private $tipo;

    /**
     * @var string
     *
     * @Column(name="custom_fields_type", type="string", length=500, nullable=false)
     */
    private $customFieldsType;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ManyToMany(targetEntity="SlaParametro", inversedBy="slaCondicion")
     * @JoinTable(name="sla_condicion_parametros",
     *   joinColumns={
     *     @JoinColumn(name="sla_condicion_ID", referencedColumnName="sla_condicion_ID")
     *   },
     *   inverseJoinColumns={
     *     @JoinColumn(name="sla_parametro_ID", referencedColumnName="sla_parametro_ID")
     *   }
     * )
     */
    private $slaParametro;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->slaParametro = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get slaCondicionId
     *
     * @return integer
     */
    public function getSlaCondicionId()
    {
        return $this->slaCondicionId;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return SlaCondicion
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
     * @return SlaCondicion
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
     * Set tipo
     *
     * @param string $tipo
     *
     * @return SlaCondicion
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * Get tipo
     *
     * @return string
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Set customFieldsType
     *
     * @param string $customFieldsType
     *
     * @return SlaCondicion
     */
    public function setCustomFieldsType($customFieldsType)
    {
        $this->customFieldsType = $customFieldsType;

        return $this;
    }

    /**
     * Get customFieldsType
     *
     * @return string
     */
    public function getCustomFieldsType()
    {
        return $this->customFieldsType;
    }

    /**
     * Add slaParametro
     *
     * @param \SlaParametro $slaParametro
     *
     * @return SlaCondicion
     */
    public function addSlaParametro(SlaParametro $slaParametro)
    {
        $this->slaParametro[] = $slaParametro;

        return $this;
    }

    /**
     * Remove slaParametro
     *
     * @param \SlaParametro $slaParametro
     */
    public function removeSlaParametro(SlaParametro $slaParametro)
    {
        $this->slaParametro->removeElement($slaParametro);
    }

    /**
     * Get slaParametro
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSlaParametro()
    {
        return $this->slaParametro;
    }
}

