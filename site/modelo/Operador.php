<?php

namespace Modelo;

/**
 * Operador
 *
 * @Table(name="operador", uniqueConstraints={@UniqueConstraint(name="email_UNIQUE", columns={"email"})}, indexes={@Index(name="fk_operadores_perfil_perfil_idx", columns={"perfil_id"})})
 * @Entity
 */
class Operador
{
    /**
     * @var integer
     *
     * @Column(name="operador_id", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $operadorId;

    /**
     * @var string
     *
     * @Column(name="nombre", type="string", length=45, nullable=false)
     */
    private $nombre;

    /**
     * @var string
     *
     * @Column(name="apellido", type="string", length=45, nullable=false)
     */
    private $apellido;

    /**
     * @var string
     *
     * @Column(name="nombre_usuario", type="string", length=45, nullable=false)
     */
    private $nombreUsuario;

    /**
     * @var string
     *
     * @Column(name="clave", type="string", length=60, nullable=false)
     */
    private $clave;

    /**
     * @var string
     *
     * @Column(name="firma_mensaje", type="string", length=245, nullable=true)
     */
    private $firmaMensaje;

    /**
     * @var string
     *
     * @Column(name="email", type="string", length=225, nullable=false)
     */
    private $email;

    /**
     * @var string
     *
     * @Column(name="celular", type="string", length=45, nullable=true)
     */
    private $celular;

    /**
     * @var \DateTime
     *
     * @Column(name="ultima_actualizacion", type="datetime", nullable=true)
     */
    private $ultimaActualizacion;

    /**
     * @var \DateTime
     *
     * @Column(name="ultima_actividad", type="datetime", nullable=true)
     */
    private $ultimaActividad;

    /**
     * @var boolean
     *
     * @Column(name="activo", type="boolean", nullable=false)
     */
    private $activo;

    /**
     * @var integer
     *
     * @Column(name="deptos_habilitados", type="integer", nullable=true)
     */
    private $deptosHabilitados;

    /**
     * @var integer
     *
     * @Column(name="habilita_notificaciones_mail", type="smallint", nullable=false)
     */
    private $habilitaNotificacionesMail;

    /**
     * @var integer
     *
     * @Column(name="filtro_ticket_id", type="integer", nullable=true)
     */
    private $filtroTicketId;

    /**
     * @var string
     *
     * @Column(name="hash_foto", type="string", length=245, nullable=true)
     */
    private $hashFoto;

    /**
     * @var boolean
     *
     * @Column(name="eliminado", type="boolean", nullable=false)
     */
    private $eliminado;

    /**
     * @var \Perfil
     *
     * @ManyToOne(targetEntity="Perfil")
     * @JoinColumns({
     *   @JoinColumn(name="perfil_id", referencedColumnName="perfil_id")
     * })
     */
    private $perfil;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ManyToMany(targetEntity="Departamento", inversedBy="operador")
     * @JoinTable(name="operador_departamentos",
     *   joinColumns={
     *     @JoinColumn(name="operador_id", referencedColumnName="operador_id")
     *   },
     *   inverseJoinColumns={
     *     @JoinColumn(name="departamento_id", referencedColumnName="departamento_id")
     *   }
     * )
     */
    private $departamento;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->departamento = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Operador
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
     * Set apellido
     *
     * @param string $apellido
     *
     * @return Operador
     */
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;

