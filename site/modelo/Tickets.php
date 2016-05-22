<?php

namespace Modelo;

/**
 * Tickets
 *
 * @Table(name="tickets", indexes={@Index(name="fk_ticket_usuario_idx", columns={"usuario_id"}), @Index(name="fk_ticket_estado_idx", columns={"estado_id"}), @Index(name="fk_ticket_prioridad_idx", columns={"prioridad_id"}), @Index(name="fk_ticket_departamento_idx", columns={"departamento_id"}), @Index(name="fk_ticket_operador_idx", columns={"operador_id"}), @Index(name="fk_ticket_tipo_ticket_idx", columns={"tipo_ticket_id"})})
 * @Entity
 */
class Tickets
{
    /**
     * @var integer
     *
     * @Column(name="ticket_id", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="NONE")
     */
    private $ticketId;

    /**
     * @var string
     *
     * @Column(name="descripcion", type="string", length=200, nullable=true)
     */
    private $descripcion;

    /**
     * @var integer
     *
     * @Column(name="numero_Ticker", type="integer", nullable=false)
     */
    private $numeroTicker;

    /**
     * @var integer
     *
     * @Column(name="email_queue_id", type="integer", nullable=false)
     */
    private $emailQueueId;

    /**
     * @var boolean
     *
     * @Column(name="asignado", type="boolean", nullable=true)
     */
    private $asignado;

    /**
     * @var integer
     *
     * @Column(name="owner_operador_id", type="integer", nullable=true)
     */
    private $ownerOperadorId;

    /**
     * @var string
     *
     * @Column(name="asunto", type="string", length=45, nullable=false)
     */
    private $asunto;

    /**
     * @var \DateTime
     *
     * @Column(name="ultima_actividad", type="datetime", nullable=true)
     */
    private $ultimaActividad;

    /**
     * @var \DateTime
     *
     * @Column(name="ultima_actividad_User", type="datetime", nullable=true)
     */
    private $ultimaActividadUser;

    /**
     * @var \DateTime
     *
     * @Column(name="ultima_actividad_operador", type="datetime", nullable=true)
     */
    private $ultimaActividadOperador;

    /**
     * @var \DateTime
     *
     * @Column(name="fecha_creacion", type="datetime", nullable=false)
     */
    private $fechaCreacion;

    /**
     * @var \DateTime
     *
     * @Column(name="fecha_vto", type="datetime", nullable=true)
     */
    private $fechaVto;

    /**
     * @var boolean
     *
     * @Column(name="tiene_archivos", type="boolean", nullable=true)
     */
    private $tieneArchivos;

    /**
     * @var boolean
     *
     * @Column(name="editado", type="boolean", nullable=true)
     */
    private $editado;

    /**
     * @var string
     *
     * @Column(name="custom_fields", type="text", nullable=true)
     */
    private $customFields;

    /**
     * @var \Usuario
     *
     * @ManyToOne(targetEntity="Usuario")
     * @JoinColumns({
     *   @JoinColumn(name="usuario_id", referencedColumnName="usuario_id")
     * })
     */
    private $usuario;

    /**
     * @var \TicketEstado
     *
     * @Id
     * @GeneratedValue(strategy="NONE")
     * @OneToOne(targetEntity="TicketEstado")
     * @JoinColumns({
     *   @JoinColumn(name="estado_id", referencedColumnName="estado_id")
     * })
     */
    private $estado;

    /**
     * @var \Prioridad
     *
     * @Id
     * @GeneratedValue(strategy="NONE")
     * @OneToOne(targetEntity="Prioridad")
     * @JoinColumns({
     *   @JoinColumn(name="prioridad_id", referencedColumnName="prioridad_id")
     * })
     */
    private $prioridad;

    /**
     * @var \Departamento
     *
     * @Id
     * @GeneratedValue(strategy="NONE")
     * @OneToOne(targetEntity="Departamento")
     * @JoinColumns({
     *   @JoinColumn(name="departamento_id", referencedColumnName="departamento_id")
     * })
     */
    private $departamento;

