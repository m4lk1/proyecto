<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace ProyectoScrum\Modelo;

/**
 * Conector de la base de datos
 * 
 * Metodos para ejecutar las sentencias de la base de datos. Realiza la ejecucion de los sql y da los metodos necesarios para su lectura y entendimiento
 * 
 * @author josembarboteo<josembarboteo@gmail.com>
 * @version 0.1
 */

class conector {
    
    protected $sesion;
    protected $configuracionServer;
    protected $resuldato;
    protected $cursor;
    
    function __construct($configuracion) { //Generador de conecctor a partir de los datos introducidos
        $this->configuracionServer = $configuracion;
    }
    
    /**
     * Conectar con la base de datos
     * 
     * Conecta con la base de datos con los datos guardados en el archivo de los datos
     * 
     * @throws \Exception
     */
    public function conectar() {
        $this->sesion = new \mysqli($this->configuracionServer->getDireccion(), $this->configuracionServer->getUsuario(),
                                    $this->configuracionServer->getPasswd(), $this->configuracionServer->getNombreBD(), 3306);
        if($this->sesion->connect_error){
            throw new \Exception("No se puede conectar a la base de datos");
        }
    }
    
    /**
     * Estado de la conexion
     * 
     * Determina si la conexion se encuentra disponible o no
     * 
     * @return boolean
     */
    public function getEstadoConectado() {
        if($this->sesion != \NULL){
            return true;
        }else{
            return false;
        }
    }
    
    /**
     * Ejecutor SQL
     * 
     * Ejecuta la sentencia sql dada y guarda los resultado en la variable $resuldato
     * 
     * @param type $sentenciaSQL
     * @return type
     * @throws \Exception
     */
    public function sql($sentenciaSQL) {
        if(($this->sesion) && ($this->sesion->ping())){
            $this->resuldato = $this->sesion->query($sentenciaSQL);
            $this->cursor = 0;
            if(gettype($this->resuldato) == "boolean"){
                return $this->resuldato;
            }else{
                return ($this->resuldato->num_rows > 0);
            }
        }else{
            throw new \Exception("No hay conexion");
        }
    }
    
    /**
     * Siguente
     * 
     * Devuelve la siguente fila del resultado
     * 
     * @return type
     */
    public function next() {
        if ($this->resuldato){
            $this->cursor++;
            return $this->resuldato->fetch_assoc();
        } else {
            return \NULL;
        }
    }
    
    /**
     * Numero de filas
     * 
     * Devuelve el numero de filas del resultado
     * 
     * @return type
     */
    public function numeroFilas(){
        return $this->resuldato->num_rows;
    }
    
    /**
     * Tiene siguente
     * 
     * Determina si aun no se ha recorrido todas las filas del resultado
     * 
     * @return type
     */
    public function hasNext() {
        return (($this->resuldato->num_rows - $this->cursor) > 0);
    }
    
    /**
     * Estado
     * 
     * Determina si se encuentra conectado o no
     * 
     * @return type
     */
    public function getEstado() {
        return $this->sesion->ping();
    }
    
    /**
     * Cerrar
     * 
     * Cierra la conexion con la base de datos
     */
    public function desconectar() {
        if($this->sesion != \NULL){
            $this->sesion->close();
        }
    }
    
}