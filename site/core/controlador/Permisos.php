<?php
namespace CORE\Controlador;

    require_once('Dbug.php');
    require_once(__DIR__.'./../../bootstrap_orm.php');
   

class Permisos {
    
    private $perfilId;
    private $permisos;

    
    public function setPerfilId($perfilId){$this->perfilId = $perfilId;}
    public function setPermisos($permisos){$this->permisos = $permisos;}
    
    public function getPermisos() {return $this->permisos;}
    public function getPerfilId() {return $this->perfilId;}
    
    public function verificarPermiso($permisos){
        if (is_array($permisos)){
            foreach ($permisos as $permiso) {
                foreach ($this->permisos as $rol) {
                    if (strtolower($rol->getNombre()) == strtolower($permiso) ){
                        return true;
                    }
                }
            }
                
        } else {
            foreach ($this->permisos as $rol) {
                if (strtolower($rol->getNombre()) == strtolower($permisos) ){
                    return true;
                }
            }
        }
        return false;
    }
    
    public function obtenerPermisosOperador(){
        unset($this->permisos);
        $em = \CORE\Controlador\Entity_Manager::getInstancia()->getEntityManager();
        $perfil =  $em->getRepository('Modelo\Perfil')->find($this->perfilId);
        foreach ($perfil->getRolNombre() as $rol) {
            $this->permisos[] = $rol;
        }
    }
    
    public function redirigir($url=null){
        if (is_null($url)){
            $url="/";
        }
        header("location:".$url);
    }
}
?>