<?php



namespace Modelo;

/**
 * TicketCustomFields
 *
 * @Table(name="ticket_custom_fields")
 * @Entity
 */
class TicketCustomFields
{
    /**
     * @var integer
     *
     * @Column(name="field_id", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $fieldId;

    /**
     * @var integer
     *
     * @Column(name="ticket_id", type="integer", nullable=false)
     */
    private $ticketId;

    /**
     * @var string
     *
     * @Column(name="nombre", type="string", length=45, nullable=false)
     */
    private $nombre;

    /**
     * @var string
     *
     * @Column(name="tipo", type="string", length=45, nullable=false)
     */
    private $tipo;

    /**
     * @var string
     *
     * @Column(name="opciones", type="text", nullable=true)
     */
    private $opciones;

    /**
     * @var boolean
     *
     * @Column(name="requerido", type="boolean", nullable=false)
     */
    private $requerido;

    /**
     * @var string
     *
     * @Column(name="departamentos", type="text", nullable=true)
     */
    private $departamentos;


    /**
     * Get fieldId
     *
     * @return integer
     */
    public function getFieldId()
    {
        return $this->fieldId;
    }

    /**
     * Set ticketId
     *
     * @param integer $ticketId
     *
     * @return TicketCustomFields
     */
    public function setTicketId($ticketId)
    {
        $this->ticketId = $ticketId;

        return $this;
    }

    /**
     * Get ticketId
     *
     * @return integer
     */
    public function getTicketId()
    {
        return $this->ticketId;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return TicketCustomFields
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
     * Set tipo
     *
     * @param string $tipo
     *
     * @return TicketCustomFields
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
     * Set opciones
     *
     * @param string $opciones
     *
     * @return TicketCustomFields
     */
    public function setOpciones($opciones)
    {
        $this->opciones = $opciones;

        return $this;
    }

    /**
     * Get opciones
     *
     * @return string
     */
    public function getOpciones()
    {
        return $this->opciones;
    }

    /**
     * Set requerido
     *
     * @param boolean $requerido
     *
     * @return TicketCustomFields
     */
    public function setRequerido($requerido)
    {
        $this->requerido = $requerido;

        return $this;
    }

    /**
     * Get requerido
     *
     * @return boolean
     */
    public function getRequerido()
    {
        return $this->requerido;
    }

    /**
     * Set departamentos
     *
     * @param string $departamentos
     *
     * @return TicketCustomFields
     */
    public function setDepartamentos($departamentos)
    {
        $this->departamentos = $departamentos;

        return $this;
    }

    /**
     * Get departamentos
     *
     * @return string
     */
    public function getDepartamentos()
    {
        return $this->departamentos;
    }
}

