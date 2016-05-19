<?php



namespace Modelo;

/**
 * TicketFiltros
 *
 * @Table(name="ticket_filtros")
 * @Entity
 */
class TicketFiltros
{
    /**
     * @var integer
     *
     * @Column(name="Filtro_id", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $filtroId;

    /**
     * @var string
     *
     * @Column(name="nombre", type="string", length=45, nullable=false)
     */
    private $nombre;

    /**
     * @var string
     *
     * @Column(name="departamentos", type="text", nullable=false)
     */
    private $departamentos;

    /**
     * @var string
     *
     * @Column(name="estados", type="text", nullable=false)
     */
    private $estados;

    /**
     * @var string
     *
     * @Column(name="prioridades", type="text", nullable=false)
     */
    private $prioridades;

    /**
     * @var integer
     *
     * @Column(name="asignado_a_mi", type="integer", nullable=true)
     */
    private $asignadoAMi;

    /**
     * @var string
     *
     * @Column(name="operadores", type="text", nullable=true)
     */
    private $operadores;


    /**
     * Get filtroId
     *
     * @return integer
     */
    public function getFiltroId()
    {
        return $this->filtroId;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return TicketFiltros
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
     * Set departamentos
     *
     * @param string $departamentos
     *
     * @return TicketFiltros
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

    /**
     * Set estados
     *
     * @param string $estados
     *
     * @return TicketFiltros
     */
    public function setEstados($estados)
    {
        $this->estados = $estados;

        return $this;
    }

    /**
     * Get estados
     *
     * @return string
     */
    public function getEstados()
    {
        return $this->estados;
    }

    /**
     * Set prioridades
     *
     * @param string $prioridades
     *
     * @return TicketFiltros
     */
    public function setPrioridades($prioridades)
    {
        $this->prioridades = $prioridades;

        return $this;
    }

    /**
     * Get prioridades
     *
     * @return string
     */
    public function getPrioridades()
    {
        return $this->prioridades;
    }

    /**
     * Set asignadoAMi
     *
     * @param integer $asignadoAMi
     *
     * @return TicketFiltros
     */
    public function setAsignadoAMi($asignadoAMi)
    {
        $this->asignadoAMi = $asignadoAMi;

        return $this;
    }

    /**
     * Get asignadoAMi
     *
     * @return integer
     */
    public function getAsignadoAMi()
    {
        return $this->asignadoAMi;
    }

    /**
     * Set operadores
     *
     * @param string $operadores
     *
     * @return TicketFiltros
     */
    public function setOperadores($operadores)
    {
        $this->operadores = $operadores;

        return $this;
    }

    /**
     * Get operadores
     *
     * @return string
     */
    public function getOperadores()
    {
        return $this->operadores;
    }
}

