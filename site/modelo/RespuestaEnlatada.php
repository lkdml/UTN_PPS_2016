<?php



namespace Modelo;

/**
 * RespuestaEnlatada
 *
 * @Table(name="respuesta_enlatada", indexes={@Index(name="FK_respuesta_enlatada_departamento_idx", columns={"departamento_id"})})
 * @Entity
 */
class RespuestaEnlatada
{
    /**
     * @var integer
     *
     * @Column(name="enlatado_id", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="NONE")
     */
    private $enlatadoId;

    /**
     * @var string
     *
     * @Column(name="respuesta", type="string", length=250, nullable=false)
     */
    private $respuesta;

    /**
     * @var integer
     *
     * @Column(name="operador_id", type="integer", nullable=true)
     */
    private $operadorId;

    /**
     * @var \Departamento
     *
     * @Id
     * @GeneratedValue(strategy="NONE")
     * @OneToOne(targetEntity="Departamento")
     * @JoinColumns({
     *   @JoinColumn(name="departamento_id", referencedColumnName="departamento_id")
     * })
     */
    private $departamento;


    /**
     * Set enlatadoId
     *
     * @param integer $enlatadoId
     *
     * @return RespuestaEnlatada
     */
    public function setEnlatadoId($enlatadoId)
    {
        $this->enlatadoId = $enlatadoId;

        return $this;
    }

    /**
     * Get enlatadoId
     *
     * @return integer
     */
    public function getEnlatadoId()
    {
        return $this->enlatadoId;
    }

    /**
     * Set respuesta
     *
     * @param string $respuesta
     *
     * @return RespuestaEnlatada
     */
    public function setRespuesta($respuesta)
    {
        $this->respuesta = $respuesta;

        return $this;
    }

    /**
     * Get respuesta
     *
     * @return string
     */
    public function getRespuesta()
    {
        return $this->respuesta;
    }

    /**
     * Set operadorId
     *
     * @param integer $operadorId
     *
     * @return RespuestaEnlatada
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
     * Set departamento
     *
     * @param \Departamento $departamento
     *
     * @return RespuestaEnlatada
     */
    public function setDepartamento(Departamento $departamento)
    {
        $this->departamento = $departamento;

        return $this;
    }

    /**
     * Get departamento
     *
     * @return \Departamento
     */
    public function getDepartamento()
    {
        return $this->departamento;
    }
}

