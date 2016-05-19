<?php



namespace Modelo;

/**
 * ConfiguracionGlobal
 *
 * @Table(name="configuracion_global")
 * @Entity
 */
class ConfiguracionGlobal
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
     * @Column(name="valor", type="text", nullable=false)
     */
    private $valor;


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
     * Set valor
     *
     * @param string $valor
     *
     * @return ConfiguracionGlobal
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
}

