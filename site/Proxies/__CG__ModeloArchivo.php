<?php

namespace Proxies\__CG__\Modelo;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class Archivo extends \Modelo\Archivo implements \Doctrine\ORM\Proxy\Proxy
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
            return ['__isInitialized__', '' . "\0" . 'Modelo\\Archivo' . "\0" . 'archivoId', '' . "\0" . 'Modelo\\Archivo' . "\0" . 'nombre', '' . "\0" . 'Modelo\\Archivo' . "\0" . 'hash', '' . "\0" . 'Modelo\\Archivo' . "\0" . 'fechaCreacion', '' . "\0" . 'Modelo\\Archivo' . "\0" . 'directorio', '' . "\0" . 'Modelo\\Archivo' . "\0" . 'mensaje', '' . "\0" . 'Modelo\\Archivo' . "\0" . 'ticket'];
        }

        return ['__isInitialized__', '' . "\0" . 'Modelo\\Archivo' . "\0" . 'archivoId', '' . "\0" . 'Modelo\\Archivo' . "\0" . 'nombre', '' . "\0" . 'Modelo\\Archivo' . "\0" . 'hash', '' . "\0" . 'Modelo\\Archivo' . "\0" . 'fechaCreacion', '' . "\0" . 'Modelo\\Archivo' . "\0" . 'directorio', '' . "\0" . 'Modelo\\Archivo' . "\0" . 'mensaje', '' . "\0" . 'Modelo\\Archivo' . "\0" . 'ticket'];
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (Archivo $proxy) {
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
    public function getArchivoId()
    {
        if ($this->__isInitialized__ === false) {
            return (int)  parent::getArchivoId();
        }


        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getArchivoId', []);

        return parent::getArchivoId();
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
    public function setHash($hash)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setHash', [$hash]);

        return parent::setHash($hash);
    }

    /**
     * {@inheritDoc}
     */
    public function getHash()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getHash', []);

        return parent::getHash();
    }

    /**
     * {@inheritDoc}
     */
    public function setFechaCreacion($fechaCreacion)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setFechaCreacion', [$fechaCreacion]);

        return parent::setFechaCreacion($fechaCreacion);
    }

    /**
     * {@inheritDoc}
     */
    public function getFechaCreacion()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getFechaCreacion', []);

        return parent::getFechaCreacion();
    }

    /**
     * {@inheritDoc}
     */
    public function setDirectorio($directorio)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDirectorio', [$directorio]);

        return parent::setDirectorio($directorio);
    }

    /**
     * {@inheritDoc}
     */
    public function getDirectorio()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDirectorio', []);

        return parent::getDirectorio();
    }

    /**
     * {@inheritDoc}
     */
    public function addMensaje(\Modelo\Mensaje $mensaje)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addMensaje', [$mensaje]);

        return parent::addMensaje($mensaje);
    }

    /**
     * {@inheritDoc}
     */
    public function removeMensaje(\Modelo\Mensaje $mensaje)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeMensaje', [$mensaje]);

        return parent::removeMensaje($mensaje);
    }

    /**
     * {@inheritDoc}
     */
    public function getMensaje()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getMensaje', []);

        return parent::getMensaje();
    }

    /**
     * {@inheritDoc}
     */
    public function addTicket(\Modelo\Ticket $ticket)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addTicket', [$ticket]);

        return parent::addTicket($ticket);
    }

    /**
     * {@inheritDoc}
     */
    public function removeTicket(\Modelo\Ticket $ticket)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeTicket', [$ticket]);

        return parent::removeTicket($ticket);
    }

    /**
     * {@inheritDoc}
     */
    public function getTicket()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getTicket', []);

        return parent::getTicket();
    }

}
