<?php



namespace Modelo;

/**
 * Departamento
 *
 * @Table(name="departamento")
 * @Entity
 */
class Departamento
{
    /**
     * @var integer
     *
     * @Column(name="departamento_id", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $departamentoId;

    /**
     * @var string
     *
     * @Column(name="nombre", type="string", length=45, nullable=false)
     */
    private $nombre;

    /**
     * @var string
     *
     * @Column(name="descripcion", type="string", length=45, nullable=false)
     */
    private $descripcion;

    /**
     * @var integer
     *
     * @Column(name="padre_depto_id", type="integer", nullable=true)
     */
    private $padreDeptoId;

    /**
     * @var integer
     *
     * @Column(name="visibilidad_usuario", type="smallint", nullable=false)
     */
    private $visibilidadUsuario;

    /**
     * @var integer
     *
     * @Column(name="orden", type="integer", nullable=false)
     */
    private $orden;

    /**
     * @var integer
     *
     * @Column(name="operador_default_id", type="integer", nullable=true)
     */
    private $operadorDefaultId;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ManyToMany(targetEntity="Operador", mappedBy="departamento")
     */
    private $operador;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->operador = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get departamentoId
     *
     * @return integer
     */
    public function getDepartamentoId()
    {
        return $this->departamentoId;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Departamento
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
     * @return Departamento
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
     * Set padreDeptoId
     *
     * @param integer $padreDeptoId
     *
     * @return Departamento
     */
    public function setPadreDeptoId($padreDeptoId)
    {
        $this->padreDeptoId = $padreDeptoId;

        return $this;
    }

    /**
     * Get padreDeptoId
     *
     * @return integer
     */
    public function getPadreDeptoId()
    {
        return $this->padreDeptoId;
    }

    /**
     * Set visibilidadUsuario
     *
     * @param integer $visibilidadUsuario
     *
     * @return Departamento
     */
    public function setVisibilidadUsuario($visibilidadUsuario)
    {
        $this->visibilidadUsuario = $visibilidadUsuario;

        return $this;
    }

    /**
     * Get visibilidadUsuario
     *
     * @return integer
     */
    public function getVisibilidadUsuario()
    {
        return $this->visibilidadUsuario;
    }

    /**
     * Set orden
     *
     * @param integer $orden
     *
     * @return Departamento
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

    /**
     * Set operadorDefaultId
     *
     * @param integer $operadorDefaultId
     *
     * @return Departamento
     */
    public function setOperadorDefaultId($operadorDefaultId)
    {
        $this->operadorDefaultId = $operadorDefaultId;

        return $this;
    }

    /**
     * Get operadorDefaultId
     *
     * @return integer
     */
    public function getOperadorDefaultId()
    {
        return $this->operadorDefaultId;
    }

    /**
     * Add operador
     *
     * @param \Operador $operador
     *
     * @return Departamento
     */
    public function addOperador(Operador $operador)
    {
        $this->operador[] = $operador;

        return $this;
    }

    /**
     * Remove operador
     *
     * @param \Operador $operador
     */
    public function removeOperador(Operador $operador)
    {
        $this->operador->removeElement($operador);
    }

    /**
     * Get operador
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getOperador()
    {
        return $this->operador;
    }
}

