<?php
namespace CORE\Controlador;
  /**
  * @author lkdml
  * @version Core 1.0
  * 
  * 
  */
  

class Error {
    private $tipo;
    private $titulo;
    private $mensaje;
    private $codigo;
    private $modulo;
    private $fecha;
    
    public function __get($property)
    {
      if (property_exists($this, $property)) {
        return $this->$property;
      }
    }
    
    public function __set($property, $value)
    {
      if (property_exists($this, $property)) {
        $this->$property = $value;
      }
    }
    
    /**
     * constructor, por defecto null
     * @param $_tipo 0=info 1=Alerta 2=error
     * @param $_mensaje
     * @param $_codigo
     * 
     **/
     
    public function __construct($_tipo = null,$_titulo = null,$_mensaje = null,$_codigo = null,$_modulo =null){
        $this->tipo=$_tipo;
        $this->titulo=$_titulo;
        $this->mensaje=$_mensaje;
        $this->codigo=$_codigo;
        $this->modulo=$_modulo;
        $this->fecha = new \DateTime("NOW");
    }
    
    public function guardarEnLog(){
        \CORE\Controlador\Dbug::getInstancia()->escribirLog($fecha->format("Y-m-d h:m")." Codigo:".$this->getCodigo() . "  Mensaje:".$this->getMensaje(),$this->getModulo(),true);
    }
    
    public function getTipoString(){
        $strTipo=null;
        switch ($this->tipo) {
            case '0':
                $strTipo = "Info";
                break;
            case '1':
                $strTipo = "Alerta";
                break;
            case '2':
                $strTipo = "Error";
                break;
            default:
                $strTipo = "Bug";
                break;
        }
        return $strTipo;
    }
    
    public function getHtmlModalTipo(){
        $strTipo=null;
        switch ($this->tipo) {
            case '0':
                $strTipo = "modal-info";
                break;
            case '1':
                $strTipo = "modal-warning";
                break;
            case '2':
                $strTipo = "modal-danger";
                break;
            default:
                $strTipo = "modal-danger";
                break;
        }
        return $strTipo;
    }
    
    public function getHtmlModal(){
        $modal = '<!-- Modal para Borrar-->
                  <div class="modal '.$this->getHtmlModalTipo().' fade" role="dialog" id="errorModalError">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                          <h4 class="modal-title">'.$this->codigo.'</h4>
                        </div>
                        <div class="modal-body">
                          <p>Error: '.$this->codigo.' </p>
                          <p>'.$this->mensaje.'</p>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-outline pull-right" data-dismiss="modal">Close</button>
                      </div>
                      <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                  </div>
                <!-- End Modal Content -->';
            return $modal;
    }
    
}
?>