<?php

namespace ProyectoScrum\Modelo;

/**
 * Clase ModeloLogin.
 * 
 * En esta clase se realizaran los metodos de comprobacion
 *  del usuario a logear.
 */
class ModeloLogin {
    
    /**
     *Usuario de ejemplo, con contraseña.
     * 
     * variables para simular una base de datos que aun no se puede
     * conectar con ella.
     * 
     * @var Variable de ejemplo<var>usuario</var> y password <var>usuario</var>.
     */
    private $usuarioEjemplo="ejemplo@gmail.com";
    private $passwordEjemplo="ejemplo";
    
    /**
     * Metodo de comprobacion de usuario.
     * 
     * Este metodo comprueba si el nuevo usuario (su correo)
     *  ya existe en la base de datos (sensible a mayusculas).
     * 
     * @param Variable de entrada<var>correo</var>.
     * @return Validacion.
     */
    
    public function comprobarCorreoExistente($correo){
        $valido=false;
        if($correo == $this->usuarioEjemplo){
        $valido=true;
        }
        return $valido;
    }
    
    /**
     * Metodo de Validar Contraseña.
     * 
     * Este metodo comprueba si el nuevo usuario (su contrasena)
     *  ya existe en la base de datos (sensible a mayusculas).
     * 
     * @param Variable de entrada<var>password</var>.
     * @return Validacion.
     */
    
    public function comprobarPasswordValida($password){
        $valido=false;
        if($password == $this->passwordEjemplo){
        $valido=true;
        }
        return $valido;
    }
}
