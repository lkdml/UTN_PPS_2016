<?php

namespace Modelo;

/**
 * Archivo
 *
 * @Table(name="archivo", indexes={@Index(name="FK_archivo_mensaje_idx", columns={"mensaje_id"})})
 * @Entity
 */
class Archivo
{
    /**
     * @var integer
     *
     * @Column(name="archivo_id", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $archivoId;

    /**
     * @var string
     *
     * @Column(name="nombre", type="string", length=45, nullable=false)
     */
    private $nombre;

    /**
     * @var string
     *
     * @Column(name="Hash", type="string", length=45, nullable=false)
     */
    private $hash;

    /**
     * @var \DateTime
     *
     * @Column(name="fecha_creacion", type="datetime", nullable=false)
     */
    private $fechaCreacion;

    /**
     * @var string
     *
     * @Column(name="directorio", type="string", length=45, nullable=false)
     */
    private $directorio;

    /**
     * @var \Mensaje
     *
     * @ManyToOne(targetEntity="Mensaje")
     * @JoinColumns({
     *   @JoinColumn(name="mensaje_id", referencedColumnName="mensaje_id")
     * })
     */
    private $mensaje;


    /**
     * Get archivoId
     *
     * @return integer
     */
    public function getArchivoId()
    {
        return $this->archivoId;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Archivo
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
     * Set hash
     *
     * @param string $hash
     *
     * @return Archivo
     */
    public function setHash($hash)
    {
        $this->hash = $hash;

        return $this;
    }

    /**
     * Get hash
     *
     * @return string
     */
    public function getHash()
    {
        return $this->hash;
    }

    /**
     * Set fechaCreacion
     *
     * @param \DateTime $fechaCreacion
     *
     * @return Archivo
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
     * Set directorio
     *
     * @param string $directorio
     *
     * @return Archivo
     */
    public function setDirectorio($directorio)
    {
        $this->directorio = $directorio;

        return $this;
    }

    /**
     * Get directorio
     *
     * @return string
     */
    public function getDirectorio()
    {
        return $this->directorio;
    }

    /**
     * Set mensaje
     *
     * @param \Mensaje $mensaje
     *
     * @return Archivo
     */
    public function setMensaje(Mensaje $mensaje = null)
    {
        $this->mensaje = $mensaje;

        return $this;
    }

    /**
     * Get mensaje
     *
     * @return \Mensaje
     */
    public function getMensaje()
    {
        return $this->mensaje;
    }
}