        return $this;
    }

    /**
     * Get apellido
     *
     * @return string
     */
    public function getApellido()
    {
        return $this->apellido;
    }

    /**
     * Set nombreUsuario
     *
     * @param string $nombreUsuario
     *
     * @return Operador
     */
    public function setNombreUsuario($nombreUsuario)
    {
        $this->nombreUsuario = $nombreUsuario;

        return $this;
    }

    /**
     * Get nombreUsuario
     *
     * @return string
     */
    public function getNombreUsuario()
    {
        return $this->nombreUsuario;
    }

    /**
     * Set clave
     *
     * @param string $clave
     *
     * @return Operador
     */
    public function setClave($clave)
    {
        $this->clave = $clave;

        return $this;
    }

    /**
     * Get clave
     *
     * @return string
     */
    public function getClave()
    {
        return $this->clave;
    }

    /**
     * Set firmaMensaje
     *
     * @param string $firmaMensaje
     *
     * @return Operador
     */
    public function setFirmaMensaje($firmaMensaje)
    {
        $this->firmaMensaje = $firmaMensaje;

        return $this;
    }

    /**
     * Get firmaMensaje
     *
     * @return string
     */
    public function getFirmaMensaje()
    {
        return $this->firmaMensaje;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Operador
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set celular
     *
     * @param string $celular
     *
     * @return Operador
     */
    public function setCelular($celular)
    {
        $this->celular = $celular;

        return $this;
    }

    /**
     * Get celular
     *
     * @return string
     */
    public function getCelular()
    {
        return $this->celular;
    }

    /**
     * Set ultimaActualizacion
     *
     * @param \DateTime $ultimaActualizacion
     *
     * @return Operador
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
     * Set ultimaActividad
     *
     * @param \DateTime $ultimaActividad
     *
     * @return Operador
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
     * Set activo
     *
     * @param boolean $activo
     *
     * @return Operador
     */
    public function setActivo($activo)
    {
        $this->activo = $activo;

        return $this;
    }

    /**
     * Get activo
     *
     * @return boolean
     */
    public function getActivo()
    {
        return $this->activo;
    }

    /**
     * Set deptosHabilitados
     *
     * @param integer $deptosHabilitados
     *
     * @return Operador
     */
    public function setDeptosHabilitados($deptosHabilitados)
    {
        $this->deptosHabilitados = $deptosHabilitados;

        return $this;
    }

    /**
     * Get deptosHabilitados
     *
     * @return integer
     */
    public function getDeptosHabilitados()
    {
        return $this->deptosHabilitados;
    }

    /**
     * Set habilitaNotificacionesMail
     *
     * @param integer $habilitaNotificacionesMail
     *
     * @return Operador
     */
    public function setHabilitaNotificacionesMail($habilitaNotificacionesMail)
    {
        $this->habilitaNotificacionesMail = $habilitaNotificacionesMail;

        return $this;
    }

    /**
     * Get habilitaNotificacionesMail
     *
     * @return integer
     */
    public function getHabilitaNotificacionesMail()
    {
        return $this->habilitaNotificacionesMail;
    }

    /**
     * Set filtroTicketId
     *
     * @param integer $filtroTicketId
     *
     * @return Operador
     */
    public function setFiltroTicketId($filtroTicketId)
    {
        $this->filtroTicketId = $filtroTicketId;

        return $this;
    }

    /**
     * Get filtroTicketId
     *
     * @return integer
     */
    public function getFiltroTicketId()
    {
        return $this->filtroTicketId;
    }

    /**
     * Set hashFoto
     *
     * @param string $hashFoto
     *
     * @return Operador
     */
    public function setHashFoto($hashFoto)
    {
        $this->hashFoto = $hashFoto;

        return $this;
    }

    /**
     * Get hashFoto
     *
     * @return string
     */
    public function getHashFoto()
    {
        return $this->hashFoto;
    }

    /**
     * Set eliminado
     *
     * @param boolean $eliminado
     *
     * @return Operador
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
     * Set perfil
     *
     * @param \Perfil $perfil
     *
     * @return Operador
     */
    public function setPerfil(Perfil $perfil)
    {
        $this->perfil = $perfil;

        return $this;
    }

    /**
     * Get perfil
     *
     * @return \Perfil
     */
    public function getPerfil()
    {
        return $this->perfil;
    }

    /**
     * Add departamento
     *
     * @param \Departamento $departamento
     *
     * @return Operador
     */
    public function addDepartamento(Departamento $departamento)
    {
        $this->departamento[] = $departamento;

        return $this;
    }

    /**
     * Remove departamento
     *
     * @param \Departamento $departamento
     */
    public function removeDepartamento(Departamento $departamento)
    {
        $this->departamento->removeElement($departamento);
    }

    /**
     * Get departamento
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDepartamento()
    {
        return $this->departamento;
    }
    
    public function eliminarUsuario(){
        $this->eliminado = true;
    }
    
    public function encriptarClave($clave){
        $opciones = [
            'cost' => 12,
        ];
        $this->setClave(password_hash($clave, PASSWORD_BCRYPT, $opciones));
    }
    
    public function verificarClave($clave){
        return password_verify($clave,$this->getClave());
    }
}

