<?php



namespace Modelo;

/**
 * Anuncio
 *
 * @Table(name="anuncio", indexes={@Index(name="fk_anuncios_categoria_idx", columns={"categoria_id"})})
 * @Entity
 */
class Anuncio
{
    /**
     * @var integer
     *
     * @Column(name="anuncio_id", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="NONE")
     */
    private $anuncioId;

    /**
     * @var integer
     *
     * @Column(name="empresa_id", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="NONE")
     */
    private $empresaId;

    /**
     * @var string
     *
     * @Column(name="titulo", type="string", length=45, nullable=false)
     */
    private $titulo;

    /**
     * @var string
     *
     * @Column(name="contenido", type="string", length=250, nullable=false)
     */
    private $contenido;

    /**
     * @var \DateTime
     *
     * @Column(name="fecha_Creacion", type="datetime", nullable=false)
     */
    private $fechaCreacion;

    /**
     * @var boolean
     *
     * @Column(name="estado", type="boolean", nullable=false)
     */
    private $estado;

    /**
     * @var \DateTime
     *
     * @Column(name="fecha_fin_publicacion", type="datetime", nullable=true)
     */
    private $fechaFinPublicacion;

    /**
     * @var integer
     *
     * @Column(name="operador_id", type="integer", nullable=false)
     */
    private $operadorId;

    /**
     * @var \CategoriaAnuncios
     *
     * @Id
     * @GeneratedValue(strategy="NONE")
     * @OneToOne(targetEntity="CategoriaAnuncios")
     * @JoinColumns({
     *   @JoinColumn(name="categoria_id", referencedColumnName="categoria_id")
     * })
     */
    private $categoria;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ManyToMany(targetEntity="Empresa", mappedBy="anuncio")
     */
    private $empresa;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->empresa = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set anuncioId
     *
     * @param integer $anuncioId
     *
     * @return Anuncio
     */
    public function setAnuncioId($anuncioId)
    {
        $this->anuncioId = $anuncioId;

        return $this;
    }

    /**
     * Get anuncioId
     *
     * @return integer
     */
    public function getAnuncioId()
    {
        return $this->anuncioId;
    }

    /**
     * Set empresaId
     *
     * @param integer $empresaId
     *
     * @return Anuncio
     */
    public function setEmpresaId($empresaId)
    {
        $this->empresaId = $empresaId;

        return $this;
    }

    /**
     * Get empresaId
     *
     * @return integer
     */
    public function getEmpresaId()
    {
        return $this->empresaId;
    }

    /**
     * Set titulo
     *
     * @param string $titulo
     *
     * @return Anuncio
     */
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;

        return $this;
    }

    /**
     * Get titulo
     *
     * @return string
     */
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * Set contenido
     *
     * @param string $contenido
     *
     * @return Anuncio
     */
    public function setContenido($contenido)
    {
        $this->contenido = $contenido;

        return $this;
    }

    /**
     * Get contenido
     *
     * @return string
     */
    public function getContenido()
    {
        return $this->contenido;
    }

    /**
     * Set fechaCreacion
     *
     * @param \DateTime $fechaCreacion
     *
     * @return Anuncio
     */
    public function setFechaCreacion($fechaCreacion)
    {
        $this->fechaCreacion = $fechaCreacion;

        return $this;
    }

    /**
     * Get fechaCreacion
     *
     * @return \DateTime
     */
    public function getFechaCreacion()
    {
        return $this->fechaCreacion;
    }

    /**
     * Set estado
     *
     * @param boolean $estado
     *
     * @return Anuncio
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
     * Set fechaFinPublicacion
     *
     * @param \DateTime $fechaFinPublicacion
     *
     * @return Anuncio
     */
    public function setFechaFinPublicacion($fechaFinPublicacion)
    {
        $this->fechaFinPublicacion = $fechaFinPublicacion;

        return $this;
    }

    /**
     * Get fechaFinPublicacion
     *
     * @return \DateTime
     */
    public function getFechaFinPublicacion()
    {
        return $this->fechaFinPublicacion;
    }

    /**
     * Set operadorId
     *
     * @param integer $operadorId
     *
     * @return Anuncio
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
     * Set categoria
     *
     * @param \CategoriaAnuncios $categoria
     *
     * @return Anuncio
     */
    public function setCategoria(CategoriaAnuncios $categoria)
    {
        $this->categoria = $categoria;

        return $this;
    }

    /**
     * Get categoria
     *
     * @return \CategoriaAnuncios
     */
    public function getCategoria()
    {
        return $this->categoria;
    }

    /**
     * Add empresa
     *
     * @param \Empresa $empresa
     *
     * @return Anuncio
     */
    public function addEmpresa(Empresa $empresa)
    {
        $this->empresa[] = $empresa;

        return $this;
    }

    /**
     * Remove empresa
     *
     * @param \Empresa $empresa
     */
    public function removeEmpresa(Empresa $empresa)
    {
        $this->empresa->removeElement($empresa);
    }

    /**
     * Get empresa
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEmpresa()
    {
        return $this->empresa;
    }
}

