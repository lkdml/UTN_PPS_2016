<?php



namespace Modelo;

/**
 * Prioridades
 *
 * @Table(name="prioridades")
 * @Entity
 */
class Prioridades
{
    /**
     * @var integer
     *
     * @Column(name="prioridad_id", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $prioridadId;

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
     * @var string
     *
     * @Column(name="color", type="string", length=45, nullable=false)
     */
    private $color;

    /**
     * @var integer
     *
     * @Column(name="orden", type="integer", nullable=false)
     */
    private $orden;


    /**
     * Get prioridadId
     *
     * @return integer
     */
    public function getPrioridadId()
    {
        return $this->prioridadId;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Prioridades
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
     * @return Prioridades
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
     * @return Prioridades
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
     * Set orden
     *
     * @param integer $orden
     *
     * @return Prioridades
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