    /**
     * @var \Operador
     *
     * @ManyToOne(targetEntity="Operador")
     * @JoinColumns({
     *   @JoinColumn(name="operador_id", referencedColumnName="operador_id")
     * })
     */
    private $operador;

    /**
     * @var \TicketTipo
     *
     * @Id
     * @GeneratedValue(strategy="NONE")
     * @OneToOne(targetEntity="TicketTipo")
     * @JoinColumns({
     *   @JoinColumn(name="tipo_ticket_id", referencedColumnName="tipo_ticket_id")
     * })
     */
    private $tipoTicket;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ManyToMany(targetEntity="Archivos", mappedBy="ticket")
     */
    private $archivoTicket;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->archivoTicket = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set ticketId
     *
     * @param integer $ticketId
     *
     * @return Tickets
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
     * Set descripcion
     *
     * @param string $descripcion
     *
     * @return Tickets
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
     * Set numeroTicker
     *
     * @param integer $numeroTicker
     *
     * @return Tickets
     */
    public function setNumeroTicker($numeroTicker)
    {
        $this->numeroTicker = $numeroTicker;

        return $this;
    }

    /**
     * Get numeroTicker
     *
     * @return integer
     */
    public function getNumeroTicker()
    {
        return $this->numeroTicker;
    }

    /**
     * Set emailQueueId
     *
     * @param integer $emailQueueId
     *
     * @return Tickets
     */
    public function setEmailQueueId($emailQueueId)
    {
        $this->emailQueueId = $emailQueueId;

        return $this;
    }

    /**
     * Get emailQueueId
     *
     * @return integer
     */
    public function getEmailQueueId()
    {
        return $this->emailQueueId;
    }

    /**
     * Set asignado
     *
     * @param boolean $asignado
     *
     * @return Tickets
     */
    public function setAsignado($asignado)
    {
        $this->asignado = $asignado;

        return $this;
    }

    /**
     * Get asignado
     *
     * @return boolean
     */
    public function getAsignado()
    {
        return $this->asignado;
    }

    /**
     * Set ownerOperadorId
     *
     * @param integer $ownerOperadorId
     *
     * @return Tickets
     */
    public function setOwnerOperadorId($ownerOperadorId)
    {
        $this->ownerOperadorId = $ownerOperadorId;

        return $this;
    }

    /**
     * Get ownerOperadorId
     *
     * @return integer
     */
    public function getOwnerOperadorId()
    {
        return $this->ownerOperadorId;
    }

    /**
     * Set asunto
     *
     * @param string $asunto
     *
     * @return Tickets
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
     * Set ultimaActividad
     *
     * @param \DateTime $ultimaActividad
     *
     * @return Tickets
     */
    public function setUltimaActividad($ultimaActividad)
    {
        $this->ultimaActividad = $ultimaActividad;

        return $this;
    }

    /**
     * Get ultimaActividad
     *
     * @return \DateTime
     */
    public function getUltimaActividad()
    {
        return $this->ultimaActividad;
    }

    /**
     * Set ultimaActividadUser
     *
     * @param \DateTime $ultimaActividadUser
     *
     * @return Tickets
     */
    public function setUltimaActividadUser($ultimaActividadUser)
    {
        $this->ultimaActividadUser = $ultimaActividadUser;

        return $this;
    }

    /**
     * Get ultimaActividadUser
     *
     * @return \DateTime
     */
    public function getUltimaActividadUser()
    {
        return $this->ultimaActividadUser;
    }

    /**
     * Set ultimaActividadOperador
     *
     * @param \DateTime $ultimaActividadOperador
     *
     * @return Tickets
     */
    public function setUltimaActividadOperador($ultimaActividadOperador)
    {
        $this->ultimaActividadOperador = $ultimaActividadOperador;

        return $this;
    }

    /**
     * Get ultimaActividadOperador
     *
     * @return \DateTime
     */
    public function getUltimaActividadOperador()
    {
        return $this->ultimaActividadOperador;
    }

