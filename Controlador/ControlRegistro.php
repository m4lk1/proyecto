<?php

/**
 * Variables.
 * 
 * Entrada de las variables desde la ventana de registro
 *  de usuario con las variable de <var>nombre</var>, <var>apellido</var>, <var>nick</var>
 * <var>correo</var> y <var>password</var> desde index.php.
 */

$nombre=  filter_input(INPUT_POST,"nombre",FILTER_SANITIZE_STRING);
$apellidos=  filter_input(INPUT_POST,"apellidos",FILTER_SANITIZE_STRING);
$nick=  filter_input(INPUT_POST,"nick",FILTER_SANITIZE_STRING);
$correo=  filter_input(INPUT_POST,"correo",FILTER_SANITIZE_EMAIL);
$password=  filter_input(INPUT_POST,"password",FILTER_SANITIZE_STRING);
$error="";

/**
 *Carga del objeto ModeloRegistro.
 * 
 *Carga del objeto ModeloRegistro para poder usarlo y llamar a los métodos.
 */

require "../vendor/autoload.php";
use ProyectoScrum\Modelo\ModeloRegistro;
$ModeloRegistro=new ModeloRegistro();

/**
 * Comprobación de las variables nick, correo y password.
 * 
 * Se comprueban las variables de nick, correo y password para poder
 * realizar la posterior insercion del usuario en la base de datos.
 */

$valido=$ModeloRegistro->comprobarCorreoExistente($correo);
if (!$valido){
    $valido=$ModeloRegistro->comprobarNickExistente($nick);
    if($valido){
        $error="NICK YA EXISTENTE.";
        require "../Vista/RegistroModificado.php";
    }
}else{
    $error="CORREO INTRODUCIDO YA EXISTENTE.";
    require "../Vista/RegistroModificado.php";
}
/**
 * Insercion de los datos en la base de datos
 * 
 * Se procede a introducir los datos en la base de datos, y en caso 
 * de no haberse podido completar, mostrar un error.
 */

if (!$valido){
    $valido=$ModeloRegistro->insercionNuevoUsuario($nombre, $apellidos, $nick, $correo, $password);
    $valido=true;
    if($valido){
        $agregado="DATOS INTRODUCIDOS CORRECTAMENTE.";
        require "../Vista/indexModificado.php";
    }else{
        $error="ERROR, DATOS NO INTRODUCIDOS.";
        require "../Vista/RegistroModificado.php";
    }
}



