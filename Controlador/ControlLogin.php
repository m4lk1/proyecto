<?php

/**
 * Variables.
 * 
 * Entrada de las variables desde la ventana index de login de 
 * <var>correo</var> y <var>password</var>
 * desde index.php.
 */
$correo=  filter_input(INPUT_POST,"correo",FILTER_SANITIZE_EMAIL);
$password=  filter_input(INPUT_POST,"password",FILTER_SANITIZE_STRING);
$error="";

/**
 *Carga del objeto ModeloLogin.
 * 
 *Carga del objeto ModeloLogin para poder usarlo y llamar a los métodos.
 */

require "../vendor/autoload.php";
use ProyectoScrum\Modelo\ModeloLogin;
$ModeloLogin=new ModeloLogin();

/**
 * Comprobación de las variables usuario y password.
 * 
 * Comprueba que los datos son correctos y logea
 */

$usuario=$ModeloLogin->comprobarCorreoExistente($correo);
if ($usuario != ""){
    $valido=$ModeloLogin->comprobarPasswordValida($usuario, $password);
    if($valido){
        //salida a la página de tareas del usuario, como no existe, volvemos a login
        header('location: ../Vista/Proyectos.php');
    }
    else{
        $error="PASSWORD NO VALIDA.";
        require "../Vista/indexModificado.php";
    }
}else{
    $error="CORREO INTRODUCIDO NO EXISTENTE.";
    require "../Vista/indexModificado.php";
}

