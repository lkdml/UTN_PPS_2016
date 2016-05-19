<?php



namespace Modelo;

/**
 * EmailQueue
 *
 * @Table(name="email_queue")
 * @Entity
 */
class EmailQueue
{
    /**
     * @var integer
     *
     * @Column(name="queue_id", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $queueId;

    /**
     * @var string
     *
     * @Column(name="destinatario", type="text", nullable=false)
     */
    private $destinatario;

    /**
     * @var string
     *
     * @Column(name="remitente", type="text", nullable=false)
     */
    private $remitente;

    /**
     * @var string
     *
     * @Column(name="asunto", type="string", length=45, nullable=false)
     */
    private $asunto;

    /**
     * @var string
     *
     * @Column(name="contenido", type="text", nullable=false)
     */
    private $contenido;

    /**
     * @var boolean
     *
     * @Column(name="estado", type="boolean", nullable=false)
     */
    private $estado;

    /**
     * @var \DateTime
     *
     * @Column(name="fecha_envio", type="datetime", nullable=true)
     */
    private $fechaEnvio;


    /**
     * Get queueId
     *
     * @return integer
     */
    public function getQueueId()
    {
        return $this->queueId;
    }

    /**
     * Set destinatario
     *
     * @param string $destinatario
     *
     * @return EmailQueue
     */
    public function setDestinatario($destinatario)
    {
        $this->destinatario = $destinatario;

        return $this;
    }

    /**
     * Get destinatario
     *
     * @return string
     */
    public function getDestinatario()
    {
        return $this->destinatario;
    }

    /**
     * Set remitente
     *
     * @param string $remitente
     *
     * @return EmailQueue
     */
    public function setRemitente($remitente)
    {
        $this->remitente = $remitente;

        return $this;
    }

    /**
     * Get remitente
     *
     * @return string
     */
    public function getRemitente()
    {
        return $this->remitente;
    }

    /**
     * Set asunto
     *
     * @param string $asunto
     *
     * @return EmailQueue
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

    /**
     * Set contenido
     *
     * @param string $contenido
     *
     * @return EmailQueue
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
     * Set estado
     *
     * @param boolean $estado
     *
     * @return EmailQueue
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
     * Set fechaEnvio
     *
     * @param \DateTime $fechaEnvio
     *
     * @return EmailQueue
     */
    public function setFechaEnvio($fechaEnvio)
    {
        $this->fechaEnvio = $fechaEnvio;

        return $this;
    }

    /**
     * Get fechaEnvio
     *
     * @return \DateTime
     */
    public function getFechaEnvio()
    {
        return $this->fechaEnvio;
    }
}

