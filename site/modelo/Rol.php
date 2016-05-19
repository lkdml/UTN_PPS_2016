<?php



namespace Modelo;

/**
 * Rol
 *
 * @Table(name="rol", uniqueConstraints={@UniqueConstraint(name="nombre_UNIQUE", columns={"nombre"})})
 * @Entity
 */
class Rol
{
    /**
     * @var string
     *
     * @Column(name="nombre", type="string", length=45, nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $nombre;

    /**
     * @var string
     *
     * @Column(name="descripcion", type="string", length=45, nullable=false)
     */
    private $descripcion;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ManyToMany(targetEntity="Perfil", mappedBy="rolNombre")
     */
    private $perfil;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->perfil = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Rol
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
     * Add perfil
     *
     * @param \Perfil $perfil
     *
     * @return Rol
     */
    public function addPerfil(Perfil $perfil)
    {
        $this->perfil[] = $perfil;

        return $this;
    }

    /**
     * Remove perfil
     *
     * @param \Perfil $perfil
     */
    public function removePerfil(Perfil $perfil)
    {
        $this->perfil->removeElement($perfil);
    }

    /**
     * Get perfil
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPerfil()
    {
        return $this->perfil;
    }
}

