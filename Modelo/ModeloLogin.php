<?php

namespace ProyectoScrum\Modelo;

use ProyectoScrum\Modelo\GestionMySQL;

/**
 * Clase ModeloLogin.
 * 
 * En esta clase se realizaran los metodos de comprobacion
 *  del usuario a logear.
 */
class ModeloLogin {
    
    protected $gestor;
    
    public function __construct() {
        $this->gestor = new GestionMySQL();
    }
    
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
        $prueba = $this->gestor->leerUsuario($correo);
        if($prueba != ""){
            return $prueba;
        }
        return false;
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
    
    public function comprobarPasswordValida($usuario, $password){
        $prueba = $this->gestor->leerContrasena($usuario, $password);
        if($prueba){
            return $prueba;
        }
        return false;
    }
}
