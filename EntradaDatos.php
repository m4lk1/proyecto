<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require __DIR__."/vendor/autoload.php";

use ProyectoScrum\Controlador\ControladorMySQL;

if($_SERVER['REQUEST_METHOD'] === "GET"){
    
}else{
    $paqueteJSON = file_get_contents('php://input');
    $paquete = json_decode($paqueteJSON, true);
    $operacion = $paquete['operacion'];
    $tabla = $paquete['tabla'];
    $datos = $paquete['objeto'];
    $controlador = new ControladorMySQL($operacion, $tabla, $datos);
    $controlador->ejecutar(false);
}