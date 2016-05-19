<?php



namespace Modelo;

/**
 * Empresa
 *
 * @Table(name="empresa")
 * @Entity
 */
class Empresa
{
    /**
     * @var integer
     *
     * @Column(name="empresa_id", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $empresaId;

    /**
     * @var string
     *
     * @Column(name="razon_social", type="string", length=45, nullable=false)
     */
    private $razonSocial;

    /**
     * @var string
     *
     * @Column(name="pais", type="string", length=45, nullable=false)
     */
    private $pais;

    /**
     * @var string
     *
     * @Column(name="direccion", type="string", length=45, nullable=false)
     */
    private $direccion;

    /**
     * @var string
     *
     * @Column(name="ciudad", type="string", length=45, nullable=true)
     */
    private $ciudad;

    /**
     * @var string
     *
     * @Column(name="codigo_postal", type="string", length=45, nullable=true)
     */
    private $codigoPostal;

    /**
     * @var string
     *
     * @Column(name="telefono", type="string", length=45, nullable=true)
     */
    private $telefono;

    /**
     * @var string
     *
     * @Column(name="web", type="string", length=45, nullable=true)
     */
    private $web;

    /**
     * @var \DateTime
     *
     * @Column(name="ultima_actualizacion", type="datetime", nullable=false)
     */
    private $ultimaActualizacion;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ManyToMany(targetEntity="Anuncio", inversedBy="empresa")
     * @JoinTable(name="anuncios_empresa",
     *   joinColumns={
     *     @JoinColumn(name="empresa_id", referencedColumnName="empresa_id")
     *   },
     *   inverseJoinColumns={
     *     @JoinColumn(name="anuncio_id", referencedColumnName="anuncio_id")
     *   }
     * )
     */
    private $anuncio;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->anuncio = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set razonSocial
     *
     * @param string $razonSocial
     *
     * @return Empresa
     */
    public function setRazonSocial($razonSocial)
    {
        $this->razonSocial = $razonSocial;

        return $this;
    }

    /**
     * Get razonSocial
     *
     * @return string
     */
    public function getRazonSocial()
    {
        return $this->razonSocial;
    }

    /**
     * Set pais
     *
     * @param string $pais
     *
     * @return Empresa
     */
    public function setPais($pais)
    {
        $this->pais = $pais;

        return $this;
    }

    /**
     * Get pais
     *
     * @return string
     */
    public function getPais()
    {
        return $this->pais;
    }

    /**
     * Set direccion
     *
     * @param string $direccion
     *
     * @return Empresa
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;

        return $this;
    }

    /**
     * Get direccion
     *
     * @return string
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * Set ciudad
     *
     * @param string $ciudad
     *
     * @return Empresa
     */
    public function setCiudad($ciudad)
    {
        $this->ciudad = $ciudad;

        return $this;
    }

    /**
     * Get ciudad
     *
     * @return string
     */
    public function getCiudad()
    {
        return $this->ciudad;
    }

    /**
     * Set codigoPostal
     *
     * @param string $codigoPostal
     *
     * @return Empresa
     */
    public function setCodigoPostal($codigoPostal)
    {
        $this->codigoPostal = $codigoPostal;

        return $this;
    }

    /**
     * Get codigoPostal
     *
     * @return string
     */
    public function getCodigoPostal()
    {
        return $this->codigoPostal;
    }

    /**
     * Set telefono
     *
     * @param string $telefono
     *
     * @return Empresa
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

        return $this;
    }

    /**
     * Get telefono
     *
     * @return string
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Set web
     *
     * @param string $web
     *
     * @return Empresa
     */
    public function setWeb($web)
    {
        $this->web = $web;

        return $this;
    }

    /**
     * Get web
     *
     * @return string
     */
    public function getWeb()
    {
        return $this->web;
    }

    /**
     * Set ultimaActualizacion
     *
     * @param \DateTime $ultimaActualizacion
     *
     * @return Empresa
     */
    public function setUltimaActualizacion($ultimaActualizacion)
    {
        $this->ultimaActualizacion = $ultimaActualizacion;

        return $this;
    }

    /**
     * Get ultimaActualizacion
     *
     * @return \DateTime
     */
    public function getUltimaActualizacion()
    {
        return $this->ultimaActualizacion;
    }

    /**
     * Add anuncio
     *
     * @param \Anuncio $anuncio
     *
     * @return Empresa
     */
    public function addAnuncio(Anuncio $anuncio)
    {
        $this->anuncio[] = $anuncio;

        return $this;
    }

    /**
     * Remove anuncio
     *
     * @param \Anuncio $anuncio
     */
    public function removeAnuncio(Anuncio $anuncio)
    {
        $this->anuncio->removeElement($anuncio);
    }

    /**
     * Get anuncio
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAnuncio()
    {
        return $this->anuncio;
    }
}

