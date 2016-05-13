<?php
    
    if($_SERVER["REQUEST_METHOD"] === "GET"){
        //no hago nah
    }else{
        //entro con el post e inserto en la base de datos
        $paqueteJson = file_get_contents('php://input');
        $paquete = json_decode($paqueteJson, "true");
        $operacion = $paquete["operacion"];        
        $tabla = $paquete["tabla"];
        $datos = $paquete["objeto"];
        $baseDatos = new mysqli("localhost", "root", "pepito123", "proyecto");
        $sql = $operacion." INTO " .$tabla. " VALUES('" .$datos["nombre"]. "', '" .$datos["descripcion"]. "', '" .$datos["valor"]. "', '0' );";
        $respuesta = $baseDatos->query($sql);
        echo json_encode($datos);
    }

?>
