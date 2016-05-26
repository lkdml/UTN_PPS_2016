<?php



namespace Modelo;

/**
 * Usuario
 *
 * @Table(name="usuario", uniqueConstraints={@UniqueConstraint(name="email_UNIQUE", columns={"email"})}, indexes={@Index(name="FK_usuarios_empresa", columns={"empresa_id"})})
 * @Entity
 */
class Usuario
{
    /**
     * @var integer
     *
     * @Column(name="usuario_id", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $usuarioId;

    /**
     * @var string
     *
     * @Column(name="nombre", type="string", length=45, nullable=false)
     */
    private $nombre;

    /**
     * @var string
     *
     * @Column(name="apellido", type="string", length=45, nullable=true)
     */
    private $apellido;

    /**
     * @var string
     *
     * @Column(name="Clave", type="string", length=60, nullable=false)
     */
    private $clave;

    /**
     * @var string
     *
     * @Column(name="email", type="string", length=45, nullable=false)
     */
    private $email;

    /**
     * @var string
     *
     * @Column(name="foto_hash", type="string", length=255, nullable=true)
     */
    private $fotoHash;

    /**
     * @var string
     *
     * @Column(name="direccion", type="string", length=80, nullable=true)
     */
    private $direccion;

    /**
     * @var integer
     *
     * @Column(name="codigo_postal", type="integer", nullable=true)
     */
    private $codigoPostal;

    /**
     * @var string
     *
     * @Column(name="ciudad", type="string", length=30, nullable=true)
     */
    private $ciudad;

    /**
     * @var string
     *
     * @Column(name="telefono", type="string", length=45, nullable=true)
     */
    private $telefono;

    /**
     * @var string
     *
     * @Column(name="mail_adicional", type="string", length=45, nullable=true)
     */
    private $mailAdicional;

    /**
     * @var \DateTime
     *
     * @Column(name="ultima_actualizacion", type="datetime", nullable=false)
     */
    private $ultimaActualizacion;

    /**
     * @var \DateTime
     *
     * @Column(name="ultima_actividad", type="datetime", nullable=false)
     */
    private $ultimaActividad;

    /**
     * @var boolean
     *
     * @Column(name="activo", type="boolean", nullable=false)
     */
    private $activo = '0';

    /**
     * @var boolean
     *
     * @Column(name="eliminado", type="boolean", nullable=false)
     */
    private $eliminado = '0';

    /**
     * @var \Empresa
     *
     * @ManyToOne(targetEntity="Empresa")
     * @JoinColumns({
     *   @JoinColumn(name="empresa_id", referencedColumnName="empresa_id")
     * })
     */
    private $empresa;


    /**
     * Get usuarioId
     *
     * @return integer
     */
    public function getUsuarioId()
    {
        return $this->usuarioId;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Usuario
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
     * @return Usuario
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
     * Set clave
     *
     * @param string $clave
     *
     * @return Usuario
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
     * Set email
     *
     * @param string $email
     *
     * @return Usuario
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
     * Set fotoHash
     *
     * @param string $fotoHash
     *
     * @return Usuario
     */
    public function setFotoHash($fotoHash)
    {
        $this->fotoHash = $fotoHash;

        return $this;
    }

    /**
     * Get fotoHash
     *
     * @return string
     */
    public function getFotoHash()
    {
        return $this->fotoHash;
    }

    /**
     * Set direccion
     *
     * @param string $direccion
     *
     * @return Usuario
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
     * Set codigoPostal
     *
     * @param integer $codigoPostal
     *
     * @return Usuario
     */
    public function setCodigoPostal($codigoPostal)
    {
        $this->codigoPostal = $codigoPostal;

        return $this;
    }

    /**
     * Get codigoPostal
     *
     * @return integer
     */
    public function getCodigoPostal()
    {
        return $this->codigoPostal;
    }

    /**
     * Set ciudad
     *
     * @param string $ciudad
     *
     * @return Usuario
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
     * Set telefono
     *
     * @param string $telefono
     *
     * @return Usuario
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
     * Set mailAdicional
     *
     * @param string $mailAdicional
     *
     * @return Usuario
     */
    public function setMailAdicional($mailAdicional)
    {
        $this->mailAdicional = $mailAdicional;

        return $this;
    }

    /**
     * Get mailAdicional
     *
     * @return string
     */
    public function getMailAdicional()
    {
        return $this->mailAdicional;
    }

    /**
     * Set ultimaActualizacion
     *
     * @param \DateTime $ultimaActualizacion
     *
     * @return Usuario
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
     * @return Usuario
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
     * @return Usuario
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
     * Set eliminado
     *
     * @param boolean $eliminado
     *
     * @return Usuario
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
     * Set empresa
     *
     * @param \Empresa $empresa
     *
     * @return Usuario
     */
    public function setEmpresa(Empresa $empresa)
    {
        $this->empresa = $empresa;

        return $this;
    }

    /**
     * Get empresa
     *
     * @return \Empresa
     */
    public function getEmpresa()
    {
        return $this->empresa;
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

