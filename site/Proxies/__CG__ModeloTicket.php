<?php

namespace Proxies\__CG__\Modelo;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class Ticket extends \Modelo\Ticket implements \Doctrine\ORM\Proxy\Proxy
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
            return ['__isInitialized__', '' . "\0" . 'Modelo\\Ticket' . "\0" . 'ticketId', '' . "\0" . 'Modelo\\Ticket' . "\0" . 'descripcion', '' . "\0" . 'Modelo\\Ticket' . "\0" . 'numeroTicket', '' . "\0" . 'Modelo\\Ticket' . "\0" . 'emailQueueId', '' . "\0" . 'Modelo\\Ticket' . "\0" . 'asignado', '' . "\0" . 'Modelo\\Ticket' . "\0" . 'asunto', '' . "\0" . 'Modelo\\Ticket' . "\0" . 'ultimaActividad', '' . "\0" . 'Modelo\\Ticket' . "\0" . 'ultimaActividadUser', '' . "\0" . 'Modelo\\Ticket' . "\0" . 'ultimaActividadOperador', '' . "\0" . 'Modelo\\Ticket' . "\0" . 'fechaCreacion', '' . "\0" . 'Modelo\\Ticket' . "\0" . 'fechaVto', '' . "\0" . 'Modelo\\Ticket' . "\0" . 'editado', '' . "\0" . 'Modelo\\Ticket' . "\0" . 'customFields', '' . "\0" . 'Modelo\\Ticket' . "\0" . 'usuario', '' . "\0" . 'Modelo\\Ticket' . "\0" . 'estado', '' . "\0" . 'Modelo\\Ticket' . "\0" . 'prioridad', '' . "\0" . 'Modelo\\Ticket' . "\0" . 'departamento', '' . "\0" . 'Modelo\\Ticket' . "\0" . 'operador', '' . "\0" . 'Modelo\\Ticket' . "\0" . 'asignadoAOperador', '' . "\0" . 'Modelo\\Ticket' . "\0" . 'tipoTicket'];
        }

        return ['__isInitialized__', '' . "\0" . 'Modelo\\Ticket' . "\0" . 'ticketId', '' . "\0" . 'Modelo\\Ticket' . "\0" . 'descripcion', '' . "\0" . 'Modelo\\Ticket' . "\0" . 'numeroTicket', '' . "\0" . 'Modelo\\Ticket' . "\0" . 'emailQueueId', '' . "\0" . 'Modelo\\Ticket' . "\0" . 'asignado', '' . "\0" . 'Modelo\\Ticket' . "\0" . 'asunto', '' . "\0" . 'Modelo\\Ticket' . "\0" . 'ultimaActividad', '' . "\0" . 'Modelo\\Ticket' . "\0" . 'ultimaActividadUser', '' . "\0" . 'Modelo\\Ticket' . "\0" . 'ultimaActividadOperador', '' . "\0" . 'Modelo\\Ticket' . "\0" . 'fechaCreacion', '' . "\0" . 'Modelo\\Ticket' . "\0" . 'fechaVto', '' . "\0" . 'Modelo\\Ticket' . "\0" . 'editado', '' . "\0" . 'Modelo\\Ticket' . "\0" . 'customFields', '' . "\0" . 'Modelo\\Ticket' . "\0" . 'usuario', '' . "\0" . 'Modelo\\Ticket' . "\0" . 'estado', '' . "\0" . 'Modelo\\Ticket' . "\0" . 'prioridad', '' . "\0" . 'Modelo\\Ticket' . "\0" . 'departamento', '' . "\0" . 'Modelo\\Ticket' . "\0" . 'operador', '' . "\0" . 'Modelo\\Ticket' . "\0" . 'asignadoAOperador', '' . "\0" . 'Modelo\\Ticket' . "\0" . 'tipoTicket'];
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (Ticket $proxy) {
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
    public function getTicketId()
    {
        if ($this->__isInitialized__ === false) {
            return (int)  parent::getTicketId();
        }


        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getTicketId', []);

        return parent::getTicketId();
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
    public function setNumeroTicket($numeroTicket)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setNumeroTicket', [$numeroTicket]);

        return parent::setNumeroTicket($numeroTicket);
    }

    /**
     * {@inheritDoc}
     */
    public function getNumeroTicket()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getNumeroTicket', []);

        return parent::getNumeroTicket();
    }

    /**
     * {@inheritDoc}
     */
    public function setEmailQueueId($emailQueueId)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setEmailQueueId', [$emailQueueId]);

        return parent::setEmailQueueId($emailQueueId);
    }

    /**
     * {@inheritDoc}
     */
    public function getEmailQueueId()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getEmailQueueId', []);

        return parent::getEmailQueueId();
    }

    /**
     * {@inheritDoc}
     */
    public function setAsignado($asignado)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setAsignado', [$asignado]);

        return parent::setAsignado($asignado);
    }

    /**
     * {@inheritDoc}
     */
    public function getAsignado()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getAsignado', []);

        return parent::getAsignado();
    }

    /**
     * {@inheritDoc}
     */
    public function setAsunto($asunto)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setAsunto', [$asunto]);

        return parent::setAsunto($asunto);
    }

    /**
     * {@inheritDoc}
     */
    public function getAsunto()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getAsunto', []);

        return parent::getAsunto();
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
    public function setUltimaActividadUser($ultimaActividadUser)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setUltimaActividadUser', [$ultimaActividadUser]);

        return parent::setUltimaActividadUser($ultimaActividadUser);
    }

    /**
     * {@inheritDoc}
     */
    public function getUltimaActividadUser()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getUltimaActividadUser', []);

        return parent::getUltimaActividadUser();
    }

    /**
     * {@inheritDoc}
     */
    public function setUltimaActividadOperador($ultimaActividadOperador)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setUltimaActividadOperador', [$ultimaActividadOperador]);

        return parent::setUltimaActividadOperador($ultimaActividadOperador);
    }

    /**
     * {@inheritDoc}
     */
    public function getUltimaActividadOperador()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getUltimaActividadOperador', []);

        return parent::getUltimaActividadOperador();
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
    public function setFechaVto($fechaVto)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setFechaVto', [$fechaVto]);

        return parent::setFechaVto($fechaVto);
    }

    /**
     * {@inheritDoc}
     */
    public function getFechaVto()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getFechaVto', []);

        return parent::getFechaVto();
    }

    /**
     * {@inheritDoc}
     */
    public function setEditado($editado)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setEditado', [$editado]);

        return parent::setEditado($editado);
    }

    /**
     * {@inheritDoc}
     */
    public function getEditado()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getEditado', []);

        return parent::getEditado();
    }

    /**
     * {@inheritDoc}
     */
    public function setCustomFields($customFields)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCustomFields', [$customFields]);

        return parent::setCustomFields($customFields);
    }

    /**
     * {@inheritDoc}
     */
    public function getCustomFields()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCustomFields', []);

        return parent::getCustomFields();
    }

    /**
     * {@inheritDoc}
     */
    public function setUsuario(\Modelo\Usuario $usuario = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setUsuario', [$usuario]);

        return parent::setUsuario($usuario);
    }

    /**
     * {@inheritDoc}
     */
    public function getUsuario()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getUsuario', []);

        return parent::getUsuario();
    }

    /**
     * {@inheritDoc}
     */
    public function setEstado(\Modelo\TicketEstado $estado = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setEstado', [$estado]);

        return parent::setEstado($estado);
    }

    /**
     * {@inheritDoc}
     */
    public function getEstado()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getEstado', []);

        return parent::getEstado();
    }

    /**
     * {@inheritDoc}
     */
    public function setPrioridad(\Modelo\Prioridad $prioridad = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPrioridad', [$prioridad]);

        return parent::setPrioridad($prioridad);
    }

    /**
     * {@inheritDoc}
     */
    public function getPrioridad()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPrioridad', []);

        return parent::getPrioridad();
    }

    /**
     * {@inheritDoc}
     */
    public function setDepartamento(\Modelo\Departamento $departamento = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDepartamento', [$departamento]);

        return parent::setDepartamento($departamento);
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
    public function setOperador(\Modelo\Operador $operador = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setOperador', [$operador]);

        return parent::setOperador($operador);
    }

    /**
     * {@inheritDoc}
     */
    public function getOperador()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getOperador', []);

        return parent::getOperador();
    }

    /**
     * {@inheritDoc}
     */
    public function setAsignadoAOperador(\Modelo\Operador $asignadoAOperador = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setAsignadoAOperador', [$asignadoAOperador]);

        return parent::setAsignadoAOperador($asignadoAOperador);
    }

    /**
     * {@inheritDoc}
     */
    public function getAsignadoAOperador()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getAsignadoAOperador', []);

        return parent::getAsignadoAOperador();
    }

    /**
     * {@inheritDoc}
     */
    public function setTipoTicket(\Modelo\TicketTipo $tipoTicket = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setTipoTicket', [$tipoTicket]);

        return parent::setTipoTicket($tipoTicket);
    }

    /**
     * {@inheritDoc}
     */
    public function getTipoTicket()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getTipoTicket', []);

        return parent::getTipoTicket();
    }

    /**
     * {@inheritDoc}
     */
    public function generarCodigoTicket($em)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'generarCodigoTicket', [$em]);

        return parent::generarCodigoTicket($em);
    }

}
