<?php

namespace Proxies\__CG__\Modelo;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class Operador extends \Modelo\Operador implements \Doctrine\ORM\Proxy\Proxy
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
            return ['__isInitialized__', '' . "\0" . 'Modelo\\Operador' . "\0" . 'operadorId', '' . "\0" . 'Modelo\\Operador' . "\0" . 'nombre', '' . "\0" . 'Modelo\\Operador' . "\0" . 'apellido', '' . "\0" . 'Modelo\\Operador' . "\0" . 'nombreUsuario', '' . "\0" . 'Modelo\\Operador' . "\0" . 'clave', '' . "\0" . 'Modelo\\Operador' . "\0" . 'firmaMensaje', '' . "\0" . 'Modelo\\Operador' . "\0" . 'email', '' . "\0" . 'Modelo\\Operador' . "\0" . 'celular', '' . "\0" . 'Modelo\\Operador' . "\0" . 'ultimaActualizacion', '' . "\0" . 'Modelo\\Operador' . "\0" . 'ultimaActividad', '' . "\0" . 'Modelo\\Operador' . "\0" . 'activo', '' . "\0" . 'Modelo\\Operador' . "\0" . 'deptosHabilitados', '' . "\0" . 'Modelo\\Operador' . "\0" . 'habilitaNotificacionesMail', '' . "\0" . 'Modelo\\Operador' . "\0" . 'filtroTicketId', '' . "\0" . 'Modelo\\Operador' . "\0" . 'hashFoto', '' . "\0" . 'Modelo\\Operador' . "\0" . 'eliminado', '' . "\0" . 'Modelo\\Operador' . "\0" . 'perfil', '' . "\0" . 'Modelo\\Operador' . "\0" . 'departamento'];
        }

        return ['__isInitialized__', '' . "\0" . 'Modelo\\Operador' . "\0" . 'operadorId', '' . "\0" . 'Modelo\\Operador' . "\0" . 'nombre', '' . "\0" . 'Modelo\\Operador' . "\0" . 'apellido', '' . "\0" . 'Modelo\\Operador' . "\0" . 'nombreUsuario', '' . "\0" . 'Modelo\\Operador' . "\0" . 'clave', '' . "\0" . 'Modelo\\Operador' . "\0" . 'firmaMensaje', '' . "\0" . 'Modelo\\Operador' . "\0" . 'email', '' . "\0" . 'Modelo\\Operador' . "\0" . 'celular', '' . "\0" . 'Modelo\\Operador' . "\0" . 'ultimaActualizacion', '' . "\0" . 'Modelo\\Operador' . "\0" . 'ultimaActividad', '' . "\0" . 'Modelo\\Operador' . "\0" . 'activo', '' . "\0" . 'Modelo\\Operador' . "\0" . 'deptosHabilitados', '' . "\0" . 'Modelo\\Operador' . "\0" . 'habilitaNotificacionesMail', '' . "\0" . 'Modelo\\Operador' . "\0" . 'filtroTicketId', '' . "\0" . 'Modelo\\Operador' . "\0" . 'hashFoto', '' . "\0" . 'Modelo\\Operador' . "\0" . 'eliminado', '' . "\0" . 'Modelo\\Operador' . "\0" . 'perfil', '' . "\0" . 'Modelo\\Operador' . "\0" . 'departamento'];
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (Operador $proxy) {
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
    public function getOperadorId()
    {
        if ($this->__isInitialized__ === false) {
            return (int)  parent::getOperadorId();
        }


        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getOperadorId', []);

        return parent::getOperadorId();
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
    public function setFirmaMensaje($firmaMensaje)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setFirmaMensaje', [$firmaMensaje]);

        return parent::setFirmaMensaje($firmaMensaje);
    }

    /**
     * {@inheritDoc}
     */
    public function getFirmaMensaje()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getFirmaMensaje', []);

        return parent::getFirmaMensaje();
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
    public function setCelular($celular)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCelular', [$celular]);

        return parent::setCelular($celular);
    }

    /**
     * {@inheritDoc}
     */
    public function getCelular()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCelular', []);

        return parent::getCelular();
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
    public function setDeptosHabilitados($deptosHabilitados)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDeptosHabilitados', [$deptosHabilitados]);

        return parent::setDeptosHabilitados($deptosHabilitados);
    }

    /**
     * {@inheritDoc}
     */
    public function getDeptosHabilitados()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDeptosHabilitados', []);

        return parent::getDeptosHabilitados();
    }

    /**
     * {@inheritDoc}
     */
    public function setHabilitaNotificacionesMail($habilitaNotificacionesMail)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setHabilitaNotificacionesMail', [$habilitaNotificacionesMail]);

        return parent::setHabilitaNotificacionesMail($habilitaNotificacionesMail);
    }

    /**
     * {@inheritDoc}
     */
    public function getHabilitaNotificacionesMail()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getHabilitaNotificacionesMail', []);

        return parent::getHabilitaNotificacionesMail();
    }

    /**
     * {@inheritDoc}
     */
    public function setFiltroTicketId($filtroTicketId)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setFiltroTicketId', [$filtroTicketId]);

        return parent::setFiltroTicketId($filtroTicketId);
    }

    /**
     * {@inheritDoc}
     */
    public function getFiltroTicketId()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getFiltroTicketId', []);

        return parent::getFiltroTicketId();
    }

    /**
     * {@inheritDoc}
     */
    public function setHashFoto($hashFoto)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setHashFoto', [$hashFoto]);

        return parent::setHashFoto($hashFoto);
    }

    /**
     * {@inheritDoc}
     */
    public function getHashFoto()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getHashFoto', []);

        return parent::getHashFoto();
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
    public function setPerfil(\Modelo\Perfil $perfil)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPerfil', [$perfil]);

        return parent::setPerfil($perfil);
    }

    /**
     * {@inheritDoc}
     */
    public function getPerfil()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPerfil', []);

        return parent::getPerfil();
    }

    /**
     * {@inheritDoc}
     */
    public function addDepartamento(\Modelo\Departamento $departamento)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addDepartamento', [$departamento]);

        return parent::addDepartamento($departamento);
    }

    /**
     * {@inheritDoc}
     */
    public function removeDepartamento(\Modelo\Departamento $departamento)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeDepartamento', [$departamento]);

        return parent::removeDepartamento($departamento);
    }

    /**
     * {@inheritDoc}
     */
    public function getDepartamento()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDepartamento', []);

        return parent::getDepartamento();
    }

    /**
     * {@inheritDoc}
     */
    public function eliminarUsuario()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'eliminarUsuario', []);

        return parent::eliminarUsuario();
    }

    /**
     * {@inheritDoc}
     */
    public function encriptarClave($clave)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'encriptarClave', [$clave]);

        return parent::encriptarClave($clave);
    }

    /**
     * {@inheritDoc}
     */
    public function verificarClave($clave)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'verificarClave', [$clave]);

        return parent::verificarClave($clave);
    }

}