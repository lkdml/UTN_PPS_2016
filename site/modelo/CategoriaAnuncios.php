<?php



namespace Modelo;

/**
 * CategoriaAnuncios
 *
 * @Table(name="categoria_anuncios")
 * @Entity
 */
class CategoriaAnuncios
{
    /**
     * @var integer
     *
     * @Column(name="categoria_id", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $categoriaId;

    /**
     * @var string
     *
     * @Column(name="nombre", type="string", length=45, nullable=false)
     */
    private $nombre;

    /**
     * @var string
     *
     * @Column(name="icono", type="string", length=15, nullable=true)
     */
    private $icono;


    /**
     * Get categoriaId
     *
     * @return integer
     */
    public function getCategoriaId()
    {
        return $this->categoriaId;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return CategoriaAnuncios
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
     * Set icono
     *
     * @param string $icono
     *
     * @return CategoriaAnuncios
     */
    public function setIcono($icono)
    {
        $this->icono = $icono;

        return $this;
    }

    /**
     * Get icono
     *
     * @return string
     */
    public function getIcono()
    {
        return $this->icono;
    }
}

