<?php

namespace Proxies\__CG__\Modelo;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class Usuario extends \Modelo\Usuario implements \Doctrine\ORM\Proxy\Proxy
{
    /**
     * @var \Closure the callback responsible for loading properties in the proxy object. This callback is called with
     *      three parameters, being respectively the proxy object to be initialized, the method that triggered the
     *      initialization process and an array of ordered parameters that were passed to that method.
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setInitializer
     */
    public $__initializer__;

    /**
     * @var \Closure the callback responsible of loading properties that need to be copied in the cloned object
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setCloner
     */
    public $__cloner__;

    /**
     * @var boolean flag indicating if this object was already initialized
     *
     * @see \Doctrine\Common\Persistence\Proxy::__isInitialized
     */
    public $__isInitialized__ = false;

    /**
     * @var array properties to be lazy loaded, with keys being the property
     *            names and values being their default values
     *
     * @see \Doctrine\Common\Persistence\Proxy::__getLazyProperties
     */
    public static $lazyPropertiesDefaults = [];



    /**
     * @param \Closure $initializer
     * @param \Closure $cloner
     */
    public function __construct($initializer = null, $cloner = null)
    {

        $this->__initializer__ = $initializer;
        $this->__cloner__      = $cloner;
    }







    /**
     * 
     * @return array
     */
    public function __sleep()
    {
        if ($this->__isInitialized__) {
            return ['__isInitialized__', '' . "\0" . 'Modelo\\Usuario' . "\0" . 'usuarioId', '' . "\0" . 'Modelo\\Usuario' . "\0" . 'nombreUsuario', '' . "\0" . 'Modelo\\Usuario' . "\0" . 'nombre', '' . "\0" . 'Modelo\\Usuario' . "\0" . 'apellido', '' . "\0" . 'Modelo\\Usuario' . "\0" . 'clave', '' . "\0" . 'Modelo\\Usuario' . "\0" . 'email', '' . "\0" . 'Modelo\\Usuario' . "\0" . 'fotoHash', '' . "\0" . 'Modelo\\Usuario' . "\0" . 'direccion', '' . "\0" . 'Modelo\\Usuario' . "\0" . 'codigoPostal', '' . "\0" . 'Modelo\\Usuario' . "\0" . 'ciudadId', '' . "\0" . 'Modelo\\Usuario' . "\0" . 'telefono', '' . "\0" . 'Modelo\\Usuario' . "\0" . 'mailAdicional', '' . "\0" . 'Modelo\\Usuario' . "\0" . 'ultimaActualizacion', '' . "\0" . 'Modelo\\Usuario' . "\0" . 'ultimaActividad', '' . "\0" . 'Modelo\\Usuario' . "\0" . 'activo', '' . "\0" . 'Modelo\\Usuario' . "\0" . 'eliminado', '' . "\0" . 'Modelo\\Usuario' . "\0" . 'empresa'];
        }

        return ['__isInitialized__', '' . "\0" . 'Modelo\\Usuario' . "\0" . 'usuarioId', '' . "\0" . 'Modelo\\Usuario' . "\0" . 'nombreUsuario', '' . "\0" . 'Modelo\\Usuario' . "\0" . 'nombre', '' . "\0" . 'Modelo\\Usuario' . "\0" . 'apellido', '' . "\0" . 'Modelo\\Usuario' . "\0" . 'clave', '' . "\0" . 'Modelo\\Usuario' . "\0" . 'email', '' . "\0" . 'Modelo\\Usuario' . "\0" . 'fotoHash', '' . "\0" . 'Modelo\\Usuario' . "\0" . 'direccion', '' . "\0" . 'Modelo\\Usuario' . "\0" . 'codigoPostal', '' . "\0" . 'Modelo\\Usuario' . "\0" . 'ciudadId', '' . "\0" . 'Modelo\\Usuario' . "\0" . 'telefono', '' . "\0" . 'Modelo\\Usuario' . "\0" . 'mailAdicional', '' . "\0" . 'Modelo\\Usuario' . "\0" . 'ultimaActualizacion', '' . "\0" . 'Modelo\\Usuario' . "\0" . 'ultimaActividad', '' . "\0" . 'Modelo\\Usuario' . "\0" . 'activo', '' . "\0" . 'Modelo\\Usuario' . "\0" . 'eliminado', '' . "\0" . 'Modelo\\Usuario' . "\0" . 'empresa'];
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (Usuario $proxy) {
                $proxy->__setInitializer(null);
                $proxy->__setCloner(null);

                $existingProperties = get_object_vars($proxy);

                foreach ($proxy->__getLazyProperties() as $property => $defaultValue) {
                    if ( ! array_key_exists($property, $existingProperties)) {
                        $proxy->$property = $defaultValue;
                    }
                }
            };

        }
    }

    /**
     * 
     */
    public function __clone()
    {
        $this->__cloner__ && $this->__cloner__->__invoke($this, '__clone', []);
    }

    /**
     * Forces initialization of the proxy
     */
    public function __load()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, '__load', []);
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __isInitialized()
    {
        return $this->__isInitialized__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitialized($initialized)
    {
        $this->__isInitialized__ = $initialized;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitializer(\Closure $initializer = null)
    {
        $this->__initializer__ = $initializer;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __getInitializer()
    {
        return $this->__initializer__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setCloner(\Closure $cloner = null)
    {
        $this->__cloner__ = $cloner;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific cloning logic
     */
    public function __getCloner()
    {
        return $this->__cloner__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     * @static
     */
    public function __getLazyProperties()
    {
        return self::$lazyPropertiesDefaults;
    }

    
    /**
     * {@inheritDoc}
     */
    public function setUsuarioId($usuarioId)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setUsuarioId', [$usuarioId]);

        return parent::setUsuarioId($usuarioId);
    }

    /**
     * {@inheritDoc}
     */
    public function getUsuarioId()
    {
        if ($this->__isInitialized__ === false) {
            return (int)  parent::getUsuarioId();
        }


        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getUsuarioId', []);

        return parent::getUsuarioId();
    }

    /**
     * {@inheritDoc}
     */
    public function setNombreUsuario($nombreUsuario)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setNombreUsuario', [$nombreUsuario]);

        return parent::setNombreUsuario($nombreUsuario);
    }

    /**
     * {@inheritDoc}
     */
    public function getNombreUsuario()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getNombreUsuario', []);

        return parent::getNombreUsuario();
    }

    /**
     * {@inheritDoc}
     */
    public function setNombre($nombre)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setNombre', [$nombre]);

        return parent::setNombre($nombre);
    }

    /**
     * {@inheritDoc}
     */
    public function getNombre()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getNombre', []);

        return parent::getNombre();
    }

    /**
     * {@inheritDoc}
     */
    public function setApellido($apellido)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setApellido', [$apellido]);

        return parent::setApellido($apellido);
    }

    /**
     * {@inheritDoc}
     */
    public function getApellido()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getApellido', []);

        return parent::getApellido();
    }

    /**
     * {@inheritDoc}
     */
    public function setClave($clave)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setClave', [$clave]);

        return parent::setClave($clave);
    }

    /**
     * {@inheritDoc}
     */
    public function getClave()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getClave', []);

        return parent::getClave();
    }

    /**
     * {@inheritDoc}
     */
    public function setEmail($email)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setEmail', [$email]);

        return parent::setEmail($email);
    }

    /**
     * {@inheritDoc}
     */
    public function getEmail()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getEmail', []);

        return parent::getEmail();
    }

    /**
     * {@inheritDoc}
     */
    public function setFotoHash($fotoHash)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setFotoHash', [$fotoHash]);

        return parent::setFotoHash($fotoHash);
    }

    /**
     * {@inheritDoc}
     */
    public function getFotoHash()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getFotoHash', []);

        return parent::getFotoHash();
    }

    /**
     * {@inheritDoc}
     */
    public function setDireccion($direccion)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDireccion', [$direccion]);

        return parent::setDireccion($direccion);
    }

    /**
     * {@inheritDoc}
     */
    public function getDireccion()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDireccion', []);

        return parent::getDireccion();
    }

    /**
     * {@inheritDoc}
     */
    public function setCodigoPostal($codigoPostal)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCodigoPostal', [$codigoPostal]);

        return parent::setCodigoPostal($codigoPostal);
    }

    /**
     * {@inheritDoc}
     */
    public function getCodigoPostal()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCodigoPostal', []);

        return parent::getCodigoPostal();
    }

    /**
     * {@inheritDoc}
     */
    public function setCiudadId($ciudadId)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCiudadId', [$ciudadId]);

        return parent::setCiudadId($ciudadId);
    }

    /**
     * {@inheritDoc}
     */
    public function getCiudadId()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCiudadId', []);

        return parent::getCiudadId();
    }

    /**
     * {@inheritDoc}
     */
    public function setTelefono($telefono)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setTelefono', [$telefono]);

        return parent::setTelefono($telefono);
    }

    /**
     * {@inheritDoc}
     */
    public function getTelefono()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getTelefono', []);

        return parent::getTelefono();
    }

    /**
     * {@inheritDoc}
     */
    public function setMailAdicional($mailAdicional)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setMailAdicional', [$mailAdicional]);

        return parent::setMailAdicional($mailAdicional);
    }

    /**
     * {@inheritDoc}
     */
    public function getMailAdicional()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getMailAdicional', []);

        return parent::getMailAdicional();
    }

    /**
     * {@inheritDoc}
     */
    public function setUltimaActualizacion($ultimaActualizacion)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setUltimaActualizacion', [$ultimaActualizacion]);

        return parent::setUltimaActualizacion($ultimaActualizacion);
    }

    /**
     * {@inheritDoc}
     */
    public function getUltimaActualizacion()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getUltimaActualizacion', []);

        return parent::getUltimaActualizacion();
    }

    /**
     * {@inheritDoc}
     */
    public function setUltimaActividad($ultimaActividad)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setUltimaActividad', [$ultimaActividad]);

        return parent::setUltimaActividad($ultimaActividad);
    }

    /**
     * {@inheritDoc}
     */
    public function getUltimaActividad()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getUltimaActividad', []);

        return parent::getUltimaActividad();
    }

    /**
     * {@inheritDoc}
     */
    public function setActivo($activo)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setActivo', [$activo]);

        return parent::setActivo($activo);
    }

    /**
     * {@inheritDoc}
     */
    public function getActivo()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getActivo', []);

        return parent::getActivo();
    }

    /**
     * {@inheritDoc}
     */
    public function setEliminado($eliminado)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setEliminado', [$eliminado]);

        return parent::setEliminado($eliminado);
    }

    /**
     * {@inheritDoc}
     */
    public function getEliminado()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getEliminado', []);

        return parent::getEliminado();
    }

    /**
     * {@inheritDoc}
     */
    public function setEmpresa(\Modelo\Empresa $empresa)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setEmpresa', [$empresa]);

        return parent::setEmpresa($empresa);
    }

    /**
     * {@inheritDoc}
     */
    public function getEmpresa()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getEmpresa', []);

        return parent::getEmpresa();
    }

}
