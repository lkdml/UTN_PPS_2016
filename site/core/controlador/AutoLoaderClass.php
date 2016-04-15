<?php
  /**
  * @author lkdml
  * @version Core 1.0
  * 
  * Carga todos los configuracion.php requeridos
  */

spl_autoload_register(function ($nombre_clase) {
    $parts = explode('\\',$nombre_clase);
    $Class = array_pop($parts);
    if ($parts[0] == 'CORE' || $parts[0] == 'Modelo' || $parts[0] == 'Modulo'){
        $path = strtolower(implode('\\',$parts).'\\');
        $filename = str_replace('\\', '/', $path).$Class . '.php';
        include $_SERVER["DOCUMENT_ROOT"].'/'.$filename;
    }
});


?>
