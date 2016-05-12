<?php

namespace ProyectoScrum\Modelo;

/**
 * Clase ModeloRegistro
 * 
 * En esta clase se realizaran los metodos de comprobacion
 *  del usuario al registrar
 */
class ModeloRegistro {
    
    /**
     *Nick de ejemplo y usuario.
     * 
     * variables para simular una base de datos que aun no se puede
     * conectar con ella.
     * 
     * @var Variable de ejemplo<var>nick</var>, <var>correo</var> 
     */
    private $nickEjemplo="ejemplo";
    private $correoEjemplo="ejemplo@gmail.com";
    
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
        if($correo == $this->correoEjemplo){
        $valido=true;
        }
        return $valido;
    }
    
    /**
     * Metodo de comprobacion de nick.
     * 
     * Este metodo comprueba si el nuevo usuario (su nick)
     *  ya existe en la base de datos (sensible a mayusculas).
     * 
     * @param Variable de entrada<var>nick</var>.
     * @return Validacion.
     */
    
    public function comprobarNickExistente($nick){
        $valido=false;
        if($nick == $this->nickEjemplo){
        $valido=true;
        }
        return $valido;
    }
    
    /**
     * Metodo de insercion en la base de datos.
     * 
     * Este metodo inserta en la base de datos los parámetros de 
     *  de usuario con las variable de <var>nombre</var>, <var>apellido</var>, 
     * <var>nick</var>, <var>correo</var> y <var>password</var>.
     * 
     * @param Valores de entrada <var>nombre</var>, <var>apellido</var>, 
     * <var>nick</var>, <var>correo</var> y <var>password</va
     * @return Insercion realizada o no.
     */
    
    public function insercionNuevoUsuario($nombre,$apellidos,$nick,$correo,$password){
        $realizado=false;
        //completar con conexion a base de datos cuando se pueda.
        return $realizado;
    }
}
