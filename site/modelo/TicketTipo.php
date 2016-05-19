<?php



namespace Modelo;

/**
 * TicketTipo
 *
 * @Table(name="ticket_tipo")
 * @Entity
 */
class TicketTipo
{
    /**
     * @var integer
     *
     * @Column(name="tipo_ticket_id", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $tipoTicketId;

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
     * Get tipoTicketId
     *
     * @return integer
     */
    public function getTipoTicketId()
    {
        return $this->tipoTicketId;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return TicketTipo
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
     * @return TicketTipo
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
}

