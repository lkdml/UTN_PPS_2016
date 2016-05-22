<?php

namespace Proxies\__CG__\Modelo;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class Departamento extends \Modelo\Departamento implements \Doctrine\ORM\Proxy\Proxy
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
            return ['__isInitialized__', '' . "\0" . 'Modelo\\Departamento' . "\0" . 'departamentoId', '' . "\0" . 'Modelo\\Departamento' . "\0" . 'nombre', '' . "\0" . 'Modelo\\Departamento' . "\0" . 'descripcion', '' . "\0" . 'Modelo\\Departamento' . "\0" . 'padreDeptoId', '' . "\0" . 'Modelo\\Departamento' . "\0" . 'visibilidadUsuario', '' . "\0" . 'Modelo\\Departamento' . "\0" . 'orden', '' . "\0" . 'Modelo\\Departamento' . "\0" . 'operadorDefaultId', '' . "\0" . 'Modelo\\Departamento' . "\0" . 'operador'];
        }

        return ['__isInitialized__', '' . "\0" . 'Modelo\\Departamento' . "\0" . 'departamentoId', '' . "\0" . 'Modelo\\Departamento' . "\0" . 'nombre', '' . "\0" . 'Modelo\\Departamento' . "\0" . 'descripcion', '' . "\0" . 'Modelo\\Departamento' . "\0" . 'padreDeptoId', '' . "\0" . 'Modelo\\Departamento' . "\0" . 'visibilidadUsuario', '' . "\0" . 'Modelo\\Departamento' . "\0" . 'orden', '' . "\0" . 'Modelo\\Departamento' . "\0" . 'operadorDefaultId', '' . "\0" . 'Modelo\\Departamento' . "\0" . 'operador'];
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (Departamento $proxy) {
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
    public function getDepartamentoId()
    {
        if ($this->__isInitialized__ === false) {
            return (int)  parent::getDepartamentoId();
        }


        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDepartamentoId', []);

        return parent::getDepartamentoId();
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
    public function setDescripcion($descripcion)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDescripcion', [$descripcion]);

        return parent::setDescripcion($descripcion);
    }

    /**
     * {@inheritDoc}
     */
    public function getDescripcion()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDescripcion', []);

        return parent::getDescripcion();
    }

    /**
     * {@inheritDoc}
     */
    public function setPadreDeptoId($padreDeptoId)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPadreDeptoId', [$padreDeptoId]);

        return parent::setPadreDeptoId($padreDeptoId);
    }

    /**
     * {@inheritDoc}
     */
    public function getPadreDeptoId()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPadreDeptoId', []);

        return parent::getPadreDeptoId();
    }

    /**
     * {@inheritDoc}
     */
    public function setVisibilidadUsuario($visibilidadUsuario)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setVisibilidadUsuario', [$visibilidadUsuario]);

        return parent::setVisibilidadUsuario($visibilidadUsuario);
    }

    /**
     * {@inheritDoc}
     */
    public function getVisibilidadUsuario()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getVisibilidadUsuario', []);

        return parent::getVisibilidadUsuario();
    }

    /**
     * {@inheritDoc}
     */
    public function setOrden($orden)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setOrden', [$orden]);

        return parent::setOrden($orden);
    }

    /**
     * {@inheritDoc}
     */
    public function getOrden()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getOrden', []);

        return parent::getOrden();
    }

    /**
     * {@inheritDoc}
     */
    public function setOperadorDefaultId($operadorDefaultId)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setOperadorDefaultId', [$operadorDefaultId]);

        return parent::setOperadorDefaultId($operadorDefaultId);
    }

    /**
     * {@inheritDoc}
     */
    public function getOperadorDefaultId()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getOperadorDefaultId', []);

        return parent::getOperadorDefaultId();
    }

    /**
     * {@inheritDoc}
     */
    public function addOperador(\Modelo\Operador $operador)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addOperador', [$operador]);

        return parent::addOperador($operador);
    }

    /**
     * {@inheritDoc}
     */
    public function removeOperador(\Modelo\Operador $operador)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeOperador', [$operador]);

        return parent::removeOperador($operador);
    }

    /**
     * {@inheritDoc}
     */
    public function getOperador()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getOperador', []);

        return parent::getOperador();
    }

}