<?php

namespace Modelo;

/**
 * SlaSlasCondiciones
 *
 * @Table(name="sla_slas_condiciones", indexes={@Index(name="fk_sla_slas_condiciones_condicion", columns={"sla_condicion_ID"}), @Index(name="fk_sla_slas_condiciones_parametro", columns={"sla_parametro_ID"}), @Index(name="IDX_14AD621BD4C6CCAE", columns={"sla_ID"})})
 * @Entity
 */
class SlaSlasCondiciones
{
    /**
     * @var string
     *
     * @Column(name="valor", type="string", length=60, nullable=false)
     */
    private $valor;

    /**
     * @var \Sla
     *
     * @Id
     * @GeneratedValue(strategy="NONE")
     * @OneToOne(targetEntity="Sla")
     * @JoinColumns({
     *   @JoinColumn(name="sla_ID", referencedColumnName="sla_ID")
     * })
     */
    private $sla;

    /**
     * @var \SlaCondicion
     *
     * @Id
     * @GeneratedValue(strategy="NONE")
     * @OneToOne(targetEntity="SlaCondicion")
     * @JoinColumns({
     *   @JoinColumn(name="sla_condicion_ID", referencedColumnName="sla_condicion_ID")
     * })
     */
    private $slaCondicion;

    /**
     * @var \SlaParametro
     *
     * @Id
     * @GeneratedValue(strategy="NONE")
     * @OneToOne(targetEntity="SlaParametro")
     * @JoinColumns({
     *   @JoinColumn(name="sla_parametro_ID", referencedColumnName="sla_parametro_ID")
     * })
     */
    private $slaParametro;


    /**
     * Set valor
     *
     * @param string $valor
     *
     * @return SlaSlasCondiciones
     */
    public function setValor($valor)
    {
        $this->valor = $valor;

        return $this;
    }

    /**
     * Get valor
     *
     * @return string
     */
    public function getValor()
    {
        return $this->valor;
    }

    /**
     * Set sla
     *
     * @param \Sla $sla
     *
     * @return SlaSlasCondiciones
     */
    public function setSla(Sla $sla)
    {
        $this->sla = $sla;

        return $this;
    }

    /**
     * Get sla
     *
     * @return \Sla
     */
    public function getSla()
    {
        return $this->sla;
    }

    /**
     * Set slaCondicion
     *
     * @param \SlaCondicion $slaCondicion
     *
     * @return SlaSlasCondiciones
     */
    public function setSlaCondicion(SlaCondicion $slaCondicion)
    {
        $this->slaCondicion = $slaCondicion;

        return $this;
    }

    /**
     * Get slaCondicion
     *
     * @return \SlaCondicion
     */
    public function getSlaCondicion()
    {
        return $this->slaCondicion;
    }

    /**
     * Set slaParametro
     *
     * @param \SlaParametro $slaParametro
     *
     * @return SlaSlasCondiciones
     */
    public function setSlaParametro(SlaParametro $slaParametro)
    {
        $this->slaParametro = $slaParametro;

        return $this;
    }

    /**
     * Get slaParametro
     *
     * @return \SlaParametro
     */
    public function getSlaParametro()
    {
        return $this->slaParametro;
    }
}

