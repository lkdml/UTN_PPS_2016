<?php



namespace Modelo;

/**
 * Perfil
 *
 * @Table(name="perfil")
 * @Entity
 */
class Perfil
{
    /**
     * @var integer
     *
     * @Column(name="perfil_id", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $perfilId;

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
     * @var boolean
     *
     * @Column(name="estado", type="boolean", nullable=false)
     */
    private $estado;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ManyToMany(targetEntity="Rol", inversedBy="perfil")
     * @JoinTable(name="perfil_roles",
     *   joinColumns={
     *     @JoinColumn(name="perfil_id", referencedColumnName="perfil_id")
     *   },
     *   inverseJoinColumns={
     *     @JoinColumn(name="rol_nombre", referencedColumnName="nombre")
     *   }
     * )
     */
    private $rolNombre;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->rolNombre = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get perfilId
     *
     * @return integer
     */
    public function getPerfilId()
    {
        return $this->perfilId;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Perfil
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
     * @return Perfil
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
     * @return Perfil
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

    /**
     * Add rolNombre
     *
     * @param \Rol $rolNombre
     *
     * @return Perfil
     */
    public function addRolNombre(Rol $rolNombre)
    {
        $this->rolNombre[] = $rolNombre;

        return $this;
    }

    /**
     * Remove rolNombre
     *
     * @param \Rol $rolNombre
     */
    public function removeRolNombre(Rol $rolNombre)
    {
        $this->rolNombre->removeElement($rolNombre);
    }

    /**
     * Get rolNombre
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getRolNombre()
    {
        return $this->rolNombre;
    }
}