    /**
     * Set fechaCreacion
     *
     * @param \DateTime $fechaCreacion
     *
     * @return Tickets
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
     * Set fechaVto
     *
     * @param \DateTime $fechaVto
     *
     * @return Tickets
     */
    public function setFechaVto($fechaVto)
    {
        $this->fechaVto = $fechaVto;

        return $this;
    }

    /**
     * Get fechaVto
     *
     * @return \DateTime
     */
    public function getFechaVto()
    {
        return $this->fechaVto;
    }

    /**
     * Set tieneArchivos
     *
     * @param boolean $tieneArchivos
     *
     * @return Tickets
     */
    public function setTieneArchivos($tieneArchivos)
    {
        $this->tieneArchivos = $tieneArchivos;

        return $this;
    }

    /**
     * Get tieneArchivos
     *
     * @return boolean
     */
    public function getTieneArchivos()
    {
        return $this->tieneArchivos;
    }

    /**
     * Set editado
     *
     * @param boolean $editado
     *
     * @return Tickets
     */
    public function setEditado($editado)
    {
        $this->editado = $editado;

        return $this;
    }

    /**
     * Get editado
     *
     * @return boolean
     */
    public function getEditado()
    {
        return $this->editado;
    }

    /**
     * Set customFields
     *
     * @param string $customFields
     *
     * @return Tickets
     */
    public function setCustomFields($customFields)
    {
        $this->customFields = $customFields;

        return $this;
    }

    /**
     * Get customFields
     *
     * @return string
     */
    public function getCustomFields()
    {
        return $this->customFields;
    }

    /**
     * Set usuario
     *
     * @param \Usuario $usuario
     *
     * @return Tickets
     */
    public function setUsuario(Usuario $usuario = null)
    {
        $this->usuario = $usuario;

        return $this;
    }

    /**
     * Get usuario
     *
     * @return \Usuario
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * Set estado
     *
     * @param \TicketEstado $estado
     *
     * @return Tickets
     */
    public function setEstado(TicketEstado $estado)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get estado
     *
     * @return \TicketEstado
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set prioridad
     *
     * @param \Prioridad $prioridad
     *
     * @return Tickets
     */
    public function setPrioridad(Prioridad $prioridad)
    {
        $this->prioridad = $prioridad;

        return $this;
    }

    /**
     * Get prioridad
     *
     * @return \Prioridad
     */
    public function getPrioridad()
    {
        return $this->prioridad;
    }

    /**
     * Set departamento
     *
     * @param \Departamento $departamento
     *
     * @return Tickets
     */
    public function setDepartamento(Departamento $departamento)
    {
        $this->departamento = $departamento;

        return $this;
    }

    /**
     * Get departamento
     *
     * @return \Departamento
     */
    public function getDepartamento()
    {
        return $this->departamento;
    }

    /**
     * Set operador
     *
     * @param \Operador $operador
     *
     * @return Tickets
     */
    public function setOperador(Operador $operador = null)
    {
        $this->operador = $operador;

        return $this;
    }

    /**
     * Get operador
     *
     * @return \Operador
     */
    public function getOperador()
    {
        return $this->operador;
    }

    /**
     * Set tipoTicket
     *
     * @param \TicketTipo $tipoTicket
     *
     * @return Tickets
     */
    public function setTipoTicket(TicketTipo $tipoTicket)
    {
        $this->tipoTicket = $tipoTicket;

        return $this;
    }

    /**
     * Get tipoTicket
     *
     * @return \TicketTipo
     */
    public function getTipoTicket()
    {
        return $this->tipoTicket;
    }

    /**
     * Add archivoTicket
     *
     * @param \Archivos $archivoTicket
     *
     * @return Tickets
     */
    public function addArchivoTicket(Archivos $archivoTicket)
    {
        $this->archivoTicket[] = $archivoTicket;

        return $this;
    }

    /**
     * Remove archivoTicket
     *
     * @param \Archivos $archivoTicket
     */
    public function removeArchivoTicket(Archivos $archivoTicket)
    {
        $this->archivoTicket->removeElement($archivoTicket);
    }

    /**
     * Get archivoTicket
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getArchivoTicket()
    {
        return $this->archivoTicket;
    }
}

