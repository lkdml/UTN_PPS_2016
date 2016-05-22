<?php

namespace Proxies\__CG__\Modelo;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class Sla extends \Modelo\Sla implements \Doctrine\ORM\Proxy\Proxy
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
            return ['__isInitialized__', '' . "\0" . 'Modelo\\Sla' . "\0" . 'slaId', '' . "\0" . 'Modelo\\Sla' . "\0" . 'nombre', '' . "\0" . 'Modelo\\Sla' . "\0" . 'descripcion', '' . "\0" . 'Modelo\\Sla' . "\0" . 'departamentoOrigen', '' . "\0" . 'Modelo\\Sla' . "\0" . 'estadoOrigen', '' . "\0" . 'Modelo\\Sla' . "\0" . 'prioridadOrigen', '' . "\0" . 'Modelo\\Sla' . "\0" . 'horas', '' . "\0" . 'Modelo\\Sla' . "\0" . 'condicionHora', '' . "\0" . 'Modelo\\Sla' . "\0" . 'accionDepartamento', '' . "\0" . 'Modelo\\Sla' . "\0" . 'accionPrioridad', '' . "\0" . 'Modelo\\Sla' . "\0" . 'accionEstado', '' . "\0" . 'Modelo\\Sla' . "\0" . 'accionOperadorAsignado', '' . "\0" . 'Modelo\\Sla' . "\0" . 'estado', '' . "\0" . 'Modelo\\Sla' . "\0" . 'eliminado', '' . "\0" . 'Modelo\\Sla' . "\0" . 'emailTemplate', '' . "\0" . 'Modelo\\Sla' . "\0" . 'tipoTicketOrigen'];
        }

        return ['__isInitialized__', '' . "\0" . 'Modelo\\Sla' . "\0" . 'slaId', '' . "\0" . 'Modelo\\Sla' . "\0" . 'nombre', '' . "\0" . 'Modelo\\Sla' . "\0" . 'descripcion', '' . "\0" . 'Modelo\\Sla' . "\0" . 'departamentoOrigen', '' . "\0" . 'Modelo\\Sla' . "\0" . 'estadoOrigen', '' . "\0" . 'Modelo\\Sla' . "\0" . 'prioridadOrigen', '' . "\0" . 'Modelo\\Sla' . "\0" . 'horas', '' . "\0" . 'Modelo\\Sla' . "\0" . 'condicionHora', '' . "\0" . 'Modelo\\Sla' . "\0" . 'accionDepartamento', '' . "\0" . 'Modelo\\Sla' . "\0" . 'accionPrioridad', '' . "\0" . 'Modelo\\Sla' . "\0" . 'accionEstado', '' . "\0" . 'Modelo\\Sla' . "\0" . 'accionOperadorAsignado', '' . "\0" . 'Modelo\\Sla' . "\0" . 'estado', '' . "\0" . 'Modelo\\Sla' . "\0" . 'eliminado', '' . "\0" . 'Modelo\\Sla' . "\0" . 'emailTemplate', '' . "\0" . 'Modelo\\Sla' . "\0" . 'tipoTicketOrigen'];
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (Sla $proxy) {
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
    public function setSlaId($slaId)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setSlaId', [$slaId]);

        return parent::setSlaId($slaId);
    }

    /**
     * {@inheritDoc}
     */
    public function getSlaId()
    {
        if ($this->__isInitialized__ === false) {
            return (int)  parent::getSlaId();
        }


        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getSlaId', []);

        return parent::getSlaId();
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
    public function setDepartamentoOrigen($departamentoOrigen)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDepartamentoOrigen', [$departamentoOrigen]);

        return parent::setDepartamentoOrigen($departamentoOrigen);
    }

    /**
     * {@inheritDoc}
     */
    public function getDepartamentoOrigen()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDepartamentoOrigen', []);

        return parent::getDepartamentoOrigen();
    }

    /**
     * {@inheritDoc}
     */
    public function setEstadoOrigen($estadoOrigen)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setEstadoOrigen', [$estadoOrigen]);

        return parent::setEstadoOrigen($estadoOrigen);
    }

    /**
     * {@inheritDoc}
     */
    public function getEstadoOrigen()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getEstadoOrigen', []);

        return parent::getEstadoOrigen();
    }

    /**
     * {@inheritDoc}
     */
    public function setPrioridadOrigen($prioridadOrigen)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPrioridadOrigen', [$prioridadOrigen]);

        return parent::setPrioridadOrigen($prioridadOrigen);
    }

    /**
     * {@inheritDoc}
     */
    public function getPrioridadOrigen()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPrioridadOrigen', []);

        return parent::getPrioridadOrigen();
    }

    /**
     * {@inheritDoc}
     */
    public function setHoras($horas)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setHoras', [$horas]);

        return parent::setHoras($horas);
    }

    /**
     * {@inheritDoc}
     */
    public function getHoras()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getHoras', []);

        return parent::getHoras();
    }

    /**
     * {@inheritDoc}
     */
    public function setCondicionHora($condicionHora)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCondicionHora', [$condicionHora]);

        return parent::setCondicionHora($condicionHora);
    }

    /**
     * {@inheritDoc}
     */
    public function getCondicionHora()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCondicionHora', []);

        return parent::getCondicionHora();
    }

    /**
     * {@inheritDoc}
     */
    public function setAccionDepartamento($accionDepartamento)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setAccionDepartamento', [$accionDepartamento]);

        return parent::setAccionDepartamento($accionDepartamento);
    }

    /**
     * {@inheritDoc}
     */
    public function getAccionDepartamento()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getAccionDepartamento', []);

        return parent::getAccionDepartamento();
    }

    /**
     * {@inheritDoc}
     */
    public function setAccionPrioridad($accionPrioridad)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setAccionPrioridad', [$accionPrioridad]);

        return parent::setAccionPrioridad($accionPrioridad);
    }

    /**
     * {@inheritDoc}
     */
    public function getAccionPrioridad()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getAccionPrioridad', []);

        return parent::getAccionPrioridad();
    }

    /**
     * {@inheritDoc}
     */
    public function setAccionEstado($accionEstado)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setAccionEstado', [$accionEstado]);

        return parent::setAccionEstado($accionEstado);
    }

    /**
     * {@inheritDoc}
     */
    public function getAccionEstado()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getAccionEstado', []);

        return parent::getAccionEstado();
    }

    /**
     * {@inheritDoc}
     */
    public function setAccionOperadorAsignado($accionOperadorAsignado)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setAccionOperadorAsignado', [$accionOperadorAsignado]);

        return parent::setAccionOperadorAsignado($accionOperadorAsignado);
    }

    /**
     * {@inheritDoc}
     */
    public function getAccionOperadorAsignado()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getAccionOperadorAsignado', []);

        return parent::getAccionOperadorAsignado();
    }

    /**
     * {@inheritDoc}
     */
    public function setEstado($estado)
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
    public function setEmailTemplate(\Modelo\EmailTemplates $emailTemplate)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setEmailTemplate', [$emailTemplate]);

        return parent::setEmailTemplate($emailTemplate);
    }

    /**
     * {@inheritDoc}
     */
    public function getEmailTemplate()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getEmailTemplate', []);

        return parent::getEmailTemplate();
    }

    /**
     * {@inheritDoc}
     */
    public function setTipoTicketOrigen(\Modelo\TicketTipo $tipoTicketOrigen)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setTipoTicketOrigen', [$tipoTicketOrigen]);

        return parent::setTipoTicketOrigen($tipoTicketOrigen);
    }

    /**
     * {@inheritDoc}
     */
    public function getTipoTicketOrigen()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getTipoTicketOrigen', []);

        return parent::getTipoTicketOrigen();
    }

}