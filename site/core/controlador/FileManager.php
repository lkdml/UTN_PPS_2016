<?php
namespace CORE\Controlador;
  /**
  * @author lkdml
  * @version Core 1.0
  * 
  * 
  */
  

class FileManager {
    private $extensionesPermitidas;
    private $rutaUpload;
    private $arrayNombres;
    
    public function getExtensionesPermitidas(){return $this->extensionesPermitidas;}
    public function getRutaUpload(){return $this->rutaUpload;}
    public function getArrayNombres(){return $this->arrayNombres;}
    public function getRutaUploadRelativa(){return str_replace(\CORE\Controlador\Config::getPublic('Ruta_App'),"",$this->rutaUpload);}
    
    public function setArrayNombres($NombresArray) {$this->arrayNombres = $NombresArray;}
    public function setExtensionesPermitidas($extensiones_Permitidas) {$this->extensionesPermitidas = $extensiones_Permitidas;}
    public function setRutaUpload($ruta_upload) {
        if (substr($ruta_upload, -1) == DIRECTORY_SEPARATOR){
            $ruta_upload = $ruta_upload.DIRECTORY_SEPARATOR;
        }
        $this->rutaUpload = $ruta_upload;
    }
    
    /**
     * constructor, por defecto null
     * @param $extensiones_Permitidas
     * @param $ruta_upload
     * 
     **/
     
    public function __construct($extensiones_Permitidas_Json = null,$ruta_upload = null){
        $this->extensionesPermitidas = $extensiones_Permitidas_Json;
        if (is_null($ruta_upload)){
            $this->rutaUpload = \CORE\Controlador\Config::getPublic('Ruta_Uploads');
        } else {
            $this->rutaUpload = \CORE\Controlador\Config::getPublic('Ruta_App').$ruta_upload;
        }
        $this->arrayNombres =  array();
    }
    
    /**
     * @param $_FILES $filesArray pasar $_FILES directamente
     * @param String $nombreClave, por si queremos una clave en particular del $_FILES
     * 
     * @return array con nombres asignados por cada llave dentro del $_Files[nombreClave]
     * */
    public function guardarArchivosDePost($filesArray, $NombreClave = null ,$sobreEscribir=false){
        $this->arrayNombres =  array();
        if (is_null($NombreClave)){
            foreach ($filesArray as $clave=>$valor){
                if ( $valor['error'][0] == '0'){
                    $NombreClave[]=$clave;
                } else {
                    \CORE\Controlador\Dbug::getInstancia()->escribirLog("El archivo subió con errores ","FileManager",true);
                    return null;
                }
            }
            
        }
        var_dump($NombreClave);
        foreach ($NombreClave as $clave) {
            foreach( $filesArray[ $clave ][ 'tmp_name' ] as $index => $tmpName ) {
                //si no hay error en la subida
                if( empty( $filesArray[ $clave ][ 'error' ][ $index ] ) ) {
                    //verifico que el resto de los elementos esten ok y procedo a mover los archivos
                    if( !empty( $tmpName ) && is_uploaded_file( $tmpName ) && $this->verificarExtension($filesArray[$clave]["name"][$index])){
                        $filename = $this->crearHashDeArchivo($filesArray[$clave]["name"][$index]);
                        switch ($this->moverArchivo($tmpName,null,$this->rutaUpload,$filename,true)) {
                            case true:
                                $this->arrayNombres[] = array('name'=>$filesArray[$clave]["name"][$index],
                                                            'hashName' =>  $filename,
                                                            'path' => $this->getRutaUploadRelativa());
                                \CORE\Controlador\Dbug::getInstancia()->escribirLog("Se guardó satisfactoriamente el archivo: ".$this->rutaUpload.$filename,"FileManager");
                                break;
                            case -1:
                                $int=0;
                                $filename = $this->crearHashDeArchivo($filesArray[$clave]["name"][$index]);
                                while (file_exists($this->rutaUpload . $filename)){
                                        $archivo = pathinfo($filname);
                                        $filename=$archivo['filename'].'_'.$int.$archivo['extension'];
                                        $int ++;
                                }
                                $this->moverArchivo($tmpName,null,$this->rutaUpload,$filename,true);
                                $this->arrayNombres[] = array('name'=>$filesArray[$clave]["name"][$index],
                                                            'hashName' =>  $filename,
                                                            'path' => $this->getRutaUploadRelativa());
                                \CORE\Controlador\Dbug::getInstancia()->escribirLog("Se guardó satisfactoriamente el archivo: ".$this->rutaUpload.$filename,"FileManager");
                                break;
                            
                            case false: default:
                                \CORE\Controlador\Dbug::getInstancia()->escribirLog("No se pudo guardar el archivo: ".$this->rutaUpload.$filename,"FileManager",true);
                                break;
                        }
                    } 
                }
                     
            }
        }
        return $this->arrayNombres;
    }
    
    private function verificarExtension($archivo){
        $extensionesPermitidas = json_decode($this->extensionesPermitidas);
        $extension = pathinfo($archivo)['extension'];
        foreach ($extensionesPermitidas as $ep){
            if (strtolower($ep)==strtolower($extension)){
                
                return true;
            }
        }
        return false;
    }
    
    private function moverArchivo($rutaOrigen,$archivoOrigen=null,$rutaDestino,$archivoDestino=null,$sobreEscribir=false){
         try{
            if (is_writable($rutaDestino)){
                if (!file_exists($rutaDestino . $archivoDestino)){
                    if (move_uploaded_file( $rutaOrigen.$archivoOrigen, $rutaDestino.$archivoDestino)){
                        return true;
                    } else {
                        \CORE\Controlador\Dbug::getInstancia()->escribirLog("Error al subir '".$rutaDestino.$archivoDestino."'","FileManager",true);
                    }
                } else {
                    if ($sobreEscribir){
                        \CORE\Controlador\Dbug::getInstancia()->escribirLog("Se borra archivo existente '".$rutaDestino.$archivoDestino."'","FileManager");
                        unlink($rutaDestino.$archivoDestino);
                        if (move_uploaded_file( $rutaOrigen.$archivoOrigen, $rutaDestino.$archivoDestino)){
                            return true;
                        } else {
                                \CORE\Controlador\Dbug::getInstancia()->escribirLog("Error al subir '".$rutaDestino.$archivoDestino."'","FileManager",true);
                        }
                    } else {
                        \CORE\Controlador\Dbug::getInstancia()->escribirLog("Ya existe el archivo: '".$path.$archivoDestino."'","FileManager",true);
                        return -1;
                    }
                }
            } else {
                \CORE\Controlador\Dbug::getInstancia()->escribirLog("No se puede grabar en: ".$rutaDestino,"FileManager");
            }
            return false;
            
        } catch (Exception $exc) {
            \CORE\Controlador\Dbug::getInstancia()->escribirLog($exc->getMessage(),"FileManager",true);
        }
        
        
        
        
    }
    /**
     * crea y genera un hash SHA256 con el nombre del archivo pasado
     * 
     * @param
     * 
     * @return
     * */
    public function crearHashDeArchivo($nombreArchivo){
        $ext = ".".pathinfo($nombreArchivo, PATHINFO_EXTENSION);
        $filename = hash( "sha256",$nombreArchivo).$ext;
        return $filename;
    }
}
?>