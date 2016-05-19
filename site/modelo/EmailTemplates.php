<?php



namespace Modelo;

/**
 * EmailTemplates
 *
 * @Table(name="email_templates")
 * @Entity
 */
class EmailTemplates
{
    /**
     * @var integer
     *
     * @Column(name="email_id", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $emailId;

    /**
     * @var string
     *
     * @Column(name="tipo", type="string", length=45, nullable=false)
     */
    private $tipo;

    /**
     * @var string
     *
     * @Column(name="nombre", type="string", length=45, nullable=false)
     */
    private $nombre;

    /**
     * @var string
     *
     * @Column(name="texto", type="text", nullable=false)
     */
    private $texto;

    /**
     * @var string
     *
     * @Column(name="asunto", type="string", length=45, nullable=false)
     */
    private $asunto;


    /**
     * Get emailId
     *
     * @return integer
     */
    public function getEmailId()
    {
        return $this->emailId;
    }

    /**
     * Set tipo
     *
     * @param string $tipo
     *
     * @return EmailTemplates
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * Get tipo
     *
     * @return string
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return EmailTemplates
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
     * Set texto
     *
     * @param string $texto
     *
     * @return EmailTemplates
     */
    public function setTexto($texto)
    {
        $this->texto = $texto;

        return $this;
    }

    /**
     * Get texto
     *
     * @return string
     */
    public function getTexto()
    {
        return $this->texto;
    }

    /**
     * Set asunto
     *
     * @param string $asunto
     *
     * @return EmailTemplates
     */
    public function setAsunto($asunto)
    {
        $this->asunto = $asunto;

        return $this;
    }

    /**
     * Get asunto
     *
     * @return string
     */
    public function getAsunto()
    {
        return $this->asunto;
    }
}

