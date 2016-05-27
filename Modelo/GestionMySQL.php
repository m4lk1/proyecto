<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace ProyectoScrum\Modelo;

use ProyectoScrum\DatosServer\ConfigServer;
use ProyectoScrum\Modelo\conector;

/**
 * Metodos sql para la base de datos
 * 
 * Funciones para realizar sentencias sql al servidor
 *
 * @author josembarboteo<josembarboteo@gmail.com>
 * @version 0.1
 */
class GestionMySQL {
    
    protected $conexion;
    
    /**
     * Ejecucion de sentencias sql
     * 
     * Metodo que realiza la conexion con la base de datos, ejecuta la sentencia sql y devuelve el resultado de la misma
     * 
     * @param type $sql
     * @return boolean
     */
    protected function statement($sql){
        try{
            $config = new ConfigServer();
            $this->conexion = new conector($config);
            $this->conexion->conectar();
            $resultado = $this->conexion->sql($sql);
            if(preg_match("/^SELECT.*/", $sql) == 1){
                $resultado = $this->conexion->next();
                return $resultado;
            }else{
                $this->conexion->desconectar();
                return $resultado;
            }
        } catch (\Exception $ex) {
            return false;
        }
    }
    
    /**
     * Metodo de insercion
     * 
     * Contruye una sentencia sql dependiendo de la tabla que se le introduce, asi mismo calcila la id del dato y lo devuelve junto coon todo el paquete
     * 
     * @param type $tabla
     * @param type $datos
     * @return type
     */
    public function insertar($tabla, $datos){
        $arrayId = $this->statement("SELECT MAX(id".$tabla.") 'id' FROM ".$tabla.";");
        $id = $arrayId["id"];
        $id++;
        switch($tabla){
            case "Historias":
                $sql = "INSERT INTO ".$tabla."(idHistorias, nombre, descripcion, valor, estado) VALUES('".$id."', '".$datos["nombre"]."', '".$datos["descripcion"]."', '".$datos["valor"]."', '0');";
                if($this->statement($sql)){
                    return array(
                        "id" => $id,
                        "nombre" => $datos["nombre"],
                        "descripcion" => $datos["descripcion"],
                        "valor" => $datos["valor"],
                        "estado" => "0"

                    );
                }else{
                    return array("e" => "No se ha podido insertar");
                }
                break;
            case "Sprint":
                $sql = "INSERT INTO Sprint(idProyectos, idSprint, nombre, fecha_inicio, fecha_final) VALUES('0', '".$id."', '".$datos["nombre"]."', '".$datos["finicio"]."', '".$datos["ffin"]."');";
                if($this->statement($sql)){
                    return array(
                        "id" => $id,
                        "nombre" => $datos["nombre"],
                        "finicio" => $datos["finicio"],
                        "ffin" => $datos["ffin"]
                    );
                }else{
                    return array("e" => "No se ha podido insertar");
                }
                break;
        }
    }
    
    /**
     * Metodo de lectura
     * 
     * Realiza la lectura de una tabla con una restriccion en uno de los campos dependiente de la tabla
     * 
     * @param type $tabla
     * @param type $tipo
     * @return type
     */
    public function leer($tabla, $tipo){
        if($tabla=="Historias"){
            $sql = "SELECT * FROM ".$tabla." WHERE estado='".$tipo."';";
        }else{
            $sql = "SELECT * FROM ".$tabla." WHERE idProyectos='".$tipo."';";
        }
        $puntero = $this->statement($sql);
        $resultado = array();
        $i=0;
        do{
            $resultado[] = $puntero;
            $puntero = $this->conexion->next();
            $i++;
        }while($this->conexion->numeroFilas() > $i);
        $this->conexion->desconectar();
        return $resultado;
    }
    
    /**
     * Metodo de eliminado
     * 
     * Realiza la eliminacion de una de las entradas de ka base de datos
     * 
     * @param type $tabla
     * @param type $id
     * @return type
     */
    public function borrar($tabla, $id){
        $sql = "DELETE FROM ".$tabla." WHERE id".$tabla."='".$id."';";
        if($this->statement($sql)){
            return $id;
        }else{
            return array("e"=>"No se ha podido eliminar");
        }
    }
    
    /**
     * Metodo de actualizacion
     * 
     * Realiza la modificacion de los datos almacenados en la base de datos
     * 
     * @param type $tabla
     * @param type $datos
     * @return type
     */
    public function actualizar($tabla, $datos){
        switch ($tabla){
            case "Historias":
                $sql = "UPDATE ".$tabla." SET nombre='".$datos["nombre"]."', descripcion='".$datos["descripcion"]."', valor='".$datos["valor"]."', estado='".$datos["estado"]."' WHERE idHistorias='".$datos["id"]."';";
                break;
            case "Sprint":
                $sql = "";
                break;
        }
        if($this->statement($sql)){
            return $datos;
        }else{
            return array("e"=>"No se ha podido actualizar");
        }
    }
    
}
