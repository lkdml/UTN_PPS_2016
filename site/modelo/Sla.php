<?php

namespace Modelo;

/**
 * Sla
 *
 * @Table(name="sla", indexes={@Index(name="FK_email_sla_email_idx", columns={"email_template_id"}), @Index(name="fk_sla_tipo_ticket_idx", columns={"tipo_ticket_origen"})})
 * @Entity
 */
class Sla
{
    /**
     * @var integer
     *
     * @Column(name="sla_id", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $slaId;

    /**
     * @var string
     *
     * @Column(name="nombre", type="string", length=45, nullable=false)
     */
    private $nombre;

    /**
     * @var string
     *
     * @Column(name="descripcion", type="string", length=45, nullable=true)
     */
    private $descripcion;

    /**
     * @var integer
     *
     * @Column(name="departamento_origen", type="integer", nullable=true)
     */
    private $departamentoOrigen;

    /**
     * @var integer
     *
     * @Column(name="estado_origen", type="integer", nullable=true)
     */
    private $estadoOrigen;

    /**
     * @var integer
     *
     * @Column(name="prioridad_origen", type="integer", nullable=true)
     */
    private $prioridadOrigen;

    /**
     * @var integer
     *
     * @Column(name="condicion_hora", type="integer", nullable=false)
     */
    private $condicionHora = '1';

    /**
     * @var integer
     *
     * @Column(name="accion_departamento", type="integer", nullable=true)
     */
    private $accionDepartamento;

    /**
     * @var integer
     *
     * @Column(name="accion_prioridad", type="integer", nullable=true)
     */
    private $accionPrioridad;

    /**
     * @var integer
     *
     * @Column(name="accion_estado", type="integer", nullable=true)
     */
    private $accionEstado;

    /**
     * @var integer
     *
     * @Column(name="accion_operador_asignado", type="integer", nullable=true)
     */
    private $accionOperadorAsignado;

    /**
     * @var integer
     *
     * @Column(name="estado", type="integer", nullable=false)
     */
    private $estado;

    /**
     * @var boolean
     *
     * @Column(name="eliminado", type="boolean", nullable=false)
     */
    private $eliminado;

    /**
     * @var \EmailTemplates
     *
     * @ManyToOne(targetEntity="EmailTemplates")
     * @JoinColumns({
     *   @JoinColumn(name="email_template_id", referencedColumnName="email_id")
     * })
     */
    private $emailTemplate;

    /**
     * @var \TicketTipo
     *
     * @ManyToOne(targetEntity="TicketTipo")
     * @JoinColumns({
     *   @JoinColumn(name="tipo_ticket_origen", referencedColumnName="tipo_ticket_id")
     * })
     */
    private $tipoTicketOrigen;


    /**
     * Get slaId
     *
     * @return integer
     */
    public function getSlaId()
    {
        return $this->slaId;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Sla
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
     * @return Sla
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
     * Set departamentoOrigen
     *
     * @param integer $departamentoOrigen
     *
     * @return Sla
     */
    public function setDepartamentoOrigen($departamentoOrigen)
    {
        $this->departamentoOrigen = $departamentoOrigen;

        return $this;
    }

    /**
     * Get departamentoOrigen
     *
     * @return integer
     */
    public function getDepartamentoOrigen()
    {
        return $this->departamentoOrigen;
    }

    /**
     * Set estadoOrigen
     *
     * @param integer $estadoOrigen
     *
     * @return Sla
     */
    public function setEstadoOrigen($estadoOrigen)
    {
        $this->estadoOrigen = $estadoOrigen;

        return $this;
    }

    /**
     * Get estadoOrigen
     *
     * @return integer
     */
    public function getEstadoOrigen()
    {
        return $this->estadoOrigen;
    }

    /**
     * Set prioridadOrigen
     *
     * @param integer $prioridadOrigen
     *
     * @return Sla
     */
    public function setPrioridadOrigen($prioridadOrigen)
    {
        $this->prioridadOrigen = $prioridadOrigen;

        return $this;
    }

    /**
     * Get prioridadOrigen
     *
     * @return integer
     */
    public function getPrioridadOrigen()
    {
        return $this->prioridadOrigen;
    }

    /**
     * Set condicionHora
     *
     * @param integer $condicionHora
     *
     * @return Sla
     */
    public function setCondicionHora($condicionHora)
    {
        $this->condicionHora = $condicionHora;

        return $this;
    }

    /**
     * Get condicionHora
     *
     * @return integer
     */
    public function getCondicionHora()
    {
        return $this->condicionHora;
    }

    /**
     * Set accionDepartamento
     *
     * @param integer $accionDepartamento
     *
     * @return Sla
     */
    public function setAccionDepartamento($accionDepartamento)
    {
        $this->accionDepartamento = $accionDepartamento;

        return $this;
    }

    /**
     * Get accionDepartamento
     *
     * @return integer
     */
    public function getAccionDepartamento()
    {
        return $this->accionDepartamento;
    }

    /**
     * Set accionPrioridad
     *
     * @param integer $accionPrioridad
     *
     * @return Sla
     */
    public function setAccionPrioridad($accionPrioridad)
    {
        $this->accionPrioridad = $accionPrioridad;

        return $this;
    }

    /**
     * Get accionPrioridad
     *
     * @return integer
     */
    public function getAccionPrioridad()
    {
        return $this->accionPrioridad;
    }

    /**
     * Set accionEstado
     *
     * @param integer $accionEstado
     *
     * @return Sla
     */
    public function setAccionEstado($accionEstado)
    {
        $this->accionEstado = $accionEstado;

        return $this;
    }

    /**
     * Get accionEstado
     *
     * @return integer
     */
    public function getAccionEstado()
    {
        return $this->accionEstado;
    }

    /**
     * Set accionOperadorAsignado
     *
     * @param integer $accionOperadorAsignado
     *
     * @return Sla
     */
    public function setAccionOperadorAsignado($accionOperadorAsignado)
    {
        $this->accionOperadorAsignado = $accionOperadorAsignado;

        return $this;
    }

    /**
     * Get accionOperadorAsignado
     *
     * @return integer
     */
    public function getAccionOperadorAsignado()
    {
        return $this->accionOperadorAsignado;
    }

    /**
     * Set estado
     *
     * @param integer $estado
     *
     * @return Sla
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get estado
     *
     * @return integer
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set eliminado
     *
     * @param boolean $eliminado
     *
     * @return Sla
     */
    public function setEliminado($eliminado)
    {
        $this->eliminado = $eliminado;

        return $this;
    }

    /**
     * Get eliminado
     *
     * @return boolean
     */
    public function getEliminado()
    {
        return $this->eliminado;
    }

    /**
     * Set emailTemplate
     *
     * @param \EmailTemplates $emailTemplate
     *
     * @return Sla
     */
    public function setEmailTemplate(EmailTemplates $emailTemplate)
    {
        $this->emailTemplate = $emailTemplate;

        return $this;
    }

    /**
     * Get emailTemplate
     *
     * @return \EmailTemplates
     */
    public function getEmailTemplate()
    {
        return $this->emailTemplate;
    }

    /**
     * Set tipoTicketOrigen
     *
     * @param \TicketTipo $tipoTicketOrigen
     *
     * @return Sla
     */
    public function setTipoTicketOrigen(TicketTipo $tipoTicketOrigen)
    {
        $this->tipoTicketOrigen = $tipoTicketOrigen;

        return $this;
    }

    /**
     * Get tipoTicketOrigen
     *
     * @return \TicketTipo
     */
    public function getTipoTicketOrigen()
    {
        return $this->tipoTicketOrigen;
    }
}

